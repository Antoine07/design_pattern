<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;


class EnvTest extends TestCase
{
    protected $env = null;
    protected $prices = null;

    public function setUp(): void
    {
        $this->env = $_ENV;
        $this->prices =  Yaml::parseFile(__DIR__ . '/../src/' . $_ENV['APP_FILE_PRICES'])['prices'];
    }

    /**
     * @test testenv
     * 
     * @convers: 
     */
    public function testEnv(): void
    {
        $this->assertEquals($this->env['APP_FILE_PRICES'], '/prices/products.yaml');
        $this->assertEquals($this->env['APP_CLASSIC'], 5);
        $this->assertEquals($this->env['APP_STRAWBERRY'], 3);

    }

     /**
     * @test testYamlEnv
     * 
     * @convers: tests variables env with YAML
     */
    public function testYamlEnv():void{
        $this->assertEquals($this->prices['cone']['classic'], 5);
    }
}
