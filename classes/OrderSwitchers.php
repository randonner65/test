<?php
//require_once "Adatabase.php";
class OrderSwitchers  extends Adatabase {

public function __construct() {
parent::__construct();
	}
	
//Добавление новой записи в таблицу заказанных переключателей	
public function init (){
 $query = "INSERT INTO `_order_switchers` (quantity) VALUES ('1')";
 
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
			
$id_order_switcher = $this->maxid();				
	setcookie("id_order_switcher", $id_order_switcher);//запись в cookie id строки таблицы _order_switcher, куда конструктор записывает свойства переключателя				

	}	
//Чтение свойства переключателя из текущей позиции заказа	
public function read ($property){

 $id_order_switcher = $_COOKIE["id_order_switcher"];//чтение из cookie id строки таблицы _order_switcher, куда конструктор записывает свойства переключателя
$query = " SELECT ".$property." FROM _order_switchers WHERE id='$id_order_switcher'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
				
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		//echo $property;
		//echo $row[$property];
			return $row[$property];
}
//Чтение свойства переключателя из заданной позиции заказанных переключателей			
public function readId($idorderswitch, $property){

 //$idorder = $_COOKIE["idorder"];//чтение номера текущего заказа
$query = " SELECT ".$property." FROM _order_switchers WHERE  id='$idorderswitch'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
				
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];			
}
//Запись свойства переключателя в текущую позицию заказа
public function write($property, $value){

 $id_order_switcher = $_COOKIE["id_order_switcher"];//чтение из cookie id строки таблицы _order_switcher, куда конструктор записывает свойства переключателя
 		

$query = " UPDATE _order_switchers SET ".$property."='$value'WHERE id='$id_order_switcher'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}
//Запись свойства переключателя в заданную позицию заказа
public function writeId($idorderswitch, $property, $value){
 $idorder = $_COOKIE["idorder"];//чтение номера текущего заказа

$query = " UPDATE _order_switchers SET ".$property."='$value'WHERE idorder='$idorder' AND id='$idorderswitch'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}	
//Определение максимального id в таблице _orders	
public function maxid(){
$query = "SELECT MAX(id) FROM `_order_switchers`";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row["MAX(id)"];
			//return mysql_insert_id();
	}
//Чтение всех заказанных переключателей из текущего заказа
public function readAll (){
if(!isset($_COOKIE["idorder"])) return;//если заказ пустой
$idorder = $_COOKIE["idorder"];

$query =  "SELECT * FROM _order_switchers WHERE idorder='".$idorder."'"; 
	$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());

$AllSwitchers = array();
$i=0;
  while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
  $AllSwitchers[$i] = $row;
  $i++;
		}
	return $AllSwitchers;
	}
//Чтение всех заказанных переключателей из заказа с номером $idorder
public function readAllId ($idorder){

$query =  "SELECT * FROM _order_switchers WHERE idorder='".$idorder."'"; 
	$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	$AllSwitchers = array();
$i=0;
  while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
  $AllSwitchers[$i] = $row;
  $i++;
		}
	return $AllSwitchers;
	}
//удаление строки с заказанным переключателем в таблице _orders	
public function delete($idorderswitch){
$query = "DELETE FROM _order_switchers WHERE id='".$idorderswitch."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}		
}
?>