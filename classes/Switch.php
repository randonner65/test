<?php
//require_once "../../config.php";
class Switch extends Adatabase {
//public $property;
/*public function __construct() {
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
	}*/
//Создание строки таблицы свойств переключателя, где поле ip = IP пользователя	
public function init(){	
$ip= $_SERVER["REMOTE_ADDR"];		
$query = "SELECT ip FROM _constructor_switcher WHERE ip='$ip'";
		$result = mysql_query($query);
		if(!$result) {
			exit(mysql_error());
		}
		 if(mysql_num_rows($result) == 1) $this->delete();//очистка полей таблицы свойств переключателя
		 
$query = " INSERT INTO _constructor_switcher (ip) VALUES ('".$ip."')";
		if(!mysql_query($query)) {
			exit(mysql_error());
		}
	}
//Чтение свойства переключателя из таблицы конструктора	
public function read ($property){
$ip= $_SERVER["REMOTE_ADDR"];
$query = " SELECT ".$property." FROM _constructor_switcher WHERE ip='$ip'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
				
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
}
//Запись свойств переключателя в таблицу конструктора
public function write($property, $value){
		
$ip= $_SERVER["REMOTE_ADDR"];
$query = " UPDATE _constructor_switcher SET ".$property."='$value'WHERE ip='$ip'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}
//Удаление строки таблицы конструктора где поле ip = IP пользователя	
public function delete(){
		
$ip= $_SERVER["REMOTE_ADDR"];
$query = " DELETE FROM _constructor_switcher WHERE ip='$ip'";
		if(!mysql_query($query)) //очистка полей таблицы свойств переключателя
			exit(mysql_error());
	}	
}
?>