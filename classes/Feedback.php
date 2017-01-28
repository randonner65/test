<?php
//require_once "../../config.php";
//КЛАСС ЧАСТО ЗАДАВАЕМЫХ ВОПРОСОВ
class Feedback extends Adatabase{
public function __construct() {
parent::__construct();
	}
//Запись вопроса
public function add($name, $email, $subject, $massage){
//$query = " UPDATE _errors SET value=".$value." WHERE name='$name'";
$date = date("Y-m-d H:i:s");
$query = " INSERT INTO _feedback (date, name, email, subject, message) values ('".$date."', '".$name."','".$email."','".$subject."','".$massage."')";
		if(!mysql_query($query)) //запись в БД 
			exit(mysql_error());
	}	
//Чтение вопроса	
public function read ($name){

//query = " SELECT value FROM _errors WHERE name='$name'";
$query = " SELECT  `value` FROM `_faq` WHERE name='$name'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		//print_r ($row);
			return $row['value'];
	}

	
//Запись вопроса
public function write($name, $value){
//$query = " UPDATE _errors SET value=".$value." WHERE name='$name'";
$query = " UPDATE _faq SET value='$value' WHERE name='$name'";
		if(!mysql_query($query)) //запись в БД 
			exit(mysql_error());
	}

}

?>