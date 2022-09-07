<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

class IceCream implements Salable
{

    private array $prices;
    private string $cone;
    private array $iceBoules = [];
    private array $extras = [];
    private float $price;
    private  string $conePrice;
    private  array $iceBoulePrice;
    private  array $extraPrices;

    public function __construct()
    {
        $this->setPrices();
    }

    public function setPrices(): void
    {
        $prices = Yaml::parseFile(__DIR__ . $_ENV['APP_PRICES']);
    }

    public function addPrice(float $price): void
    {
        $this->price += $price;
    }
    public function getPrice(array $products, string $key): float
    {

        return $products[$key];
    }


    public function choiceCone(string  $cone): void
    {
        $this->cone =  $cone;

        $this->addPrice($this->conePrice[$cone]);
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
