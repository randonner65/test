<?php
//$uploaddir = '/ex2.local/www/uploads/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
require_once "../../config.php";  

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], basename($_FILES['userfile']['name']))) {
    //echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная хакерская атака с помощью файловой загрузки!\n";
}

if($_FILES['userfile']['name'] != "baza_shem.txt"){ 
	echo "Файл ".$_FILES['userfile']['name']." не является файлом базы схем";
goto end;
}
else
//print_r($_FILES);

print "</pre>";

//require_once "scheme.php";

  $handle = fopen("baza_shem.txt", "rt");
  
  $baseSchemas = '';
  while (!feof($handle))
    $baseSchemas .= fread($handle, 4096);
  fclose($handle);
 //echo $baseSchemas;
 //Проверка наличия пароля в строке $baseSchemas
if (strpos($baseSchemas, "307HgB5hWuju6tlUoit6") === false){
echo "Файл ".$_FILES['userfile']['name']." не является файлом базы схем";
goto end;
}
 else
echo "<b>Файл базы схем загружен на сервер</b></br></br></br>"; 
 //Чтение байта из файла базы схем 
  function getByte($baseSchemas) {
    global $indexFile;
      $byte = "";
	 while ($baseSchemas[$indexFile] == " ")
	    $indexFile++;
		
	  $byte = $baseSchemas[$indexFile];
	  $indexFile++;
      return $byte;
 }
 //Чтение слова из файла базы схем
 function getWord($baseSchemas) {
    global $indexFile;
    $word = "";  
	 while ($baseSchemas[$indexFile] == " ")
	    $indexFile++;
	while ($baseSchemas[$indexFile] != " ") {
	  $word .= $baseSchemas[$indexFile];
	  $indexFile++;
	  }
      return $word;
 }
 //Чтение текстового поля
 function get_Text($baseSchemas) {
  global $indexFile;
    $text = "";  
	 while ($baseSchemas[$indexFile] == " ")
	    $indexFile++;
	while ($baseSchemas[$indexFile] != "#") {
	  $text .= $baseSchemas[$indexFile];
	  $indexFile++;
	  }
	  $indexFile++;
      return $text;
  }

//Подключение к базе MySql
$mysqli = new mysqli(HOST, USER, PSSSWORD, DB);
$mysqli->query("SET NAMES 'cp1251'");
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
$mysqli->query('DELETE FROM  _schemas');  
//Чтение данных из файла базы схем
$indexFile = 0;//установка указателя в начало файла
$a = getWord($baseSchemas);//количество схем в базе
//echo gettype ($a);echo " ";
echo "Kоличество схем в базе =".$a;echo "</br></br> ";

