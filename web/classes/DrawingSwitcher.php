<?php
//КЛАСС ЧЕРТЕЖА ОСНОВНОЙ ПРОЕКЦИИ ДЕТАЛЕЙ ПЕРЕКЛЮЧАТЕЛЯ
//require_once $_SERVER['DOCUMENT_ROOT']."/config.php";
class DrawingSwitcher extends ToolsDrawingSwitcher{
/*
public static $X0;//горизонтальная координата нулевой точки
public static $Y1;//вертикальная координата нулевой точки
public static $X;//горизонтальная координата базовой точки
public static $Y;//вертикальная координата базовой точки
public static $XMP;//горизонтальная координата  монтажной панели
*/
//МЕТОД ВЫЧЕРЧИВАНИЯ ОБЫЧНОЙ РУЧКИ
public function handle($PS, $PRPARGR){
$Handle = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Handle->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Line = new Line(array("x1"=>0,"y1"=>-5,"x2"=>0,"y2"=>22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>0,"y1"=>22,"x2"=>24,"y2"=>22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>24,"y1"=>-15,"x2"=>24,"y2"=>22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>24,"y1"=>-15,"x2"=>10,"y2"=>-15), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>10,"y1"=>-15,"x2"=>0,"y2"=>-5), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>21,"y1"=>-13,"x2"=>21,"y2"=>13), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>21,"y1"=>-13,"x2"=>24,"y2"=>-13), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>21,"y1"=>13,"x2"=>24,"y2"=>13), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>7,"y1"=>-2.5,"x2"=>24,"y2"=>-2.5,"type"=>"dotted","l"=>1,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>7,"y1"=>2.5,"x2"=>24,"y2"=>2.5,"type"=>"dotted","l"=>1,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>7,"y1"=>-2.5,"x2"=>7,"y2"=>2.5,"type"=>"dotted","l"=>1,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>24,"y1"=>-2.5,"x2"=>26,"y2"=>-2.5), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>24,"y1"=>2.5,"x2"=>26,"y2"=>2.5), $Handle->PRGR);$Handle->add($Line);
//размерные линии
$LineSize1= new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>24,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR); $Sizes->add($LineSize1);
$Line = new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$LineSize2= new LineSize(array("x1"=>7,"y1"=>Y1_SIZE_TOP,"x2"=>26,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR); $Sizes->add($LineSize2);
$Line = new Line(array("x1"=>7,"y1"=>-2.5,"x2"=>7,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>26,"y1"=>0,"x2"=>26,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Handle->add($Sizes);
Draw::$X += 26;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели
//echo "<pre>"; print_r ($Handle);echo "</pre>";
	}
	else{
//на 32А и больше
$Line = new Line(array("x1"=>0,"y1"=>-7,"x2"=>0,"y2"=>45), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>0,"y1"=>45,"x2"=>35,"y2"=>45), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>35,"y1"=>-24,"x2"=>35,"y2"=>45), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>35,"y1"=>-24,"x2"=>15,"y2"=>-24), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>15,"y1"=>-24,"x2"=>0,"y2"=>-7), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>32,"y1"=>-22,"x2"=>32,"y2"=>22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>32,"y1"=>-22,"x2"=>35,"y2"=>-22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>32,"y1"=>22,"x2"=>35,"y2"=>22), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>3.5,"y1"=>-3,"x2"=>35,"y2"=>-3,"type"=>"dotted","l"=>2,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>3.5,"y1"=>3,"x2"=>35,"y2"=>3,"type"=>"dotted","l"=>2,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>3.5,"y1"=>-3.5,"x2"=>3.5,"y2"=>3,"type"=>"dotted","l"=>1,"width" =>1), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>35,"y1"=>-3,"x2"=>38,"y2"=>-3), $Handle->PRGR);$Handle->add($Line);
$Line = new Line(array("x1"=>35,"y1"=>3,"x2"=>38,"y2"=>3), $Handle->PRGR);$Handle->add($Line);
//размерные линии
$LineSize1= new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>35,"y2"=>Y1_SIZE_BOTTOM_32), $Sizes->PRGR); $Sizes->add($LineSize1);
$Line = new Line(array("x1"=>0,"y1"=>35,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>35,"y1"=>24,"x2"=>35,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$LineSize2= new LineSize(array("x1"=>3.5,"y1"=>Y1_SIZE_TOP_32,"x2"=>38,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR); $Sizes->add($LineSize2);
$Line = new Line(array("x1"=>3.5,"y1"=>-3,"x2"=>3.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>38,"y1"=>0,"x2"=>38,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Handle->add($Sizes);

Draw::$X += 38;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели
	}
return 	$Handle;
}

//МЕТОД ВЫЧЕРЧИВАНИЯ ЖЕЛТО-КРАСНОЙ РУЧКИ
public function handleU($PS, $PRPARGR){
$HandleU = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleU->PRGR);
		if($PS["current"] < 30){
//на 25А и меньше

$Rect = new Rect(array("x1"=>0,"y1"=>-15,"x2"=>8,"y2"=>30), $HandleU->PRGR);$HandleU->add($Rect);
$Rect = new Rect(array("x1"=>8,"y1"=>-33,"x2"=>31,"y2"=>33), $HandleU->PRGR);$HandleU->add($Rect);
$Line = new Line(array("x1"=>28,"y1"=>-33,"x2"=>28,"y2"=>33), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>15,"y1"=>-30,"x2"=>28,"y2"=>-30,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>15,"y1"=>-26,"x2"=>28,"y2"=>-26,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>15,"y1"=>30,"x2"=>28,"y2"=>30,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>15,"y1"=>26,"x2"=>28,"y2"=>26,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Arc = new Arc(array("x"=>15,"y"=>-28,"d"=>4,"angle1"=>90,"angle2" =>-90,"width" =>2), $HandleU->PRGR);$HandleU->add($Arc);
$Arc = new Arc(array("x"=>15,"y"=>28,"d"=>4,"angle1"=>90,"angle2" =>-90,"width" =>2), $HandleU->PRGR);$HandleU->add($Arc);
$Line = new Line(array("x1"=>12,"y1"=>-2.5,"x2"=>31,"y2"=>-2.5,"type" =>"dotted","width" =>2,"l"=>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>12,"y1"=>2.5,"x2"=>31,"y2"=>2.5,"type" =>"dotted","width" =>2,"l"=>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>12,"y1"=>-2.5,"x2"=>12,"y2"=>2.5,"type" =>"dotted","width" =>2,"l"=>1), $HandleU->PRGR);$HandleU->add($Line);

//размерные линии

$LineSize1= new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>31,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR); $Sizes->add($LineSize1);
$Line = new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>31,"y1"=>0,"x2"=>31,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$LineSize2= new LineSize(array("x1"=>12,"y1"=>Y1_SIZE_TOP,"x2"=>31,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR); $Sizes->add($LineSize2);
$Line = new Line(array("x1"=>12,"y1"=>-2.5,"x2"=>12,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>31,"y1"=>24,"x2"=>31,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$HandleU->add($Sizes);
Draw::$X += 31;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели

	}
	else{
//на 32А и больше
$Rect = new Rect(array("x1"=>0,"y1"=>-21,"x2"=>14,"y2"=>48), $HandleU->PRGR);$HandleU->add($Rect);
$Rect = new Rect(array("x1"=>14,"y1"=>-53,"x2"=>42,"y2"=>53), $HandleU->PRGR);$HandleU->add($Rect);
$Line = new Line(array("x1"=>38,"y1"=>-53,"x2"=>38,"y2"=>53), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>28,"y1"=>-47,"x2"=>38,"y2"=>-47,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>28,"y1"=>-43,"x2"=>38,"y2"=>-43,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>28,"y1"=>47,"x2"=>38,"y2"=>47,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>28,"y1"=>43,"x2"=>38,"y2"=>43,"width" =>2), $HandleU->PRGR);$HandleU->add($Line);
$Arc = new Arc(array("x"=>28,"y"=>-45,"d"=>4,"angle1"=>90,"angle2" =>-90,"width" =>2), $HandleU->PRGR);$HandleU->add($Arc);
$Arc = new Arc(array("x"=>28,"y"=>45,"d"=>4,"angle1"=>90,"angle2" =>-90,"width" =>2), $HandleU->PRGR);$HandleU->add($Arc);
$Line = new Line(array("x1"=>7.5,"y1"=>-3,"x2"=>42,"y2"=>-3,"type" =>"dotted","width" =>2,"l"=>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>7.5,"y1"=>3,"x2"=>42,"y2"=>3,"type" =>"dotted","width" =>2,"l"=>2), $HandleU->PRGR);$HandleU->add($Line);
$Line = new Line(array("x1"=>7.5,"y1"=>-3,"x2"=>7.5,"y2"=>3,"type" =>"dotted","width" =>2,"l"=>1), $HandleU->PRGR);$HandleU->add($Line);

//размерные линии
$LineSize1= new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>42,"y2"=>Y1_SIZE_BOTTOM_32), $Sizes->PRGR); $Sizes->add($LineSize1);
$Line = new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>42,"y1"=>0,"x2"=>42,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$LineSize2= new LineSize(array("x1"=>7.5,"y1"=>Y1_SIZE_TOP_32,"x2"=>42,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR); $Sizes->add($LineSize2);
$Line = new Line(array("x1"=>7.5,"y1"=>-2.5,"x2"=>7.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$Line = new Line(array("x1"=>42,"y1"=>24,"x2"=>42,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR);$Sizes->add($Line);
$HandleU->add($Sizes);

Draw::$X += 42;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели	
	}
return 	$HandleU;	
}

//МЕТОД ВЫЧЕРЧИВАНИЯ  РУЧКИ С КЛЮЧЕМ
public function handleK($PS, $PRPARGR){
$HandleK = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleK->PRGR);
$HandleK->add(new Arc(array("x"=>9.5,"y"=>0,"d"=>18,"angle1"=>28,"angle2" =>-28), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>5,"y"=>0,"d"=>4.5,"angle1"=>0,"angle2" =>360,"width" =>2), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>17.5,"y1"=>-4,"x2"=>21,"y2"=>-4), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>17.5,"y1"=>4,"x2"=>21,"y2"=>4), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>24.5,"y1"=>-19,"x2"=>24.5,"y2"=>19), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>24.5,"y1"=>-19,"x2"=>32.5,"y2"=>-19), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>24.5,"y1"=>19,"x2"=>32.5,"y2"=>19), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>32.5,"y1"=>-22.5,"x2"=>32.5,"y2"=>22.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>34.5,"y1"=>-22.5,"x2"=>34.5,"y2"=>22.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>55.5,"y1"=>-29.5,"x2"=>55.5,"y2"=>22.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>32.5,"y1"=>22.5,"x2"=>55.5,"y2"=>22.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>32.5,"y1"=>-22.5,"x2"=>45.5,"y2"=>-22.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>45.5,"y1"=>-29.5,"x2"=>45.5,"y2"=>0), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>45.5,"y1"=>-29.5,"x2"=>55.5,"y2"=>-29.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>45.5,"y1"=>-13.5,"x2"=>55.5,"y2"=>-13.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>45.5,"y1"=>0,"x2"=>55.5,"y2"=>0), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>21,"y1"=>-6.5,"x2"=>21,"y2"=>6.5), $HandleK->PRGR));
$HandleK->add(new Line(array("x1"=>22.5,"y1"=>-11,"x2"=>22.5,"y2"=>11), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>23,"y"=>-6.5,"d"=>4,"angle1"=>-180,"angle2" =>-110), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>23,"y"=>6.5,"d"=>4,"angle1"=>110,"angle2" =>180), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>24.5,"y"=>-11,"d"=>4,"angle1"=>-180,"angle2" =>-90), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>24.5,"y"=>11,"d"=>4,"angle1"=>90,"angle2" =>180), $HandleK->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0.5,"y1"=>Y1_SIZE_TOP,"x2"=>22.5,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0.5,"y1"=>0,"x2"=>0.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>22.5,"y1"=>0,"x2"=>22.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$LineSize2 = new LineSize(array("x1"=>22.5,"y1"=>Y1_SIZE_TOP,"x2"=>32.5,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR); $Sizes->add($LineSize2);
$Sizes->add(new Line(array("x1"=>32.5,"y1"=>0,"x2"=>32.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new LineSize(array("x1"=>34.5,"y1"=>Y1_SIZE_BOTTOM,"x2"=>55.5,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>34.5,"y1"=>0,"x2"=>34.5,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>55.5,"y1"=>0,"x2"=>55.5,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$HandleK->add($Sizes);
Draw::$X += 55.5;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели
return 	$HandleK;
}
//МЕТОД ВЫЧЕРЧИВАНИЯ  РУЧКИ С КЛЮЧЕМ В КОРОБКЕ
public function handleKP($PS, $PRPARGR){
$HandleKP = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleKP->PRGR);
$HandleKP->add(new Arc(array("x"=>9.5,"y"=>0,"d"=>18,"angle1"=>28,"angle2" =>-28), $HandleKP->PRGR));
$HandleKP->add(new Arc(array("x"=>5,"y"=>0,"d"=>4.5,"angle1"=>0,"angle2" =>360,"width" =>2), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>17.5,"y1"=>-4,"x2"=>21,"y2"=>-4), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>17.5,"y1"=>4,"x2"=>21,"y2"=>4), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>24.5,"y1"=>-19,"x2"=>24.5,"y2"=>19), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>24.5,"y1"=>-19,"x2"=>32.5,"y2"=>-19), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>24.5,"y1"=>19,"x2"=>32.5,"y2"=>19), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>32.5,"y1"=>-22.5,"x2"=>32.5,"y2"=>22.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>34.5,"y1"=>-22.5,"x2"=>34.5,"y2"=>22.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>55.5,"y1"=>-29.5,"x2"=>55.5,"y2"=>22.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>32.5,"y1"=>22.5,"x2"=>55.5,"y2"=>22.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>32.5,"y1"=>-22.5,"x2"=>45.5,"y2"=>-22.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>45.5,"y1"=>-29.5,"x2"=>45.5,"y2"=>0), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>45.5,"y1"=>-29.5,"x2"=>55.5,"y2"=>-29.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>45.5,"y1"=>-13.5,"x2"=>55.5,"y2"=>-13.5), $HandleKP->PRGR));
//$HandleKP->add(new Line(array("x1"=>45.5,"y1"=>0,"x2"=>55.5,"y2"=>0), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>21,"y1"=>-6.5,"x2"=>21,"y2"=>6.5), $HandleKP->PRGR));
$HandleKP->add(new Line(array("x1"=>22.5,"y1"=>-11,"x2"=>22.5,"y2"=>11), $HandleKP->PRGR));
$HandleKP->add(new Arc(array("x"=>23,"y"=>-6.5,"d"=>4,"angle1"=>-180,"angle2" =>-110), $HandleKP->PRGR));
$HandleKP->add(new Arc(array("x"=>23,"y"=>6.5,"d"=>4,"angle1"=>110,"angle2" =>180), $HandleKP->PRGR));
$HandleKP->add(new Arc(array("x"=>24.5,"y"=>-11,"d"=>4,"angle1"=>-180,"angle2" =>-90), $HandleKP->PRGR));
$HandleKP->add(new Arc(array("x"=>24.5,"y"=>11,"d"=>4,"angle1"=>90,"angle2" =>180), $HandleKP->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0.5,"y1"=>Y1_SIZE_TOP,"x2"=>22.5,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0.5,"y1"=>0,"x2"=>0.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>22.5,"y1"=>0,"x2"=>22.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$LineSize2 = new LineSize(array("x1"=>22.5,"y1"=>Y1_SIZE_TOP,"x2"=>32.5,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR); $Sizes->add($LineSize2);
$Sizes->add(new Line(array("x1"=>32.5,"y1"=>0,"x2"=>32.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
//$Sizes->add(new LineSize(array("x1"=>34.5,"y1"=>Y1_SIZE_BOTTOM,"x2"=>55.5,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
//$Sizes->add(new Line(array("x1"=>34.5,"y1"=>0,"x2"=>34.5,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
//$Sizes->add(new Line(array("x1"=>55.5,"y1"=>0,"x2"=>55.5,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$HandleKP->add($Sizes);
Draw::$X += 32.5;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//горизонтальная координата  монтажной панели
return 	$HandleKP;
}

//МЕТОД ВЫЧЕРЧИВАНИЯ РУКОЯТКИ
public function handleT($PS, $PRPARGR){
$HandleT = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleT->PRGR);
if($PS["current"] < 300){
	//на 25А и меньше
$HandleT->add(new Arc(array("x"=>9,"y"=>55,"d"=>18,"angle1"=>-180,"angle2" =>180), $HandleT->PRGR));	
$HandleT->add(new Rect(array("x1"=>49,"y1"=>-7,"x2"=>54,"y2"=>7), $HandleT->PRGR));	
$HandleT->add(new Rect(array("x1"=>49,"y1"=>-16.5,"x2"=>46,"y2"=>16.5), $HandleT->PRGR));		
$HandleT->add(new Line(array("x1"=>49,"y1"=>-16.5,"x2"=>48,"y2"=>-19), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>48,"y1"=>-19,"x2"=>28,"y2"=>-11), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>46,"y1"=>7,"x2"=>38,"y2"=>7), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>28,"y1"=>-11,"x2"=>9.5,"y2"=>46), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>34,"y1"=>10,"x2"=>16,"y2"=>49), $HandleT->PRGR));
$HandleT->add(new Arc(array("x"=>38,"y"=>11,"d"=>8,"angle1"=>195,"angle2" =>-95), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>37,"y1"=>-2.5,"x2"=>56,"y2"=>-2.5,"type" =>"dotted","width" =>1,"l"=>2), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>37,"y1"=>2.5,"x2"=>56,"y2"=>2.5,"type" =>"dotted","width" =>1,"l"=>2), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>37,"y1"=>-2.5,"x2"=>37,"y2"=>2.5,"type" =>"dotted","width" =>1,"l"=>1), $HandleT->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM+30,"x2"=>56,"y2"=>Y1_SIZE_BOTTOM+30), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>56,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+30+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>56,"y1"=>24,"x2"=>56,"y2"=>Y1_SIZE_BOTTOM+30+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new LineSize(array("x1"=>37,"y1"=>Y1_SIZE_TOP,"x2"=>56,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>37,"y1"=>-2.5,"x2"=>37,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>56,"y1"=>24,"x2"=>56,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$HandleT->add($Sizes);	
Draw::$X += 56;//увеличение горизонтальной координаты базовой точки
Draw::$XMP = Draw::$X;//увеличение горизонтальной координаты монтажной панели	
	}
	else{
//на 32А и больше
	}
return 	$HandleT;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ТАБЛИЧКИ
public function board($PS, $PRPARGR){
$Board = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Board->PRGR);

	if($PS["current"] < 30){
	//на 25А и меньше
$Line1 = new Line(array("x1"=>0,"y1"=>-24,"x2"=>0,"y2"=>24), $Board->PRGR);	$Board->add($Line1);
$Line2 = new Line(array("x1"=>8,"y1"=>-24,"x2"=>8,"y2"=>24), $Board->PRGR);$Board->add($Line2);	
$Line3 = new Line(array("x1"=>0,"y1"=>-24,"x2"=>8,"y2"=>-24), $Board->PRGR);$Board->add($Line3);
$Line4 = new Line(array("x1"=>0,"y1"=>24,"x2"=>8,"y2"=>24), $Board->PRGR);$Board->add($Line4);
$Board->add($Line1->rounding($Line1, $Line3, 1, $Board->PRGR)); 
$Board->add($Line1->rounding($Line1, $Line4, 1, $Board->PRGR)); 
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP,"x2"=>8,"y2"=>Y1_SIZE_TOP,"offset"=>1.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Board->add($Sizes);
Draw::$X += 8;//увеличение горизонтальной координаты базовой точки
Draw::$XMP += 8;//увеличение горизонтальной координаты монтажной панели
	}
	else{
//на 32А и больше

$Line1 = new Line(array("x1"=>0,"y1"=>-47,"x2"=>0,"y2"=>47), $Board->PRGR);	$Board->add($Line1);
$Line2 = new Line(array("x1"=>11,"y1"=>-47,"x2"=>11,"y2"=>47), $Board->PRGR);$Board->add($Line2);	
$Line3 = new Line(array("x1"=>0,"y1"=>-47,"x2"=>11,"y2"=>-47), $Board->PRGR);$Board->add($Line3);
$Line4 = new Line(array("x1"=>0,"y1"=>47,"x2"=>11,"y2"=>47), $Board->PRGR);$Board->add($Line4);
$Board->add($Line1->rounding($Line1, $Line3, 1, $Board->PRGR)); 
$Board->add($Line1->rounding($Line1, $Line4, 1, $Board->PRGR)); 
//размерные линии

$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP_32,"x2"=>11,"y2"=>Y1_SIZE_TOP_32,"offset"=>0.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>11,"y1"=>0,"x2"=>11,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Board->add($Sizes);

Draw::$X += 11;//увеличение горизонтальной координаты базовой точки
Draw::$XMP += 11;//увеличение горизонтальной координаты монтажной панели	
	}
return $Board; 
}
//МЕТОД ВЫЧЕРЧИВАНИЯ СКОБЫ КРЕПЛЕНИЯ ТАБЛИЧКИ ДЛЯ ИСПОЛНЕНИЙ O, L
public function adapter($PS, $PRPARGR){
$Adapter = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Adapter->PRGR);
	if($PS["current"] < 30){
	//на 25А и меньше
$Adapter->add(new Line(array("x1"=>14,"y1"=>-7.5,"x2"=>14,"y2"=>7.5), $Adapter->PRGR));	
$Adapter->add(new Line(array("x1"=>0,"y1"=>-7.5,"x2"=>15,"y2"=>-7.5), $Adapter->PRGR));
$Adapter->add(new Line(array("x1"=>0,"y1"=>7.5,"x2"=>15,"y2"=>7.5), $Adapter->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>15,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>15,"y1"=>0,"x2"=>15,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Adapter->add($Sizes);
Draw::$X += 15;//увеличение горизонтальной координаты базовой точки
	}
	else{
//на 32А и больше
$Adapter->add(new Line(array("x1"=>9,"y1"=>-7.5,"x2"=>9,"y2"=>7.5), $Adapter->PRGR));	
$Adapter->add(new Line(array("x1"=>0,"y1"=>-7.5,"x2"=>10,"y2"=>-7.5), $Adapter->PRGR));
$Adapter->add(new Line(array("x1"=>0,"y1"=>7.5,"x2"=>10,"y2"=>7.5), $Adapter->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>10,"y2"=>Y1_SIZE_BOTTOM_32), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>10,"y1"=>0,"x2"=>10,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Adapter->add($Sizes);
Draw::$X += 10;//увеличение горизонтальной координаты базовой точки	
	}
return $Adapter;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ КОРОБКИ
public function box($PS, $PRPARGR){
$Box = new Group(array("x0"=>Draw::$X, "name"=>"box"), $PRPARGR);
$Lib = new Lib();
$nameBox = "box".$PS["box"]."F";
$Box->add($Lib->$nameBox($Box->PRGR, $PS["pg"]));
if($PS["box"][6] == 4) Draw::$X += 90;//увеличение горизонтальной координаты базовой точки
if($PS["box"][6] == 5 || $PS["box"][6] == 6) Draw::$X += 110;//увеличение горизонтальной координаты базовой точки
if($PS["box"][6] == 7) Draw::$X += 130;//увеличение горизонтальной координаты базовой точки
//echo "<pre>";print_r($Box);echo "</pre>";exit;
return $Box;
}
//МЕТОД ВЫЧЕРЧИВАНИЯ БЛОКИРУЕМОЙ РУЧКИ
public function block_handle($PS, $PRPARGR){
$Block_handle = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Block_handle->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше

$Block_handle->add(new Rect(array("x1"=>0,"y1"=>-24,"x2"=>5.5,"y2"=>24), $Block_handle->PRGR));		
$Block_handle->add(new Rect(array("x1"=>5.5,"y1"=>-12,"x2"=>45,"y2"=>12), $Block_handle->PRGR));	
$Block_handle->add(new Rect(array("x1"=>5.5,"y1"=>-3,"x2"=>25.5,"y2"=>3), $Block_handle->PRGR));	
$Block_handle->add(new Rect(array("x1"=>5.5,"y1"=>-19,"x2"=>25.5,"y2"=>-12), $Block_handle->PRGR));		
$Block_handle->add(new Rect(array("x1"=>5.5,"y1"=>18,"x2"=>25.5,"y2"=>12), $Block_handle->PRGR));

$Block_handle->add(new Line(array("x1"=>35.5,"y1"=>-2.5,"x2"=>55.5,"y2"=>-2.5,"type" =>"dotted","width" =>1,"l"=>2), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>35.5,"y1"=>2.5,"x2"=>55.5,"y2"=>2.5,"type" =>"dotted","width" =>1,"l"=>2), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>35.5,"y1"=>-2.5,"x2"=>35.5,"y2"=>2.5,"type" =>"dotted","width" =>1,"l"=>1), $Block_handle->PRGR));
$Block_handle->add(new Rect(array("x1"=>40.5,"y1"=>-2.5,"x2"=>42,"y2"=>-4,"width" =>1), $Block_handle->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>45,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>45,"y1"=>0,"x2"=>45,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Block_handle->add($Sizes);
Draw::$X += 55.5;//увеличение горизонтальной координаты базовой точки
	}
	else{
//на 32А и больше
$Block_handle->add(new Rect(array("x1"=>0,"y1"=>-47,"x2"=>7.5,"y2"=>47), $Block_handle->PRGR));	
$Block_handle->add(new Rect(array("x1"=>7.5,"y1"=>-28,"x2"=>27.5,"y2"=>28), $Block_handle->PRGR));		
$Block_handle->add(new Rect(array("x1"=>27.5,"y1"=>-12.5,"x2"=>47.5,"y2"=>12.5), $Block_handle->PRGR));	
$Block_handle->add(new Line(array("x1"=>7.5,"y1"=>-4,"x2"=>27.5,"y2"=>-4), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>7.5,"y1"=>4,"x2"=>27.5,"y2"=>4), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>7.5,"y1"=>-20,"x2"=>27.5,"y2"=>-20), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>7.5,"y1"=>20,"x2"=>27.5,"y2"=>20), $Block_handle->PRGR));

$Block_handle->add(new Line(array("x1"=>37.5,"y1"=>-3,"x2"=>57.5,"y2"=>-3,"type" =>"dotted","width" =>1,"l"=>2), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>37.5,"y1"=>3,"x2"=>57.5,"y2"=>3,"type" =>"dotted","width" =>1,"l"=>2), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>37.5,"y1"=>-3,"x2"=>37.5,"y2"=>3,"type" =>"dotted","width" =>1,"l"=>1), $Block_handle->PRGR));
$Block_handle->add(new Rect(array("x1"=>42.5,"y1"=>-3,"x2"=>44,"y2"=>-5,"width" =>1), $Block_handle->PRGR));

