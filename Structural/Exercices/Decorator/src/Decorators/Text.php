<?php

namespace App\Decorators;

class Text implements IHtml{

    public function __construct(protected string $content){

    }

    public function __toString(): string
    {
        return $this->content;
    }
}