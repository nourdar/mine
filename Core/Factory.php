<?php
namespace Core;

use \Core\Config;
use \Core\Database\DbSettings;
use \Core\Database\Model;
use \Jenssegers\Blade\Blade;
use Nette\Caching\Cache;
use Nette\Caching\Storages\FileStorage;

class Factory
{
    private static $route;
    private static $dtb;

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
        $config   = new DbSettings();
        $dtb = Model::connect($config->server, $config->db_name, $config->username, $config->password);
        self::$dtb = $dtb;
        return self::$dtb;
    }

    public static function dbStorage()
    {
        $config   = self::getConfig();
        $storage  = new FileStorage($config->cachePath);
        return $storage;
    }

    public static function dbCache()
    {
        $cach = new Cache(self::dbStorage());
        return $cach;
    }

    public static function dbStructure()
    {

        $structure = new \Nette\Database\Structure(self::getDb(), self::dbStorage());
        return $structure;
    }

    public static function dbConventions()
    {
        $conventions = new \Nette\Database\Conventions\DiscoveredConventions(self::dbStructure());
        return $conventions;
    }

    public static function dbContext()
    {
        $context = new \Nette\Database\Context(self::getDb(), self::dbStructure(), self::dbConventions(), self::dbStorage());
        return $context;
    }

    public static function getConfig()
    {
        $config   = new Config();
        return  $config;
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

    public function controllerNameSpace($array)
    {
        self::getRoute();
        self::$route->controllerNamespace['default'] = "App\Controllers\\";
        foreach ($array as $key => $val) {
            self::$route->controllerNamespace[$key] = "App\Controllers\\".$val."\\";
        }
    }
}
