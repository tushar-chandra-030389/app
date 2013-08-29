<?php
/*

 * PATH : Application/src/Application/Model/UserTable.php
    
*/
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
use Application\Model\Mapper\User AS UserMapper;

class UserTable{
	protected $table = 'user';
    protected $sql;      
	
	public function	__construct(Adapter $adapter) {
		$this->adapter = $adapter;
        $this->sql = new Sql($this->adapter);
	}
    
    public function addUser(UserMapper $user) {
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

    public function getUserForAuthentication($email) {
        $mapperUser = new UserMapper();
        $select = $this->sql->select(array('usr' => $this->table))
                            ->columns($mapperUser->getArrayCopyForAuthentication(TRUE))
                            ->where("usr.email = '".$email."' OR usr.username = '".$email."'");
        //echo $this->sql->getSqlStringForSqlObject($select);exit;
        try{
            $result = $this->adapter->query($this->sql->getSqlStringForSqlObject($select),Adapter::QUERY_MODE_EXECUTE);
            $result->setArrayObjectPrototype($mapperUser);
            if($result->count() != 0){
                return $result;  
            }
            return array();
        } catch(\Exception $e) {
            return NULL;
        }
    }

    public function getUser($where) {
        $mapperUser = new UserMapper();
        $select = $this->sql->select(array('usr' => $this->table))
                            ->columns($mapperUser->getArrayCopy(TRUE))
                            ->where($where);
        //echo $this->sql->getSqlStringForSqlObject($select);exit;
        try{
            $result = $this->adapter->query($this->sql->getSqlStringForSqlObject($select),Adapter::QUERY_MODE_EXECUTE);
            $result->setArrayObjectPrototype($mapperUser);
            if($result->count() != 0){
                return $result;  
            }
            return array();
        } catch(\Exception $e) {
            return NULL;
        }
    }

    public function getUserByEmail($email) {
        return $this->getUser("usr.email = '".$email."'");
    }

    public function integrityCheck($email, $username) {
        return $this->getUser("usr.email = '".$email."' OR usr.username = '".$username."'");        
    }

    public function updateUser(UserMapper $data,$where) {
        $update = $this->sql->update($this->table)
                            ->set($data->getNotNullArrayCopy())
                            ->where($where);
        //echo $this->sql->getSqlStringForSqlObject($update);exit;
        try {
            return  $this->adapter->query($this->sql->getSqlStringForSqlObject($update),Adapter::QUERY_MODE_EXECUTE);
        } catch(\Exception $e) {
            return NULL;
        }
    }

    public function changeUserStatusToActive($id) {
        return $this->updateUser(new UserMapper(array('status' => '100')), "id='".$id."'"); 
    }

    public function updateUserType($newType, $id) {
        return $this->updateUser(new UserMapper(array('type' => $newType)), "id='".$id."'"); 
    }

}
