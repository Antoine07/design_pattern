<?php

interface IStrategy {
    public function execute(string $message):string;
}