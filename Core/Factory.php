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
    /**
     * @var
     */
    private static $route;
    /**
     * @var
     */
    private static $dtb;

    /**
     * @return Routes\Route
     */
    public static function getRoute()
    {
        if (is_null(self::$route)) {
            $route = new Routes\Route();
            return self::$route = $route;
        }

        return self::$route;
    }

    /**
     * @return \Nette\Database\Connection
     */
    public static function getDb()
    {
        $config   = new DbSettings();
        $dtb = Model::connect($config->server, $config->db_name, $config->username, $config->password);
        self::$dtb = $dtb;
        return self::$dtb;
    }

    /**
     * @return FileStorage
     */
    public static function dbStorage()
    {
        $config   = self::getConfig();
        $storage  = new FileStorage($config->cachePath);
        return $storage;
    }

    /**
     * @return Cache
     */
    public static function dbCache()
    {
        $cach = new Cache(self::dbStorage());
        return $cach;
    }

    /**
     * @return \Nette\Database\Structure
     */
    public static function dbStructure()
    {

        $structure = new \Nette\Database\Structure(self::getDb(), self::dbStorage());
        return $structure;
    }

    /**
     * @return \Nette\Database\Conventions\DiscoveredConventions
     */
    public static function dbConventions()
    {
        $conventions = new \Nette\Database\Conventions\DiscoveredConventions(self::dbStructure());
        return $conventions;
    }

    /**
     * @return \Nette\Database\Context
     */
    public static function dbContext()
    {
        $context = new \Nette\Database\Context(self::getDb(), self::dbStructure(), self::dbConventions(), self::dbStorage());
        return $context;
    }

    /**
     * @return \Core\Config
     */
    public static function getConfig()
    {
        $config   = new Config();
        return  $config;
    }

    /**
     *
     */
    public static function runFlipWhoops()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }

    /**
     * @return Blade
     */
    public static function getView()
    {
        $config = self::getConfig();
        $blade = new Blade($config->viewsPath, $config->cachePath);

        return $blade;
    }

    /**
     * @param $name
     * @return string
     */
    public static function getModel($name)
    {
        $model = "\App\Database\Model\\".$name;
        $model = new $model();
        return $model;
    }

    /**
     * @param $array
     */
    public function controllerNameSpace($array)
    {
        self::getRoute();
        self::$route->controllerNamespace['default'] = "App\Controllers\\";
        foreach ($array as $key => $val) {
            self::$route->controllerNamespace[$key] = "App\Controllers\\".$val."\\";
        }
    }

    /**
     * @param $name
     */
    public static function func($name)
    {
        $config = self::getConfig();
        if (file_exists($config->funcPath.$name.'Functions.php')) {
            require $config->funcPath.$name."Functions.php";
        }
    }

    public static function visitors($column)
    {
        $visitor = visitors();
        return $visitor[$column];
    }
}
