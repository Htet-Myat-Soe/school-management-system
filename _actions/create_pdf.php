<?php

include "../vendor/autoload.php";

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\PdfTable;

$table = new PdfTable(new MySQL());

$name = $_POST['name'];
$n =  strtolower($_POST['name']);

$description = $_POST['description'];

$pdf = "$n.pdf";
$pdf_type = $_FILES['pdf']['type'];
$pdf_err = $_FILES['pdf']['error'];
$pdf_tmp = $_FILES['pdf']['tmp_name'];
if($pdf_err){
    header('admin/pdf.php',"pdf_error");
}
if($pdf_type ===  'application/pdf'){
    move_uploaded_file($pdf_tmp,"../storage/pdf/$pdf");
}

$photo = $_FILES['photo']['name'];
$photo_type = $_FILES['photo']['type'];
$photo_tmp = $_FILES['photo']['tmp_name'];
$photo_err = $_FILES['photo']['error'];

if($photo_err){
    header('admin/pdf.php',"photo_error");
}
if($photo_type === 'image/jpeg' || $photo_type === 'image/png'){
    move_uploaded_file($photo_tmp,"../storage/images/$photo");
}



$data = [
    "name" => $name,
    "photo" => $photo,
    "file" => $pdf,
    "description" => $description,
];
if($table->insert($data)){
    HTTP::redirect("/pdf.php","created_success");
}
else{
    HTTP::redirect("/pdf.php","created_fail");
}

