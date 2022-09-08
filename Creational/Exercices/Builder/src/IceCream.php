<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class IceCream implements Salable
{

    private array $prices;
    private string $cone;
    private array $iceBoules = [];
    private array $extras = [];
    private float $price = 0.0;

    private  array $conePrices;
    private  array $iceBoulePrice;
    private  array $extraPrices;

    public function __construct()
    {
        $this->setPrices();
    }

    public function setPrices(): void
    {
        $this->prices = Yaml::parseFile(__DIR__ . $_ENV['APP_FILE_PRICES'])['prices'];
        $this->conePrices = $this->prices['cone'];
        $this->iceBoulePrice = $this->prices['boule'];
        $this->extraPrices = $this->prices['extra'];
    }

    public function addPrice(float $price): void
    {
        $this->price += $price;
    }
    public function getPrice(string $name, string $key): float
    {

        return $this->prices[$name][$key];
    }


    public function choiceCone(string  $cone): void
    {
        $this->cone =  $cone;

        $this->addPrice($this->conePrices[$cone]);
    }

    public function choiceBoule(string $flavour): void
    {
        $this->iceBoules[] = $flavour;
        $count = count($this->iceBoules);
        $this->addPrice($this->iceBoules[$count]);
    }

    public function addExtra(string $extra)
    {
        $this->extras[] = $extra;
        $this->addPrice($this->extraPrices[$extra]);
    }

    public function __toString(): string
    {
        return "Total price : {$this->price} ";
    }
}
