<?php

    include "../vendor/autoload.php";
    use Libs\Database\MySQL;
    use Libs\Database\PdfTable;
    use Helpers\HTTP;

    $table = new PdfTable(new MySQL());
    $id = $_GET['id'];
    if($table->delete($id)){
        HTTP::redirect("/pdf.php","deleted_success");
    }
    else{
        HTTP::redirect("/pdf.php","deleted_fail");
    }

     