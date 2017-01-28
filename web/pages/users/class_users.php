<?php
require_once "../../config.php";
class ClassUsers {

public function __construct() {
session_start();
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
	}
//Чтение свойства текущего пользователя	
public function read ($property){
$iduser= $_SESSION["iduser"];
//$iduser= $_COOKIE["iduser"];
$query = " SELECT ".$property." FROM _users WHERE id='".$iduser."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);

			return $row[$property];
	}
/*Чтение свойства текущего пользователя	c заданным id
public function readId ($iduser, $property){
$query = " SELECT ".$property." FROM _users WHERE id='".$iduser."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);

			return $row[$property];
	}*/	
//Чтение свойства вошедшего пользователя	
public function readInputUser($property){
$login= $_POST["login"];
$query = " SELECT ".$property." FROM _users WHERE login='".$login."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);

			return $row[$property];
	}	
//Запись свойства текущего пользователя		
/*public function write($property, $value){
$iduser= $_COOKIE["iduser"];
$query = " UPDATE _users SET ".$property."='$value'WHERE id='".$iduser."'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}*/
//Запись свойства пользователя с данным id		
public function writeId($iduser, $property, $value){
$query = " UPDATE _users SET ".$property."='$value'WHERE id='".$iduser."'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}	
	
//Проверка на админность вошедшего пользователя
public function checkAdminInputUser(){
$login = strip_tags(mysql_real_escape_string($_POST['login']));
$password = strip_tags(mysql_real_escape_string($_POST['password']));
$password = md5($password);
$query = " SELECT id FROM _users WHERE login = '".$login."' AND password = '".$password."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		if(mysql_num_rows($result) == 0) return false;//если пользователя с введенными логином и паролем не существует
		
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		$iduser = $row["id"];
		$_SESSION['iduser'] = $iduser;//запись в сессию id вошедшего пользователя
	//setcookie("iduser", $iduser);//запись в cookie id вошедшего пользователя
	
$query = " SELECT status FROM _users WHERE id = '".$iduser."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		if($row["status"] == "admin" || $row["status"] == "superadmin") return true;//если вошедщий пользователь - админ  или суперадмин 
		else return false;//если вошедщий пользователь - не админ
	}
//Проверка на админность текущего пользователя
public function checkAdminCurrentUser(){
//$iduser= $_COOKIE["iduser"];
$iduser= $_SESSION["iduser"];
//echo "iduser=".$iduser;	
$query = " SELECT status FROM _users WHERE id = '".$iduser."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		if($row["status"] == "admin" || $row["status"] == "superadmin") return true;//если вошедщий пользователь - админ  или суперадмин 
		else return false;//если вошедщий пользователь - не админ
	}
//Проверка на суперадминность текущего пользователя
public function checkSuperAdminCurrentUser(){
$iduser= $_SESSION["iduser"];	
$query = " SELECT status FROM _users WHERE id = '".$iduser."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		if($row = "superadmin") return true;//если вошедщий пользователь - суперадмин 
		else return false;//если вошедщий пользователь - не админ
	}	
//Добавление нового пользователя 
public function addUser($login, $password, $status){
$password = md5($password);
 $query = "INSERT INTO `_users` (login, password, status) VALUES ('".$login."', '".$password."', '".$status."')";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}
//Чтение всех пользователей 
public function readAllUsers(){

$query =  "SELECT * FROM `_users` "; 
	$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());

$AllUsers = array();
$i=0;
  while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
  $AllUsers[$i] = $row;
  $i++;
		}
	return $AllUsers;
	}
//Удаление пользователя 	
public function delete($iduser){
$query = "DELETE FROM `_users` WHERE id='".$iduser."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}
//Проверка существования пользователя с данным логином
public function checkLoginUser($login){

$query = " SELECT id FROM _users WHERE login = '".$login."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		if(mysql_num_rows($result) == 0) return false;//если пользователя с данным логином не существует
		 else return true; 
	}
}
?>