<?php

abstract class ADatabase {

public function __construct() {
if(file_exists("../../config.php")) require_once "../../config.php";
else if(file_exists("../config.php"))require_once "../config.php";
else require_once "config.php";
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
	
	}
}
?>