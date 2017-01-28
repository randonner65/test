<?php

//print_r(imagettfbbox (15, 0, "../../fonts/arial.ttf", "сссссссссс"));

 //Создание реального холста 
$i = imageCreate(1400, 900);
 $color = imageColorAllocate($i, 240, 240, 240);
  imageFilledRectangle($i, 0, 0, imageSX($i), imageSY($i), $color);

 //---------------------------------------------------------------------------------------------
 //ВЫЧЕРЧИВАНИЕ ЛЕВОЙ ПРОЕКЦИИ ПЕРЕКЛЮЧАТЕЛЯ
 //Вычерчивание осей
$color = imageColorAllocate($i, 0, 0, 0);//черный цвет
 imageLine($i, 0, 0, 100, 200, $color);
 for($k=0; $k<1000; $k+=3)
	for($l=0; $l<10; $l+=3)
	imageLine($i, 0, $k, 100*$l, $k, $color);
 for($k=0; $k<1000; $k+=3)
	for($l=0; $l<10; $l+=3)
	imageLine($i,  $k, 0, $k, 100*$l,  $color);
imageTtfText($i, 90, 0, 0, 90 ,$color,"../../fonts/arial.ttf", "44");

$a = imagettfbbox (90, 0, "../../fonts/arial.ttf", "44");
for($j=0; $j<8; $j++){
	if($a[$j] < 0)
		//$a[$j] = 0 - $a[$j];
		$a[$j] = 30 + $a[$j];
}	
imageTtfText($i, 25, 0, 0, 100 ,$color,"../../fonts/arial.ttf", $a[0]);
imageTtfText($i, 25, 0, 0, 150 ,$color,"../../fonts/arial.ttf", $a[1]);  
imageTtfText($i, 25, 0, 0, 200 ,$color,"../../fonts/arial.ttf", $a[2]);  
imageTtfText($i, 25, 0, 0, 250 ,$color,"../../fonts/arial.ttf", $a[3]);  
imageTtfText($i, 25, 0, 0, 300 ,$color,"../../fonts/arial.ttf", $a[4]);  
imageTtfText($i, 25, 0, 0, 350 ,$color,"../../fonts/arial.ttf", $a[5]);  
imageTtfText($i, 25, 0, 0, 400 ,$color,"../../fonts/arial.ttf", $a[6]);  
imageTtfText($i, 25, 0, 0, 450 ,$color,"../../fonts/arial.ttf", $a[7]);  
imagepolygon ($i, $a, 4, $color);

function center_text($text, $xCenter, $yCenter, $fieldSize, $sizeFont){
$a = imagettfbbox ($sizeFont, 0, "../../fonts/arial.ttf", $text);
$lengthText = abs($a[0] - $a[2]);//измерение длины текста
	if($lengthText > $fieldSize){//если текст не помещается в отведенном участке
		$k = $lengthText / $fieldSize;//коэффициент масштабирования (уменьшения)
		$sizeFont = $sizeFont / $k;
		$a = imagettfbbox ($sizeFont, 0, "../../fonts/arial.ttf", $text);
		$lengthText = abs($a[0] - $a[2]);//измерение длины текста
	}
		$r["xLeft"] = $xCenter - floor($lengthText / 2);
		$r["yLeft"] = $yCenter + floor($sizeFont / 2);
		$r["sizeFont"] = $sizeFont;
		return $r;
}
$x1 = 200;
$y1 = 180;
$x2 = 300;
$y2 = 200;
imagerectangle ($i, $x1, $y1, $x2, $y2, $color);

$text = "WWWWW";
$sizeFont = $y2 - $y1;
$r = center_text($text, ($x2+$x1)/2, ($y2+$y1)/2,($x2-$x1), $sizeFont);
imageTtfText($i, $r["sizeFont"], 0, $r["xLeft"], $r["yLeft"], $color,"../../fonts/arial.ttf", $text);
Header("Content-type: image/jpeg");
  imageJpeg($i);
  //imageJpeg(ToolsDrawingSwitcher::$i, '../../images/passport/'.$name.'.jpg');
  imageDestroy($i);

 


	

 ?>