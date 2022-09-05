<?php

require_once __DIR__ . '/vendor/autoload.php';

use Observers\{Log, Storage};

$subject = new User;

$log = new Log;
$subject->attach($log);
$storage = new Storage;
$subject->attach($storage);

// crée un nouvel utilisateur => notification 
$subject->create('Alan', 'alan@alan.fr');
$subject->create('Alice', 'alice@alice.fr');
$subject->create('Bernard', 'bernard@bernard.fr');
$subject->create('Patrick', 'patrick@patrick.fr');

var_dump($storage->getStorage());