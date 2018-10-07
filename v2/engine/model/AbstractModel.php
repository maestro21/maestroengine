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
      }

    function fields() { 
        return $this->fields;
    }

   /**
     * Validate single data row
     */
    function validate($row) {
        
        if($row == self::AI || !$this->fields) {
            return $row;
        }
        
        $return = [];

        foreach($this->fields as $name => $field) {
        
            if(is_array($field)) {
                $type = $field[0];
            } else {
                $type = $field;
            }

            $value = $row[$name];

            switch($type) {
                case DATA_INT: $value = (int)$value; break;
                case DATA_FLOAT: $value = (float)$value; break;
                case DATA_BOOL: $value = (bool)$value; break;
                case DATA_ARRAY: $value = $this->validateArray($value); break;
            }
            
            $return[$name] = $value;
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