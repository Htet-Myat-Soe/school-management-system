<?php

    namespace Helpers;

    class HTTP{
        static $admin_base = "http://localhost/StudentManagementSystem/admin";

        static function redirect($path,$query = ""){
          
               $url = static::$admin_base.$path;
                if($query) $url .= "?$query";
            
                header("location: $url");
                exit();
        }
    }