//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>47.5,"y2"=>Y1_SIZE_BOTTOM_32), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>47.5,"y1"=>0,"x2"=>47.5,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Block_handle->add($Sizes);
Draw::$X += 57.5;//увеличение горизонтальной координаты базовой точки
	}
return $Block_handle;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ УПЛОТНИТЕЛЬНОГО БЛОКА
public function ip54($PS, $PRPARGR){
$Ip54 = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Ip54->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Ip54->add(new Rect(array("x1"=>0,"y1"=>-24,"x2"=>8,"y2"=>24), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>2,"y1"=>-24,"x2"=>2,"y2"=>24), $Ip54->PRGR));
	if($PS["board"] == 0 && $PS["handle"] != "ur" && $PS["handle"] != "ub"){
$Ip54->add(new Arc(array("x"=>4.5,"y"=>-18,"d"=>12,"angle1"=>140,"angle2" =>-140), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>4.5,"y"=>18,"d"=>12,"angle1"=>140,"angle2" =>-140), $Ip54->PRGR));
	}
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>8,"y2"=>Y1_SIZE_BOTTOM,"offset"=>1.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Ip54->add($Sizes);

Draw::$X += 8;//увеличение горизонтальной координаты базовой точки

	}
	else{
//на 32А и больше

$Ip54->add(new Rect(array("x1"=>0,"y1"=>-47,"x2"=>10,"y2"=>47), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>3,"y1"=>-47,"x2"=>3,"y2"=>47), $Ip54->PRGR));
	if($PS["board"] == 0 && $PS["handle"] != "ur" && $PS["handle"] != "ub"){
$Ip54->add(new Arc(array("x"=>4,"y"=>-37.5,"d"=>14,"angle1"=>130,"angle2" =>-130), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>4,"y"=>37.5,"d"=>14,"angle1"=>130,"angle2" =>-130), $Ip54->PRGR));
	}
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>10,"y2"=>Y1_SIZE_BOTTOM_32,"offset"=>1.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>10,"y1"=>0,"x2"=>10,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Ip54->add($Sizes);
Draw::$X += 10;//увеличение горизонтальной координаты базовой точки	
	}
