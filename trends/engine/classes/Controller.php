<?php

class Controller extends Singleton {

    private $repo;

    public function __construct()
    {
        $cl = str_replace('Controller','', get_class($this));
        $this->repo = repo($cl);
    }

    public function repo(){
        return $this->repo;
    }
}