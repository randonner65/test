<?php
define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("PSSSWORD","");
define("DB","switchers");
define("URL","http://kharkovrele18.local/");
define("URLHOST", $_SERVER['DOCUMENT_ROOT']);
//define("DOMEN","http://kharkovrele18.local/");

define("LENGTH_ARROW",5);//длина стрелки
define("ANGLE_ARROW",M_PI/18);//угол стрелки 30 градусов
define("MIN_LENGTH",11);//минимальная длина размерной линии для внутренних стрелок
define("OUT_LENGTH",7);//длина выступающей части размерной линии для внеших стрелок
define("SCALE",5);//масштабный коэффициент

//для 10 - 25 А
define("Y1_SIZE_BOTTOM", 40);//отступ снизу первой горизонтальной размерной линии от осевой линии
define("Y2_SIZE_BOTTOM", 50);//отступ снизу второй горизонтальной размерной линии от осевой линии
define("Y1_SIZE_TOP", -40);//отступ сверху первой горизонтальной размерной линии от осевой линии
define("Y2_SIZE_TOP", -50);//отступ сверху второй горизонтальной размерной линии от осевой линии
define("Y_OUT_SIZE", 3);//длина выступающей части выносной линии
//для 32 - 160 А
define("Y1_SIZE_BOTTOM_32", 60);//отступ снизу первой горизонтальной размерной линии от осевой линии
define("Y2_SIZE_BOTTOM_32", 70);//отступ снизу второй горизонтальной размерной линии от осевой линии
define("Y1_SIZE_TOP_32", -60);//отступ сверху первой горизонтальной размерной линии от осевой линии
define("Y2_SIZE_TOP_32", -70);//отступ сверху второй горизонтальной размерной линии от осевой линии
define("Y_OUT_SIZE_32", 3);//длина выступающей части выносной линии
?>