return $Ip54;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ЗАДНЕЙ КРЫШКИ
public function back_cover($PS, $fix, $PRPARGR){
$Back_cover = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Back_cover->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше

$Back_cover->add(new Rect(array("x1"=>0,"y1"=>-21.5,"x2"=>8,"y2"=>21.5), $Back_cover->PRGR));
$Back_cover->add(new Line(array("x1"=>0,"y1"=>-17,"x2"=>8,"y2"=>-17), $Back_cover->PRGR));
$Back_cover->add(new Line(array("x1"=>0,"y1"=>17,"x2"=>8,"y2"=>17), $Back_cover->PRGR));
		if($fix == 'BOL'){
//для исполнений B, O, L
$Back_cover->add(new Arc(array("x"=>8,"y"=>-7,"d"=>8,"angle1"=>90,"angle2" =>-90), $Back_cover->PRGR));
$Back_cover->add(new Arc(array("x"=>8,"y"=>7,"d"=>8,"angle1"=>90,"angle2" =>-90), $Back_cover->PRGR));
//размерные линии последней галеты
$Sizes->add(new LineSize(array("x1"=>8,"y1"=>Y1_SIZE_TOP,"x2"=>21.5,"y2"=>Y1_SIZE_TOP,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>21.5,"y1"=>0,"x2"=>21.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);
	}
	else{
//для остальных исполнений

$Back_cover->add(new Arc(array("x"=>0,"y"=>-7,"d"=>8,"angle1"=>-90,"angle2" =>90), $Back_cover->PRGR));
$Back_cover->add(new Arc(array("x"=>0,"y"=>7,"d"=>8,"angle1"=>-90,"angle2" =>90), $Back_cover->PRGR));
//размерные линии последней галеты
$Sizes->add(new LineSize(array("x1"=>-13.5,"y1"=>Y1_SIZE_TOP,"x2"=>0,"y2"=>Y1_SIZE_TOP,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-13.5,"y1"=>0,"x2"=>-13.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));

//размерные линии нижней части переключателя
$x0 = Draw::$XMP - Draw::$X;
$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM,"x2"=>8,"y2"=>Y2_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y2_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));

//размерные линии ширины галеты
$Sizes->add(new LineSize(array("x1"=>17,"y1"=>-21.5,"x2"=>17,"y2"=>21.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>-21.5,"x2"=>20,"y2"=>-21.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>21.5,"x2"=>20,"y2"=>21.5), $Sizes->PRGR));
$Back_cover->add($Sizes);
	}
//размерные линии крышки
$Sizes->add(new LineSize(array("x1"=>-0,"y1"=>Y1_SIZE_TOP,"x2"=>8,"y2"=>Y1_SIZE_TOP,"offset"=>1.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);	
Draw::$X += 8;//увеличение горизонтальной координаты базовой точки
	}
	else if($PS["current"] < 80){
//на 32А и 63А

$Back_cover->add(new Rect(array("x1"=>0,"y1"=>-33,"x2"=>8.5,"y2"=>33), $Back_cover->PRGR));
$Back_cover->add(new Line(array("x1"=>0,"y1"=>-23,"x2"=>8.5,"y2"=>-23), $Back_cover->PRGR));
$Back_cover->add(new Line(array("x1"=>0,"y1"=>23,"x2"=>8.5,"y2"=>23), $Back_cover->PRGR));
		if($fix == 'BOL'){
//для исполнений B, O, L

$Back_cover->add(new Arc(array("x"=>8.5,"y"=>-10,"d"=>9,"angle1"=>90,"angle2" =>-90), $Back_cover->PRGR));
$Back_cover->add(new Arc(array("x"=>8.5,"y"=>10,"d"=>9,"angle1"=>90,"angle2" =>-90), $Back_cover->PRGR));
//размерные линии последней галеты
$Sizes->add(new LineSize(array("x1"=>8.5,"y1"=>Y1_SIZE_TOP_32,"x2"=>27,"y2"=>Y1_SIZE_TOP_32,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>0,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>27,"y1"=>0,"x2"=>27,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);
	}
	else{
//для остальных исполнений
$Back_cover->add(new Arc(array("x"=>0,"y"=>-10,"d"=>9,"angle1"=>-90,"angle2" =>90), $Back_cover->PRGR));
$Back_cover->add(new Arc(array("x"=>0,"y"=>10,"d"=>9,"angle1"=>-90,"angle2" =>90), $Back_cover->PRGR));
//размерные линии последней галеты
$Sizes->add(new LineSize(array("x1"=>-18.5,"y1"=>Y1_SIZE_TOP_32,"x2"=>0,"y2"=>Y1_SIZE_TOP_32,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-18.5,"y1"=>0,"x2"=>-18.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
//размерные линии нижней части переключателя
$x0 = Draw::$XMP - Draw::$X;
$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM_32,"x2"=>8.5,"y2"=>Y2_SIZE_BOTTOM_32), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>30,"x2"=>8.5,"y2"=>Y2_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));

//размерные линии ширины галеты
$Sizes->add(new LineSize(array("x1"=>20,"y1"=>-33,"x2"=>20,"y2"=>33), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>-33,"x2"=>23,"y2"=>-33), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>33,"x2"=>23,"y2"=>33), $Sizes->PRGR));

$Back_cover->add($Sizes);
	}
//размерные линии крышки
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP_32,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32,"offset"=>-0.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>0,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);	
Draw::$X += 8.5;//увеличение горизонтальной координаты базовой точки
	}
	else{
//на 100А и 160А
$Back_cover->add(new Rect(array("x1"=>0,"y1"=>-42.5,"x2"=>8.5,"y2"=>42.5), $Back_cover->PRGR));
		if($fix == 'BOL'){
//для исполнений B, O, L

//размерные линии последней галеты
$Sizes->add(new LineSize(array("x1"=>8.5,"y1"=>Y1_SIZE_TOP_32,"x2"=>29.5,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>0,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>29.5,"y1"=>0,"x2"=>29.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);
	}
	else{
//для остальных исполнений

//размерные линии последней галеты

$Sizes->add(new LineSize(array("x1"=>-21,"y1"=>Y1_SIZE_TOP_32,"x2"=>0,"y2"=>Y1_SIZE_TOP_32,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-21,"y1"=>0,"x2"=>-21,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
//размерные линии нижней части переключателя
$x0 = Draw::$XMP - Draw::$X;
$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM_32,"x2"=>8.5,"y2"=>Y2_SIZE_BOTTOM_32), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>30,"x2"=>8.5,"y2"=>Y2_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
//размерные линии ширины галеты
$Sizes->add(new LineSize(array("x1"=>20,"y1"=>-42.5,"x2"=>20,"y2"=>42.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>-42.5,"x2"=>23,"y2"=>-42.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>42.5,"x2"=>23,"y2"=>42.5), $Sizes->PRGR));
$Back_cover->add($Sizes);
	}
//размерные линии крышки
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP_32,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32,"offset"=>-0.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8.5,"y1"=>0,"x2"=>8.5,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Back_cover->add($Sizes);	
Draw::$X += 8.5;//увеличение горизонтальной координаты базовой точки	
	}
//echo Draw::$X;exit;
return $Back_cover;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ АРЕТАЦИОННОЙ КАМЕРЫ
public function camera($PS, $PRPARGR){
$Camera = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Camera->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Camera->add(new Rect(array("x1"=>0,"y1"=>-21.5,"x2"=>12,"y2"=>21.5), $Camera->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>12,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>12,"y1"=>0,"x2"=>12,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Camera->add($Sizes);
if($PS["fix"] == 'O' || $PS["fix"] == 'L' || $PS["fix"] == 'B'){
//размерные линии ширины галеты
$Sizes->add(new LineSize(array("x1"=>8,"y1"=>-21.5,"x2"=>8,"y2"=>21.5), $Sizes->PRGR));
$Camera->add($Sizes);
}
Draw::$X += 12;//увеличение горизонтальной координаты базовой точки
	}
	else{
//на 32А и больше
$Camera->add(new Rect(array("x1"=>0,"y1"=>-33,"x2"=>15.5,"y2"=>33), $Camera->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>-0,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>15.5,"y2"=>Y1_SIZE_BOTTOM_32,"offset"=>-2), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>15.5,"y1"=>0,"x2"=>15.5,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Camera->add($Sizes);
if($PS["fix"] == 'O' || $PS["fix"] == 'L' || $PS["fix"] == 'B'){
//размерные линии ширины галеты
$Sizes->add(new LineSize(array("x1"=>10,"y1"=>-33,"x2"=>10,"y2"=>33), $Sizes->PRGR));
$Camera->add($Sizes);
}

Draw::$X += 15.5;//увеличение горизонтальной координаты базовой точки	
	}
return $Camera;	
}
//Метод вычерчивания механизма самовозврата
public function moment($PS, $PRPARGR){
$Moment = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Moment->PRGR);
//на 25А и меньше
$Moment->add(new Rect(array("x1"=>0,"y1"=>-21.5,"x2"=>13,"y2"=>21.5), $Moment->PRGR));
//размерные линии
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_BOTTOM,"x2"=>13,"y2"=>Y1_SIZE_BOTTOM), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>13,"y1"=>0,"x2"=>13,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Moment->add($Sizes);

Draw::$X += 13;//увеличение горизонтальной координаты базовой точки
return $Moment;
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ГАЛЕТЫ
public function desc($PS, $PRPARGR){
$Desc = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Desc->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше

$Desc->add(new Rect(array("x1"=>0,"y1"=>-21.5,"x2"=>13.5,"y2"=>21.5), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>-7,"d"=>8,"angle1"=>-90,"angle2" =>90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>7,"d"=>8,"angle1"=>-90,"angle2" =>90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>13.5,"y"=>-7,"d"=>8,"angle1"=>90,"angle2" =>-90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>13.5,"y"=>7,"d"=>8,"angle1"=>90,"angle2" =>-90), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>0,"y1"=>-17,"x2"=>13.5,"y2"=>-17), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>0,"y1"=>17,"x2"=>13.5,"y2"=>17), $Desc->PRGR));

Draw::$X += 13.5;//увеличение горизонтальной координаты базовой точки
	}
	else if($PS["current"] < 80){
//на 32А и 63А
$Desc->add(new Rect(array("x1"=>0,"y1"=>-33,"x2"=>18.5,"y2"=>33), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>-10,"d"=>9,"angle1"=>-90,"angle2" =>90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>10,"d"=>9,"angle1"=>-90,"angle2" =>90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>18.5,"y"=>-10,"d"=>9,"angle1"=>90,"angle2" =>-90), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>18.5,"y"=>10,"d"=>9,"angle1"=>90,"angle2" =>-90), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>0,"y1"=>-23,"x2"=>18.5,"y2"=>-23), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>0,"y1"=>23,"x2"=>18.5,"y2"=>23), $Desc->PRGR));

Draw::$X += 18.5;//увеличение горизонтальной координаты базовой точки	
	}
	else{
//на 100А и 160А
$Desc->add(new Rect(array("x1"=>0,"y1"=>-42.5,"x2"=>21,"y2"=>42.5), $Desc->PRGR));
$Desc->add(new Rect(array("x1"=>8,"y1"=>-17,"x2"=>18,"y2"=>-7), $Desc->PRGR));
$Desc->add(new Rect(array("x1"=>8,"y1"=>17,"x2"=>18,"y2"=>7), $Desc->PRGR));

Draw::$X += 21;//увеличение горизонтальной координаты базовой точки	
	}
