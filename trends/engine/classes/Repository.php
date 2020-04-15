<?php


class Repository extends MySql
{

    protected $modelName = null;

    /**
     * @var ModelField[]
     */
    protected $fields = [];

    public function __construct($table = NULL)
    {
        parent::__construct($table);
        $modelName = ucfirst($table) . 'Model';
        if(class_exists($modelName)) {
            $this->modelName = $modelName;
        }
        $this->fields = getClassFields($modelName);
    }

    public function getModel($data) {
        $model = createModelFromDBData($this->modelName, $data);
        return $model;
    }


    public function getModels($data) {
        foreach ($data as $k => $row) {
            $data[$k] = $this->getModel($row);
        }
        return $data;
    }

    public function del($id) {
        return $this->qdel($id)->run();
    }

    public function save(Model $model) {
        $params = prepareModelDataForDb($model);
        return $this->qsave($params)->run();
    }

    public function get($id) {
        return $this->getModel($this->qget($id)->run());
    }

    public function list($page = 0) {
        return $this->getModels($this->qlist('*', $page)->run());
    }


}
