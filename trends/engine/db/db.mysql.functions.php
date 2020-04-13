<?php
/** DATABASE FUNCTIONS **/
function q($table = '') {
	return new MySQL($table);
}

/** Query operators **/
function qCount($field = '*', $as = ''){
	return "COUNT({$field})" . ($as != '' ? ' AS ' . $as : '');
}
/* type : 1 - %var 2 - var% 3 - %var% */
function qLike($value, $type = 3) {
	if($type == (1 or 3)) $value = "%" . $value;
	if($type == (2 or 3)) $value .= "%";
	return " LIKE '$value' ";
}

function qConcat($data) {
	return " CONCAT (" . implode(',',$data) . ") ";
}

function qBetween($from, $to) {
	return " BETWEEN $from AND $to ";
}

function qEq($key, $value) {
	return "`$key` = '$value'";
}



/** DB schema functions **/
function uninstall($tables) {
	foreach($tables as $table_name => $table) {
		/** droping first; it's new install, so old table means to be dropped if exists **/
		$sql = "DROP TABLE IF EXISTS `$table_name`"; DBquery($sql);
	}
}


function getTables() {
    $_tables = DBall("SHOW TABLES");
    $tables = [];
    foreach($_tables as $table) {
        $tables[] = $table[0];
    }
    return $tables;
}


function getDbFields($table) {
    $_fields = DBall("DESCRIBE $table");
    $fields = [];
    foreach($_fields as $_field) {
        $name = $_field['Field'];
        $dbtype = rvDbType($_field['Type']);
        $default = $_field['Default'];
        $isNullable = $_field['Null'] == 'YES';
        $fields[$name] = (new ModelField($name))
            ->setDbType($dbtype)
            ->setNullable($isNullable)
            ->setDefault($default);
    }
    return $fields;
}

function fieldsAreEqual(ModelField $f1, ModelField $f2) {
    return $f1->getDbType() == $f2->getDbType() &&
        $f1->isNullable() == $f2->isNullable() &&
        $f1->getDefault() == $f2->getDefault();
}

function db_create_table(Model $model) {
    $sql = 'CREATE TABLE `'. $model->getTable() .'`(';

    $annotations = $model->getAnnotations();
    $pk = $annotations['pk'] ?? 'ai';

    $fieldsql = [];
    foreach($model->getFields() as $annotation) {
        $fieldsql[] = db_create_field($annotation);
    }

    $sql .= implode(',', $fieldsql);

    switch($pk) {
        case 'ai': $sql .= ",\r\n id INT NOT NULL AUTO_INCREMENT PRIMARY KEY"; break;
        case 'uid': $sql .= ",\r\n id VARCHAR(20) NOT NULL UNIQUE INDEX"; break;
        default: if($pk) {
            $sql .= sprintf(", PRIMARY KEY(%s)", $pk);
        }
    }
    $sql.=	");";
    DBquery($sql);
}


function db_update_table(Model $model) {
    $fields = $model->getFields();
    $table = $model->getTable();
    $_fields = getDbFields($table);
    unset($_fields['id']);
    $changes = [];
    /** @var ModelField $field */
    foreach($fields as $field) {
        if(isset($_fields[$field->getName()])) {
            if(!fieldsAreEqual($field, $_fields[$field->getName()])) {
                $changes[] = 'MODIFY ' . db_create_field($field);
            }
        } else {
            $changes[] = 'ADD ' . db_create_field($field);
        }
    }

    /** @var ModelField $_field */
    foreach($_fields as $_field) {
        if(!isset($fields[$_field->getName()])) {
            $changes[] = 'DROP COLUMN ' . $_field->getName();
        }
    }

    if(sizeof($changes) > 0) {
        $sql = ' ALTER TABLE ' . $table . ' ' . implode(',', $changes);
        DBquery($sql);
    }
}


function db_create_field(ModelField $field) {
    $sql = '`' . $field->getName() . '` ' . getDbType($field->getDbType());
    $default = $field->getDefault();
    if(!$field->isNullable() && $default) {
        $sql .= 'NOT NULL';
    };
    if($default) {
        $sql .= ' DEFAULT ' . $default;
    }
    return $sql;
}

function getDbType(string $type) {
    $type = trim($type);
    switch($type){
        case DATA_STRING: $type = 'VARCHAR(255)'; break;
        case DATA_BLOB: 	$type = 'BLOB'; break;
        case DATA_TEXT: 	$type = 'TEXT'; break;
        case DATA_INT: 	$type = 'INT'; break;
        case DATA_BOOL:   $type = 'TINYINT(1)'; break;
        case DATA_TIME :	$type = 'DATETIME'; break;
        case DATA_FLOAT : $type = 'FLOAT'; break;
        default : $type = 'TEXT'; break;
    }
    return $type;
}

