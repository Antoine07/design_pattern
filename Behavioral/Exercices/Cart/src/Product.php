<?php

class Product
{

    public function __construct(
        private float $price,
        private string $name
    ) {
    }

        /**
         * Get the value of price
         */ 
        public function getPrice():float
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price):self
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName():string
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name):self
        {
                $this->name = $name;

                return $this;
        }
}
