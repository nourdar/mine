<?php
namespace Core\Controllers;

use Core\Factory;
use \Core\Routes\Route;

class Controller
{
    /**
     * @var Route
     */
    public $variables;
    /**
     * @var
     */
    public $dtb;
    /**
     * @var
     */
    public $func;
    /**
     * @var array
     */
    protected $paginate = [];

    /**
     * Controller constructor.
     * @param Route $variables
     */
    public function __construct(Route $variables)
    {
        return $this->variables = $variables;
    }

    /**
     * @param $limit
     * @return $this
     */
    protected function setPaginate($limit)
    {
        $this->paginate['LIMIT'] = $limit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFunc($name)
    {
        return  Factory::func($name);
    }
}