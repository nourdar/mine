<?php
namespace Core\Routes;

use Core\Factory;

class Route
{

    /**
     * Store All Routes Founded in App/Route Folder
     * ['admin/editUser/{userId}']
     * @var array
     */
    private $routes = [];

    /**
     * contain array with variables matched indexes in $route and $uri
     * @var string
     */
    private $variablesKeys;

    /**
     * Contain Route Informations if it matched with entred URI
     * @var array
     */
    public $matched = [];

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
     * @var string;
     */
    private  $controllerNamespace;

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
        $this->setUri();
    }

    public function run()
    {


        if ($this->setMatched("GET")) {
            $this->setMatched("GET");
        }  else {
            throw new \Exception("INVALID URL ". $this->uri);
        }

        if ($this->setVariables()) {
            $this->setVariables();
        }

        if (empty($this->variables) && !empty($this->matched['VARIABLES']) && $this->matched['HAS_VAR'] === true) {
            throw new \Exception("You Have To Insert Variables In Your Link");
        }

        $this->controllerNamespace();

        $this->setController();

        $this->checkMethod();

        $this->controllStart();

        return $this;
    }

    public function runPost()
    {
        if ($this->setMatched("POST")) {
            $this->setMatched("POST");
        } else {
            throw new \Exception("INVALID URL ". $this->uri);
        }

        $this->controllerNamespace();

        $this->setController();

        $this->checkMethod();

        $this->controllStart();

        return $this;
    }

    public function get($route = null, $method = null)
    {
        if (is_callable($method)) {
            return $method;
        }
        if ($route === "/") {
            $handledRoute = "/";
        } else {
            $handledRoute = $this->routeHandle($route);
        }

        array_push($this->routes, [
            "URI"                   =>$this->uri,
            "METHOD"                =>"GET",
            "ROUTE"                 =>$route,
            "ROUTE_HANDLE"          =>$handledRoute,
            "VARIABLES"             =>$this->var($route),
            "VARIABLES_KEYSES"      =>array_keys($this->var($route)),
            "CONTROLLER"            =>$method,
            "URI_HANDLE"            =>$this->uriHandle($this->uri,array_keys($this->var($route)))
        ]);
        return true;
    }

    public function post($route = null, $method = null)
    {
        if (is_callable($method)) {
            return $method;
        }
        if ($route === "/") {
            $handledRoute = "/";
        } else {
            $handledRoute = $this->routeHandle($route);
        }
        $array = [
            "URI"                   =>$this->uri,
            "METHOD"                =>"POST",
            "ROUTE"                 =>$route,
            "ROUTE_HANDLE"          =>$handledRoute,
            "VARIABLES"             =>$this->var($route),
            "VARIABLES_KEYSES"      =>array_keys($this->var($route)),
            "CONTROLLER"            =>$method,
            "URI_HANDLE"            =>$this->uriHandle($this->uri,array_keys($this->var($route)))
        ];
        array_push($this->routes, $array);
        return true;
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

    private function controllStart()
    {
        $variables = $this->variables;
        $methodName = $this->controllerMethod;
        $class = $this->controllerNamespace.$this->controllerName."Controller";
        $class = new $class();
        if (!empty($variables)) {
            return  $class->$methodName($variables);
        } else {
            return  $class->$methodName();
        }
    }

    private  function controllerNamespace()
    {
        return $this->controllerNamespace = "App\Controllers\\";
    }

    private function checkMethod()
    {
        $class = $this->controllerNamespace.$this->controllerName.'Controller';
        $class = new $class();

         return method_exists($class, $this->controllerMethod);
    }

    private function setVariables()
    {
        $dividingUri = $this->dividingUri()[0];
        $matched = $this->dividingUri()[1];
        $varKeys = $this->matched['VARIABLES_KEYSES'];
        $get = "url=".$this->matched['ROUTE'];

        foreach ($matched as $value) {
            foreach ($varKeys as $keys) {
                $key  = $value[$keys];
                if(isset($dividingUri[$keys])){
                    $val  = $dividingUri[$keys];
                } else {
                    return false;
                }
                $get .= "&".$key."=".$val;
            }
             $this->variablesKeys = $varKeys;
        }

        parse_str($get, $variabels);
        $this->variables = $variabels;
    }

    private function dividingUri()
    {
        $dividingUri = explode('/', $this->uri);
        preg_match_all('/[^\{\/\}]\w+/', $this->matched['ROUTE'], $matched);
        $result = [$dividingUri,$matched];
        return $result;
    }

    private function var($route)
    {
        $dividingRoute = explode('/', $route);
        $variables = preg_grep('/\{.*?}/', $dividingRoute);
        return  $variables;
    }

    private function setMatched($method)
    {

            for ($i=0; $i < count($this->routes); $i++) {
                $route = $this->routes[$i];
                if ($route['ROUTE'] === $this->uri && $this->uri === $route['URI_HANDLE'] && $route['METHOD'] === $method) {
                    $route = $this->fillMatched($route, false);
                    return $this->matched = $route;
                }
            }

            for ($i=0; $i < count($this->routes); $i++) {
                $route = $this->routes[$i];
                if ($route['ROUTE_HANDLE'] === $route['URI_HANDLE'] && $route['METHOD'] === $method) {
                    $route = $this->fillMatched($route, true);
                    return $this->matched = $route;
                }
            }


        return false;
    }

    private function fillMatched($route, bool $hasVar)
    {
        $result = [
            'METHOD'           => $route["METHOD"],
            'ROUTE'            => $route["ROUTE"],
            'ROUTE_HANDLE'     => $route["ROUTE_HANDLE"],
            'URI'              => $this->uri,
            'URI_HANDLE'       => $route["URI_HANDLE"],
            'VARIABLES'        => $route["VARIABLES"],
            'VARIABLES_KEYSES' => $route["VARIABLES_KEYSES"],
            'CONTROLLER'       => $route["CONTROLLER"],
            'HAS_VAR'          => $hasVar
        ];
        return $result;
    }

    private function setUri()
    {
        if (isset($_GET["url"])) :
            if($_GET["url"] === "/") {
                return $this->uri = "/";
            }
            return $this->uri = rtrim($_GET['url'], '/');
        endif;

        return $this->uri = "/";
    }

    private function routeHandle($route)
    {
        $route = preg_replace('/\{.*?}/', '', $route);
        $route = str_replace('//', '/', $route);
        $route = rtrim($route, '/');
        return $route;
    }

    private function uriHandle($uri, $keys)
    {
        $dividingUri   = explode('/', $uri);

            foreach ($keys as $value) {
                unset($dividingUri[$value]);
            }

        $uri = implode('/', $dividingUri);
        return  $uri;
    }


}
