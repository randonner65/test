<?php
  //echo "�������� ��������� � �������: �� = ".$_GET['closDiag']." ���������� ��������� = ".$_GET['qP']." ���������� ��������� = ".$_GET['qC'];
  $closDiag = $_GET['closDiag'];
  $qP = $_GET['qP'];
  $qC = $_GET['qC'];
  //����������� � ���� MySql
require_once "../../config.php";  
$mysqli = new mysqli(HOST, USER, PSSSWORD, DB);
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
  $mysqli->close();//���������� �� ���� ������
 $listFoundScheme = "number0=".$name[0];//������ ��������� ���� 
for ($i=1; $i<count($name); $i++)
	$listFoundScheme .= "&number".$i."=".$name[$i];
 print_r ($listFoundScheme); 
  
?>