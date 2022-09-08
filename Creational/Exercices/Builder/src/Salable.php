<?php

namespace App;

interface Salable{
    public function setPrices(): void;
    public function addPrice(float $price): void;
    public function getPrice(string $products, string $key): float;
}