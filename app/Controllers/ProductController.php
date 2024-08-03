<?php

namespace App\Controllers;

use App\Models\Product;
use Symfony\Component\Routing\RouteCollection;

class ProductController 
{
  // Show the product based on the id
  public function showAction(int $id, RouteCollection $routes)
  {
    $product = new Product();
    $product->read($id);
    
    require_once APP_ROOT . '/views/product.php';
  }
}
