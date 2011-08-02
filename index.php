<?php

set_include_path(implode(PATH_SEPARATOR, array(
    dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library',
    get_include_path(),
)));

//require_once '/library/Zend/Loader/Autoloader.php';
require_once 'Zend\Loader\Autoloader.php';
Zend_Loader_Autoloader::getInstance();