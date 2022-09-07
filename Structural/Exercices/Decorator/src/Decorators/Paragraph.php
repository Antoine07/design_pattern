<?php

namespace App\Decorators;

class Paragraph extends Decorator{

    public function __toString(): string
    {
        return "<p>{$this->elem->__toString()}</p>";
    }
}