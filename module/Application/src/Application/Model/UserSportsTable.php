<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
use Application\Model\Mapper\User AS UserMapper;
use Application\Model\Mapper\UserSports AS UserSportsMapper;

class UserSportsTable{
	protected $table = 'user_sports';
    protected $sql;      
	
	public function	__construct(Adapter $adapter) {
		$this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
	}

    public function addUserSports(UserSportsMapper $usersports)
    {
        $insert = $this->sql->insert($this->table);
        $insert->values($user->getNotNullArrayCopyForAuthentication());
        //echo $this->sql->getSqlStringForSqlObject($insert);exit;
        try {
            return  $this->adapter->query($this->sql->getSqlStringForSqlObject($insert),Adapter::QUERY_MODE_EXECUTE);
        } catch(\Exception $e) {
            var_dump($e->getMessage());exit;
            return NULL;
        }
    }

    public function updateUserSports(UserSportsMapper $usersports, $where)
    {
        $update = $this->sql->update($this->table)
                            ->set($data->getNotNullArrayCopy())
                            ->where($where);
        echo $this->sql->getSqlStringForSqlObject($update);exit;
        try {
            return  $this->adapter->query($this->sql->getSqlStringForSqlObject($insert),Adapter::QUERY_MODE_EXECUTE);
        } catch(\Exception $e) {
            var_dump($e->getMessage());exit;
            return NULL;
        }
    }

    public function updateBasketball($basketballId)
    {
        return $this->updateUserSports(new UserSportsMapper(array('basketball' => "1"), 'id = \''.$id.'\''));
    }
}