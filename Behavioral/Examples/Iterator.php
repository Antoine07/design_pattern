<?php

class Counter
{
    public $num1 = 1;
    public $num2 = 2;
    public $num3 = 3;
    public $nun4 = 4;
    public $num5 = 5;
    public $num6 = 6;
    private $num7 = 7;
}

$counter = new Counter;

foreach ($counter as $num) echo $num . "\n";


class myIterator implements Iterator {
    private $position = 0;
    private $array = [
        "premierelement",
        "secondelement",
        "dernierelement",
    ];  

    public function __construct() {
        $this->position = 0;
    }

    public function rewind() :void{
        $this->position = 0;
    }

    public function current() {
        return $this->array[$this->position];
    }

    public function key() {
        return $this->position;
    }

    public function next():void {
        ++$this->position;
    }

    public function valid():bool{
        return isset($this->array[$this->position]);
    }
}

$it = new myIterator;

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}
