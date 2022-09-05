<?php


class User implements SplSubject{

    private $id;
   
    public function attach(SplObserver $observer):void {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer):void{}

    public function notify():void {

        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

    public function create(string $name, string $email):void {

        $this->id = uniqid(true);
        $this->notify();
    }

    public function getId(){
        return $this->id;
    }
}