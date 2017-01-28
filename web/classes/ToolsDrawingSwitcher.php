<?php
//КЛАСС ИНСТРУМЕНТОВ ЧЕРТЕЖА ПЕРЕКЛЮЧАТЕЛЯ
if(file_exists("../../config.php")) require_once "../../config.php";
else require_once "../config.php";
class ToolsDrawingSwitcher {

public static $i;//идентификатор изображения
public static $color;//цвет элементов изображения
public static $X0;//горизонтальная координата нулевой точки
public static $Y0;//вертикальная координата нулевой точки
public static $X;//горизонтальная координата базовой точки
public static $Y;//вертикальная координата базовой точки
public static $XMP;//горизонтальная координата  монтажной панели
public static $scale;//масштабный коэффициент



public function __construct(){
self::$scale=SCALE;
if(file_exists("../../fonts/arial.ttf"))$this->font = "../../fonts/arial.ttf";
else $this->font = "../fonts/arial.ttf";
	//if($x ==0){
  /*self::$i = imageCreate($x, 900);
  self::$color = imageColorAllocate(self::$i, 230, 230, 230);
  imageFilledRectangle(self::$i, 0, 0, imageSX(self::$i), imageSY(self::$i), self::$color);*/
	//}
}
public function __destruct(){

/*Header("Content-type: image/jpeg");
  imageJpeg(self::$i);
  imageDestroy(self::$i);*/
}


  //Вывод основной линии
public function line ($x1, $y1, $x2, $y2, $w=3){

imageSetThickness(self::$i, $w);//толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, self::$X+SCALE*$x2, self::$Y+SCALE*$y2, self::$color);
  }
  
 //Вывод прямоугольника
public function rectangle ($x1, $y1, $x2, $y2, $w=3){//$w - толщина линии

imageSetThickness(self::$i, $w);//$w - толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, self::$X+SCALE*$x1, self::$Y+SCALE*$y2, self::$color);
  	imageLine(self::$i, self::$X+SCALE*$x2, self::$Y+SCALE*$y1, self::$X+SCALE*$x2, self::$Y+SCALE*$y2, self::$color);
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, self::$X+SCALE*$x2, self::$Y+SCALE*$y1, self::$color);
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y2, self::$X+SCALE*$x2, self::$Y+SCALE*$y2, self::$color);
  }
 //Вывод прямоугольника со скругленными углами
public function rectangle_arc ($x1, $y1, $x2, $y2, $r, $w=3){//$r - радиус скругления, $w - толщина линии 

imageSetThickness(self::$i, $w);//толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*($y1+$r), self::$X+SCALE*$x1, self::$Y+SCALE*($y2-$r), self::$color);
  	imageLine(self::$i, self::$X+SCALE*$x2, self::$Y+SCALE*($y1+$r), self::$X+SCALE*$x2, self::$Y+SCALE*($y2-$r), self::$color);
  	imageLine(self::$i, self::$X+SCALE*($x1+$r), self::$Y+SCALE*$y1, self::$X+SCALE*($x2-$r), self::$Y+SCALE*$y1, self::$color);
  	imageLine(self::$i, self::$X+SCALE*($x1+$r), self::$Y+SCALE*$y2, self::$X+SCALE*($x2-$r), self::$Y+SCALE*$y2, self::$color);
	//$this->arc (self::$X+SCALE*($x1+$r), self::$Y+SCALE*($y1+$r), 2*$r, 180, -180);
	$this->arc ($x1+$r, $y1+$r, 2*$r, -180, -90);
	$this->arc ($x1+$r, $y2-$r, 2*$r, 90, -180);
	$this->arc ($x2-$r, $y1+$r, 2*$r, -90, 0);
	$this->arc ($x2-$r, $y2-$r, 2*$r, 0, 90);
  }
 //Вывод белого прямоугольника со скругленными углами