$scheme->qSchemas =   $a;
$scheme->minNumber = (int) getWord($baseSchemas);//минимальный номер для новых схем   
$scheme->maxNumber = (int) getWord($baseSchemas);//максимальный номер для новых схем
//print_r ($scheme->qSchemas);echo " ";
//print_r ($scheme->minNumber);echo " ";
//print_r ($scheme->maxNumber);echo " </br>";

 for ($k = 0; $k < $a; $k++)
  {
  print_r ($k);echo "   ";
    $scheme->name = getWord($baseSchemas);//имя схемы
	$scheme->qPos = getWord($baseSchemas) ;//количество положений
    $scheme->qCont = getWord($baseSchemas);//количество контактов
	$scheme->att = getWord($baseSchemas);//атрибуты
	$scheme->closDiag = getWord($baseSchemas);//диаграмма замыканий
print_r ($scheme->name);echo " ";
print_r ($scheme->qPos);echo " ";
print_r ($scheme->qCont);echo " ";
print_r ($scheme->att);echo " ";
print_r ($scheme->closDiag);echo " ";

	//Чтение текстовых полей
 $scheme->presMark = 0;//сброс флага наличия маркировки
 $scheme->qJump = 0;//обнуление количества перемычек
 $scheme->presNameCust = 0;//сброс флага наличия имени заказчика
 $scheme->presAddlField = 0;//сброс флага наличия текста в дополнительном поле
 $scheme->mark = "";
 $scheme->jump = "";
 $scheme->nameCust = "";
 $scheme->addlField = "";
 
 
mtf: $mtf =  getByte($baseSchemas);//чтение маркера текстовых полей
print_r ($mtf);echo "  ";
 //Чтение маркировки
  if($mtf == "M") {//если есть маркировка
 $scheme->mark = "";
  for ($i=0; $i < $scheme->qPos; $i++) {
   $scheme->mark .= getWord($baseSchemas)." ";
   $scheme->presMark = 1;//установка флага наличия маркировки
  }
 print_r ($scheme->mark);echo "  "; 
  goto mtf;
 } 
 
   //Чтение перемычек
  if($mtf == "P") {//если есть перемычки
   $scheme->qJump = getWord($baseSchemas);//чтение количества перемычек
   $scheme->jump = "";
  for ($i=0; $i < $scheme->qJump * 2; $i++) 
   $scheme->jump .= getWord($baseSchemas)." ";
  $arrJump = array();//массив перемычек
//Преобразование строки перемычек в массив  
$index = 0;
	for($p=0; $p<$scheme->qJump; $p++){
		$arrJump[0][$p] = "";
		$arrJump[1][$p] = "";
		while ($scheme->jump[$index] != " ") {
			$arrJump[0][$p] .= $scheme->jump[$index];
			$index++;
			}
			$index++;
		while ($scheme->jump[$index] != " ") {
			$arrJump[1][$p] .= $scheme->jump[$index];
			$index++;
			}	
			$index++;
	}
//Сортировка массива перемычек по возрастанию номеров контактов
 for ($p=0; $p<$scheme->qJump; $p++){//p - номер перемычки
  //Определение перемычкм с минимальными номерами контактов
 $nmin = 0;//номер минимального элемента
 $n1min = 48;
 $n2min = 48;
 for ($kp=$p; $kp<$scheme->qJump; $kp++){//kp - текуший номер перемычки
   if ((int)$arrJump[0][$kp] < $n1min || ((int)$arrJump[0][$kp] == $n1min && (int)$arrJump[1][$kp] < $n2min)){
     $n1min = $arrJump[0][$kp];  $n2min = $arrJump[1][$kp]; $nmin = $kp;
     }
   }
 //Обмен первого и минимального элемента
 $tmp = $arrJump[0][$p]; $arrJump[0][$p] = $arrJump[0][$nmin]; $arrJump[0][$nmin] = $tmp;
 $tmp = $arrJump[1][$p]; $arrJump[1][$p] = $arrJump[1][$nmin]; $arrJump[1][$nmin] = $tmp;
     }
//Преобразование массива перемычек в строку
$scheme->jump = "";
	for($p=0; $p<$scheme->qJump; $p++){
		$scheme->jump .= $arrJump[0][$p]." ";
		$scheme->jump .= $arrJump[1][$p]." ";
	}
print_r ($scheme->jump);echo "  ";	
   goto mtf;
 }
 
  //Чтение имени заказчика
   if($mtf == "Z") {//если есть имя заказчика
  $scheme->presNameCust = 1;//установка флага наличия имени заказчика
  $scheme->nameCust = get_Text($baseSchemas);
  
  print_r ($scheme->nameCust);echo " ";
 goto mtf;
}
  //Чтение текста дополнительного поля
    if($mtf == "D") {//если есть  текст дополнительного поля
  $scheme->presAddlField = 1;//установка флага наличия текста дополнительного поля
  $scheme->addlField = get_Text($baseSchemas);
  print_r ($scheme->addlField);echo "  ";
 
goto mtf;
 }
 echo "</br>  ";
  if ($mtf != "Q")
 
 echo "Недопустимый маркер текстового поля!";


$mysqli->query('INSERT INTO _schemas (name,qP,qC,closDiag,att,pM,mark,qJ,jump) VALUES ("'.$scheme->name.'","'.$scheme->qPos.'","'.$scheme->qCont.'","'.$scheme->closDiag.'","'.$scheme->att.'","'.$scheme->presMark.'",
"'.$scheme->mark.'","'.$scheme->qJump.'","'.$scheme->jump.'")');

}

//echo $success;
$result_set = $mysqli->query('SELECT * FROM _schemas');
  while ($row = $result_set->fetch_assoc()) {
   print_r($row);
    echo "<br />";
  }
  $result_set->close();

$mysqli->close();
echo "<b>База схем успешно обновлена</b></br></br></br>"; 
end:
?>