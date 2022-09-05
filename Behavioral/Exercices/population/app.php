<?php

require_once __DIR__ . '/vendor/autoload.php';

use Population\Model\Person;
use Population\ReadIterator;
use Ds\Map;

$storage = new Map;

$populations = new ReadIterator(file: __DIR__ . '/Data/populations.txt');
$relationships = new ReadIterator(__DIR__ . '/Data/relationships.txt');

// rentrer les données dans le Map

// trouvez un algo

foreach ($populations as [$id, $name]) {
    $storage->put((int) $id,  new Person(name: $name, id: $id, relations: []));
}

$total = 0; // compter toutes les relations que l'on possède
foreach ($relationships  as [$i, $j]) {
    // 0 avec 1
    $storage->get((int) $i)->addRelation($storage->get((int) $j));
    // 1 avec 0
    $storage->get((int) $j)->addRelation($storage->get((int) $i));

    $total++;
}

// calcul de la moyenne

if ($total > 0) {
    $avg = $storage->reduce(function ($acc, $index, $person) {

        return $acc + count($person->getRelations());
    }, 0) / $total;

    // la moyenne des relations pour une personne est :
    echo $avg;
}
