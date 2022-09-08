<?php

namespace App;

class Context
{
    public function __construct(private $state)
    {
        /* Etat initial */
        $this->changeState($state);
    }
    public function context()
    {
    }
    public function changeState(State $state)
    {
        echo "Context change to : " . get_class($state) . "\n";
        $this->state = $state;
        $this->state->setContext($this);
    }
    public function doThis()
    {
        $this->state->doThis();

        return $this;
    }
    public function doThat()
    {
        $this->state->doThat();

        return $this;
    }
}
