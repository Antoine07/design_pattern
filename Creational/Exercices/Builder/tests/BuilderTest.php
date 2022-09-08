<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

use App\{IceCream, IceCreamBuilder};

class CompositieTest extends TestCase
{

    protected $env = null;
    protected IceCreamBuilder $iceCreamBuilder;

    public function setUp(): void
    {
        $this->IceCreamBuilder = new IceCreamBuilder();
    }

   

    /**
     * @dataProvider conesProvider
     */
    public function testPrepareIceCream($name, $expected)
    {
        // var_dump($name, $expected);
        $this->IceCreamBuilder->prepareIceCream($name);
        $price = $this->IceCreamBuilder->getIceCream()->getPrice('cone', $name);

        $this->assertEquals($price, $expected);
    }

    public function conesProvider()
    {
        $data = [];
        // attention à faire dans le provider pour récupérer les données pas dans le setUpt qui s'exécute avant chaque test pb de synchronisme
        $prices =  Yaml::parseFile(__DIR__ . '/../src/' . $_ENV['APP_FILE_PRICES'])['prices'];

        foreach ($prices['cone'] as $name => $price) {
            $data[] = [$name, $price];
        }

        return $data;
    }
}
