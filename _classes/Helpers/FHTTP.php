<?php

    namespace Helpers;

    class FHTTP{
        static $admin_base = "http://localhost/StudentManagementSystem";

        static function redirect($path,$query = ""){
          
               $url = static::$admin_base.$path;
                if($query) $url .= "?$query";
            
                header("location: $url");
                exit();
        }
    }