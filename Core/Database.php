<?php

namespace Core;
use \PDO;

	class Database {

		private $host;
		private $user;
		private $pass;
		private $db_name;
		private $pdo;

		public function __construct($db_name, $host = 'localhost', $user = 'root', $pass = '') {
			$this->host 	= $host;
			$this->user 	= $user;
			$this->pass 	= $pass;
			$this->db_name 	= $db_name;
		}

		public function getPDO() {
			if ($this->pdo === null) {
				$connection =
				new PDO ("mysql:dbname=".$this->db_name.";host=".$this->host, $this->user, $this->pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$connection->query('SET names utf8; SET CHARACTER SET utf8');

				$this->pdo = $connection;
			}

			return $this->pdo;
		}

		public function query($statment, $one = false, $class = null) {
			 $res = $this->getPDO()->query($statment);

			if (strpos(strtolower($statment), 'insert') 	=== 0
				|| strpos(strtolower($statment), 'delete') 	=== 0
				|| strpos(strtolower($statment), 'update') 	=== 0 )
			{
				return $res;
			}

			if ($class === null) {
				$res->setFetchMode(PDO::FETCH_OBJ);
			} else {
				$res->setFetchMode(PDO::FETCH_CLASS, $class);
			}

			if ($one == false) {
				$data = $res->fetchAll();
			} else {
				$data = $res->fetch();
			}

			return $data;
		}

		public function prepare($statement, $attributes, $one = false, $class = null){
        $rs = $this->getPDO()->prepare($statement);
        $rst = $rs->execute($attributes);
        if(
            strpos(strtolower($statement), 'insert') === 0 ||
            strpos(strtolower($statement), 'delete') === 0 ||
            strpos(strtolower($statement), 'update') === 0
        ){
            return $rst;
        }
        if ($class === null){
            $rs->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $rs->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if($one){
            $data = $rs->fetch();
        } else {
            $data = $rs->fetchAll();
        }
        return $data;
    }

		/*

		public function prepare($statment, $attributes, $one = false, $class = null) {
			$rs = $this->getPDO()->prepare($statment);
			$res = $rs->execute($attributes);

			if (
				   strpos(strtolower($statment), 'insert') 	=== 0
				|| strpos(strtolower($statment), 'delete') 	=== 0
				|| strpos(strtolower($statment), 'update') 	=== 0  )
			{
				return $res;
			}
			var_dump($class);

			if ($class === null) {
				$res->setFetchMode(PDO::FETCH_OBJ);
			} else {
				var_dump($class);
				$res->setFetchMode(PDO::FETCH_CLASS, $class);
			}

			var_dump($res);

			if ($one == false) {
				$data = $res->fetchAll();
			} else {
				$data = $res->fetch();
			}

			return $data;
		}
		*/
	}
