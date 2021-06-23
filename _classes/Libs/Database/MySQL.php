<?php

namespace Libs\Database;

use Exception;
use PDO;
use PDOException;

    class MySQL{
        private $db;
        private $dbhost;
        private $dbname;
        private $dbuser;
        private $dbpass;

        public function __construct(
            $dbhost = "localhost",
            $dbname = "sms",
            $dbuser = "root",
            $dbpass = "",
            $db = null
        )
        {
          $this->dbhost = $dbhost;
          $this->dbname = $dbname;
          $this->dbuser = $dbuser;
          $this->dbpass = $dbpass;
          
        }

        public function connect(){
            try{
                $this->db = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname","$this->dbuser","$this->dbpass",[
                PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);
            return $this->db;
           }catch(Exception $e){
               echo $e->getMessage();
           }
        }

    }