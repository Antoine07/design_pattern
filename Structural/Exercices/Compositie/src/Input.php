<?php

namespace App;

 class Input extends Composite{
    public function __construct(
        protected string $name,
        protected string $type,
        protected string $label,
        protected string $value = "",
    )
    {
        parent::__construct();
    }

    public function operation():string{

        return "<label>{$this->label}</label><input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\" />";
    }
}