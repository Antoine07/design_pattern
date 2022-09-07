<?php

namespace App;

 class Form extends Composite{

    public function __construct(
        protected string $name,
        protected string $action,
    )
    {
        parent::__construct();
    }

    public function operation():string{

        $output = parent::operation();

        return "<form name=\"{$this->name}\" action=\"{$this->action}\">$output</form>";
    }
}