return $Desc;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ПЛАСТИНЫ КРЕПЛЕНИЯ НА МОНТАЖНУЮ ПАНЕЛЬ ДЛЯ ИСПОЛНЕНИЙ B, O
public function fix_mounting_panel($PS, $PRPARGR){
$Fix_mounting_panel = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Fix_mounting_panel->PRGR);	
	
	if($PS["current"] < 30){
//на 25А и меньше
	if($PS["handle"] == 't' && $PS["fix"] !='B') $offsetY = 30;
	else if($PS["handle"] == 't' && $PS["fix"] =='B' && $PS["current"] > 30) $offsetY = 20;
	else $offsetY = 0;
$Fix_mounting_panel->add(new Rect(array("x1"=>0,"y1"=>-24,"x2"=>5.5,"y2"=>24), $Fix_mounting_panel->PRGR));
//размерные линии 

$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP,"x2"=>5.5,"y2"=>Y1_SIZE_TOP,"offset"=>8), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>5.5,"y1"=>0,"x2"=>5.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));


Draw::$X += 5.5;//увеличение горизонтальной координаты базовой точки
$Fix_mounting_panel->x0 = Draw::$X;
//$Fix_mounting_panel->move(5.5,0);
//echo "<pre>";print_r($Fix_mounting_panel);echo "</pre>";exit;
//размерные линии горизонтального габарита переключателя
	if($PS["fix"] == 'O') {
		$x0 = Draw::$X0 - Draw::$X + 5.5;
		$text = '';
		}
	else {
		$x0 = Draw::$XMP - Draw::$X + 5.5;
		$text = "L ".$PS["length"];
		}
