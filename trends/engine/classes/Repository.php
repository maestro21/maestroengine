<?php


class Repository extends MySql
{

    protected $modelName = null;

    public function __construct($table = NULL)
    {
        parent::__construct($table);
        $modelName = ucfirst($table) . 'Model';
        if(class_exists($modelName)) {
            $this->modelName = $modelName;
        }
    }

    private function getModel($data) {
        if(!$this->modelName || !class_exists($this->modelName)) {
            return null;
        }
        $modelName = $this->modelName;
        $model = new $modelName();

        foreach($data as $k => $v) {
            $method = 'get' . ucfirst($k);
            if(method_exists($model, $method)) {
                $model->$method($v);
            }
        }
    }


    private function getModels($data) {
        if($this->modelName) {
            foreach ($data as $k => $row) {
                $data[$k] = $this->getModel($data);
            }
        }
        return $data;
    }

    public function del($id) {
        return $this->qdel($id)->run();
    }

    public function save($params) {
        return $this->qsave($params)->run();
    }

    public function get($id) {
        return $this->qget($id)->run();
    }

    public function list($page = 0) {
        return $this->getModels($this->qlist('*', $page)->run());
    }


}
