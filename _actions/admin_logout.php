<?php
include "../vendor/autoload.php";

use Helpers\HTTP;

session_start();

    unset($_SESSION['admin']);
    unset($_SESSION['admin_email']);
    HTTP::redirect('/');