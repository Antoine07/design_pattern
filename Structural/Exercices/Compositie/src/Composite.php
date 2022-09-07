<?php

namespace App;

use SplObjectStorage;

abstract class Composite extends Component
{

    protected SplObjectStorage $childrens;

    public function __construct()
    {
        $this->childrens = new SplObjectStorage;
    }

    public function attach(Component $component): void
    {
        if ($this->childrens->contains($component) === false)
            $this->childrens->attach($component);
    }

    public function detach(Component $component): void
    {
        if ($this->childrens->contains($component) === true)
            $this->childrens->detach($component);
    }

    public function operation(): string
    {
        $output = "";
        foreach ($this->childrens as $children)  $output .= $children->operation();

        return $output;
    }

    public function __toString():string 
    {
        return $this->operation();
    }
}
