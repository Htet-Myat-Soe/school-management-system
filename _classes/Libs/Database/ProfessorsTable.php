<?php

    namespace Libs\Database;

    use PDO;
    use PDOException;

    class ProfessorsTable{
        private $db = null;
        public function __construct(MySQL $db)
        {
            try{
                $this->db = $db->connect();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function countOfPro(){
            $stu = $this->db->query("select id from professors");
            return $stu->fetchAll();
        }

        public function paginate($st,$lim){
            $result1 = $this->db->query("SELECT count(id) AS id  FROM professors");
            $stu = $result1->fetchAll(PDO::FETCH_ASSOC);
            $total = $stu[0]['id'];
            $pages = ceil($total / $lim);
            return $pages;
        }

        public function getAllProfessor($st,$lim){
            $result = $this->db->prepare("SELECT * FROM professors LIMIT $st,$lim");
            $result->execute();
            return $result->fetchAll();
        }

        public function professor_insert($data){
            try{

                $query = "insert into professors (name,role,department,major,salary,phone,email,password,age,photo,birthday,address,role_id) values 
                (:name,:role,:department,:major,:salary,:phone,:email,:password,:age,:photo,:birthday,:address,:role_id);";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getById($id){
            $query = "select * from professors where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->fetch();

        }

        public function professor_update($data){
            try{

                $query = "update professors set name=:name,role=:role,department=:department,major=:major,salary=:salary,phone=:phone,
                email=:email,password=:password,age=:age,photo=:photo,birthday=:birthday,address=:address,role_id=:role_id where id=:id;";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function professor_delete($id){
            $query = "delete from professors where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->rowCount();

        }

        public function adminLogin($mail,$pw){
            $query = "select * from professors where permission = 1 and email = :email and password = :password;";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":email" => $mail,
                 ":password" => $pw,
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ?? false;
        }

        public function admin(){
            $query = "select id,name,photo from professors where permission = 1";
           $stmt = $this->db->query($query);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }