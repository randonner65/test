<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$orderswitcher = new OrderSwitchers();//создание объекта класса ClassOrderSwitchers

$angle=$orderswitcher->read("angle");
$qPos=$orderswitcher->read("qpos");
$strMark = $orderswitcher->read("mark");
$arrMark = array();
$initPos = $_GET['initpos'];
if($initPos == "A") $firstPol = 1.5*M_PI;
else if($initPos == "B") $firstPol = M_PI;
else if($initPos == "C") $firstPol = 1.5*M_PI - 2*M_PI/$angle * floor($qPos/2);
else if($initPos == "D") $firstPol = 1.5*M_PI-M_PI/$angle;
else if($initPos == "M") $firstPol = 1.5*M_PI;
else if($initPos == "V") $firstPol = 1.5*M_PI - 2*M_PI/$angle;
$canvaScheme = imageCreate(200, 200);
  $color = imageColorAllocate($canvaScheme, 255, 255, 255);//цвет фона канвы
  $color = imageColorAllocate($canvaScheme, 0, 0, 0);//цвет фона линий
//imageTtfText($canvaScheme, 10, 0, 10, 10, $color, "../../fonts/arial.ttf",  $strMark);
//Преобразование маркировки из строки в массив
if($orderswitcher->read("board") != 0){  
$index = 0;
	for($m=0; $m<$qPos; $m++){
		$arrMark[$m] = "";
		while ($strMark[$index] != "$") {
			$arrMark[$m] .= $strMark[$index];
			$index++;
			}
			$index++;
	}
}	
imageArc($canvaScheme, 100, 100, 60 , 60, 0, 360, $color);
imageSetThickness($canvaScheme, 2);//толщина линий
//Вывод стрелки
if($initPos == "C"){
imageLine($canvaScheme, 100+60*cos(1.5*M_PI), 100+60*sin(1.5*M_PI), 100+53*cos(1.5*M_PI+M_PI/40), 100+53*sin(1.5*M_PI+M_PI/40), $color);
imageLine($canvaScheme, 100+60*cos(1.5*M_PI), 100+60*sin(1.5*M_PI), 100+53*cos(1.5*M_PI-M_PI/40), 100+53*sin(1.5*M_PI-M_PI/40), $color);
}
else{
imageLine($canvaScheme, 100+60*cos($firstPol), 100+60*sin($firstPol), 100+53*cos($firstPol+M_PI/40), 100+53*sin($firstPol+M_PI/40), $color);
imageLine($canvaScheme, 100+60*cos($firstPol), 100+60*sin($firstPol), 100+53*cos($firstPol-M_PI/40), 100+53*sin($firstPol-M_PI/40), $color);
}
//Вывод напрвлений положений
for($a = 0; $a < $qPos; $a ++){//a - текущий угол
imageLine($canvaScheme, 100+40*cos($firstPol+$a*2*M_PI/$angle), 100+40*sin($firstPol+$a*2*M_PI/$angle), 100+60*cos($firstPol+$a*2*M_PI/$angle), 100+60*sin($firstPol+$a*2*M_PI/$angle), $color);
//Вывод маркировки
if($orderswitcher->read("board") != 0)
imageTtfText($canvaScheme, 12, 0, 100+80*cos($firstPol+$a*2*M_PI/$angle)-5, 100+80*sin($firstPol+$a*2*M_PI/$angle)+5, $color, "../../fonts/arial.ttf", $arrMark[$a]);
else
imageTtfText($canvaScheme, 12, 0, 100+80*cos($firstPol+$a*2*M_PI/$angle)-5, 100+80*sin($firstPol+$a*2*M_PI/$angle)+5, $color, "../../fonts/arial.ttf", $a+1);
}  
  
  
Header("Content-type: image/jpeg");
	
  imagegif($canvaScheme);
  imageDestroy($canvaScheme);
  
?>