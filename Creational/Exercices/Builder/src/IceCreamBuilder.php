<?php

namespace App;

class IceCreamBuilder{

    private IceCream $iceCream ;

    public function prepareIceCream(string $cone):self{
        $this->iceCream = new IceCream();
        $this->iceCream->choiceCone($cone);

        return $this;
    }

    public function getIceCream(): IceCream{

        return $this->iceCream;
    }
}