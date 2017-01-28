<?php
  //echo "Получены параметры с сервера: ДЗ = ".$_GET['closDiag']." количество положений = ".$_GET['qP']." количество контактов = ".$_GET['qC'];
  $closDiag = $_GET['closDiag'];
  $qP = $_GET['qP'];
  $qC = $_GET['qC'];
  //Подключение к базе MySql
require_once "../../config.php";  
$mysqli = new mysqli(HOST, USER, PSSSWORD, DB);
$mysqli->query("SET NAMES 'UTF8'");
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $result_set = $mysqli->query('SELECT * FROM _schemas WHERE qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "%r"');
  $name = array();//массив имен совпавших схем
  $i=0;
  while ($row = $result_set->fetch_assoc()) {
    $name[$i]= $row[name];//массив имен совпавших схем
	//print_r ($name[$i]);
	//echo "<br />";
   $i++;
  }

  //$row = $result_set->fetch_assoc();
  //$name = $row[name];//получение имени совпавшей схемы
  
  $result_set->close();
  $mysqli->close();//отключение от базы данных
 $listFoundScheme = "number0=".$name[0];//список найденных схем 
for ($i=1; $i<count($name); $i++)
	$listFoundScheme .= "&number".$i."=".$name[$i];
 print_r ($listFoundScheme); 
  
?>