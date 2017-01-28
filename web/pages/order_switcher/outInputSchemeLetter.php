<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$switch = new Switch();//создание объекта класса Switch
$orderswitcher = new rderSwitchers();//создание объекта класса OrderSwitchers
$nposorder = $_GET[nposorder];
if($orderswitcher->readOnePos("qjump", $nposorder) == 0) $withoutJump = true;//без перемычек
else $withoutJump = false;//с перемычками

  $scheme->qPos = $orderswitcher->readOnePos("qpos", $nposorder);//получение количества положений
  $scheme->qCont = $orderswitcher->readOnePos("qcont", $nposorder);//получение количества контактов
  $scheme->closDiag = $orderswitcher->readOnePos("closdiag", $nposorder);//получение диаграммы замыканий
 // echo $scheme->qPos;
	if($_COOKIE["switcher_inf_board"] == "no") $scheme->presMark = 0;
	else $scheme->presMark = 1;//получение наличия маркировки
 // $scheme->presMark = (int)$row[pM];//получение наличия маркировки
  $scheme->mark = $orderswitcher->readOnePos("mark", $nposorder);//получение маркировки
  $scheme->qJump = $orderswitcher->readOnePos("qjump", $nposorder);//получение количества пермычек
  $scheme->jump = $orderswitcher->readOnePos("jump", $nposorder);//получение перемычек

