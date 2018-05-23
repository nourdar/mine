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

    private static $requset_method;
    /**
     * @var array
     */
    public static $data = array();

    /**
     * @var string
     */
    private static $controller ;

    /**
     * @var string
     */
    private static $controllersPath = "Controllers/";

    /**
     * @var string
     */
    private static $controllerNamespace = "\App\Controllers\\";

    /**
     * Routes constructor.
     */


    /**
     * @throws \Exception
     * @return run the final result for class
     */
    public static function run()
    {


        if(self::checkUrl() ){

                self::$controller = self::$url[self::$uri]['CONTROLLER'];
                if(!self::$controller == NULL) {
                    self::checkController();
                }
        } else {
           throw new \Exception('URL INVALID');
        }

    }

    /**
     * @param $route
     * @param $controllers
     */
    public  static function get($route,$controllers)
    {

       return  self::routes($route,$controllers,"GET");
    }

    public static function post($route,$controllers)
    {
        return  self::routes($route,$controllers,"POST");
    }

    /**
     * @param $routes
     * @param $controllers
     * @param $method
     */
    public static function routes ($routes,$controllers,$method)
    {
        if( $method === "POST" ):
            self::$requset_method = "POST";
            self::$data = $_POST;
            endif;

        self::$url[$routes] = array(
            "CONTROLLER" => $controllers,
            "METHOD"     => $method
        );

    }

    /**
     * @return bool
     */
    public static function checkUrl(){
        self::$uri = $_GET['url'];
        if(is_array(self::$url)){
            if(isset(self::$url[$_GET['url']])){
                return true;
            }
        }

    }


    /**
     * @return mixed
     * @throws \Exception
     */
    protected static function checkController()
    {
        if(is_callable(self::$controller)){
            true;
        } else {


        $a = explode('@',self::$controller);

        if(file_exists(self::$controllersPath.$a[0]."Controller.php")){

            if(method_exists(self::$controllerNamespace.$a[0]."Controller",$a[1])){

                $aa = self::$controllerNamespace.$a[0]."Controller";
                $c = new $aa;
                $m = $a[1];
                if(self::$requset_method === "POST"):
                    $request = self::$data;
                    return $c->$m($request);
                    endif;
               var_dump( $c->$m());

            } else {

            throw new \Exception("Method ".$a[1]." Not Found in " .$a[0]." Controller");

            }
        } else {

          throw new \Exception("Controller ".$a[0]." Not Found ");
        }
    }

    }

}