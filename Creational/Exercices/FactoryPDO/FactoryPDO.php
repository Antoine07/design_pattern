<?php


class FactoryPDO {

    private static $pdo = null;

    public static function build(string $dsn, string $username, string $password):PDO{

        if(self::$pdo) return self::$pdo;

        self::$pdo = new PDO(
            $dsn,
            $username,
            $password
        );

        return self::$pdo;
        
    }

    public static function reset():void{
        self::$pdo = null;
    }
}