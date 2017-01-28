<?php

function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класс
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
foreach($_GET as $var=>$var_value)
	$orderswitcher->write($var, $var_value);//запись в БД свойств переключателя, введенных на предыдущей странице
$scheme = new  Schemas($name);//создание объекта класса Schemas
//print_r($_GET);
  //Получение данных по технологии Ajax
 $closDiag = $_GET['closdiag'];
  $qP = $_GET['qpos'];
  $qC = $_GET['qcont'];
  $jump = $_GET['jump'];
  $qjump = $_GET['qjump'];
  $mark = $_GET['mark'];
  $jump = substr_replace($jump, '', -1, 1);//удаление последнего символа #

 //Проверка совпадения со стандартной схемой с перемычками
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'"AND jump = "'.$jump.'" AND att LIKE "_s%r"';
//print_r($condition);
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
//print_r($property[0]["name"]);
	if(isset($property[0]["name"])) {write_number_scheme($property[0]["name"]);exit;}
	
	if($jump == ""){//если в введенной схеме нет перемычек
//Проверка совпадения со стандартной схемой без перемычек
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "_s%r"';
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
	if(isset($property[0]["name"]))  {write_number_scheme($property[0]["name"]."X");exit;}//если совпадение со стандартной схемой без перемычек
}
//Проверка совпадения с нестандартной схемой  
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'"AND jump = "'.$jump.'" AND att LIKE "_r%r"';  
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы 
	if(isset($property[0]["name"])) {write_number_scheme($property[0]["name"]);exit;}//если совпадение с нестандартной схемой
	
	if($jump != "") {out_number_temt_scheme();exit;}//если нет совпадения при наличии перемычек вывод отсутствия совпавшей семы 
//Проверка совпадения с нестандартной схемой без перемычек 
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "_r%r"';  
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
	if(isset($property[0]["name"]))  {write_number_scheme($property[0]["name"]."X");exit;}//если совпадение с нестандартной схемой без перемычек
	else  out_number_temt_scheme();
 
//Запись в БД номера схемы 
function write_number_scheme($nscheme){ 
global $orderswitcher;
$orderswitcher->write("nscheme", $nscheme);//запись в БД номера схемы
//if($orderswitcher->read("fix") == "P") header( 'Location: constr_switcher5c.php'.$url, true, 303 );//на выбор ориентации коробки (5-ый шаг конструктора)
//else 
header( 'Location: constr_switcher8.php'.$url, true, 303 );//на выбор самовозврата (8-ой шаг конструктора)
}

//Чтение номера временной схемы из БД
function out_number_temt_scheme(){
global $scheme, $qP, $qC, $closDiag, $mark, $qjump, $jump ;
$NumTempSch = new NumTempSch;
$number = $NumTempSch->read();
$NumTempSch->write($number+1);//инкремент номера временной схемы
$name = "temp".$number;
if($mark == "") $pmark = 0; else $pmark = 1;
$scheme->add($name, $qP, $qC, $closDiag, "rvrrrrr", $pmark, $mark, $qjump, $jump);
//echo "(".$name.")*";
write_number_scheme("(".$name.")*");//Запись в БД номера схемы 
}
 
?>