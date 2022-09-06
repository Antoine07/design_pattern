<?php 

namespace Observers;

use SplObserver;
use SplSubject;

class LogFile implements SplObserver{

    public function __construct(private string $fileName)
    {
        
    }

    public function update(SplSubject $subject):void{

        file_put_contents($this->fileName, $subject->total() . "\n");
    }

    public function total():float{

        $total =  file_get_contents($this->fileName)  ;

        return (float) $total;
        
    }
}