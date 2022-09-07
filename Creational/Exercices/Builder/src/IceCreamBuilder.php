<?php

namespace App;

class IceCreamBuilder{

    private IceCream $iceCream;

    public function prepareIceCream():self{
        $this->iceCream = null;
        $this->iceCream = new IceCream();


        return $this;
    }
}