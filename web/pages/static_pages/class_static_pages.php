<?php
 if(file_exists("../../config.php")) require_once "../../config.php";
 else if(file_exists("../config.php")) require_once "../config.php";
 else require_once "config.php";

class ClassStaticPages {
public $namepage;//имя выводимой статической страницы
public function __construct() {
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
	}
	
//Чтение свойства текущей страницы	
public function read ($property){

$query = " SELECT ".$property." FROM _static_pages WHERE name = '$this->namepage'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
	}
//Запись свойства текущей страницы
public function write($property, $value){
		
$query = " UPDATE _static_pages SET ".$property."='$value' WHERE name = '$this->namepage'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}	
//Чтение всех статических страниц	
public function readAll (){

$query = "SELECT * FROM _static_pages ";
$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
$StaticPages = array();
$i=0;
  while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {

  $StaticPages[$i] = $row;
  $i++;
   	}
	return $StaticPages;
}	

}

?>