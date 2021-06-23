<?php
    namespace Libs\Database;

use PDOException;
use PDO;
class PdfTable{
        private $db;
        public function __construct(MySQL $db)
        {
            try{
                $this->db = $db->connect();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function paginate($st,$lim){
           
            $result1 = $this->db->query("SELECT count(id) AS id  FROM pdf");
            $stu = $result1->fetchAll(PDO::FETCH_ASSOC);
            $total = $stu[0]['id'];
            $pages = ceil($total / $lim);
            return $pages;

        }


        public function getAllPdf($st,$lim){
            $result = $this->db->prepare("SELECT * FROM pdf LIMIT $st,$lim");
            $result->execute();
            return $result->fetchAll();
        }

        public function countOfPdf(){
            $res = $this->db->query("select id from pdf");
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert($data){
            $query = "insert into pdf (name,photo,file,description) values (:name,:photo,:file,:description);";
            $stmt = $this->db->prepare($query);

            $stmt->execute($data);
            return $stmt->rowCount();
        }

        public function getById($id){
            $query = "select * from pdf where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->fetch();

        }

        public function update($data){
            $res = $this->db->prepare("update pdf set name=:name,photo=:photo,description=:description,file=:file where id=:id");
            $res->execute($data);
            return $res->rowCount();
        }

        public function delete($id){
            $res = $this->db->prepare("delete from pdf where id=:id");
            $res->execute([
                "id" => $id,
            ]);
            return $res->rowCount();
        }

        public function filter($data){
            $query = "select * from pdf where name = :name";
           $stmt = $this->db->prepare($query);
           $stmt->execute($data);
           return $stmt->fetch();
        }

    }

    