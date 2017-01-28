<?php
//require_once "../../config.php";
class Errors extends Adatabase{
public function __construct() {
parent::__construct();
	}
	
//Чтение ошибки	
public function read ($name){

//query = " SELECT value FROM _errors WHERE name='$name'";
$query = " SELECT  `value` FROM `_errors` WHERE name='$name'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		//print_r ($row);
			return $row['value'];
	}

	
//Запись ошибки
public function write($name, $value){
//$query = " UPDATE _errors SET value=".$value." WHERE name='$name'";
$query = " UPDATE _errors SET value='$value' WHERE name='$name'";
		if(!mysql_query($query)) //запись в БД 
			exit(mysql_error());
	}

}

?>