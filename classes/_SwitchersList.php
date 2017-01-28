<?php
class SwitchersList extends ADatabase{
public function __construct() {
parent::__construct();
	}
	
//Проверка существования наименования переключателя в списке
public function checkExistName($name){
$query = " SELECT * FROM _schemas WHERE name = '".$name."'";
		$result = mysql_query($query);
					if(!$result) 
					exit(mysql_error());
		if(mysql_num_rows($result) == 0) return false;//если такого наименования переключателя не существует
		
		else return true;//если такое наименования переключателя существует
	}

	
//Запись наименования переключателя
public function write($name){
$query = " INSERT INTO _switchers_list (name) values('".$name."')";
		if(!mysql_query($query)) //запись в БД 
			exit(mysql_error());
	}

}

?>