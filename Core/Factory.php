<?php
namespace Core;

use \Core\Config;
use \Core\Database\DbSettings;
use \Core\Database\Model;
use \Jenssegers\Blade\Blade;

class Factory
{
    private static $config;
    private static $route;
    private static $dtb;
    private static $isDtb = false;

    public static function getRoute()
    {
        if (is_null(self::$route)) {
            $route = new Routes\Route();
            return self::$route = $route;
        }

        return self::$route;
    }

    public static function getDb()
    {
        if (self::$isDtb === false) :
            $config   = new DbSettings();
            $dtb = Model::connect($config->server, $config->db_name, $config->username, $config->password);
            self::$dtb = $dtb;
            self::$isDtb = true;
            return self::$dtb;
        endif;
        return self::$dtb;
    }

    public static function getConfig()
    {
        $config   = new Config();
        return self::$config = $config;
    }

    public static function runFlipWhoops()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    public static function getView()
    {
        $config = self::getConfig();
        $blade = new Blade($config->viewsPath, $config->cachePath);

        return $blade;
    }

    public static function getModel($name)
    {
        $model = "\App\Database\Model\\".$name;
        $model = new $model();
        return $model;
    }




}