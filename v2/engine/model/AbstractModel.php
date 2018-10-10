<?php 


abstract class AbstractModel {

    public $key = 'id';

    protected $name;
  
   /**
    * fields in following format 'fieldname' => ['fieldtype', 'defvalue' => 'test', 'null' => true] OR
    * fieldname => fieldtype
    */
    protected $fields;


    public function __construct() { 
        $this->name =  str_replace('Model', '', get_class($this)); 
        $this->extend();
        $this->fields[$this->key] = 'hidden';
      }

    function fields() { 
        return $this->fields;
    }

    function validate($data) {
        $return = [];
        foreach($data as $key => $row) {
          $key = $this->validateField($row, $this->key);
          if($key) {
            $return[$key] = $this->validateRow($row);;
          } 
        }
        return $return;
    }


    function validateField($row, $key) {
        $field = $this->fields[$key];

        if(!$field) {
            return null;
        }

        if(is_array($field)) {
            $type = $field[0];
        } else {
            $type = $field;
        }

        $value = $row[$key] ?? null;

        switch($type) {
            case DATA_INT: $value = (int)$value; break;
            //case DATA_FLOAT: $value = (float)$value; break;
            case DATA_BOOL: $value = (bool)$value; break;
            case DATA_ARRAY: $value = $this->validateArray($value); break;
        }
        return $value;
    }

   /**
     * Validate single data row
     */
    function validateRow($row) { 
        
        if(!$this->fields) {
            return $row;
        }
        
        $return = [];
        foreach($this->fields as $key => $field) {
            $return[$key] = $this->validateField($row, $key);
        }
        return $return;
    }

    /**
     * Validate array; 
     */
    function validateArray($value) {
        if(!is_array($value)) {
            return [$value];
        } 
        return $value;       
    }

    function extend(){}
}