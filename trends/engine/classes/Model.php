<?php

class Model
{
    /**
     * @var mixed
     */
    private $id;


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


    function getAnnotations() {
        $r = new ReflectionClass(get_class($this));
        $doc = $r->getDocComment();
        preg_match_all('#@(.*?)\n#s', $doc, $annotations);

        $return = [];
        foreach($annotations[1] as $annotation) {
            $annotation = explode(' ', $annotation);
            $return[trim($annotation[0])] = trim($annotation[1]);
        }
        return $return;
    }

    function getFields()
    {
        $r = new ReflectionClass(get_class($this));
        $props = $r->getProperties(ReflectionProperty::IS_PRIVATE);

        $result = [];

        foreach($props as $prop) {
            $doc = $prop->getDocComment();
            preg_match_all('#@(.*?)\n#s', $doc, $annotations);
            $result[$prop->getName()] = $this->processFields($prop->getName(), $annotations[1] ?? []);
        }

        return $result;
    }

    function processFields(string $name, array $annotationFields) {
        $modelField = new ModelField($name);
        foreach($annotationFields as $field) {
            $field = explode(' ', $field);
            $setter = trim('set' . ucfirst($field[0]));
            if(method_exists($modelField, $setter)) {
                $data = $field[1] ?? 1;
                $modelField->$setter($data);
            }
        }
        return $modelField;
    }

}