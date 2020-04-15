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


    public function tpl($name, $data) {
        $path = MODULE_PATH . unclass(get_class($this)) . '/tpl/' . $name . '.tpl.php';
        if(file_exists($path)) {
            return obfile($path, $data);
        }
    }
}