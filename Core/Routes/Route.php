<?php
namespace Core\Routes;

class Route
{

    /**
     * Store All Routes Founded in App/Route Folder
     * ['admin/editUser/{userId}']
     * @var array
     */
    private $routes = [];


    /**
     * Store The Matched Route With URI Parameters
     * ['uri' => 'admin/editUser/1']
     * @var array
     */
    private $matched = [];

    /**
     * Store Variables Comes From The URI
     *  ['userId'=>1]
     * @var array
     */
    private $variables = [];

    /**
     * @var string
     */
    private $uri;

    /**
     * Controller NameSpace
     * @var string
     */
    private $controllerNamespace ;

    /**
     * Controller Name
     * @var string
     */
    private $controllerName;

    /**
     * Controller method name
     * @var string
     */
    private $controllerMethod;

    public function __construct()
    {


    }

    public function run()
    {
        $this->setUri();
        $this->setMatched();
        $this->controllerNamespace();
        $this->setController();
        $this->setVariables();

        return $this;
    }

    private function setController()
    {
        if (!empty($this->matched)) {
            $controller = explode('@', $this->matched['CONTROLLER']);
            $this->controllerName   = $controller[0];
            $this->controllerMethod = $controller[1];
        }
        return true;
    }



    private function controllerNamespace()
    {
        return $this->controllerNamespace = "App\Controller\\";
    }

    private function setVariables()
    {
        $routeArray = explode('/', $this->matched['ROUTE']);
        p($routeArray);
        preg_match_all('/[^\{\/\}]\w+/', $this->uri, $uriArray);
        p($uriArray);

        $result = preg_grep('/\{.*?}/', $routeArray);
       p(array_keys($result));
    }




    private function setMatched()
    {
        for ($i=0; $i < count($this->routes); $i++) {
            if ($this->routes[$i]["ROUTE"] == $this->uri) {
                return $this->matched = [
                     'METHOD'       => $this->routes[$i]["METHOD"],
                     'ROUTE'        => $this->routes[$i]["ROUTE"],
                     'CONTROLLER'   => $this->routes[$i]["CONTROLLER"]
                 ];
            }
        }
        if (empty($this->matched)) {
                return $this->matched = false;
        }
    }

    private function setUri()
    {
        if (isset($_GET["url"])) :
            return $this->uri = rtrim($_GET['url'],'/');
        endif;
        return $this->uri = "/";
    }

    public function get($route = null, $method = null)
    {
        if (is_callable($method)) {
            return $method;
        }

        array_push($this->routes, [
            "METHOD"      =>"GET",
            "ROUTE"       =>$route,
            "CONTROLLER"  =>$method
        ]);

         return true;
    }

    public function post($route = null, $method = null)
    {
        if (is_callable($method)) {
            return $method;
        }
            $array = [
                "METHOD"        => "POST",
                "ROUTE"         => $route,
                "CONTROLLER"    => $method
            ];
            array_push($this->routes, $array);
            return true;
    }


}
