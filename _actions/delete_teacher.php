<?php

    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\TeachersTable;
    use Helpers\HTTP;

    $table = new TeachersTable(new MySQL());
    $id = $_GET['id'];
    if($table->teacher_delete($id)){
        HTTP::redirect("/teacher.php","deleted_success");
    }
    else{
        HTTP::redirect("/teacher.php","deleted_fail");
    }

     