$cellSize = 30;//размер ячейки таблицы схемы
// if(count($row) == 0) goto notfound;//если схема  не найдена 
 //Чтение слова из строки
 function getWordMark($string) {
    global $index;
    $word = "";  
	 while ($string[$index] == "$")
	    $index++;
	while ($string[$index] != "$") {
	  $word .= $string[$index];
	  $index++;
	  }
      return $word;
 }
  function getWordJump($string) {
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
 //Запись массива маркировок
  if ($scheme->presMark == 1){
 $mark = array();
 $index = 0;
 for ($i=0; $i<$scheme->qPos; $i++)
	$mark[$i] = getWordMark($scheme->mark);
}

$deltaJump = 0;//увеличение ширины первого столбца, если не помещаются перемычки
$widthFirstCol = $cellSize*4+$deltaJump;//ширина первого столбца
$heightTxt = $cellSize*1.5;//высота текста шапки таблицы
$heightMarkPos = $cellSize;//высота маркировки положений 
$numPos = (int)$scheme->qPos;//количество положений
$numCont = (int)$scheme->qCont;//количество контактных групп
$numJump = (int)$scheme->qJump;//количество перемычек

//Определение максимальной длинны маркировки
$maxlength = 0;
 for ($i=0; $i<$scheme->qPos; $i++)
	if(strlen($mark[$i]) > $maxlength)
		$maxlength = strlen($mark[$i]);
	if ($maxlength < 3)	{//отображать горизонтально
	$heightMarkPos = $cellSize;//высота маркировки положений
	$angle = 0;
	$deltax = 0;
}
	else{//отображать вертикально
	$heightMarkPos = $cellSize + ($maxlength - 2)*$cellSize / 3;//высота маркировки положений
	$angle = 90;
	$deltax = 0.6 * $cellSize;
 }
//Запись массива перемычек
  $jump = array();//массив перемычек
 $index = 0;
	for ($n=0; $n<$scheme->qJump; $n++){ //n - номер перемычки
		$jump[0][$n] = (int) getWordJump($scheme->jump);//номер первого контакта перемычки
		$jump[1][$n] = (int) getWordJump($scheme->jump);//номер первого контакта перемычки
	}
$maxNTrace=0;
//определение ширины первого столбца в зависимости от топологии перемычек	
if(!$withoutJump) require_once "widthfirstcol.php";

$widthFirstCol = $cellSize*4+2*($maxNTrace-1)*$cellSize/3;
  $canvaScheme = imageCreate($cellSize*12+$widthFirstCol+2, ($heightTxt+$heightMarkPos)+$cellSize*$numCont+2);
  $color = imageColorAllocate($canvaScheme, 220, 230, 240);//цвет фона канвы
//Вывод таблицы
$color = imageColorAllocate($canvaScheme, 0, 0, 200);//цвет линий
imageSetThickness($canvaScheme, 2);//толщина линий
 imageLine($canvaScheme, 0, 0, 12*$cellSize+$widthFirstCol, 0, $color);//верхняя граница
 imageLine($canvaScheme, $widthFirstCol, $heightTxt, 12*$cellSize+$widthFirstCol, $heightTxt, $color);//вторая горизонтальная линия
 imageLine($canvaScheme, 0, $heightTxt+$heightMarkPos, 12*$cellSize+$widthFirstCol, $heightTxt+$heightMarkPos, $color);//третья горизонтальная линия
 imageLine($canvaScheme, $widthFirstCol, 0, $widthFirstCol, $heightTxt+$heightMarkPos+$numCont*$cellSize, $color);//вторая вертикальная линия
 imageLine($canvaScheme, 0, 0, 0, $heightTxt+$heightMarkPos+$numCont*$cellSize, $color);//левая граница
 imageLine($canvaScheme, 12*$cellSize+$widthFirstCol, 0, 12*$cellSize+$widthFirstCol, $heightTxt+$heightMarkPos+$numCont*$cellSize, $color);//правая граница
 imageLine($canvaScheme, 0, $heightTxt+$heightMarkPos+$numCont*$cellSize, 12*$cellSize+$widthFirstCol, $heightTxt+$heightMarkPos+$numCont*$cellSize, $color);//нижняя граница
 $color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет линий
 imageSetThickness($canvaScheme, 1);//толщина линий
 
  for ($i=0; $i<$numPos; $i++){//вывод вертикальных линий
   imageLine($canvaScheme, $widthFirstCol+($i+1)*$cellSize, $heightTxt, $widthFirstCol+($i+1)*$cellSize, $heightTxt+$heightMarkPos+$numCont*$cellSize, $color);
   $color = imageColorAllocate($canvaScheme, 0, 0, 0);
   //Вывод маркировки положений
   if ($scheme->presMark == 1)
   imageTtfText($canvaScheme, $cellSize/2.5, $angle, $widthFirstCol+$cellSize/8+$cellSize*$i+$deltax, $heightMarkPos+$cellSize*1.2, $color, "../../fonts/arial.ttf", $mark[$i]);
   
} 
   //imageTtfText($canvaScheme, $cellSize/2.5, 0, 30, 30, $color, "../../fonts/arial.ttf", $maxlength);
 
  for ($j=0; $j<$numCont; $j++) {//вывод горизонтальных линий
   imageLine($canvaScheme, 0, $heightTxt+$heightMarkPos+$j*$cellSize, $numPos*$cellSize+$widthFirstCol, $heightTxt+$heightMarkPos+$j*$cellSize, $color);
//Вывод окружностей контактов   
   imageArc($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+$j*$cellSize+$cellSize/2, $cellSize/4 , $cellSize/4, 0, 360, $color);
   imageArc($canvaScheme, $widthFirstCol/2+$cellSize/3, $heightTxt+$heightMarkPos+$j*$cellSize+$cellSize/2, $cellSize/4 , $cellSize/4, 0, 360, $color);
   imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3+$cellSize/8, $heightTxt+$heightMarkPos+$j*$cellSize+$cellSize/2-$cellSize/15,
   $widthFirstCol/2+$cellSize/3-$cellSize/15, $heightTxt+$heightMarkPos+$j*$cellSize+$cellSize/2-$cellSize/3, $color); 
//Вывод нумерации контактов
   $color = imageColorAllocate($canvaScheme, 0, 0, 0);
   imageTtfText($canvaScheme, $cellSize/2.5, 0, $cellSize/8, $heightTxt+$heightMarkPos+$cellSize*0.7+$cellSize*$j, $color, "../../fonts/arial.ttf", 2*$j+1);
   imageTtfText($canvaScheme, $cellSize/2.5, 0, $widthFirstCol-$cellSize*0.7, $heightTxt+$heightMarkPos+$cellSize*0.7+$cellSize*$j, $color, "../../fonts/arial.ttf", 2*$j+2);

 }
