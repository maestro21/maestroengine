<?php

function uid($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}

function json($data) {
    return json_encode($data);
}

function cache($name = '', $_data = null) {
    $path = DATA_PATH . $name . CACHE_EXT;

    if($_data != null) {
        file_put_contents($path, '<?php $data = ' . var_export($_data, TRUE) . ";" ) ;
    }
    
    if(file_exists($path )) { 
        include($path);
        return $data;
    }
    return null;
}



function rows2keyvalues($data, $key = 'key', $value = 'value') {
    $_data = [];
    foreach($data as $row) {
        if($key) {
            $_data[$row[$key]] = $row[$value];
        } else {
            $_data[] = $row[$value];
        }
    }
    return $_data;
  }

function keyvalues2rows($data) {
    if(!$data || !is_array($data)) {
        return [];
    }
    $_data = [];
    foreach($data as $key => $value) {
        $_data[] = [
            'key' => $key,
            'value' => $value,
        ];
    }
    return $_data;
}
/** FORMAT FUNCTIONS **/
function parseString($string = '') {
    return addslashes(htmlspecialchars(@trim($string)));
}

function string_decode($string) {
    return html_entity_decode(stripslashes($string));
}


function var2string($val) {
    if(is_array($val)) $val = implode(',', $val);
    return $val;
}

function sqlFormat($type, $value = '', $quote = false){ //echo $type;
    $type = trim(strtolower($type));
    switch($type){
        case DATA_INT: $value = intval($value);
            break;

        case DATA_FLOAT: $value = floatval($value);
            break;

        case DATA_PASS : $value = md5($value);
            break;

        case DATA_ARRAY: $value = serialize($value);
            break;

        case DATA_TIME:
            if(is_a($value,'Time')) {
                /** @var Time $value */
                $value = $value->getSqlFormat();
            }
        break;

        default: $value =  parseString($value);
            break;

    }
    if($quote) $value = dbquote($value);
    return $value;
}


function getDefaultWidget($type) {
    switch($type) {
        case DATA_BOOL:
            return WIDGET_CHECKBOX;
        break;
        
        case DATA_INT:
            return WIDGET_NUMBER;
        break;

        default:
            return WIDGET_STRING;
        break;
    }
}

function datafilter($data, $filter = []) {
    $return = $data;
    foreach($data as $index => $row) {
        foreach($filter as $fkey => $fvalue) {
            if(($row[$fkey] ?? null) != $fvalue) {
                unset($return[$index]);
            }    
        }
    }
    return $return;
}

function safestring($string) {
    $string = str_replace(' ', '_', $string);
    return $string;
}

function getValue($obj, $prop) {
    $return = null;
    $method = 'get' . ucfirst($prop);
    if(method_exists($obj, $method)) {
        $return = $obj->$method();
    } else {
        $method = 'is' . ucfirst($prop);
        if(method_exists($obj, $method)) {
            $return = $obj->$method();
        }
    }
    return $return;
}

function setValue($obj, $prop, $val) {
    $return = null;
    $method = 'set' . ucfirst($prop);
    if(method_exists($obj, $method)) {
        $obj->$method($val);
    }
    return $obj;
}



function getClassAnnotations($class) {
    $r = new ReflectionClass($class);
    $doc = $r->getDocComment();
    preg_match_all('#@(.*?)\n#s', $doc, $annotations);

    $return = [];
    foreach($annotations[1] as $annotation) {
        $annotation = explode(' ', $annotation);
        $return[trim($annotation[0])] = trim($annotation[1]);
    }
    return $return;
}

function getClassFields($class)
{
    $r = new ReflectionClass($class);
    $props = $r->getProperties();
    $result = [];

    foreach($props as $prop) {
        $doc = $prop->getDocComment();
        preg_match_all('#@(.*?)\n#s', $doc, $annotations);
        $result[$prop->getName()] = processClassFields($prop->getName(), $annotations[1] ?? []);
    }

    return $result;
}

/**
 * Process field annotation -> return ModelField from array
 * @param string $name
 * @param array $annotationFields
 * @return ModelField
 */
function processClassFields(string $name, array $annotationFields) {
    $modelField = new ModelField($name);
    foreach($annotationFields as $field) {
        $field = explode(' ', $field);
        $fieldname = $field[0];
        //if($fieldname == 'var') $fieldname = 'dbType';
        $setter = trim('set' . ucfirst($fieldname));
        if(method_exists($modelField, $setter)) {
            $data = $field[1] ?? 1;
            $modelField->$setter($data);
        }
    }
    return $modelField;
}


function fnum($num) {
    return number_format($num);
}

function prepareModelDataForDb(Model $model) {
    $data = [];
    $fields = getClassFields(get_class($model));
    /** @var ModelField $field */
    foreach ($fields as $field) {
        $name = $field->getName();
        $value = getValue($model, $name);
        $data[$name] = sqlFormat($field->getDbType(), $value);
    }
    return $data;
}

function createModelFromDBData($className, $data){
    if(!class_exists($className)) return $data;

    $fields = getClassFields($className);

    $model = new $className();
    foreach($data as $prop => $value) {
        $method = 'set' . ucfirst($prop);
        if(method_exists($model, $method) && isset($fields[$prop])) {
            /** @var ModelField $field */
            $field = $fields[$prop];
            $type = $field ? $field->getDbType() : DATA_STRING;
            $value = validateField($type, $value);
            /*if(is_array($value) && $type == DATA_ARRAY && strpos($field->getVar(),'[]')) { var_dump($value);
                $value = createObjectArray($field, $value);
            } */
            $model->$method($value);
        }
    }
    return $model;
}

function createObjectArray(ModelField $field, $data) {
    if(is_array($data) && $field->getDbType() == DATA_ARRAY && strpos($field->getVar(),'[]')) {
        $values = [];
        $class = trim(str_replace('[]','',$field->getVar()));
        if(!class_exists($class)) $data;
        foreach ($data as $row) {
            $values[] = createModelFromDBData($class, $row);
        }
        return $values;
    }
}


function validateField($type, $value) {
    switch($type) {
        case DATA_INT: $value = (int)$value; break;
        case DATA_FLOAT: $value = (float)$value; break;
        case DATA_BOOL: $value = (bool)$value; break;
        case DATA_ARRAY: $value = unserialize($value);  break;
        case DATA_TIME: $value = oTime($value); break;
    }
    return $value;
}

function isValidTimeStamp($timestamp)
{
    return ($timestamp <= PHP_INT_MAX) && ($timestamp >= ~PHP_INT_MAX);
}