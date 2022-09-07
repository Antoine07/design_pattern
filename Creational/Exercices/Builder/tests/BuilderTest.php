<?php

use PHPUnit\Framework\TestCase;

use Symfony\Component\Yaml\Yaml;


use App\{IceCream};

class CompositieTest extends TestCase
{

    protected $env = null;
  
  public function setUp(): void
  {
    $this->env = $_ENV;
    $prices = Yaml::parseFile(__DIR__ . '/../src/' . $_ENV['APP_FILE_PRICES'])['prices'];
  }

  public function testEnv():void{
  
    $this->assertEquals($this->env['APP_FILE_PRICES'], 'prices/products.yaml');
    $this->assertEquals($this->env['APP_CLASSIC'], 5);
    $this->assertEquals($this->env['APP_STRAWBERRY'], 3);
  }
}
