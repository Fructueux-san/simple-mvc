<?php

namespace App\Db;

use Exception;

class DbConnection {
  
  private static $instances = [];

  // protected function __construct()
  // {
    // Initialize PDO connection to database based on the env config
    // try {
    //   $pdo = new \PDO(
    //       DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, 
    //       'dbuser='.DB_USER, 
    //       DB_PASS,
    //       [
    //         \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    //         \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ // default is \PDO::FETCH_BOTH
    //       ]
    //
    //   );
    // }catch (Exception $e) {
    //   die('Internal serveur error. Cannot connect to DB.'.$e->getMessage());
    // }
    // return $pdo;
  //}

  public static function getInstance(): \PDO {
    $cls = static::class;
    if (!isset(self::$instances[$cls])){
      self::$instances[$cls] = new \PDO(
          DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, 
          'dbuser='.DB_USER, 
          DB_PASS,
          [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ // default is \PDO::FETCH_BOTH
          ]
      );
;
    }
    return self::$instances[$cls];
  }

}
