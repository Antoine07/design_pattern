<?php


class Robot implements IStrategy{
    
    public function execute(string $message):string{
        return implode( "", array_map( function($c) {return ord($c) ;},  str_split($message) ) );
    }
}