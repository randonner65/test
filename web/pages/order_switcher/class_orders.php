<?php
require_once "../../config.php";
class ClassOrders {
public function __construct() {
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
	}
	
//Чтение свойства текущего заказа	
public function read ($property){
$idorder = $_COOKIE["idorder"];
$query = " SELECT ".$property." FROM _orders WHERE id='$idorder'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
	}
//Чтение свойства текущего заказа с заданным id	
public function readOneOrder ($property, $idorder){
$query = " SELECT ".$property." FROM _orders WHERE id='$idorder'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
	}
//Чтение всех записей таблицы заказа	
public function readAll (){

$query = "SELECT * FROM _orders WHERE sent ='1'";
$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
$Orders = array();
$i=0;
  while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {

  $Orders[$i] = $row;
  $i++;
   	}
	return $Orders;
}
	
//Запись свойства текущего заказа
public function write($property, $value){
$idorder = $_COOKIE["idorder"];		
$query = " UPDATE _orders SET ".$property."='$value'WHERE id='$idorder'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}
//Запись свойства  заказа с номером ID
public function writeId($idorder, $property, $value){
	
$query = " UPDATE _orders SET ".$property."='$value'WHERE id='$idorder'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}	
//Определение максимального id в таблице _orders	
public function maxid(){
$query = "SELECT MAX(id) FROM _orders";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row["MAX(id)"];
	}

//Добавление нового заказа
public function addNewOrder(){
$query = "INSERT INTO _orders (sent) VALUES ('0')";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}
//Определение количества строк в таблица заказов	
public function qPosOrder(){
$query = "select * from _orders";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
 $qposorder = mysql_num_rows($result);
 return $qposorder;
	}
}

?>