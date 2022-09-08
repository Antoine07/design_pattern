<?php

namespace App\ConcreteState;

use App\State;

class ConcreteStateHealthy extends State
{
    public function doThis()
    {
        echo "Je vais être KO !\n";
        $this->context->changeState(new ConcreteStateKO());
    }

    public function doThat()
    {
        echo "Je me bats !\n";
    }
}
