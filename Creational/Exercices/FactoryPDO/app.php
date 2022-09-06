<?php

require_once __DIR__ . '/FactoryPDO.php';

$pdo = FactoryPDO::build(
    dsn : 'mysql:dbname=shop;host=127.0.0.1;port=8889',
    username : 'root',
    password: 'root'
);

var_dump($pdo);

/**
 * Les variables statiques dans une classe ne dépendent pas de l'instance de la classe mais de la classe elle-même
 */
// class A {

//     private static $counter = 1;

//     public function count(){
//         self::$counter++;
//     }

//     public function get(){
//         return self::$counter;
//     }
// }


// $a =new A() ;
// $b = new A();

// $a->count();
// echo $a->get();
// echo PHP_EOL ;
// echo $b->get();
// echo PHP_EOL ;


