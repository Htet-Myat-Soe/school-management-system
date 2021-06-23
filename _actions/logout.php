<?php
include "../vendor/autoload.php";
use Helpers\FHTTP;

session_start();

    unset($_SESSION['name']);
    unset($_SESSION['role_no']);
    FHTTP::redirect('/');