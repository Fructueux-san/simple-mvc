<?php

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class PageController {
  //Homepage 
  public function indexAction(RouteCollection $routes) {
    $routeToProduct = str_replace('{id}', 1, $routes->get('product')->getPath());
    require_once APP_ROOT . "/views/home.php";
  }

}
