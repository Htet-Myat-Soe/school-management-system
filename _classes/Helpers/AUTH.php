<?php
namespace Helpers;

class AUTH
{
static $loginUrl = '/';
static function check()
        {
        session_start();

        if($_SESSION['admin']) {
        return $_SESSION['admin'];
        } else {
            HTTP::redirect(static::$loginUrl);
        }
}
}