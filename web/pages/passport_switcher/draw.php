<?php
	function __autoload($class_name) {require_once "../../draw/".$class_name.".php"; }//автоподключение нужного класса
//Draw::$X0 = 0;
//Draw::$Y0 = 0;
$image = new Draw($Prop= array("w"=>1500,"h"=>1000));
//$image2 = new Draw();

 //Создание холста 
//$image->i = imageCreate(2000, 1500);
//imageColorAllocate($image->i, 240, 240, 240);


//$image2->i = imageCreate(2000, 1500);
//imagecolortransparent ($image2->i ,imageColorAllocate($image2->i, 245, 245, 245));

//$rect = new RectFilled($PropR = array("x1"=>100,"y1"=>100,"x2"=>400,"y2"=>400,"width"=>3, "r"=>0,"g"=>0,"b"=>255, "scale"=>1), $image);
//$rect->out();
/*
$color2 = imageColorAllocate($image2->i, 255, 0, 0);//цвет
imageRectangle($image2->i, 400, 400, 700, 700, $color2);
$image = imageCreateFromPng("../../images/raes.png");
  //Установка текстуры $image для изображения $im_1
  imageSetTile($image2->i, $image);
  //Заливка текстурой изображения $im_1
  imageFill($image2->i, 450, 450, IMG_COLOR_TILED);*/

//imagecopymerge ($image->i, $image2->i, 150, 200, 450, 450, 200, 200, 100);
$line1 = new Line($Prop= array("x1"=>10,"y1"=>10,"x2"=>30,"y2"=>30, "width"=>3, "r"=>0,"g"=>255,"b"=>0, "scale"=>3), $image);
$line1->out();
$rectArc1 = new RectArcFilled($PropR= array("type"=>"solid","x1"=>120,"y1"=>100,"x2"=>200,"y2"=>300,"rad"=>20,"width"=>3, "r"=>0,"g"=>100,"b"=>100, "scale"=>3), $image);
$rectArc1->rotate(100,100,-20);
$rectArc1->move(100,100);
$rectArc1->mirrorX(200);
$rectArc1->mirrorY(200);
$rectArc1->out();

 $arc0 = new ArcFilled($Prop= array("x"=>120,"y"=>140, "width"=>2, "d"=>60, "w"=>40, "angle1"=>0,"angle2"=>90,"r"=>255,"g"=>100,"b"=>0, "scale"=>4), $image);//создание объекта класса Line
$arc0->rotate(100,100,-20);
$arc0->move(100,100);
$arc0->mirrorX(200);
$arc0->mirrorY(200);
 $arc0->out();
 Header("Content-type: image/jpeg");