public function white_rectangle_arc ($x1, $y1, $x2, $y2, $r, $w=3){//$r - радиус скругления, $w - толщина линии 

imageSetThickness(self::$i, $w);//толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
  	imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*($y1+$r), self::$X+SCALE*$x1, self::$Y+SCALE*($y2-$r), self::$color);
  	imageLine(self::$i, self::$X+SCALE*$x2, self::$Y+SCALE*($y1+$r), self::$X+SCALE*$x2, self::$Y+SCALE*($y2-$r), self::$color);
  	imageLine(self::$i, self::$X+SCALE*($x1+$r), self::$Y+SCALE*$y1, self::$X+SCALE*($x2-$r), self::$Y+SCALE*$y1, self::$color);
  	imageLine(self::$i, self::$X+SCALE*($x1+$r), self::$Y+SCALE*$y2, self::$X+SCALE*($x2-$r), self::$Y+SCALE*$y2, self::$color);
	$this->arc (self::$X+SCALE*($x1+$r), self::$Y+SCALE*($y1+$r), 2*$r, 180, -180);
	$this->arc ($x1+$r, $y1+$r, 2*$r, -180, -90);
	$this->arc ($x1+$r, $y2-$r, 2*$r, 90, -180);
	$this->arc ($x2-$r, $y1+$r, 2*$r, -90, 0);
	$this->arc ($x2-$r, $y2-$r, 2*$r, 0, 90);
  }  
  //Вывод пунктирного прямоугольника
public function dotted_rectangle ($x1, $y1, $x2, $y2, $L = 5){//$L длина штриха
	$this->dotted_line ($x1, $y1, $x1, $y2, $L);
	$this->dotted_line ($x2, $y1, $x2, $y2, $L);
	$this->dotted_line ($x1, $y1, $x2, $y1, $L);
	$this->dotted_line ($x1, $y2, $x2, $y2, $L);
}
 //Вывод  пунктирного прямоугольника со скругленными углами
public function dotted_rectangle_arc ($x1, $y1, $x2, $y2, $r, $L = 3 ){//$r - радиус скругления, $w - толщина линии, $L длина штриха

imageSetThickness(self::$i, $w);//толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
  	$this->dotted_line ($x1, $y1+$r, $x1, $y2-$r, $L);
  	$this->dotted_line ($x2, $y1+$r,$x2, $y2-$r, $L);
  	$this->dotted_line ($x1+$r, $y1, $x2-$r, $y1, $L);
  	$this->dotted_line ($x1+$r, $y2, $x2-$r, $y2, $L);
	$this->arc (self::$X+SCALE*($x1+$r), self::$Y+SCALE*($y1+$r), 2*$r, 180, -180);
	$this->arc ($x1+$r, $y1+$r, 2*$r, -180, -90, 1);
	$this->arc ($x1+$r, $y2-$r, 2*$r, 90, -180, 1);
	$this->arc ($x2-$r, $y1+$r, 2*$r, -90, 0, 1);
	$this->arc ($x2-$r, $y2-$r, 2*$r, 0, 90, 1);
  }
  //Вывод белого прямоугольника
public function white_rectangle ($x1, $y1, $x2, $y2){
self::$color = imageColorAllocate(self::$i, 255, 255, 255);//белый цвет
imagefilledrectangle (self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, self::$X+SCALE*$x2, self::$Y+SCALE*$y2, self::$color);
}
  //Вывод белого четырехугольника
public function white_quadrangle ($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4){
self::$color = imageColorAllocate(self::$i, 255, 255, 255);//белый цвет
$quadrangle[0] = self::$X+SCALE*$x1;
$quadrangle[1] = self::$Y+SCALE*$y1;
$quadrangle[2] = self::$X+SCALE*$x2;
$quadrangle[3] = self::$Y+SCALE*$y2;
$quadrangle[4] = self::$X+SCALE*$x3;
$quadrangle[5] = self::$Y+SCALE*$y3;
$quadrangle[6] = self::$X+SCALE*$x4;
$quadrangle[7] = self::$Y+SCALE*$y4;
imagefilledpolygon (self::$i, $quadrangle, 4, self::$color);
} 
    //Вывод дуги окружности