$Sizes->add(new Line(array("x1"=>5.5,"y1"=>24,"x2"=>5.5,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));

	if($PS["fix"] == 'O' && $PS["handle"] == 't') 	$Sizes->add(new Line(array("x1"=>$x0,"y1"=>57,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));
else $Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));

$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM+$offsetY,"x2"=>5.5,"y2"=>Y2_SIZE_BOTTOM+$offsetY, "text"=>$text), $Sizes->PRGR));
	}
	else{
//на 32А и больше
	if($PS["handle"] == 't' && $PS["fix"] !='B') $offsetY = 10;
	else if($PS["handle"] == 't' && $PS["fix"] =='B' && $current > 30) $offsetY = 10;
	else $offsetY = 0;
$Fix_mounting_panel->add(new Rect(array("x1"=>0,"y1"=>-47,"x2"=>8,"y2"=>47), $Fix_mounting_panel->PRGR));
//размерные линии 
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP_32,"x2"=>8,"y2"=>Y1_SIZE_TOP_32,"offset"=>1.5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>8,"y1"=>0,"x2"=>8,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));

Draw::$X += 8;//увеличение горизонтальной координаты базовой точки
//размерные линии горизонтального габарита переключателя
	if($PS["fix"] == 'O') {
		$x0 = Draw::$X0 - Draw::$X + 8;
		$text = '';
		}
	else {
		$x0 = Draw::$XMP - Draw::$X + 8;
		$text = "L ".$PS["length"];
		}
