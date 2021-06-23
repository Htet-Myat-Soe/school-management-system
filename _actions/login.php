<?php
session_start();
include "../vendor/autoload.php";

use Libs\Database\MySQL;
use Libs\Database\StudentsTable;
use Libs\Database\TeachersTable;
use Helpers\FHTTP;

$table1 = new TeachersTable(new MySQL());
$table2 = new StudentsTable(new MySQL());



$role_no = $_POST['role_no'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$row1 = $table1->findLogin($role_no,$email,$password);
$row2 = $table2->findLogin($role_no,$email,$password);

$row = [];
if($row1) $row = $row1;
if($row2) $row = $row2;

if($row){
    $_SESSION['name'] = $row['name'];
    $_SESSION['role_no'] = $row['role_no'];
    FHTTP::redirect('/frontend/home.php');
}
else{
    FHTTP::redirect('/',"login_fail");
}