//Вывод текста "Маркировка положений ручки"
$color = imageColorAllocate($canvaScheme, 0, 0, 0);
imageTtfText($canvaScheme, $cellSize/2, 0, $widthFirstCol+$cellSize/6, $heightTxt-$cellSize/2, $color, "../../fonts/arial.ttf", "Маркировка положений ручки");
imageTtfText($canvaScheme, $cellSize/2.4, 0, $widthFirstCol/2-$cellSize*1.5, $heightTxt+$heightMarkPos-$cellSize, $color, "../../fonts/arial.ttf", "Нумерация");
imageTtfText($canvaScheme, $cellSize/2.4, 0, $widthFirstCol/2-$cellSize*1.5, $heightTxt+$heightMarkPos-$cellSize/3, $color, "../../fonts/arial.ttf", "контактов");


//Вывод линии 
function outLine($x1, $y1 ,$x2, $y2) {
	global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $i, $j;
	imageSetThickness($canvaScheme, $cellSize/10);//толщина линий
	imageLine($canvaScheme, $x1*$cellSize/10+$widthFirstCol+$i*$cellSize, $y1*$cellSize/10+$heightTxt+$heightMarkPos+$j*$cellSize,
	$x2*$cellSize/10+$widthFirstCol+$i*$cellSize, $y2*$cellSize/10+$heightTxt+$heightMarkPos+$j*$cellSize, $color); 
}

//Вывод замыкающих положений
 for ($j=0; $j<$numCont; $j++)
   for ($i=0; $i<$numPos; $i++)
   {
     if ($scheme->closDiag[$j*$numPos+$i] == "x") outCross(); 
     if ($scheme->closDiag[$j*$numPos+$i] == "a") outOverlapLeft();
     if ($scheme->closDiag[$j*$numPos+$i] == "b") outOverlapRight();
     if ($scheme->closDiag[$j*$numPos+$i] == "c") outOverlapBoth();
     if ($scheme->closDiag[$j*$numPos+$i] == "h") outPulseRight();
     if ($scheme->closDiag[$j*$numPos+$i] == "g") outPulseLeft(); 
     if ($scheme->closDiag[$j*$numPos+$i] == "u") outCrossRight(); 
     if ($scheme->closDiag[$j*$numPos+$i] == "v") outCrossLeft();
     if ($scheme->closDiag[$j*$numPos+$i] == "w") outHorLine(); 
   }
   
//$i=0; $j=0;
//Вывод креста Х
function outCross(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет линий

outLine(2, 2, 8, 8);
outLine(2, 8 ,8, 2);
}
//outCross();
//Вывод креста с правой чертой Х-
function outCrossRight(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет линий

outLine(2, 2 ,8, 8);
outLine(2, 8 ,8, 2);
outLine(7, 5 ,10, 5);
}
//$i=1; $j=1; outCrossRight();
//Вывод креста с левой чертой -Х
function outCrossLeft(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет линий

outLine(2, 2 ,8, 8);
outLine(2, 8 ,8, 2);
outLine(0, 5 ,3, 5);
}
//$i=2; $j=2; outCrossLeft();
//Вывод горизонтальной линии ---
function outHorLine(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет линий

outLine(0, 5 ,10, 5);
}
//$i=3; $j=3; outHorLine();
//Вывод перекрытия вправо Х_
function outOverlapRight(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 100, 0);//цвет линий
outLine(2, 2 ,8, 8);
outLine(2, 8 ,8, 2);
outLine(8, 2 ,10, 2);
}
//$i=4; $j=4; outOverlapRight();
//Вывод перекрытия влево _Х
function outOverlapLeft(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 100, 0);//цвет линий
outLine(2, 2 ,8, 8);
outLine(2, 8 ,8, 2);
outLine(0, 2 ,2, 2);
}
//$i=5; $j=5; outOverlapLeft();
//Вывод перекрытия влево и вправо _Х_
function outOverlapBoth(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 100, 0);//цвет линий
outLine(2, 2 ,8, 8);
outLine(2, 8 ,8, 2);
outLine(0, 2 ,2, 2);
outLine(8, 2 ,10, 2);
}
//$i=6; $j=6; outOverlapBoth();
//Вывод импульса  вправо <
function outPulseRight(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 200);//цвет линий
outLine(0, 5, 3, 2);
outLine(0, 5 ,3, 8);
}
//$i=7; $j=7; outPulseRight();
//Вывод импульса  влево >
function outPulseLeft(){
global $canvaScheme, $color;
$color = imageColorAllocate($canvaScheme, 0, 0, 200);//цвет линий
outLine(7, 2, 10, 5);
outLine(7, 8 ,10, 5);
}