$Sizes->add(new Line(array("x1"=>8,"y1"=>47,"x2"=>8,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));
	if($PS["fix"] == 'O' && $PS["handle"] == 't') $Sizes->add(new Line(array("x1"=>$x0,"y1"=>57,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));		
	else $Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));	
		
$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM_32+$offsetY,"x2"=>8,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY, "text"=>$text), $Sizes->PRGR));
	}
$Fix_mounting_panel->add($Sizes);		
return $Fix_mounting_panel;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ МЕХАНИЗМА КРЕПЛЕНИЯ НА DIN-РЕЙКУ ДЛЯ ИСПОЛНЕНИЯ L
public function din($PS, $PRPARGR){
$Din = new Group(array("x0"=>Draw::$X), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Din->PRGR);

	if($PS["current"] < 30){
//на 25А и меньше
		if($PS["handle"] == 't') $offsetY = 30;
		else $offsetY = 0;
$Din->add(new Line(array("x1"=>0,"y1"=>-21,"x2"=>11,"y2"=>-21), $Din->PRGR));
$Din->add(new Line(array("x1"=>11,"y1"=>-21,"x2"=>11,"y2"=>-15), $Din->PRGR));
$Din->add(new Line(array("x1"=>11,"y1"=>-15,"x2"=>7.5,"y2"=>-15), $Din->PRGR));
$Din->add(new Line(array("x1"=>7.5,"y1"=>-15,"x2"=>7.5,"y2"=>-17), $Din->PRGR));
$Din->add(new Line(array("x1"=>7.5,"y1"=>-17,"x2"=>6,"y2"=>-17), $Din->PRGR));
$Din->add(new Line(array("x1"=>6,"y1"=>-17,"x2"=>6,"y2"=>17), $Din->PRGR));
$Din->add(new Line(array("x1"=>6,"y1"=>17,"x2"=>11,"y2"=>17), $Din->PRGR));
$Din->add(new Line(array("x1"=>11,"y1"=>17,"x2"=>11,"y2"=>29), $Din->PRGR));
$Din->add(new Line(array("x1"=>11,"y1"=>29,"x2"=>0,"y2"=>29), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>29,"x2"=>0,"y2"=>-21), $Din->PRGR));
$Din->add(new Rect(array("x1"=>7.5,"y1"=>17,"x2"=>9.5,"y2"=>15), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>21,"x2"=>8,"y2"=>29), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>-21,"x2"=>8,"y2"=>-28), $Din->PRGR));
$Din->add(new Line(array("x1"=>8,"y1"=>-28,"x2"=>8,"y2"=>-30), $Din->PRGR));
$Din->add(new Line(array("x1"=>8,"y1"=>-30,"x2"=>11,"y2"=>-30), $Din->PRGR));
$Din->add(new Line(array("x1"=>11,"y1"=>-30,"x2"=>11,"y2"=>-21), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>21,"x2"=>11,"y2"=>21), $Din->PRGR));

