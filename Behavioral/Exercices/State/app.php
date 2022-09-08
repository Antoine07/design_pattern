<?php

require __DIR__ . '/vendor/autoload.php';

use App\Context;
use App\ConcreteState\{ConcreteStateHealthy, ConcreteStateKO};


$context = new Context(new ConcreteStateHealthy());
/* Part pour la bataille */
$context->doThis();
/* Meurs */
$context->doThat();
