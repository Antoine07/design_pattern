<?php

namespace Observers;

use SplSubject;
use SplObserver;

class Log implements SplObserver{

    public function update( SplSubject $subject):void {
        echo "log :" . $subject->getId() . "<br>";
    }
}