$Din->add($this->din_rail(array(), $Din->PRGR));//din-рейка
//размерные линии 
$Sizes->add(new LineSize(array("x1"=>0,"y1"=>Y1_SIZE_TOP,"x2"=>11,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>0,"x2"=>0,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>11,"y1"=>-30,"x2"=>11,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
	
Draw::$X += 11;//увеличение горизонтальной координаты базовой точки

//размерные линии горизонтального габарита переключателя
$Sizes->add(new Line(array("x1"=>11,"y1"=>30,"x2"=>11,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));	
$x0 = Draw::$X0 - Draw::$X + 11;
	if($PS["handle"] == 't') $Sizes->add(new Line(array("x1"=>$x0,"y1"=>57,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));	
	
	else $Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));	
	
$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM+$offsetY,"x2"=>11,"y2"=>Y2_SIZE_BOTTOM+$offsetY), $Sizes->PRGR));
	}
	else{
//на 32А и больше
		if($PS["handle"] == 't') $offsetY = 10;
		else $offsetY = 0;
$Din->add(new Line(array("x1"=>0,"y1"=>-26,"x2"=>8,"y2"=>-41), $Din->PRGR));
$Din->add(new Line(array("x1"=>8,"y1"=>-41,"x2"=>12,"y2"=>-41), $Din->PRGR));
$Din->add(new Line(array("x1"=>12,"y1"=>-41,"x2"=>12,"y2"=>-15), $Din->PRGR));
$Din->add(new Line(array("x1"=>12,"y1"=>-15,"x2"=>9,"y2"=>-15), $Din->PRGR));
$Din->add(new Line(array("x1"=>9,"y1"=>-15,"x2"=>9,"y2"=>-18), $Din->PRGR));
$Din->add(new Line(array("x1"=>9,"y1"=>-18,"x2"=>6,"y2"=>-18), $Din->PRGR));
$Din->add(new Line(array("x1"=>6,"y1"=>-18,"x2"=>6,"y2"=>18), $Din->PRGR));
$Din->add(new Line(array("x1"=>6,"y1"=>18,"x2"=>12,"y2"=>18), $Din->PRGR));
$Din->add(new Line(array("x1"=>12,"y1"=>18,"x2"=>12,"y2"=>40), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>33,"x2"=>12,"y2"=>33), $Din->PRGR));
$Din->add(new Line(array("x1"=>12,"y1"=>40,"x2"=>9,"y2"=>40), $Din->PRGR));
$Din->add(new Line(array("x1"=>9,"y1"=>40,"x2"=>4,"y2"=>33), $Din->PRGR));
$Din->add(new Rect(array("x1"=>9,"y1"=>18,"x2"=>11,"y2"=>16), $Din->PRGR));
$Din->add(new Line(array("x1"=>0,"y1"=>-33,"x2"=>4,"y2"=>-33), $Din->PRGR));