public function arc ($x1, $y1, $d, $a1, $a2, $w=3){
imageSetThickness(self::$i, $w);//толщина линии
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
imageArc(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, SCALE*$d, SCALE*$d, $a1, $a2, self::$color);
  }
//Вывод белого сегмента окружности
public function white_arc ($x1, $y1, $d, $a1, $a2){
self::$color = imageColorAllocate(self::$i, 255, 255, 255);//белый цвет
 imagefilledarc (self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, SCALE*$d, SCALE*$d, $a1, $a2, self::$color, IMG_ARC_PIE); 
 } 
  //Вывод пунктирной линии
public function dotted_line ($x1, $y1, $x2, $y2, $L = 5){//$L длина штриха
imageSetThickness(self::$i, 1);//толщина линии 
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет

  $n = (int)(0.5* hypot($y2 - $y1, $x2 - $x1) / $L);//количество пунктиров
  if($n < 2) $space = 2;
  else $space = (hypot($y2 - $y1, $x2 - $x1) - $L*$n) / ($n-1);//длина пробела
  
  $angle = $this->angle ($x1, $y1, $x2, $y2);//угол наклона линии
  $xbegin = $x1;
  $ybegin = $y1;
  for($j = 0; $j < $n; $j++){
	$xend = $xbegin + $L * cos($angle);
	$yend = $ybegin + $L * sin($angle);
	imageLine(self::$i, self::$X+SCALE*$xbegin, self::$Y+SCALE*$ybegin, self::$X+SCALE*$xend, self::$Y+SCALE*$yend, self::$color);
	$xbegin = $xend + $space * cos($angle);
	$ybegin = $yend + $space * sin($angle);
	}
	//$xbegin = $xend + 0.5* ($x2 - $x1) / $n;
	//$ybegin = $yend + 0.5* ($y2 - $y1) / $n;
	//imageLine(self::$i, self::$X+SCALE*$xbegin, self::$Y+SCALE*$ybegin, self::$X+SCALE*$xend, self::$Y+SCALE*$yend, self::$color);
//imageTtfText(self::$i, 15, 0, 0, 820,self::$color,"../../fonts/arial.ttf", (int)(0.5*hypot($y2 - $y1, $x2 - $x1)/ $L));  

  }
   //Вывод осевой линии
public function axis_line ($x1, $y1, $x2, $y2, $L = 8, $l = 2, $space = 2){
imageSetThickness(self::$i, 1);//толщина линии 
self::$color = imageColorAllocate(self::$i, 255, 0, 0);//красный цвет
$angle = $this->angle ($x1, $y1, $x2, $y2);//угол наклона линии
  $n = (int)(hypot($y2 - $y1, $x2 - $x1) / ($L + $l + $space));//количество штрих-пунктиров
  $xbegin = $x1;
  $ybegin = $y1;
  for($j = 0; $j < $n; $j++){
  //вывод длинной черты
	$xend = $xbegin + $L * cos($angle);
	$yend = $ybegin + $L * sin($angle);
	imageLine(self::$i, self::$X+SCALE*$xbegin, self::$Y+SCALE*$ybegin, self::$X+SCALE*$xend, self::$Y+SCALE*$yend, self::$color);
	$xbegin = $xend + $space * cos($angle);
	$ybegin = $yend + $space * sin($angle);
  //вывод короткой черты
	$xend = $xbegin + $l * cos($angle);
	$yend = $ybegin + $l * sin($angle);
	imageLine(self::$i, self::$X+SCALE*$xbegin, self::$Y+SCALE*$ybegin, self::$X+SCALE*$xend, self::$Y+SCALE*$yend, self::$color);
	$xbegin = $xend + $space * cos($angle);
	$ybegin = $yend + $space * sin($angle);
	}
/*imageTtfText(self::$i, 15, 0, 100, 100,self::$color,"../../fonts/arial.ttf", $x1);	
imageTtfText(self::$i, 15, 0, 200, 100,self::$color,"../../fonts/arial.ttf", $y1);	
imageTtfText(self::$i, 15, 0, 100, 200,self::$color,"../../fonts/arial.ttf", self::$X);	
imageTtfText(self::$i, 15, 0, 200, 200,self::$color,"../../fonts/arial.ttf", self::$Y);	*/	
  } 
 //Вывол пунктирной окружности
