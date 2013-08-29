<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\TableGateway\AbstractTableGateway;
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
}