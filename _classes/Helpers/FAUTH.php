<?php
namespace Helpers;
class FAUTH
{
static $loginUrl = '/';
static function check()
        {
        session_start();
        if(isset($_SESSION['name'])) {
        return $_SESSION['name'];
        } else {
        FHTTP::redirect(static::$loginUrl);
        }
}
}