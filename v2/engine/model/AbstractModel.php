<?php 

define('ENCODE', 1);
define('DECODE', 2);

abstract class AbstractModel {

    public $key = 'id';

    protected $name;

    public $encmode = null;
  
    public $encode = false;

   /**
    * fields in following format 'fieldname' => ['fieldtype', 'defvalue' => 'test', 'null' => true] OR
    * fieldname => fieldtype
    */
    protected $fields;


    public function __construct() { 
        $this->name =  str_replace('Model', '', get_class($this)); 

        $this->extend();
        
        if($this->key) {
            $this->fields[$this->key] = 'hidden';
        }
      }

    function fields() { 
        return $this->fields;
    }

    function validate($data) {
        if(empty($data)) return [];
        $return = [];
        foreach($data as $key => $row) {
            if($this->key) {  
                $key = $this->validateField($row, $this->key);
                if($key) {
                    $return[$key] = $this->validateRow($row);
                } 
            } else {
                $return[] = $this->validateRow($row);
            }
        }
        return $return;
    }


    function getFieldType($field) {
        if(is_array($field)) {
            $type = $field[0];
        } else {
            $type = $field;
        }
        return $type;
    }

    function validateField($row, $key) {
        $field = $this->fields[$key];

        if(!$field) {
            return null;
        }

        $type = $this->getFieldType($field);
        
        $value = $row[$key] ?? null;

        switch($type) {
            case DATA_INT: $value = (int)$value; break;
            //case DATA_FLOAT: $value = (float)$value; break;
            case DATA_BOOL: $value = (bool)$value; break;
            case DATA_ARRAY: $value = $this->validateArray($value); break;
            default: 
                if($this->encmode == ENCODE) {
                    $value = rawurlencode($value);
                } else if($this->encmode == DECODE) {
                    $value = rawurldecode($value);
                }
                break;
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