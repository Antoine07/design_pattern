<?php

namespace Population;

use Iterator;

class ReadIterator implements Iterator{


    public function __construct(
        private string $file,
        private  $pointer = "",
        private int $counter = 0,
        private string $separator = ','
    )
    {
        $this->pointer = fopen($file, 'r');
    }

    public function rewind(): void
    {
        $this->counter = 0;
        rewind($this->pointer) ; // remettre le pointer du fichier au début
    }

    public function current(): mixed
    {
        $current = fgets($this->pointer, 4096);

        return explode($this->separator, $current);
    }

    public function key(): int
    {
        return $this->counter;
    }

    public function valid(): bool
    {
        if(!is_resource($this->pointer)) return false;

        return !feof($this->pointer);
    }

    public function next(): void
    {
        $this->counter++;
    }
}