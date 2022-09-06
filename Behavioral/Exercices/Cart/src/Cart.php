<?php

// use SplSubject, SplObjectStorage, SplObserver, LogicException;

class Cart implements SplSubject
{

    private SplObjectStorage $observers;

    public function __construct(
        private array $storage = [],
        private float $tva = .2
    ) {
        $this->observers = new SplObjectStorage();
    }

    public function buy(Product $p, int $quantity): void
    {
        $total = $quantity * $p->getPrice() * ($this->tva + 1);
        $this->storage[$p->getName()] =  $total;

        $this->notify();
    }

    public function total(): float
    {

        return array_sum($this->storage);
    }


    public function attach(SplObserver $o): void
    {
        if ($this->observers->contains($o) === false)
            $this->observers->attach($o);
    }

    public function detach(SplObserver $o): void
    {
        if ($this->observers->contains($o) === true)
            $this->observers->detach($o);
    }

    public function notify(): void
    {

        if ($this->observers->count() === 0) throw new LogicException("Zero Observer ...");

        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
