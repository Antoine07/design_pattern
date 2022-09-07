<?php

namespace App\Decorators;

abstract class Decorator implements IHtml
{

    public function __construct(protected IHtml $elem)
    {
    }
}