if($withoutJump) goto outimg;//если в имени Х - то без перемычек
//Вывод перемычек

//Обнуление массивов трасс перемычек
	for ($nContGr=0; $nContGr<$numCont; $nContGr++){ //$nContGr - номер контактной группы
		$jumpCenter[$nContGr] = 0;
		for ($nTrace=0; $nTrace<$numCont/2; $nTrace++){ //nTrace - номер трассы перемычки
			$jumpLeft[$nTrace][$nContGr] = 0;
			$jumpRight[$nTrace][$nContGr] = 0;
		}
	}

$maxNTrace=0;//максимальный номер вертикальной трассы перемычки	
 $color = imageColorAllocate($canvaScheme, 200, 0, 0);//цвет линий		
for ($n=0; $n<$numJump; $n++){
	if(($jump[1][$n]-$jump[0][$n]==2)&&($jump[0][$n]%2==1)) {inLeftJump($jump[0][$n]); goto nextJmp;}//вывод левой внутренней перемычки
	if(($jump[1][$n]-$jump[0][$n]==2)&&($jump[0][$n]%2==0)) {inRightJump($jump[0][$n]); goto nextJmp;}//вывод правой внутренней перемычки
	if(($jump[0][$n]%2==1)&&($jump[1][$n]%2==1)) {outLeftJump($jump[0][$n], $jump[1][$n]); goto nextJmp;}//вывод левой внешней перемычки
	if(($jump[0][$n]%2==0)&&($jump[1][$n]%2==0)) {outRightJump($jump[0][$n], $jump[1][$n]); goto nextJmp;}//вывод правой внешней перемычки
	if(($jump[0][$n]%2==1)&&($jump[1][$n]%2==0)) {outLeftRightJump($jump[0][$n], $jump[1][$n]); goto nextJmp;}//вывод лево-правой внешней перемычки
	if(($jump[0][$n]%2==0)&&($jump[1][$n]%2==1)) {outRightLeftJump($jump[0][$n], $jump[1][$n]); goto nextJmp;}//вывод право-левой внешней перемычки
nextJmp:;	
	}
