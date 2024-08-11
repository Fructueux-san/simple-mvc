<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add("product", 
        new Route(constant('URL_SUBFOLDER').'/product/{id}', 
              array('controller' => 'ProductController', 'method' => 'showAction'), 
              array('id' => '[0-9]+')));

$routes->add('homepage', 
  new Route(constant('URL_SUBFOLDER').'/', array('controller' => 'PageController', 'method' => 'indexAction'), array())
);


$routes->add('admin-test', 
  new Route(constant('URL_SUBFOLDER').'/admin', array('controller' => 'Admin\AdminController', 'method' => 'index'), array())
);
