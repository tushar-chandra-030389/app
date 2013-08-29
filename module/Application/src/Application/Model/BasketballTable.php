<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
use Application\Model\Mapper\User AS UserMapper;
use Application\Model\Mapper\UserSports AS UserSportsMapper;
use Application\Model\Mapper\Basketball AS BasketballMapper;

class BasketballTable{
    protected $table = 'basketball';
    protected $sql;      
    
    public function __construct(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
    }

    public function addSport(BasketballMapper $user) {
        $insert = $this->sql->insert($this->table);
        $insert->values($user->getArrayCopy());
        //echo $this->sql->getSqlStringForSqlObject($insert);exit;
        try {
            return  $this->adapter->query($this->sql->getSqlStringForSqlObject($insert),Adapter::QUERY_MODE_EXECUTE);
        } catch(\Exception $e) {
            var_dump($e->getMessage());exit;
            return NULL;
        }
    }
}