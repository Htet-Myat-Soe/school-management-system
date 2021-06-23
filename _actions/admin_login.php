<?php
    session_start();
    include "../vendor/autoload.php";

    use Libs\Database\MySQL;
    use Libs\Database\StudentsTable;
    use Libs\Database\TeachersTable;
    use Libs\Database\ProfessorsTable;
    use Helpers\HTTP;

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $table1 = new StudentsTable(new MySQL());
    $table2 = new TeachersTable(new MySQL());
    $table3 = new ProfessorsTable(new MySQL());

    $row1 = $table1->adminLogin($email,$password);
    $row2 = $table2->adminLogin($email,$password);
    $row3 = $table3->adminLogin($email,$password);


    $row = [];

    if($row1) $row = $row1;
    if($row2) $row = $row2;
    if($row3) $row = $row3;


    if($row){
        $_SESSION['admin'] = $row;
        HTTP::redirect('/dashboard.php');
    }
    else{
        HTTP::redirect('/',"login_fail");
    }