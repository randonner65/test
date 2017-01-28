<?php
class NumTempSch extends Adatabase {
public $number;//номер временной схемы

public function __construct() {
parent::__construct();
	}

//Чтение номера временной схемы
public function read(){
$query = " SELECT number FROM _num_temp_sch ";
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row["number"];
	}

//Запись номера временной схемы
public function write($number){
mysql_query("SET NAMES 'UTF-8'");
 $query = "UPDATE _num_temp_sch SET number = '".$number."'";
 //echo $query;
		$result = mysql_query($query);
				if(!$result) 
					exit(mysql_error());
	}	
}
?>