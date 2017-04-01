<?php
    define("DB_HOST","localhost");
    define("DB_USER","hackkean2017");
    define("DB_PWD","hackkean2017");
    define("DB_NAME","hackkean2017");
    $connect = new mysqli(DB_HOST,DB_USER,DB_PWD, DB_NAME );
     if ($connect->connect_error)
 	 {
 	 	die('Could not connect: ' . $connect->connect_error );
  	 }

?>