imageJpeg($image->i);
//imageDestroy($image->i);
 //$a=array(0); 
 /*$line1 = new Line($Prop= array("x1"=>10,"y1"=>10,"x2"=>30,"y2"=>30, "width"=>3, "r"=>0,"g"=>255,"b"=>0, "scale"=>3));//создание объекта класса Line
 $line2 = new Line($Prop= array("x1"=>20,"y1"=>50,"x2"=>30,"y2"=>30, "width"=>5, "r"=>0,"g"=>0,"b"=>255, "scale"=>3));//создание объекта класса Line
 $line3= new Line($Prop= array("x1"=>30,"y1"=>70,"x2"=>30,"y2"=>30, "width"=>7, "r"=>255,"g"=>0,"b"=>0, "scale"=>3));//создание объекта класса Line
 $line4 = new Line($Prop= array("x1"=>40,"y1"=>90,"x2"=>30,"y2"=>30, "width"=>9, "r"=>0,"g"=>255,"b"=>255, "scale"=>3));//создание объекта класса Line
 //$b=array(0); 
 $line5 = new Line($Prop= array("x1"=>210,"y1"=>210,"x2"=>130,"y2"=>130, "width"=>3, "r"=>255,"g"=>255,"b"=>0, "scale"=>3));//создание объекта класса Line
 $line6 = new Line($Prop= array("x1"=>120,"y1"=>150,"x2"=>130,"y2"=>130, "width"=>5, "r"=>0,"g"=>255,"b"=>255, "scale"=>3));//создание объекта класса Line
 $line7 = new Line($Prop= array("x1"=>130,"y1"=>170,"x2"=>130,"y2"=>130, "width"=>7, "r"=>0,"g"=>255,"b"=>0, "scale"=>3));//создание объекта класса Line
 $line8 = new Line($Prop= array("x1"=>140,"y1"=>190,"x2"=>130,"y2"=>130, "width"=>9, "r"=>255,"g"=>0,"b"=>255, "scale"=>3));//создание объекта класса Line
 $point0 = new Point($Prop= array("x"=>200,"y"=>200, "width"=>50, "r"=>255,"g"=>0,"b"=>0, "scale"=>3));//создание объекта класса Line
 $line0 = new Line($Prop= array("x1"=>100,"y1"=>100,"x2"=>200,"y2"=>200, "width"=>3, "r"=>0,"g"=>255,"b"=>255, "scale"=>2));//создание объекта класса Line
 $arc0 = new Arc($Prop= array("x"=>300,"y"=>300, "width"=>2, "d"=>30, "w"=>40, "angle1"=>0,"angle2"=>90,"r"=>0,"g"=>100,"b"=>0, "scale"=>2));//создание объекта класса Line

 $x = 370;
 $y = 370;
 $center = new Arc($Prop= array("x"=>$x,"y"=>$y, "width"=>2, "d"=>3, "w"=>40, "r"=>255,"g"=>0,"b"=>0, "scale"=>2));//создание объекта класса Line
		
	for($i=0; $i<6; $i++){
		$arc[$i] = clone $arc0;
		$arc[$i]->rotate($x, $y, $i* 20);
		$arc[$i]->out();
		}
	$block1 = new Group();
	$block1->add($line5);
	$block1->add($line6);
	$block1->add($line7);
	$block1->add($line8);
	$block1->rotate(100,100, 180);
	$block1->out();*/
	
	/*$rect1 = new Rect($PropR= array("x1"=>100,"y1"=>100,"x2"=>300,"y2"=>25,"width"=>3, "r"=>255,"g"=>0,"b"=>0, "scale"=>3));
	$rect1->move(30,60);
	$rect1->mirrorX(160);
	$rect1->out();*/
	
	//$rect2 = clone $rect1;/*
	//$rect2->move(20,50);
	//$rect2->rotate(110,100, 50);
	//$rect2->color(0,255, 0);
	//$rect2->out();*/
		/*$rectArc1 = new RectArc($PropR= array("x1"=>120,"y1"=>100,"x2"=>200,"y2"=>300,"rad"=>10,"width"=>3, "r"=>0,"g"=>100,"b"=>100, "scale"=>3));
	$rectArc0=clone $rectArc1;
	$rectArc0->color(255, 100,0);
	
	$rectArc1->rotate(150, 220, 80);
	//$rectArc1->move(50,50);
	$rectArc1->out();
	$rectArc0->out();
	$line11 = new Line($Prop= array("x1"=>100,"y1"=>100,"x2"=>200,"y2"=>200,"width"=>3, "r"=>255,"g"=>0,"b"=>0, "scale"=>3));
	$line12=clone $line11;
	$line11->mirrorY(220);
	$line11->out();
	$line12->color(0,255,0);
	$line12->out();*/

 /*$lineAxis = new LineAxis($Prop= array("x1"=>140,"y1"=>120,"x2"=>540,"y2"=>520, "width"=>3, "r"=>255,"g"=>0,"b"=>0, "scale"=>2));//создание объекта класса Line
$lineAxis->out();
 $lineDotted = new LineDotted($Prop= array("x1"=>100,"y1"=>200,"x2"=>200,"y2"=>100, "width"=>3, "r"=>0,"g"=>0,"b"=>255, "scale"=>3));//создание объекта класса Line
$lineDotted->out();
$rectArcDotted = new RectArcDotted($PropR= array("x1"=>100,"y1"=>100,"x2"=>300, "y2"=>250,"rad"=>10,"n"=>4,"l"=>6,"width"=>3,"rad"=>30, "r"=>255,"g"=>0,"b"=>0, "scale"=>3));
$rectArcDotted->rotate(200,200,-100);
$rectArcDotted->out();
$rect = new Rect($PropR= array("x1"=>110,"y1"=>110,"x2"=>310,"y2"=>15,"width"=>3, "r"=>0,"g"=>0,"b"=>255, "scale"=>3));
$rect->out();
//Draw::$r = 255;
//$Prop["r"]=255;
 $line1 = new Line($Prop= array("type"=>"axis","x1"=>300,"y1"=>300,"x2"=>10,"y2"=>10, "width"=>3, "b"=>0, "scale"=>3));//создание объекта класса Line
 $line1->out();
 $line2 = new Line($Prop= array("type"=>"axis","x1"=>30,"y1"=>30,"x2"=>330,"y2"=>260, "r"=>200,"width"=>3, "b"=>0, "scale"=>3));//создание объекта класса Line
 $line2->out();

 $line3 = new Line($Prop= array("type"=>"axis","x1"=>60,"y1"=>60,"x2"=>360,"y2"=>290, "width"=>3, "b"=>0, "scale"=>3));//создание объекта класса Line
  $line3->color(30,60,200);
 $line3->out();
 
 $rect1 = new Rect($PropR= array("tuype"=>"axis","x1"=>200,"y1"=>200,"x2"=>300,"y2"=>300,"width"=>3, "r"=>255,"g"=>0,"b"=>0, "scale"=>1));
 $rect2 = new Rect($PropR= array("tuype"=>"axis","x1"=>400,"y1"=>400,"x2"=>500,"y2"=>500,"width"=>3, "r"=>255,"g"=>0,"b"=>0, "scale"=>1));
	//$rect1->rotate(300,300,20);
	//$rect1->mirrorY(360);
	$rect1->out();
	$rect2->out();
 /*$line0 = new Line($Prop= array("type"=>"axis","x1"=>200,"y1"=>200,"x2"=>200,"y2"=>350, "width"=>3, "b"=>0, "scale"=>3));//создание объекта класса Line
 $arc0 = new Arc($Prop= array("x"=>200,"y"=>200, "width"=>2, "d"=>300, "w"=>40, "angle1"=>0,"angle2"=>360,"r"=>0,"g"=>100,"b"=>0, "scale"=>3));//создание объекта класса Line
$arc0->out();	
	for($i=0; $i<36; $i++){
		$line[$i] = clone $line0;
		$line[$i]->rotate(200, 200, $i* 10);
		$line[$i]->out();
		}*/
 //$point0 = new Point($Prop= array("x"=>250,"y"=>250, "r"=>0,"g"=>255,"b"=>0, "scale"=>1));//создание объекта класса Line
//Draw::$color = imageColorAllocate($this->image->i, 0, 0, 200);//цвет 
	/*for($x=150; $x<200; $x++){
		Draw::$color = imageColorAllocate($this->image->i, 255, 0, 0);//цвет
		for($y=50; $y<300; $y++){
			Draw::$color = imageColorAllocate($this->image->i, 255, 0, 0);//цвет
			imageSetPixel($this->image->i, $x, $y, Draw::$color);
			}
		}	
	//for($x=150; $x<200; $x++){
	$x1=100;
	$x2=300;
		Draw::$color = imageColorAllocate($this->image->i, 255, 0, 0);//цвет
		for($y1=50; $y1<250; $y1++){
			Draw::$color = imageColorAllocate($this->image->i, $y1, $y1, $y1);//цвет
			imageLine($this->image->i, $x1, $y1, $x2, $y1,Draw::$color);
			}
		//}*/
  

//echo Draw::$r;
 

 ?>