<?php

class Model
{
    /**
     * @var mixed
     */
    protected $id;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    function getTable() {
        return lcfirst(str_replace('Model', '', get_class($this)));
    }

    function notInDb() {
        $annotations = $this->getAnnotations();
        return isset($annotations['nodb']);
    }

    function getDBData() {
        $data = [];
        $fields = getClassFields(get_class($this));
        /** @var ModelField $field */
        foreach ($fields as $field) {
            $name = $field->getName();
            $value = getValue($this, $name);
            $data[$name] = sqlFormat($field->getDbType(), $value);
        }
        return $data;
    }


    function getAnnotations() {
        return getClassAnnotations(get_class($this));
    }

    function getFields() {
        return getClassFields(get_class($this));
    }


}