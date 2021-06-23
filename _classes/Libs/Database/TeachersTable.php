<?php

    namespace Libs\Database;

    use PDO;
    use PDOException;

    class TeachersTable{
        private $db = null;
        public function __construct(MySQL $db)
        {
            try{
                $this->db = $db->connect();
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function countOfTea(){
            $stu = $this->db->query("select id from teachers");
            return $stu->fetchAll();
        }

        public function paginate($st,$lim){
            $result1 = $this->db->query("SELECT count(id) AS id  FROM teachers");
            $stu = $result1->fetchAll(PDO::FETCH_ASSOC);
            $total = $stu[0]['id'];
            $pages = ceil($total / $lim);
            return $pages;
        }

        public function getAllTeacher($st,$lim){
            $result = $this->db->prepare("SELECT * FROM teachers LIMIT $st,$lim");
            $result->execute();
            return $result->fetchAll();
        }

        public function teacher_insert($data){
            try{

                $query = "insert into teachers (name,role_no,department,major,salary,phone,email,password,age,photo,permission,birthday,address,role_id) values 
                (:name,:role_no,:department,:major,:salary,:phone,:email,:password,:age,:photo,:permission,:birthday,:address,:role_id);";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getById($id){
            $query = "select * from teachers where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->fetch();

        }

        public function teacher_update($data){
            try{

                $query = "update teachers set name=:name,role_no=:role_no,department=:department,major=:major,salary=:salary,phone=:phone,
                email=:email,password=:password,age=:age,photo=:photo,permission=:permission,birthday=:birthday,address=:address,role_id=:role_id where id=:id;";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function teacher_delete($id){
            $query = "delete from teachers where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->rowCount();

        }

        public function findLogin($role,$mail,$pw){
            $query = "select name,role_no from teachers where role_no = :role_no and email = :email and password = :password;";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":role_no" => $role,
                ":email" => $mail,
                 ":password" => $pw,
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ?? false;
        }

        public function adminLogin($mail,$pw){
            $query = "select * from teachers where permission = 1 and email = :email and password = :password;";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":email" => $mail,
                 ":password" => $pw,
            ]);
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row ?? false;
        }

        public function admin(){
            $query = "select id,name,photo from teachers where permission = 1";
           $stmt = $this->db->query($query);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }