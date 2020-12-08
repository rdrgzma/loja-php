<?php


namespace App\Controllers;


use App\Classes\Uri;

class Controller
{
    const NAMESPACE_CONTROLLER = '\\App\\Controllers\\';
    const FOLDERS_CONTROLLER = ['Site', 'Admin'];
    const ERROR_CONTROLLER = '\\App\\Controllers\\Error\\ErrorController';


    private $uri;

    public function __construct()
    {
        $this->uri = new Uri();
    }

    public function controller()
    {
        $controller = $this->getController();
        foreach (self::FOLDERS_CONTROLLER as $foldersControllers) {
            if (class_exists(self::NAMESPACE_CONTROLLER . $foldersControllers . '\\' . $controller)) {
                return self::NAMESPACE_CONTROLLER . $foldersControllers . '\\' . $controller;
            }
        }
        return self::ERROR_CONTROLLER;

    }

    public function getController()
    {
        if (!$this->uri->emptyUri()) {
            $explodeUri = array_filter(explode('/', $this->uri->getUri()));
            return ucfirst($explodeUri[1]) . 'Controller';
        }
        return ucfirst(DEFAULT_CONTROLLER) . 'Controller';
    }
}