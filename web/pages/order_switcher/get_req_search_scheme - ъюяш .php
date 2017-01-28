<?php

function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класс
$scheme = new  Schemas($name);//создание объекта класса Schemas

  //Получение данных по технологии Ajax
 $closDiag = $_GET['closDiag'];
  $qP = $_GET['qP'];
  $qC = $_GET['qC'];
  $jump = $_GET['jump'];
  $qjump = $_GET['qJ'];
  $mark = $_GET['mark'];
  $jump = substr_replace($jump, '', -1, 1);//удаление последнего символа #

  
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'"AND jump = "'.$jump.'" AND att LIKE "_s%r"';
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
	if(isset($property[0]["name"])) exit($property[0]["name"]);//если совпадение со стандартной схемой
	
	if($jump == ""){//если в введенной схеме нет перемычек
//Проверка совпадения со стандартной схемой без перемычек
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "_s%r"';
  
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
	if(isset($property[0]["name"]))  exit($property[0]["name"] ."X");//если совпадение со стандартной схемой без перемычек 
}
//Проверка совпадения с нестандартной схемой  
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'"AND jump = "'.$jump.'" AND att LIKE "_r%r"';  
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы 
	if(isset($property[0]["name"])) exit($property[0]["name"]);//если совпадение с нестандартной схемой
	if($jump != "") {out_number_temt_scheme();exit;}//если нет совпадения при наличии перемычек вывод отсутствия совпавшей семы 
//Проверка совпадения с нестандартной схемой без перемычек 
$condition = 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "_r%r"';  
$property = $scheme->select("name", $condition);//получение имени совпавшей схемы
if(isset($property[0]["name"]))  exit($property[0]["name"] ."X");//если совпадение с нестандартной схемой без перемычек
else 
  
 //print_r ("");//вывод отсутствия совпавшей схемы
 out_number_temt_scheme();
//Чтение номера временной схемы из БД
function out_number_temt_scheme(){
global $scheme, $qP, $qC, $closDiag, $mark, $qjump, $jump ;
$NumTempSch = new NumTempSch;
$number = $NumTempSch->read();
$NumTempSch->write($number+1);//инкремент номера временной схемы
$name = "temp".$number;
if($mark == "") $pmark = 0; else $pmark = 1;
$scheme->add($name, $qP, $qC, $closDiag, "rvrrrrr", $pmark, $mark, $qjump, $jump);
echo "(".$name.")*";
}
 
?>