<?php

namespace App\Decorators;

class Italic extends Decorator{

    public function __toString(): string
    {
        return "<em>{$this->elem->__toString()}</em>";
    }
}