function rvDbType(string $type) {
    switch($type){
        case 'varchar(255)': $type = DATA_STRING; break;
        case 'blob': $type = DATA_BLOB; break;
        case 'text': $type = DATA_TEXT; break;
        case 'int': $type = DATA_INT; break;
        case 'tinyint(1)':  $type = DATA_BOOL; break;
        case 'datetime' :	$type = DATA_TIME; break;
        case 'float': $type = DATA_FLOAT; break;
        default : $type = DATA_TEXT; break;
    }
    return $type;
}


// old implementation of install
function install($tables) { 
	/** running through all tables **/
	foreach($tables as $table_name => $table) {
		/** droping first; it's new install, so old table means to be dropped if exists **/
		$sql = "DROP TABLE IF EXISTS `$table_name`";
		$sql =	'CREATE TABLE `'. $table_name .'`(';

		$fieldsql = array();
		foreach ($table['fields'] as  $field_name => $field){
			/** adding fields **/
			$fsql = '';
			$type = $field[0];
			if($type == null) continue;
			switch($type){
				case 'string': $type = ' VARCHAR(255)'; break;
				case 'blob': $type = ' BLOB'; break;
                case 'array':
				case 'text': $type = ' TEXT'; break;
				case 'int' : $type = ' INT'; break;
				case 'date' :
				case 'time' : $type = ' DATETIME'; break;
				case 'float' : $type = ' FLOAT'; break;
				case 'bool' : $type = ' TINYINT(1)'; break;
				default : $type = '';
			}
			if($type != '' && $field_name!='') $fsql .= "`$field_name` $type";

			/** adding field options **/
			if(isset($field[2])) {
				$options = $field[2];
				if(isset($options['null'])) {
					if(!$options['null']) $fsql .= ' NOT';  $fsql .= ' NULL';
				}
				if(isset($options['ai'])) {
					$fsql .= ' AUTO_INCREMENT';
				}
				if(isset($options['default'])) {
					$fsql .= ' DEFAULT "' . $options['default'] . '"';
				}
			}

			/* composing query */
			if($fsql != '')	$fieldsql[] = $fsql;
		}
		$sql .= implode(',', $fieldsql);

		/** adding primary key **/
		if(isset($table['pk'])) {
			if(NULL != $table['pk']) {
				$sql .=	sprintf(", PRIMARY KEY(%s)", $table['pk']);
			}
		} else {
			$sql .=	",\r\n id INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
		}

		/** adding foreing keys **/
		if(isset($table['fk'])) {
			foreach($table['fk'] as $key => $target) {
				$sql .=	sprintf(", FOREIGN KEY(%s) REFERENCES %s ON DELETE CASCADE ON UPDATE CASCADE", $key, $target);
			}
		}

		/** adding indexes **/
		if(isset($table['idx'])) {
			foreach($table['idx'] as $idx_name => $idx) {
				$sql .= "," . (isset($idx[1]) ? 'UNIQUE' : 'INDEX') . " `$idx_name`(" . $idx[0] . ")";
			}
		}

		$sql.=	");";

		/* executing query **/
		DBquery($sql,true);
	}
}

function update($update) {
	foreach ($update as $table_name => $fields) {
		$parts = array();
		foreach ($fields as  $field => $val){
			if($field!='') {
				$action = $val['do'];
				$type	= $val['type'];
				if($action == 'DROP') {
					if($type == ('index' || 'unique')) {
						"DROP INDEX($field),";
					} else {
						$parts[] = "DROP `$field`,";
					}
				} else {
					$newname = '';
					if($action == 'CHANGE') {
						$newname = "`". $val[1] . "`";
					}
					switch($type){
						case 'string': 	$type = ' VARCHAR(255)'; break;
						case 'blob': 	$type = ' BLOB'; break;
						case 'text': 	$type = ' TEXT'; break;
						case 'int' : 	$type = ' INT DEFAULT 0'; break;
						case 'date' :
						case 'time' : 	$type = ' DATETIME DEFAULT CURRENT_TIMESTAMP;'; break;
						case 'float' : 	$type = ' FLOAT DEFAULT 0'; break;
						case 'unique':  $type = 'UNIQUE'; break;
						case 'index':	$type = 'INDEX'; break;
						default : $type = '';
					}
					if($type!='') {
						if($action == 'CHANGE') {
							$parts[] = "CHANGE `$field` $newname $type";
						} else {
							if($type == 'UNIQUE' || $type == 'INDEX') {
								$parts[] = "ADD $type($field)";
							} else {
								$parts[] = "ADD COLUMN `$field` $type";
							}
						}
					}
				}
			}
		}
		$sql =	"ALTER TABLE `$table_name` " . implode(',', $parts) . ";";
	} //echo $sql;
	if($sql) {
		DBquery($sql) or die(mysql_error());
	}
}


function checkTables($tables) {
	$arr = DBcol(sprintf("SHOW TABLES FROM '%s'", HOST_DB));
	return in_array($tables, $arr);
}
