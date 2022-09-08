<?php

class User{
    private string $name = 'anonymous';

    public function __construct(string $name){
        $this->name = $name;
    }

    public function getName():string{
        return $this->name;
    }
}

// On doit créer 10000 Users => on le fait de manière totalement dynamique

function generatorUser(int $max = 10){
    $count = 0;
    echo $count . "COUNT FIRST \n";
    while($count < $max){
        $count++;
        
        // mémoriser l'itération dans la boucle
        yield (new User("Alan $count")) ;
    }
}

$gen = generatorUser();

foreach($gen as $u) {
    echo $u->getName() . "\n";
}