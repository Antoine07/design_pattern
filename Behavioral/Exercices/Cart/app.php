<?php

require_once __DIR__ . '/vendor/autoload.php';

use Observers\{LogSum, LogFile};

$storage = [];
$car = new Cart($storage);