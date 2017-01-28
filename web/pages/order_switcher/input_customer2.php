<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders

//print_r($_GET);
foreach($_GET as $var=>$var_value)
$order->write($var, $var_value);//запись в БД свойств текущего заказа
//Проверка заполнения обязательных полей
$emptyField = array("nameorg", "phone", "email", "contname", "delivery");
$errFlag = false;//сброс флага ошибки
foreach($emptyField as $field){
	if(trim($order->read($field)) == ""){ 
		$order->write("err".$field, "Не заполнено поле");//запись в БД сообщения об ошибке ввода
		$errFlag = true;//установка флага ошибки
	}
	else $order->write("err".$field, "");//запись в БД отсутствия сообщения об ошибке ввода
}
if(trim($order->read("email")) != ""){
//Проверка правильности ввода email
$email = trim($order->read("email"));
	if(!strpos($email, "@") || strpos($email, "@") == (strlen($email)-1)){
		$order->write("erremail", "Адрес электронной почты введен неверно");//запись в БД сообщения об ошибке ввода
		$errFlag = true;//установка флага ошибки
		}
	}
if(trim($order->read("phone")) != ""){
//Проверка правильности ввода номера телефона
$phone = trim($order->read("phone"));
$phone = str_replace(" ", "", $phone);
$phone = str_replace("(", "", $phone);
$phone = str_replace(")", "", $phone);
$phone = str_replace("-", "", $phone);
$phone = str_replace("+", "", $phone);
  if (!preg_match("/^[0-9]{6}$/", $phone, $q) && !preg_match("/^[0-9]{7}$/", $phone, $q) 
  &&  !preg_match("/^[0-9]{10}$/", $phone, $q ) &&  !preg_match("/^[0-9]{11}$/", $phone, $q ) &&  !preg_match("/^[0-9]{12}$/", $phone, $q )){
	$order->write("errphone", "Номер телефона введен неверно");//запись в БД сообщения об ошибке ввода
		$errFlag = true;//установка флага ошибки
		}
	}	
	if($errFlag) header( 'Location: input_customer.php', true, 303 );//на страницу ввода свойств заказчика
else{
$order->write("date", date("Y-m-d H:i:s"));
$order->write("sent", 1);//запись свойства "Заказ отправлен"
$order->write("new", "Новый");//запись свойства "Новый"
header( 'Location: send_letter.php', true, 303 );//на страницу отправки письма
}
?>
