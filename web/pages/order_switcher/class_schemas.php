<?php
require_once "../../config.php";
class ClassSchemas {
public $name;//имя(номер) схемы
public $qpos;//количество положений
public $qcont;//количество контактов
public $closdiag;//диаграмма замыканий
public $att;//атрибуты
public $pmark;//наличие маркировки
public $mark;//маркировка
public $qjump;//количество перемычек
public $jumpe;//номера контактов перемычек


public function __construct($name = "1101") {
session_start();
   $db = mysql_connect(HOST,USER,PASSWORD);
		if(!$db) 
			exit("Ошибка соединения с базой данных".mysql_error());
		if(!mysql_select_db(DB,$db)) 
			exit("Нет такой базы данных".mysql_error());
		mysql_query("SET NAMES 'UTF8'");
		
//Чтение всех свойств схемы	
$query = " SELECT * FROM _schemas WHERE name ='".$name."'";
			$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
	$this->name = $name;
	$this->qpos = $row["qP"];
	$this->qcont = $row["qC"];
	$this->closdiag = $row["closDiag"];
	$this->att = $row["att"];
	$this->pmark = $row["pM"];
	$this->mark = $row["mark"];
	$this->qjump = $row["qJ"];
	$this->jump = $row["jump"];
	}
/*	
function __destruct() {
$query = " UPDATE _schemas SET  qP='$this->qpos'
								qC='$this->qcont'
								closDiag='$this->closdiag'
								att='$this->att'
								pM='$this->pmark'
								mark='$this->mark'
								qJ='$this->qjump'
								jump='$this->jump'
													WHERE name='".$name."'";
	if(!mysql_query($query)) //запись в БД свойств схемы
			exit(mysql_error());
}	
*/	
/*	
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
	}*/
//Чтение свойства схемы  c заданным именем
public function read($name, $property){
$query = " SELECT ".$property." FROM _schemas WHERE name ='".$name."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row[$property];
	}
	/*
//Чтение свойства вошедшего пользователя	
public function readInputUser($property){
$login= $_POST["login"];
$query = " SELECT ".$property." FROM _users WHERE login='".$login."'";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);

			return $row[$property];
	}*/	
//Запись свойства текущего пользователя		
/*public function write($property, $value){
$iduser= $_COOKIE["iduser"];
$query = " UPDATE _users SET ".$property."='$value'WHERE id='".$iduser."'";
		if(!mysql_query($query)) //запись в БД свойств переключателя
			exit(mysql_error());
	}	*/
	
//Переименование схемы		
public function rename($oldname, $newname){
$query = " UPDATE _schemas SET name = '$newname' WHERE name = '".$oldname."'";
		if(!mysql_query($query)) 
			exit(mysql_error());
	}	
	
//Проверка существования схемы
public function checkExistScheme($nscheme){
$query = " SELECT * FROM _schemas WHERE name = '".$nscheme."'";
		$result = mysql_query($query);
		//echo $nscheme;
		//print_r($result);
				if(!$result) 
					exit(mysql_error());
		//echo mysql_num_rows($result);			
		if(mysql_num_rows($result) == 0) return false;//если схема с таким номером не существует
		
		else return true;//если схема с таким номером существует
	}
/*	
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
	}*//*
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
	}*/	
//Добавление новой схемы
public function add($name, $qpos, $qcont, $closdiag, $att, $pmark, $mark, $qjump, $jump){
mysql_query("SET NAMES 'CP1251'");
 $query = "INSERT INTO `_schemas` (name, qP, qC, closDiag, att, pM, mark, qJ, jump) VALUES 
 ('".$name."', '".$qpos."', '".$qcont."','".$closdiag."', '".$att."', '".$pmark."','".$mark."', '".$qjump."', '".$jump."')";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}
//Обновление существующей схемы
public function update($name, $qpos, $qcont, $closdiag, $att, $pmark, $mark, $qjump, $jump){
mysql_query("SET NAMES 'CP1251'");
 $query = "UPDATE `_schemas` SET qP = '".$qpos."', qC = '".$qcont."', closDiag = '".$closdiag."',
 att = '".$att."', pM = '".$pmark."', mark = '".$mark."', qJ = '".$qjump."', jump = '".$jump."' WHERE name = '".$name."'";
 echo $query;
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}	
	
	/*
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
	}*/
//Удаление схемы 	
public function delete($delname){
$query = "DELETE FROM `_schemas` WHERE name='".$delname."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}
	/*
//Проверка существования пользователя с данным логином
public function checkLoginUser($login){

$query = " SELECT id FROM _users WHERE login = '".$login."'";

		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		if(mysql_num_rows($result) == 0) return false;//если пользователя с данным логином не существует
		 else return true; 
	}*/
}
?>