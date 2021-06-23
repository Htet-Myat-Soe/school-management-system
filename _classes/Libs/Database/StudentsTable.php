<?php

    namespace Libs\Database;
    
    use PDOException;
    use PDO;
    
    class StudentsTable{
        private $db = null;
        public function __construct(MySQL $db)
        {
           try{
            $this->db = $db->connect();
           }catch(PDOException $e){
               echo $e->getMessage();
           }
        }

        public function countOfStd(){
            $stu = $this->db->query("select id from students");
            return $stu->fetchAll();
        }

        public function getAllStudent($st,$lim){
            $result = $this->db->prepare("SELECT * FROM students LIMIT $st,$lim");
            $result->execute();
            return $result->fetchAll();
        }

        public function student_insert($data){
            try{

                $query = "insert into students (name,role_no,class,major,year,phone,email,password,age,birthday,address,role_id,permission,photo) values 
                (:name,:role_no,:class,:major,:year,:phone,:email,:password,:age,:birthday,:address,:role_id,:permission,:photo);";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getById($id){
            $query = "select * from students where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->fetch();

        }

        public function student_update($data){
            try{

                $query = "update students set name=:name,role_no=:role_no,class=:class,major=:major,year=:year,phone=:phone,
                email=:email,password=:password,age=:age,birthday=:birthday,address=:address,role_id=:role_id,permission=:permission,photo=:photo where id=:id;";

                $stmt = $this->db->prepare($query);

                $stmt->execute($data);
                return $stmt->rowCount();


            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function student_delete($id){
            $query = "delete from students where id = :id";

            $stmt = $this->db->prepare($query);

            $stmt->execute([
                ":id" => $id,
            ]);

            return $stmt->rowCount();

        }

        public function paginate($st,$lim){
           
            $result1 = $this->db->query("SELECT count(id) AS id  FROM students");
            $stu = $result1->fetchAll(PDO::FETCH_ASSOC);
            $total = $stu[0]['id'];
            $pages = ceil($total / $lim);
            return $pages;

        }

       
        public function findLogin($role,$mail,$pw){
            $query = "select name,role_no from students where role_no = :role_no and email = :email and password = :password;";
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
            $query = "select * from students where permission = 1 and email = :email and password = :password;";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":email" => $mail,
                 ":password" => $pw,
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ?? false;
        }

        public function filter($data,$st,$lim){
            $query = "select * from students where name like :name or role_no like :role_no 
            or major like :major or year like :year or permission like :permission limit $st,$lim";
           $stmt = $this->db->prepare($query);
           $stmt->execute($data);
           return $stmt->fetchAll();
        }

        public function countOfyrs($year){
            $stu = $this->db->prepare("select id from students where year = :year ;");
            $stu->execute([':year' => $year]);
            return $stu->fetchAll();
        }

        public function admin(){
            $query = "select id,name,photo from students where permission = 1";
           $stmt = $this->db->query($query);
           return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }