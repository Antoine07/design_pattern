<?php

namespace App;

abstract class State
{
    protected Context $context;

    public function setContext($context)
    {
        $this->context = $context;
    }
    abstract function doThis();
    abstract function doThat();
}
