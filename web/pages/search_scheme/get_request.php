<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//��������������� ������� ������
$scheme = new  Schemas();//�������� ������� ������ Schemas
  //echo "�������� ��������� � �������: �� = ".$_GET['closDiag']." ���������� ��������� = ".$_GET['qP']." ���������� ��������� = ".$_GET['qC'];
  $closDiag = $_GET['closDiag'];
  $qP = $_GET['qP'];
  $qC = $_GET['qC'];
  //$closDiag = "oxxo";
  //$qP = 2;
  //$qC = 2;
 $propertys = array(); 
$propertys = $scheme->select("name", 'qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "%r"');  
/*  //����������� � ���� MySql
require_once "../../config.php";  
$mysqli = new mysqli(HOST, USER, PASSWORD, DB);
$mysqli->query("SET NAMES 'UTF8'");
if (mysqli_connect_errno()) {
    echo "����������� ����������: ".mysqli_connect_error();
  }
  $result_set = $mysqli->query('SELECT * FROM _schemas WHERE qP = "'.$qP.'" AND qC = "'.$qC.'" AND closDiag = "'.$closDiag.'" AND att LIKE "%r"');
  $name = array();//������ ���� ��������� ����
  $i=0;
  while ($row = $result_set->fetch_assoc()) {
    $name[$i]= $row[name];//������ ���� ��������� ����
	//print_r ($name[$i]);
	//echo "<br />";
   $i++;
  }

  //$row = $result_set->fetch_assoc();
  //$name = $row[name];//��������� ����� ��������� �����
  
  $result_set->close();
  $mysqli->close();//���������� �� ���� ������*/
 //print_r ($propertys); 
 if(isset($propertys[0])){ 
 $listFoundScheme = "number0=".$propertys[0][name];//������ ��������� ���� 
for ($i=1; $i<count($propertys); $i++)
	$listFoundScheme .= "&number".$i."=".$propertys[$i][name];
 print_r ($listFoundScheme); 
 }
 else print_r (""); 
?>