<?php
namespace App\Routes;

class Routes {

    /**
     * @var string
     * uri unifrom resource location
     */
    public static $uri ;

    /**
     * @var array
     * Content all urls in my script with informations
     * ROUTE - CONTROLLER - METHOD ( POST - GET )
     */
    public static $url = array();

    /**
     * @var string
     * controller name
     */
    public static $controller ;

    /**
     * @var string
     */
    public static $controllersPath = "Controllers/";

    /**
     * @var string
     */
    public static $controllerNamespace = "\App\Controllers\\";

    /**
     * Routes constructor.
     */
    public function __construct()
    {
        self::$uri = $_GET['url'];
    }

    /**
     * @throws \Exception
     * @return run the final result for class
     */
    public static function run()
    {
        if(self::checkUrl() ){

            self::$controller = self::$url[$_GET['url']]['CONTROLLER'];

             self::checkController();

        } else {
            throw new \Exception("can't run ROUTE class check run() method");
        }

    }

    /**
     * @param $route
     * @param $controllers
     */
    public  static function get($route,$controllers) {
       return  self::routes($route,$controllers,"GET");
    }

    /**
     * @param $routes
     * @param $controllers
     * @param $method
     */
    public static function routes ($routes,$controllers,$method)
    {
        self::$url[$routes] = array(
            "CONTROLLER" => $controllers,
            "METHOD"     => $method
        );

    }

    /**
     * @return bool
     */
    public static function checkUrl(){

        if(is_array(self::$url)){
            if(isset(self::$url[$_GET['url']])){
                return true;
            } else {
               return false;
            }
        }
        return false;
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    protected static function checkController(){

        $a = explode('@',self::$controller);

        if(file_exists(self::$controllersPath.$a[0]."Controller.php")){

            if(method_exists(self::$controllerNamespace.$a[0]."Controller",$a[1])){

                $aa = self::$controllerNamespace.$a[0]."Controller";
                $c = new $aa;
                $m = $a[1];
               return $c->$m();

            } else {

                throw new \Exception("Method ".$a[1]." Not Found in " .$a[0]." Controller");

            }
        } else {

            throw new \Exception("Controller ".$a[0]." Not Found ");
        }
    }



}