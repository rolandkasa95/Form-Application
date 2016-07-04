<?php

define('CLASSES', __DIR__ . DIRECTORY_SEPARATOR . 'Classes' . DIRECTORY_SEPARATOR);
define('LAYOUTS', __DIR__ . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR);

require CLASSES . 'ObjectFactoryService.php';
require 'Loader.php';
Loader::init();


require_once 'Classes/Controllers/AppController.php';

$controller = new AppController();
$controller->init();