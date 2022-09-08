<?php

namespace App\ConcreteState;

use App\State;

class ConcreteStateKO extends State
{
    public function doThat()
    {
        echo "Je suis KO !\n";
        $this->context->changeState(new ConcreteStateHealthy());
    }

    public function doThis()
    {
        echo "Je me bats !\n";
    }
}
