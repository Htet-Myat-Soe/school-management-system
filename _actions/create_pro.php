<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\ProfessorsTable;

$table = new ProfessorsTable(new MySQL());

$name = $_POST['name'];
$department = $_POST['department'];
$salary = $_POST['salary'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];

$today = date("m/d/y");
$age = date_diff(date_create($birthday),date_create($today))->format("%y");

$password = md5($_POST['password']);

$major =  $_POST['major'];
$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$photo_err = $_FILES['photo']['error'];

if($photo_err){
    header('admin/professor.php',"photo_error");
}
if($photo_type === 'image/jpeg' || $photo_type === 'image/png'){
    move_uploaded_file($photo_tmp,"../storage/images/$photo");
}

$data = [
    "name" => $name,
    "role" => $role,
    "department" => $department,
    "major" => $major,
    "salary" => $salary,
    "phone" => $phone,
    "email" => $email,
    "password" => $password,
    "age" => $age,
    "photo" => $photo,
    "birthday" => $birthday,
    "address" => $address,
    "role_id" => 1,
    
];
if($table->professor_insert($data)){
    HTTP::redirect("/professor.php","created_success");
}
else{
    HTTP::redirect("/professor.php","created_fail");
}

