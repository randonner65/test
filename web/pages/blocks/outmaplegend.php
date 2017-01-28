<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса

$name = $_GET['number'];//получение имени выводимой схемы
$name =  mb_strtoupper($name, "UTF-8");//перевод в верхний регистр

if(strpos($name, 'X')!== false || mb_strpos($name, 'Х', 0, 'UTF-8')!== false) {//если X в имени схемы - перемычки не выводить
$name = str_replace("X", "", $name);//удаление Х (лат) из имени схемы
$name = str_replace("Х", "", $name);//удаление Х (рус) из имени схемы
$withoutJump = true;//без перемычек
}
else $withoutJump = false;//с перемычками


//Вырезание номера схемы из наименования переключателя
if(preg_match("/^S[0-9]{2,3}J/", $name, $q)) {//проверка на s32j или s160 и т. д.
$nj = strpos($name, "J");//определения номера буквы J
$name = substr($name, $nj+1);//обрезание до J включительно
while(preg_match("/^[JBDGUOPKLV]/", $name, $q)) 
$name = substr($name, 1);//обрезание букв JBDGUOPKLV
$number = "";
$ln = strlen($name);//количество букв в оставшемся имени схемы
while(!preg_match("/^[ABCDVM]/", $name, $q) && $ln > 0){
$number .= $name[0];
$name = substr($name, 1);
$ln--;
  }
 if($name[0] == "C"){ 
$schemeC = new  Schemas();//создание объекта класса Schemas
	if($schemeC->checkExistScheme($number."C")) $name = $number ."C";//если нач. пол "С" - вывод схемы с нулем посередине
	}
	else $name = $number;	
}
$name = str_replace(" ", "+", $name);//замена пробела на +
$scheme = new  Schemas($name);//создание объекта класса Schemas
$cellSize = 30;//размер ячейки таблицы схемы
$yCanva = 2*$cellSize;//вертикальный размер канвы
 //Запись массива перемычек
 $scheme->jumpArr = array();//массив перемычек
 $index = 0;
	for ($n=0; $n<$scheme->qjump; $n++){ //n - номер перемычки
		$scheme->jumpArr[0][$n] = (int) getWord($scheme->jump);//номер первого контакта перемычки
		$scheme->jumpArr[1][$n] = (int) getWord($scheme->jump);//номер первого контакта перемычки
	}
  //Чтение слова из строки
 function getWord($string) {
    global $index;
    $word = "";  
	 while ($string[$index] == " ")
	    $index++;
	while ($string[$index] != " ") {
	  $word .= $string[$index];
	  $index++;
	  }
      return $word;
 }
 //Проверка наличия внутренних перемычек
 $presenceInternalJumpers = false;
	for($n=0; $n<$scheme->qjump; $n++)
		if($scheme->jumpArr[1][$n] - $scheme->jumpArr[0][$n] == 2) $presenceInternalJumpers = true;
	if($presenceInternalJumpers) $yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
 //Проверка наличия внешних перемычек
 $presenceExternalJumpers = false;
	for($n=0; $n<$scheme->qjump; $n++)
		if($scheme->jumpArr[1][$n] - $scheme->jumpArr[0][$n] != 2) $presenceExternalJumpers = true;
	if($presenceExternalJumpers) $yCanva += 3.5*$cellSize;//увеличение вертикального размера канвы	


