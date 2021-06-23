<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StudentsTable;

$table = new StudentsTable(new MySQL());

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role_no = $_POST['role_no'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$permission = isset($_POST['permission']) ? $_POST['permission'] : 0;
$today = date("m/d/y");
$age = date_diff(date_create($birthday),date_create($today))->format("%y");

$password = md5($_POST['password']);

$major = substr($role_no,1,2);
$year = substr($role_no,0,1);

if($major === "CS" ){
    $class = "Computer Science";
}
else{
    $class = "Computer Technology";
}

switch($year){
    case 1: $class = "First Year ".$class;
            $year = "First Year ";
            break;
    case 2: $class = "Second Year ".$class;
            $year = "Second Year ";
            break;
    case 3: $class = "Third Year ".$class;
            $year = "Third Year ";
            break;
    case 4: $class = "Fourth Year ".$class;
            $year = "Fourth Year ";
            break;
    case 5: $class = "Fifth Year ".$class;
            $year = "Fifth Year ";
            break;
}
$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$photo_err = $_FILES['photo']['error'];

if($photo_err){
    HTTP::redirect("/student.php","photo_error");
}
if($photo_type === 'image/jpeg' || $photo_type === 'image/png'){
    move_uploaded_file($photo_tmp,"../storage/images/$photo");
}

$data = [
    "name" => $name,
    "role_no" => $role_no,
    "class" => $class,
    "major" => $major,
    "year" => $year,
    "phone" => $phone,
    "email" => $email,
    "password" => $password,
    "age" => $age,
    "birthday" => $birthday,
    "address" => $address,
    "role_id" => 3,
    "photo" => $photo,
    "permission" => $permission,
];
if($table->student_insert($data)){
    HTTP::redirect("/student.php","created_success");
}
else{
    HTTP::redirect("/student.php","created_fail");
}

