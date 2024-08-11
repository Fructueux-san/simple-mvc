<?php 
namespace App\Controllers\Admin;
use App\Controllers\Controller;
use Symfony\Component\Routing\RouteCollection;


class AdminController extends Controller{

  public function index(RouteCollection $routes) {
    echo '<pre>';
    $this->dd($routes);
    echo '</pre>';
    return $this->view('test.php');
  }
}
