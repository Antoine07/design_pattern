<?php 

namespace Observers;

use SplObserver;
use SplSubject;

class LogSum implements SplObserver{

    private $total = 0;

    public function update(SplSubject $subject):void{

        $this->total = $subject->total();

    }

    public function total():float{

        return $this->total ;
    }

    public function reset():void{
        $this->total = 0;
    }
}