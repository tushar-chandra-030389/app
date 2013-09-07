<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shafox
 * Date: 30/8/13
 * Time: 2:27 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
use Application\Model\Mapper\User AS UserMapper;
use Application\Model\Mapper\Event AS EventMapper;
use Application\Model\Mapper\EventGroup AS EventGroupMapper;

class EventGroupTable{
    protected $table = 'event_group';
    protected $sql;

    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
    }

    public function addEventGroup(EventGroupMapper $event) {
        $insert = $this->sql->insert($this->table);
        $insert->values($event->getNotNullArrayCopy());
        //echo $this->sql->getSqlStringForSqlObject($insert);exit;
        try {
            return  $this->adapter->query($this->sql->getSqlStringForSqlObject($insert),Adapter::QUERY_MODE_EXECUTE);
        } catch(\Exception $e) {
            var_dump($e->getMessage());exit;
            return NULL;
        }
    }
}