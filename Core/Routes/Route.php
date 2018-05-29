<?php
namespace Core\Routes;

class Route {

    /**
     * @var string
     * uri unifrom resource location
     */
    public static $uri ;

    /**
     * @var string
     * uri unifrom resource location
     */
    public static $route ;

    /**
     * @var array
     * Content all urls in my script with informations
     * ROUTE - CONTROLLER - METHOD ( POST - GET )
     */
    public static $url = array();

    /**
     * @var array
     */
    public static $data = array();

    /**
     * @var string
     * controller name
     */
    private static $requset_method;

    /**
     * @var string
     */
    private static $controller ;

    /**
     * @var string
     */
    private static $controllersPath = "../Controllers/";

    /**
     * @var string
     */
    private static $controllerNamespace = "\App\Controllers\\";




    /**
     * @throws \Exception
     * @return run the final result for class
     */
    public static function run()
    {


        if(self::checkUrl() ){
            self::$controller = self::$url[self::$route]['CONTROLLER'];
            if(!self::$controller == NULL) {
                self::checkController();
            }

        } else {

            throw new \Exception('URL  '.self::$route.'  INVALID');
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

    /**
     * @param $route
     * @param $controllers
     *
     *
     */
    public static function post($route,$controllers)
    {
        return  self::routes($route,$controllers,"POST");
    }

    /**
     * @param $routes
     * @param $controllers
     * @param $method
     */
    private static function routes ($routes,$controllers,$method)
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
    private static function checkUrl(){
        if(isset($_GET['url'])){

            self::$uri = explode('/',$_GET['url']);

        } else {
            self::$uri = "/";
        }

        if(is_array(self::$url)){
            $page =  array_pop(self::$uri);
            $route = "";
            for($i = 0 ; $i < count(self::$uri) ; $i++ ){
                $route .= self::$uri[$i]."/";
            }
            $route .= $page;
        self::$route = $route;

                if(isset(self::$url[$route])){
                   return true;
                }

        }

    }


    /**
     * @return mixed
     * @throws \Exception
     */
    private static function checkController()
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
                    $c->$m();

                } else {

                    throw new \Exception("Method ".$a[1]." Not Found in " .$a[0]." Controller");

                }
            } else {

                throw new \Exception("Controller ".$a[0]." Not Found ");
            }
        }

    }

}