//Вывод левой внутренней перемычки	
function inLeftJump($n1){// n1 - номер первого контакта перемычки
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos;
	if(($n1-1)%4 == 0) $color = imageColorAllocate($canvaScheme, 0, 0, 255);//цвет внутренней перемычки синий
else $color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/8,
	$widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+((($n1-1)/2)+1)*$cellSize+$cellSize/2-$cellSize/8, $color);
}
//Вывод правой внутренней перемычки	
function inRightJump($n1){// n1 - номер первого контакта перемычки
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos;
	if(($n1-2)%4 == 0) $color = imageColorAllocate($canvaScheme, 0, 0, 255);//цвет внутренней перемычки синий
else $color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2+$cellSize/8,
	$widthFirstCol/2+$cellSize/3, $heightTxt+$heightMarkPos+((($n1-2)/2)+1)*$cellSize+$cellSize/2-$cellSize/8, $color);
}
//Вывод левой внешней перемычки
function outLeftJump($n1, $n2){//n1, n2 - номера контактов перемычки
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $numCont, $maxNTrace;
$color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
//определение ближайщей доступной трассы
	for($nextTraceLeft=0; $nextTraceLeft < $numCont/2; $nextTraceLeft++){//$nextTraceLeft - номер трассы левой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-1)/2; $nContGr<($n2-1)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpLeft[$nextTraceLeft][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceLeft=$nextTraceLeft+1;//номер левой вертикальной трассы;
	if ($nextTraceLeft > $maxNTrace) $maxNTrace = $nextTraceLeft;//определение максимального номера вертикальной трассы
//Вывод верхней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3-$cellSize/8, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2-$cellSize/3-$nTraceLeft*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2, $color);
//Вывод нижней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3-$cellSize/8, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2-$cellSize/3-$nTraceLeft*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+$cellSize/2, $color);
//Вывод вертикальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3-$nTraceLeft*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2-$cellSize/3-$nTraceLeft*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+$cellSize/2, $color);
	
//Запись маркеров занятости трассы	
		for($nContGr=($n1-1)/2; $nContGr<($n2-1)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpLeft[$nextTraceLeft][$nContGr] = 1;
}

//Вывод правой внешней перемычки	
function outRightJump($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
$color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Вывод верхней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$cellSize/8, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2, $color);
//Вывод нижней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$cellSize/8, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2, $color);
//Вывод вертикальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2, $color);
	
//Запись маркеров занятости трассы	
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
}
//Вывод лево-правой внешней перемычки
function outLeftRightJump($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
$color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2+1; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Вывод короткой вертикальной линии
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/8,
$widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/3, $color);	
//Вывод верхней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/3,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/3, $color);
//Вывод нижней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$cellSize/8, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2, $color);
//Вывод длинной вертикальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-1)/2)*$cellSize+$cellSize/2+$cellSize/3,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-2)/2)*$cellSize+$cellSize/2, $color);
	
//Запись маркеров занятости трассы	
		for($nContGr=($n1-1)/2; $nContGr<($n2-2)/2+1; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
}
//Вывод право-левой внешней перемычки
function outRightLeftJump($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
$color = imageColorAllocate($canvaScheme, 255, 0, 0);//цвет внешней перемычки красный
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2+1; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-1)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Вывод верхней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$cellSize/8, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2, $color);
//Вывод нижней горизонтальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+0.85*$cellSize,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+0.85*$cellSize, $color);
//Вывод длинной вертикальной линии перемычки	
imageLine($canvaScheme, $widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n1-2)/2)*$cellSize+$cellSize/2,
	$widthFirstCol/2+$cellSize/3+$nTraceRight*$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+0.85*$cellSize, $color);
//Вывод короткой вертикальной линии перемычки
imageLine($canvaScheme, $widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+$cellSize/2+$cellSize/8,
	$widthFirstCol/2-$cellSize/3, $heightTxt+$heightMarkPos+(($n2-1)/2)*$cellSize+0.85*$cellSize, $color);	
//Запись маркеров занятости трассы	
		for($nContGr=($n1-2)/2; $nContGr<($n2-1)/2+1; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
 }
goto outimg;//вывод изображения
/*
notfound:;
//Если схема не найдена	

 $canvaScheme = imageCreate(600, 90);
  $color = imageColorAllocate($canvaScheme, 193, 223, 240);//цвет фона канвы
  
  $color = imageColorAllocate($canvaScheme, 200, 0, 0);//цвет линий
  //imageTtfText($canvaScheme, 0.8*$cellSize, 0, 0, 50, $color, "");
  $s = "      не найдена";
  imageTtfText($canvaScheme, 0.8*$cellSize, 0, 0, 45, $color, "../../fonts/arial.ttf", $s);
  imageTtfText($canvaScheme, $cellSize/2.5, 0, 30, 30, $color, "../../fonts/arial.ttf", $scheme->name);
  
 */ 
outimg: Header("Content-type: image/jpeg");
	
  imagegif($canvaScheme);//вывод изображения в браузер
  $a = $_SERVER["REMOTE_ADDR"]."/".$_GET[nposorder].".gif";
  //echo $a;
  imagegif($canvaScheme, $_SERVER["REMOTE_ADDR"]."/".$_GET[nposorder].".gif");//запись изображения в файл
  
  imageDestroy($canvaScheme);//уничтожение канвы
  
//imageTtfText($canvaScheme, $cellSize/2.5, 0, 30, 30, $color, "../../fonts/arial.ttf", $s);
  

?>
