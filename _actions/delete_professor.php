<?php

    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\ProfessorsTable;
    use Helpers\HTTP;

    $table = new ProfessorsTable(new MySQL());
    $id = $_GET['id'];
    if($table->professor_delete($id)){
        HTTP::redirect("/professor.php","deleted_success");
    }
    else{
        HTTP::redirect("/professor.php","deleted_fail");
    }

     