public function dotted_circle ($x, $y, $d, $n=20){
imageSetThickness(self::$i, 1);//толщина линии 
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
 $angleBegin = 0;

 for($j = 0; $j < $n; $j++){
 $angleEnd = $angleBegin + 180 / $n;
 imageArc(self::$i, self::$X+$x, self::$Y+$y, SCALE*$d, SCALE*$d, $angleBegin, $angleEnd, self::$color);
 $angleBegin = $angleEnd + 180 / $n;
 }
}  
  //Вывод размерной линии
public function size_line ($x1, $y1, $x2, $y2, $text = '', $offset = 0){
imageSetThickness(self::$i, 1);//толщина линии 
self::$color = imageColorAllocate(self::$i, 0, 0, 0);//черный цвет
imageLine(self::$i, self::$X+SCALE*$x1, self::$Y+SCALE*$y1, self::$X+SCALE*$x2, self::$Y+SCALE*$y2, self::$color);//вывод размерной линии
$angle = $this->angle ($x1, $y1, $x2, $y2);//угол наклона линии
	if($x1 == $x2) $angleText = 90;
	else if($y1 == $y2) $angleText = 0;
		else $angleText = -180*$angle/M_PI;

	if($angleText == 0) {
	$xText = self::$X+SCALE*($offset-3+$x1+($x2-$x1)/2);
	$yText = self::$Y+SCALE*(-1.5+$y1);
	}
	else if($angleText == 90) {
	$xText = self::$X+SCALE*(-1+$x1);
	$yText = self::$Y+SCALE*($offset+3+$y1+($y2-$y1)/2);
	}
	else if($angleText > -90 && $angleText < 0) {
	$xText = self::$X+SCALE*($offset-1+2*cos($angle)+$x1+($x2-$x1)/2);
	$yText = self::$Y+SCALE*($offset-1-2*sin($angle)+$y1+($y2-$y1)/2);
	} 
	else{
	$xText = self::$X+SCALE*($offset-1-2*cos($angle)+$x1+($x2-$x1)/2);
	$yText = self::$Y+SCALE*(-$offset-1-2*sin($angle)+$y1+($y2-$y1)/2);
	}
	if($text == '') $text = (hypot($y2 - $y1, $x2 - $x1));
imageTtfText(self::$i, SCALE*4, $angleText, $xText, $yText,self::$color,$this->font, $text);

$length = hypot($y2 - $y1, $x2 - $x1);//длина размерной линии

 if($length > MIN_LENGTH){
 //вывод  внутренних стрелок
 $triangle = array();
 $triangle[0] = self::$X+SCALE*$x1;
 $triangle[1] = self::$Y+SCALE*$y1;
 if(($x2 >= $x1 && $y2 >= $y1) || ($x2 > $x1 && $y2 < $y1)) {
	$triangle[2] = self::$X+SCALE*($x1 + LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y1 + LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x1 + LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y1 + LENGTH_ARROW * sin($angle - ANGLE_ARROW));
//imageTtfText(self::$i, 15, $angleText, -2-13*cos($angle)+$x1+($x2-$x1)/2, -2-13*sin($angle)+$y1+($y2-$y1)/2,self::$color,"../../fonts/arial.ttf", $angleText);	
 }
	else {
	$triangle[2] = self::$X+SCALE*($x1 - LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y1 - LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x1 - LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y1 - LENGTH_ARROW * sin($angle - ANGLE_ARROW));
//imageTtfText(self::$i, 15, $angleText, -2-13*cos($angle)+$x1+($x2-$x1)/2, -2-13*sin($angle)+$y1+($y2-$y1)/2,self::$color,"../../fonts/arial.ttf", $angleText);	
 }

 imagefilledpolygon (self::$i, $triangle, 3, self::$color);
 
 $triangle[0] = self::$X+SCALE*$x2;
 $triangle[1] = self::$Y+SCALE*$y2;
 if(($x2 >= $x1 && $y2 >= $y1) || ($x2 > $x1 && $y2 < $y1)) {
	$triangle[2] = self::$X+SCALE*($x2 - LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y2 - LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x2 - LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y2 - LENGTH_ARROW * sin($angle - ANGLE_ARROW));
 }
	else {
	$triangle[2] = self::$X+SCALE*($x2 + LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y2 + LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x2 + LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y2 + LENGTH_ARROW * sin($angle - ANGLE_ARROW));
 }

 imagefilledpolygon (self::$i, $triangle, 3, self::$color);
 
 }
	else{
 //вывод  внешних стрелок
   $triangle = array();
 $triangle[0] = self::$X+SCALE*$x1;
 $triangle[1] = self::$Y+SCALE*$y1;
 if(($x2 >= $x1 && $y2 >= $y1) || ($x2 > $x1 && $y2 < $y1)) {
	$triangle[2] = self::$X+SCALE*($x1 - LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y1 - LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x1 - LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y1 - LENGTH_ARROW * sin($angle - ANGLE_ARROW));
	$x3 = self::$X+SCALE*($x1 - OUT_LENGTH * cos($angle));
	$x4 = self::$X+SCALE*($x2 + OUT_LENGTH * cos($angle));
	$y3 = self::$Y+SCALE*($y1 - OUT_LENGTH * sin($angle));
	$y4 = self::$Y+SCALE*($y2 + OUT_LENGTH * sin($angle));
//imageTtfText(self::$i, 15, $angleText, -2-13*cos($angle)+$x1+($x2-$x1)/2, -2-13*sin($angle)+$y1+($y2-$y1)/2,self::$color,"../../fonts/arial.ttf", $angleText);	
 }
	else {
	$triangle[2] = self::$X+SCALE*($x1 + LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y1 + LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x1 + LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y1 + LENGTH_ARROW * sin($angle - ANGLE_ARROW));
//imageTtfText(self::$i, 15, $angleText, -2-13*cos($angle)+$x1+($x2-$x1)/2, -2-13*sin($angle)+$y1+($y2-$y1)/2,self::$color,"../../fonts/arial.ttf", $angleText);	
 }
 imageLine(self::$i, $x3, $y3, $x4, $y4, self::$color);//вывод выступающей части размерной линии
 imagefilledpolygon (self::$i, $triangle, 3, self::$color);
 
 $triangle[0] = self::$X+SCALE*$x2;
 $triangle[1] = self::$Y+SCALE*$y2;
 if(($x2 >= $x1 && $y2 >= $y1) || ($x2 > $x1 && $y2 < $y1)) {
	$triangle[2] = self::$X+SCALE*($x2 + LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y2 + LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x2 + LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y2 + LENGTH_ARROW * sin($angle - ANGLE_ARROW));
 }
	else {
	$triangle[2] = self::$X+SCALE*($x2 - LENGTH_ARROW * cos($angle + ANGLE_ARROW));
	$triangle[3] = self::$Y+SCALE*($y2 - LENGTH_ARROW * sin($angle + ANGLE_ARROW));
	$triangle[4] = self::$X+SCALE*($x2 - LENGTH_ARROW * cos($angle - ANGLE_ARROW));
	$triangle[5] = self::$Y+SCALE*($y2 - LENGTH_ARROW * sin($angle - ANGLE_ARROW));
	$x3 = self::$X+SCALE*($x1 + OUT_LENGTH * cos($angle));
	$x4 = self::$X+SCALE*($x2 - OUT_LENGTH * cos($angle));
	$y3 = self::$Y+SCALE*($y1 + OUT_LENGTH * sin($angle));
	$y4 = self::$Y+SCALE*($y2 - OUT_LENGTH * sin($angle));
 }
 imageLine(self::$i, $x3, $y3, $x4, $y4, self::$color);//вывод выступающей части размерной линии
 imagefilledpolygon (self::$i, $triangle, 3, self::$color);
	
  }  
 } 
  
