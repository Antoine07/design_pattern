<?php

use PharIo\Manifest\InvalidEmailException;
use PHPUnit\Framework\TestCase;

use Observers\{LogSum, LogFile};

class CartTest extends TestCase
{

    protected Cart $cart;
    protected SplObserver $observerSum;
    protected SplObserver $observerFile;

    // avant chaque test
    public function setUp(): void
    {
        $this->cart = new Cart();
        $this->observerSum = new LogSum();
        $this->observerFile = new LogFile(__DIR__ . '/_data/log.txt');

        file_put_contents(__DIR__ . '/_data/log.txt', "");
        $this->observerSum->reset();

        $this->cart->attach($this->observerSum);
        $this->cart->attach($this->observerFile);
    }

    // après chaque test
    public function tearDown():void{
        file_put_contents(__DIR__ . '/_data/log.txt', "");
        $this->observerSum->reset();
    }

    public function testPushAndPop()
    {
        $this->assertTrue(true);
    }

    /**
     * @test testBuy
     * 
     * @covers buy one product, total 
     */
    public function testBuy(): void
    {
        $this->cart->buy(new Product(name: "apple", price: .6), 10);

        $this->assertEquals($this->cart->total(), .6 * 10 * 1.2);
    }

    /**
     * @testLogicException
     * 
     * @covers no observer
     */
    public function testLogicException()
    {
        $this->cart->detach($this->observerSum);
        $this->cart->detach($this->observerFile);

        $this->expectException(LogicException::class);

        $this->cart->buy(new Product(name: "apple", price: .6), 10);
    }

    public function testBuyTotalObserverSum(): void
    {
        $this->assertEquals($this->cart->total(), 0);

        $this->cart->buy(new Product(name: "babana", price: .85), 20);

        $this->assertEquals($this->cart->total(),  $this->observerSum->total());
    }

    public function testBuyTotalObserverFile(): void
    {

        $this->cart->buy(new Product(name: "babana", price: .85), 20);
        $this->cart->buy(new Product(name: "orange", price: .7), 10);

        $this->assertEquals($this->cart->total(), 28.799999999999997);

       $this->assertEquals($this->cart->total(),  $this->observerFile->total());
    }
}
