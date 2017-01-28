<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$propswitcher = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$name_switcher = mb_strtoupper(str_replace(" ", "+", $_GET['name_switcher']), "UTF-8");//перевод в верхний регистр;
$propswitch = $propswitcher->getPropSwitch($name_switcher);	
$dy = 40;
$y0 = 20;
define("DY", 33);//шаг по вертикали для строк
define("D0", 20);//вертикальная координата первой строки
define("X1", 0);//горизонтальная координата начала первого столбца
define("X2", 850);//горизонтальная координата начала второго столбца
 //Создание холста 
$i = imageCreate(950, 800);
$color = imageColorAllocate($i, 255, 255, 255);
ImageColorTransparent($i , $color);//создание прозрачного фона
  //imageFilledRectangle($i, 0, 0, imageSX($i), imageSY($i), $color);
$y = D0;
text1 ('Номинальное рабочее напряжение, В, не более');                              text2 ($propswitch[operating_voltage]);
text1 ('Электрическая прочность изоляции, В, не менее');                            text2 ('2500');
text1 ('Сопротивление изоляции, МОм, не менее');                             		text2 ('50');
text1 ('Сопротивление контактов на стадии поставки, Ом, не более');                 text2 ('0,5');
text1 ('Номинальный переменный ток для активной и слабоиндуктивной'); 				text2 ('');
text1 ('нагрузки, А, не более'); 													text2 ($propswitch[current]);
text1 ('Номинальный переменный ток для асинхронных однофазных электродвигателей '); text2 ('');
text1 ('(220-240В) при запуске / отключении по ходу, А, не более');                 text2 ($propswitch[motor_current_1_phase_220V][$propswitch[current]]);
text1 ('Номинальный переменный ток для асинхронных трехфазных электродвигателей');  text2 ('');
text1 ('(220-240В) при запуске / отключении по ходу, А, не более');          		text2 ($propswitch[motor_current_3_phase_220V][$propswitch[current]]);
text1 ('Номинальный переменный ток для асинхронных трехфазных электродвигателей');  text2 ('');
text1 ('(380-400В) при запуске / отключении по ходу, А, не более');          		text2 ($propswitch[motor_current_3_phase_380V][$propswitch[current]]);
text1 ('Номинальный переменный ток для асинхронных трехфазных электродвигателей');  text2 ('');
text1 ('(500В) при запуске / отключении по ходу, А, не более');          			text2 ($propswitch[motor_current_3_phase_500V][$propswitch[current]]);
	if($propswitch[current] == '10'){
text1 ('Номинальный постоянный ток (6В), А, не более');          					text2 ($propswitch[DC_6V][$propswitch[current]]);
	}
text1 ('Номинальный постоянный ток (24В), А, не более');          					text2 ($propswitch[DC_24V][$propswitch[current]]);
text1 ('Номинальный постоянный ток (48В), А, не более');          					text2 ($propswitch[DC_48V][$propswitch[current]]);
text1 ('Номинальный постоянный ток (110В), А, не более');          					text2 ($propswitch[DC_110V][$propswitch[current]]);
text1 ('Номинальный постоянный ток (220В) при активной нагрузке, А, не более');     text2 ($propswitch[DC_220V_resistive_load][$propswitch[current]]);
text1 ('Номинальный постоянный ток (220В) для электродвигателей, А, не более');     text2 ($propswitch[DC_220V_electric_motors][$propswitch[current]]);
text1 ('Номинальный кратковременный ток (<1c), А, не более');          				text2 ($propswitch[short_time_current][$propswitch[current]]);
text1 ('Износостойкость механическая, переключений, не менее');          			text2 ($propswitch[mechanical_wear_resistance][$propswitch[current]]);
text1 ('Износостойкость при максимальной нагрузке, переключений, не менее');        text2 ($propswitch[wear_resistance_at_maximum_load][$propswitch[current]]);
text1 ('Сечение подключаемых проводников, кв. мм.');         						text2 ($propswitch[wire_size][$propswitch[current]]);

Header("Content-type: image/jpeg");
  
  imageJpeg($i, '../../images/passport/'.$name_switcher.'_technical_characteristics.jpg');
  imageJpeg($i);
  imageDestroy($i);

 
//Вывод текста левого столбца
function text1 ($text){
global $i, $color, $y;
$color = imageColorAllocate($i, 0, 0, 0);//черный цвет
imageTtfText($i, 17, 0, X1, $y, $color, "../../fonts/arial.ttf", $text);
 
}
//Вывод текста правого столбца
function text2 ($text){
global $i, $color, $y;
$color = imageColorAllocate($i, 0, 0, 0);//черный цвет
imageTtfText($i, 17, 0, X2, $y, $color, "../../fonts/arial.ttf", $text);
$y += DY;//увеличение вертикальной координаты для следующей строки  
}


 ?>