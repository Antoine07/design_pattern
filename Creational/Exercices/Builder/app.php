<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Yaml\Yaml;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$prices = Yaml::parseFile(__DIR__ . '/src/' . $_ENV['APP_FILE_PRICES'])['prices'];