<?php
session_start();

define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_METHOD', 'index');

require '../vendor/autoload.php';
require '../App/Functions/functions_twig.php';
require 'bootstrap/bootstrap.php';