//Проверка наличия конкретных видов замыкания в ДЗ
	if(substr_count($scheme->closdiag, "o") > 0) {//если разомкнутый контакт
		$presenceDisconnected = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceDisconnected = false;
	if(substr_count($scheme->closdiag, "x") > 0) {//если имеется крест
		$presenceCross = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceCross = false;
	if(substr_count($scheme->closdiag, "u") > 0) {//если имеется X-X
		$presenceCrossRight = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceCrossRight = false;	
	if(substr_count($scheme->closdiag, "w") > 0) {//если имеется X---X
		$presenceHorLine = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceHorLine = false;
	if(substr_count($scheme->closdiag, "b") > 0) {//если имеется X_ (перекрытие вправо)
		$presenceOverlapRight = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceOverlapRight = false;
	if(substr_count($scheme->closdiag, "a") > 0) {//если имеется _X (перекрытие влево)
		$presenceOverlapLeft = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceOverlapLeft = false;		
	if(substr_count($scheme->closdiag, "c") > 0) {//если имеется _X_ (перекрытие влево и вправо)
		$presenceOverlapBoth = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presenceOverlapBoth = false;		
if(substr_count($scheme->closdiag, "gh") > 0) {//если имеется >< (импульсный контакт)
		$presencePulse = true;
		$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы
	}
		else $presencePulse = false;
//Проверка наличия ХХ
$presenceCloseGap = false;
	for($j=0; $j<$scheme->qcont; $j++)
		for($i=0; $i<$scheme->qpos-1; $i++)
			if(($scheme->closdiag[$j*$scheme->qpos+$i] == "x") && ($scheme->closdiag[$j*$scheme->qpos+$i+1] == "x")) $presenceCloseGap = true;
		
	if($presenceCloseGap)	$yCanva += 2.5*$cellSize;//увеличение вертикального размера канвы




	
$canvaLegend = imageCreate($cellSize*16, $yCanva);//создание канвы
  $color = imageColorAllocate($canvaLegend, 220, 230, 240);//цвет фона канвы
  //$color = imageColorAllocate($canvaLegend, 255, 255, 255);//цвет фона канвы
  ImageColorTransparent($canvaLegend , $color);//создание прозрачного фона
$y0 = 0;
//Вывод сетки
 function outGrid($n) {//n - количество ячеек
	global $canvaLegend, $color, $cellSize, $y0;
$color = imageColorAllocate($canvaLegend, 0, 0, 0);//цвет сетки
imageSetThickness($canvaLegend, 1);//толщина линий
imageLine($canvaLegend, 0, $y0+0.5*$cellSize,	($n+1)*$cellSize, $y0+0.5*$cellSize, $color);//первая горизонтальная линия 
imageLine($canvaLegend, 0, $y0+1.5*$cellSize,	($n+1)*$cellSize, $y0+1.5*$cellSize, $color);//вторая горизонтальная линия
//Вывод вертикальных линий
	for($i = 0; $i <= $n; $i++)
		imageLine($canvaLegend, (0.5+$i)*$cellSize, $y0, (0.5+$i)*$cellSize, $y0+2*$cellSize, $color);
 }
//Вывод линии 
function outLine($n, $x1, $y1 ,$x2, $y2) {//n - номер ячейки
	global $canvaLegend, $color, $cellSize, $y0;
	imageSetThickness($canvaLegend, $cellSize/10);//толщина линий
	imageLine($canvaLegend, $x1*$cellSize/10+($n-0.5)*$cellSize, $y1*$cellSize/10+0.5*$cellSize+$y0,
	$x2*$cellSize/10+($n-0.5)*$cellSize, $y2*$cellSize/10+0.5*$cellSize+$y0, $color); 
}
 
 //outGrid(5);
 //outLine(3, 2, 2 ,8, 8);
 
 //Вывод обозначения разомкнутого контакта
 if($presenceDisconnected){
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(1);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf", "контакт разомкнут");
  $y0 = $y0 + 2.5*$cellSize;
}  
	if($presenceCross){ 
//Вывод обозначения контакта, замкнутого в одном положении
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(1);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf", "контакт замкнут в одном положении");
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
  $y0 = $y0 + 2.5*$cellSize;
}
	if($presenceCrossRight){
//Вывод обозначения контакта, замкнутого в двух положениях
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(2);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 4*$cellSize, $y0+0.8*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут в двух положениях");
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 4*$cellSize, $y0+1.6*$cellSize,  $color, "../../fonts/arial.ttf",
 "без разрыва цепи при переключении");
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(2, 2, 2 ,8, 8);
 outLine(2, 2, 8 ,8, 2);
 outLine(1, 7, 5 ,13, 5);
  $y0 = $y0 + 2.5*$cellSize;
}
	if($presenceHorLine){
//Вывод обозначения контакта, замкнутого в трех и более положениях
$color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(3);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 5*$cellSize, $y0+0.8*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут в трех и более положениях");
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 5*$cellSize, $y0+1.6*$cellSize,  $color, "../../fonts/arial.ttf",
 "без разрыва цепи при переключении");
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(3, 2, 2 ,8, 8);
 outLine(3, 2, 8 ,8, 2);
 outLine(1, 7, 5 ,23, 5);
  $y0 = $y0 + 2.5*$cellSize;
}
	if($presenceCloseGap){
//Вывод обозначения контакта, замкнутого в двух положениях с разрывом
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(2);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 4*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут двух положениях с разрывом цепи при переключении");
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(2, 2, 2 ,8, 8);
 outLine(2, 2, 8 ,8, 2);
  $y0 = $y0 + 2.5*$cellSize;
} 
	if($presenceOverlapRight){
//Вывод обозначения контакта с перекрытием по часовой стрелке
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(1);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут с перекрытием по часовой стрелке");
 $color = imageColorAllocate($canvaLegend, 0, 100, 0);
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(1, 8, 2 ,10, 2);
  $y0 = $y0 + 2.5*$cellSize;
}
	if($OverlapLeft){
//Вывод обозначения контакта с перекрытием против часовой стрелки
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(1);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут с перекрытием против часовой стрелки");
 $color = imageColorAllocate($canvaLegend, 0, 100, 0);
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(1, 0, 2 ,2, 2);
  $y0 = $y0 + 2.5*$cellSize;
}
	if($presenceOverlapBoth){
//Вывод обозначения контакта с перекрытием в обоих направлениях
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(1);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замкнут с перекрытием в обоих направлениях");
 $color = imageColorAllocate($canvaLegend, 0, 100, 0);
 outLine(1, 2, 2 ,8, 8);
 outLine(1, 2, 8 ,8, 2);
 outLine(1, 0, 2 ,2, 2);
 outLine(1, 8, 2 ,10, 2);
 $y0 = $y0 + 2.5*$cellSize;
 }
	if($presencePulse){
//Вывод обозначения импульсного контакта
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
 outGrid(2);
 imageTtfText($canvaLegend, $cellSize/2.5, 0, 4*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "контакт замыкается только при переключении из одного положения в другое");
 $color = imageColorAllocate($canvaLegend, 0, 0, 200);
 outLine(1, 7, 2, 10, 5);
 outLine(1, 7, 8 ,10, 5);
 outLine(2, 0, 5, 3, 2);
 outLine(2, 0, 5 ,3, 8);
  $y0 = $y0 + 2.5*$cellSize;
}  
 //Вывод обозначения перемычек
 
 if($scheme->qjump != 0 && !$withoutJump){//если имеются перемычки
	if($presenceInternalJumpers){//если имеются внутренние перемычки
//Вывод обозначения внутренней перемычки
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
imageSetThickness($canvaLegend, 1);//толщина линий
imageLine($canvaLegend, 0, $y0+$cellSize,	2*$cellSize, $y0+$cellSize, $color);//первая горизонтальная линия  
imageArc($canvaLegend, $cellSize, $y0+0.5*$cellSize, $cellSize/4 , $cellSize/4, 0, 360, $color);//первая окружность
imageArc($canvaLegend, $cellSize, $y0+1.5*$cellSize, $cellSize/4 , $cellSize/4, 0, 360, $color);//вторая окружность
imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.2*$cellSize,  $color, "../../fonts/arial.ttf",
 "внутренняя перемычка");
 $color = imageColorAllocate($canvaLegend, 0, 0, 255);//цвет перемычки
 imageSetThickness($canvaLegend, $cellSize/10);//толщина линии
 imageLine($canvaLegend, $cellSize, $y0+0.5*$cellSize+$cellSize/8,	$cellSize, $y0+1.5*$cellSize-$cellSize/8, $color);//
 $y0 = $y0 + 2.5*$cellSize;
 }
	if($presenceExternalJumpers){//если имеются внешние перемычки
//Вывод обозначения внешней перемычки
 $color = imageColorAllocate($canvaLegend, 0, 0, 0);
imageSetThickness($canvaLegend, 1);//толщина линий
imageLine($canvaLegend, 0, $y0+$cellSize,	2*$cellSize, $y0+$cellSize, $color);//первая горизонтальная линия  
imageLine($canvaLegend, 0, $y0+2*$cellSize,	2*$cellSize, $y0+2*$cellSize, $color);//вторая горизонтальная линия  
imageArc($canvaLegend, $cellSize, $y0+0.5*$cellSize, $cellSize/4 , $cellSize/4, 0, 360, $color);//первая окружность
imageArc($canvaLegend, $cellSize, $y0+1.5*$cellSize, $cellSize/4 , $cellSize/4, 0, 360, $color);//вторая окружность
imageArc($canvaLegend, $cellSize, $y0+2.5*$cellSize, $cellSize/4 , $cellSize/4, 0, 360, $color);//третья окружность
imageTtfText($canvaLegend, $cellSize/2.5, 0, 3*$cellSize, $y0+1.7*$cellSize,  $color, "../../fonts/arial.ttf",
 "внешняя перемычка");
 $color = imageColorAllocate($canvaLegend, 255, 0, 0);//цвет перемычки
 imageSetThickness($canvaLegend, $cellSize/10);//толщина линии
 imageLine($canvaLegend, $cellSize-$cellSize/8, $y0+0.5*$cellSize,
 $cellSize-$cellSize/8-$cellSize/3, $y0+0.5*$cellSize, $color);//первая горизонтальная линия
 imageLine($canvaLegend, $cellSize-$cellSize/8, $y0+2.5*$cellSize,
 $cellSize-$cellSize/8-$cellSize/3, $y0+2.5*$cellSize, $color);//вторая горизонтальная линия
 imageLine($canvaLegend, $cellSize-$cellSize/8-$cellSize/3, $y0+0.5*$cellSize,
 $cellSize-$cellSize/8-$cellSize/3, $y0+2.5*$cellSize, $color);//вертикальная линия
 $y0 = $y0 + 3.5*$cellSize;
  }
}
//imageTtfText($canvaScheme, $cellSize/2.5, 0, 30, 30, $color, "../../fonts/arial.ttf", HOST); 
Header("Content-type: image/jpeg");
	  if($withoutJump) $name .= "X";
	  $name = str_replace("CX", "XC" ,$name);
  if($_GET["flag"] == 1) imagegif($canvaLegend, '../../images/passport/'.$name.'_map_legend.jpg');
  else   imagegif($canvaLegend);
  imageDestroy($canvaLegend);
   

?>