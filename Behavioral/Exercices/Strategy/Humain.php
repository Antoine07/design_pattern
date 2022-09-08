<?php


class Humain implements IStrategy{
    
    public function execute(string $message):string{
        return "$message";
    }
}