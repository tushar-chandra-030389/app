<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use Application\Model\Mapper\User AS UserMapper;
use Application\Model\Mapper\UserSports AS UserSportsMapper;
use Application\Model\Mapper\Football AS FootballMapper;

class FootballTable{
	protected $table = 'football';
    protected $sql;      
	
	public function	__construct(Adapter $adapter) {
		$this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
	}

    public function addSport(FootballMapper $user) {
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

    public function getFootballProfile($where, $joins = array()) {
        $footballMapper = new FootballMapper();
        $select = $this->sql->select(array('fb' => $this->table))
                            ->columns($footballMapper->getArrayCopy(TRUE))
                            ->where($where);
        foreach ($joins as $key => $value) {
            $joinMapper = NULL;
            $on = '';
            $table = '';

            switch ($value) {
                case 'user':
                    $on = "fb.uid = user.id";
                    $joinMapper = new UserMapper();
                    $table = 'user';
                    break;
            }
            $select->join(array($value => $table), $on, $joinMapper->getArrayCopy(TRUE,$value));
        }
        //echo $this->sql->getSqlStringForSqlObject($select);exit;
        try{
            $result = $this->adapter->query($this->sql->getSqlStringForSqlObject($select),Adapter::QUERY_MODE_EXECUTE);
            $result->setArrayObjectPrototype($footballMapper);
            if($result->count() != 0){
                return $result;
            }
            return array();
        } catch(\Exception $e) {
            return NULL;
        }
    }

    public function getUserFootballProfile($userId) {
        return $this->getFootballProfile("fb.uid = '".$userId."'", array('user'));
    }
}