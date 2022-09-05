<?php

namespace Observers;

use SplSubject;
use SplObserver;

class Storage implements SplObserver{

    public function __construct(private $storage = [])
    {
        
    }

    public function update( SplSubject $subject):void {
        $this->storage[] = $subject->getId();
    }

    public function getStorage(): array{

        return  $this->storage ;
    }
}