<?php

use App\Classes\Template;

$template = new Template();
$twig = $template->init();

$callController = new App\Controllers\Controller();
$calledController = $callController->controller();
$controller = new $calledController();
$controller->setTwig($twig);

$callMethod = new App\Classes\Method();

$method = $callMethod->method($controller);

$controller->$method();