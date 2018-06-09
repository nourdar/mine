<?php
namespace Core\Controllers;

use \Core\Routes\Route;

class Controller
{
    public $variables;
    public $dtb;
    protected $paginate = [];

    public function __construct(Route $variables)
    {

        return $this->variables = $variables;
    }


    protected function setPaginate($limit)
    {
        $this->paginate['LIMIT'] = $limit;
        return $this;
    }

}