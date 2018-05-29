<?php
/**
 * Created by PhpStorm.
 * User: nourdar
 * Date: 5/24/18
 * Time: 11:12 PM
 */

namespace Core\Database;

use Core\Database\Model as Database;

class ModelFacede extends Database
{
        public static  function __callStatic($name, $arguments)
        {
           $class = new Database();
           call_user_func_array([$class,$name],$arguments);
        }
}