//Метод вычисления угла наклона линии   
 private function angle ($x1, $y1, $x2, $y2){
	if($x1 == $x2) return M_PI/2;
		else return atan(($y2 - $y1) / ($x2 - $x1));//угол наклона линии
	}
	
//Метод вывода маркировки положений ручки переключателя
	
public function mark_pos ($initPos, $angle, $qPos, $strMark, $r, $sizeFont, $fieldSize){
	if($strMark == "") return;//если маркировки нет
$arrMark = array();
if($initPos == "A") $firstPol = 1.5*M_PI;
else if($initPos == "B") $firstPol = M_PI;
else if($initPos == "C") $firstPol = 1.5*M_PI - 2*M_PI/$angle * floor($qPos/2);
else if($initPos == "D") $firstPol = 1.5*M_PI-M_PI/$angle;
else if($initPos == "M") $firstPol = 1.5*M_PI;
else if($initPos == "V") $firstPol = 1.5*M_PI - 2*M_PI/$angle;

  $color = imageColorAllocate(self::$i, 0, 0, 0);//цвет фона линий

//Преобразование маркировки из строки в массив
 
$index = 0;
	for($m=0; $m<$qPos; $m++){
		$arrMark[$m] = "";
		while ($strMark[$index] != "$" && $strMark[$index] != " ") {
			$arrMark[$m] .= $strMark[$index];
			$index++;
			}
			$index++;
	}
//imageTtfText(self::$i, 10, 0, 10, 10, $color, "../../fonts/arial.ttf",  $strMark[4]);	
//imageTtfText(self::$i, 10, 0, 10, 10, $color, "../../fonts/arial.ttf",  $firstPol);
//$r = $this->center_text($text, ($x2+$x1)/2, ($y2+$y1)/2,($x2-$x1)/2, $sizeFont);	
//Вывод маркировки
for($a = 0; $a < $qPos; $a ++){//a - номер текущего положения ручки
$centerText = $this->center_text($arrMark[$a], self::$X+SCALE*(-0.5+$r*cos($firstPol+$a*2*M_PI/$angle)), self::$Y+SCALE*($r*sin($firstPol+$a*2*M_PI/$angle)),SCALE*$fieldSize, $sizeFont);	

//imageTtfText(self::$i, $sizeFont, 0, self::$X+SCALE*(-2+$r*cos($firstPol+$a*2*M_PI/$angle)), self::$Y+SCALE*(2+$r*sin($firstPol+$a*2*M_PI/$angle)), $color, "../../fonts/arial.ttf", $arrMark[$a]);
//imageTtfText(self::$i, $sizeFont, 0, self::$X+SCALE*(-2+$r*cos($firstPol+$a*2*M_PI/$angle)), self::$Y+SCALE*(2+$r*sin($firstPol+$a*2*M_PI/$angle)), $color, "../../fonts/arial.ttf", $arrMark[$a]);

imageTtfText(self::$i, $centerText["sizeFont"], 0, $centerText["xLeft"], $centerText["yLeft"], $color, $this->font, $arrMark[$a]);
		}
	}
//Центровка текста
public function center_text($text, $xCenter, $yCenter, $fieldSize, $sizeFont){
$a = imagettfbbox ($sizeFont, 0, $this->font, $text);
$lengthText = abs($a[0] - $a[2]);//измерение длины текста
	if($lengthText > $fieldSize){//если текст не помещается в отведенном участке
		$k = $lengthText / $fieldSize;//коэффициент масштабирования (уменьшения)
		$sizeFont = $sizeFont / $k;
		$a = imagettfbbox ($sizeFont, 0, $this->font, $text);
		$lengthText = abs($a[0] - $a[2]);//измерение длины текста
		}
		$r["xLeft"] = $xCenter - floor($lengthText / 2);
		$r["yLeft"] = $yCenter + floor($sizeFont / 2);
		$r["sizeFont"] = $sizeFont;
		return $r;
	}


	

	
  }
?>