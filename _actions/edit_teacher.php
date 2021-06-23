<?php

    
include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\TeachersTable;

$table = new TeachersTable(new MySQL());

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role_no = $_POST['role_no'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$today = date("m/d/y");
$age = date_diff(date_create($birthday),date_create($today))->format("%y");
$major = $_POST['major'];
$password = md5($_POST['password']);
$permission = isset($_POST['permission']) ? $_POST['permission'] : 0;
$department = $_POST['department'];
$salary = $_POST['salary'];
$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$photo_err = $_FILES['photo']['error'];

if($photo_err){
    header('backend/teacher.php',"photo_error");
}
if($photo_type === 'image/jpeg' || $photo_type === 'image/png'){
    move_uploaded_file($photo_tmp,"../storage/images/$photo");
}

$data = [
    "name" => $name,
    "role_no" => $role_no,
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
    "role_id" => 2,
    "permission" => $permission,
    "id" => $id,
];
if($table->teacher_update($data)){
    HTTP::redirect("/teacher.php","updated_success");
}
else{
    HTTP::redirect("/teacher.php","updated_fail");
}