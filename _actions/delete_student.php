<?php

    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\StudentsTable;
    use Helpers\HTTP;

    $table = new StudentsTable(new MySQL());
    $id = $_GET['id'];
    if($table->student_delete($id)){
        HTTP::redirect("/student.php","deleted_success");
    }
    else{
        HTTP::redirect("/student.php","deleted_fail");
    }

     