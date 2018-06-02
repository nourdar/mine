<?php
namespace Core\Controllers;

use \Core\Routes\Route;

class Controller
{
    public $variables;

    public function __construct(Route $variables)
    {
        return $this->variables = $variables;
    }

}