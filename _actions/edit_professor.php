<?php

    
include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\ProfessorsTable;

$table = new ProfessorsTable(new MySQL());

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$today = date("m/d/y");
$age = date_diff(date_create($birthday),date_create($today))->format("%y");
$major = $_POST['major'];
$password = md5($_POST['password']);
$department = $_POST['department'];
$salary = $_POST['salary'];
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
    "id" => $id,
];
if($table->professor_update($data)){
    HTTP::redirect("/professor.php","updated_success");
}
else{
    HTTP::redirect("/professor.php","updated_fail");
}