<?php

namespace App\Controllers;

class Controller
{
  protected static function dd($args){
    var_dump($args);
    die();
  }

  protected static function view(string $view) {
    require_once APP_ROOT . '/views/'.$view;
  }

  static function redirectUrl(string $url) {
    header('location:'.$url);
  }

}