$Din->add($this->din_rail(array(), $Din->PRGR));

Draw::$X += 12;//увеличение горизонтальной координаты базовой точки

//размерные линии горизонтального габарита переключателя
$Sizes->add(new Line(array("x1"=>12,"y1"=>30,"x2"=>12,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));
$x0 = Draw::$X0 - Draw::$X + 12;
	if($PS["handle"] == 't') $Sizes->add(new Line(array("x1"=>$x0,"y1"=>57,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));	
	
else $Sizes->add(new Line(array("x1"=>$x0,"y1"=>0,"x2"=>$x0,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY+Y_OUT_SIZE), $Sizes->PRGR));

$Sizes->add(new LineSize(array("x1"=>$x0,"y1"=>Y2_SIZE_BOTTOM_32+$offsetY,"x2"=>12,"y2"=>Y2_SIZE_BOTTOM_32+$offsetY), $Sizes->PRGR));	
	}
$Din->add($Sizes);	
return $Din;	
}
public function din_rail($PRGR, $PRPARGR){
$Din_rail = new Group($PRGR, $PRPARGR);

//Вычерчивание din-рейки

$Din_rail->add(new Line(array("x1"=>6,"y1"=>17.5,"x2"=>7,"y2"=>17.5), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>7,"y1"=>17.5,"x2"=>7,"y2"=>14), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>8,"y1"=>13,"x2"=>19,"y2"=>13), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>8,"y1"=>12,"x2"=>19,"y2"=>12), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>21,"y1"=>11,"x2"=>21,"y2"=>-11), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>20,"y1"=>11,"x2"=>20,"y2"=>-11), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>6,"y1"=>-17.5,"x2"=>7,"y2"=>-17.5), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>7,"y1"=>-17.5,"x2"=>7,"y2"=>-14), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>8,"y1"=>-13,"x2"=>19,"y2"=>-13), $Din_rail->PRGR));
$Din_rail->add(new Line(array("x1"=>8,"y1"=>-12,"x2"=>19,"y2"=>-12), $Din_rail->PRGR));
$Din_rail->add(new Arc(array("x"=>8,"y"=>-14,"d"=>4,"angle1"=>90,"angle2" =>180), $Din_rail->PRGR));	
$Din_rail->add(new Arc(array("x"=>8,"y"=>-14,"d"=>2,"angle1"=>90,"angle2" =>180), $Din_rail->PRGR));	
$Din_rail->add(new Arc(array("x"=>8,"y"=>14,"d"=>4,"angle1"=>-180,"angle2" =>-90), $Din_rail->PRGR));	
$Din_rail->add(new Arc(array("x"=>8,"y"=>14,"d"=>2,"angle1"=>-180,"angle2" =>-90), $Din_rail->PRGR));	
$Din_rail->add(new Arc(array("x"=>19,"y"=>-11,"d"=>4,"angle1"=>-90,"angle2" =>0), $Din_rail->PRGR));	
$Din_rail->add(new Arc(array("x"=>19,"y"=>-11,"d"=>2,"angle1"=>-90,"angle2" =>0), $Din_rail->PRGR));
$Din_rail->add(new Arc(array("x"=>19,"y"=>11,"d"=>4,"angle1"=>0,"angle2" =>90), $Din_rail->PRGR));
$Din_rail->add(new Arc(array("x"=>19,"y"=>11,"d"=>2,"angle1"=>0,"angle2" =>90), $Din_rail->PRGR));
return $Din_rail;
	}


  }
?>