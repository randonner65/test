<?php
//function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
//require_once "../../config.php";
class PropertiesSwitcher extends Adatabase {
public $name;//имя(номер) схемы
public $qpos;//количество положений
public $qcont;//количество контактов
public $closdiag;//диаграмма замыканий
public $att;//атрибуты
public $pmark;//наличие маркировки
public $mark;//маркировка
public $qjump;//количество перемычек
public $jump;//номера контактов перемычек
public $nameswitch;
public $PropSwitch = array();
public function __construct() {
//session_start();

parent::__construct();
}
	
public function getPropSwitch($nameswitch = "S10JD2206A8"){
$PropSwitch = array();
$PropSwitch["syntaxerror"] = "";
$PropSwitch["syntaxerror2"] = "";
$PropSwitch["logicerror"] = "";
$PropSwitch["logicerror2"] = "";
$PropSwitch["warning"] = "";
$nameswitch = str_replace("%20", "", $nameswitch);//удаление пробелов
//echo $nameswitch;
$nameswitch =  mb_strtoupper($nameswitch, "UTF-8");//перевод в верхний регистр
//$originalcopynameswitch = $nameswitch;//сохранение исходного имени переключателя
$NameSwitch  = array();
//------------------------------------------------------------------------------------------------------------------------
//А Н А Л И З   С И Н Т А К С И Ч Е С К И Х    О Ш И Б О К    В   Н А И М Е Н О В А Н И И    П Е Р Е К Л Ю Ч А Т Е Л Я		
//------------------------------------------------------------------------------------------------------------------------
	if($nameswitch == "") {$PropSwitch["syntaxerror"] = "Вы не ввели наименование переключателя"; return $PropSwitch;}
	if($nameswitch[0] != "S") {$PropSwitch["syntaxerror"] = "первая буква должна быть S"; return $PropSwitch;}
$nameswitch = substr($nameswitch, 1);//обрезание первой буквы S
$NameSwitch["S"]  = array("value" => "S", "color" => "black");//запись S в массив имени переключателя
if(!$this->exsist($nameswitch, "J")) {$PropSwitch["syntaxerror"] = "отсутствует буква J"; return $PropSwitch;}
//Вырезание тока
$current = substr($nameswitch, 0, strpos($nameswitch, "J"));//запись тока
if ($current != "10" &&
	$current != "16" &&
	$current != "25" &&
	$current != "32" &&
	$current != "63" &&
	$current != "100" &&
	$current != "160" ) {
		$PropSwitch["syntaxerror"] =
"неправильно указана величина максимального тока</br>Допустимые значения 10; 16; 25; 32; 63; 100; 160";
return $PropSwitch;
}

$PropSwitch["current"] = $current;//запись тока
$NameSwitch["current"]  = array("value" => $current, "color" => "black");//запись тока в массив имени переключателя
		
$nameswitch = substr($nameswitch, strpos($nameswitch, "J")+1);//обрезание до J включительно
$NameSwitch["J"]  = array("value" => "J", "color" => "black");//запись J в массив имени переключателя

//Вырезание букв конструктивного исполнения
$constr = "";//конструктивное исполнение
	while(preg_match("/^[BDGUOPKLV]/", $nameswitch, $q)){
	$constr .= $nameswitch[0];
	$NameSwitch[$nameswitch[0]]  = array("value" => $nameswitch[0], "color" => "black");//запись буквы конструктивного исполнения в массив имени переключателя
	$nameswitch = substr($nameswitch, 1);//обрезание букв BDGUOPKLV
		}
	if(!preg_match("/^[0-9]/", $nameswitch, $q)){
		//$NameSwitch[$nameswitch[0]] = array("value" => $nameswitch[0], "color" => "red");//запись неправильной буквы конструктивного исполнения в массив имени переключателя
		$PropSwitch["syntaxerror"] = "имеется недопустимая буква конструктивного исполнения ".$nameswitch[0];
	return $PropSwitch;
	}
	
$PropSwitch["constr"] = $constr;
//Вырезание номера схемы		
$number = "";
$ln = strlen($nameswitch);//количество букв в оставшемся имени схемы
while(!preg_match("/^[ABCDVM]/", $nameswitch, $q) && $ln > 0){
$number .= $nameswitch[0];
$nameswitch = substr($nameswitch, 1);
$ln--;
		}
 if($nameswitch[0] == "C"){ 
$schemeC = new  Schemas();//создание объекта класса Schemas
//print_r($schemeC);
	if($schemeC->checkExistScheme(str_replace('X', '',$number."C"))) {
	$NameSwitch["number"]  = array("value" => $number, "color" => "black");//запись номера схемы в массив имени переключателя
	$number = $number ."C";//если нач. пол "С" - вывод схемы с нулем посередине
		}
		else
		 $NameSwitch["number"]  = array("value" => $number, "color" => "black");//запись номера схемы в массив имени переключателя
	}
	 $NameSwitch["number"]  = array("value" => $number, "color" => "black");//запись номера схемы в массив имени переключателя
$PropSwitch["number"] = $number;//запись номера схемы
$scheme = new Schemas($number);//создание объекта класса Schemas
$schemeX = new Schemas(str_replace('X', '', $number));//создание объекта класса Schemas для схемы Х (без перемычек)
	if(!$scheme->checkExistScheme(str_replace('X', '', $number)))	{$PropSwitch["logicerror"] ="имеет схему ".$number.", которая еще не существует";
	return $PropSwitch;
}
	

//print_r($scheme);		
	if($nameswitch == ""){
	$PropSwitch["syntaxerror"] = "отсутствует допустимая буква начального положения ручки (A или B или C или D или V или M)";
	return $PropSwitch;}
$PropSwitch["initpos"] = $nameswitch[0];
$nameswitch = substr($nameswitch, 1);//обрезание буквы начального положения ручки
$NameSwitch["initpos"]  = array("value" => $PropSwitch["initpos"], "color" => "black");//запись начального положения в массив имени переключателя

	if ($nameswitch[0]  != "1" &&
		$nameswitch[0]	!= "4" &&
		$nameswitch[0]	!= "6" &&
		$nameswitch[0]	!= "8"){
	$PropSwitch["syntaxerror"] = "отсутствует допустимая цифра угла поворота ручки (1 или 4 или 6 или 8)";
	return $PropSwitch;}
$PropSwitch["angle"] = $nameswitch[0];
	if($nameswitch[0] == "1") $PropSwitch["angle"] =  "12";
$nameswitch = substr($nameswitch, 1);//обрезание цифры угла поворота ручки
$NameSwitch["angle"]  = array("value" => $PropSwitch["angle"], "color" => "black");//запись угла в массив имени переключателя
//echo $nameswitch;
if ($this->exsist($nameswitch, "TR" )|| $this->exsist($nameswitch, "RT")){
		$NameSwitch["color"]  = array("value" => "TR", "color" => "black");//запись буквы цветв ручки в массив имени переключателя
		$PropSwitch["color"] = "TR";
		$nameswitch = str_replace("TR", "", $nameswitch);//удаление буквы цвета ручки
		$nameswitch = str_replace("RT", "", $nameswitch);//удаление буквы цвета ручки
		}
//echo $nameswitch;		
	if ($this->exsist($nameswitch, "R")){
		$NameSwitch["color"]  = array("value" => "R", "color" => "black");//запись буквы цветв ручки в массив имени переключателя
		$PropSwitch["color"] = "R";
		$nameswitch = str_replace("R", "", $nameswitch);//удаление буквы цвета ручки
		}
	if ($this->exsist($nameswitch, "B")){
		$NameSwitch["color"]  = array("value" => "B", "color" => "black");//запись буквы цветв ручки в массив имени переключателя
		$PropSwitch["color"] = "B";
		$nameswitch = str_replace("B", "", $nameswitch);//удаление буквы цвета ручки
		}
	if ($this->exsist($nameswitch, "T")){
		$NameSwitch["color"]  = array("value" => "T", "color" => "black");//запись буквы цветв рукоятки в массив имени переключателя
		$PropSwitch["color"] = "T";
		$nameswitch = str_replace("T", "", $nameswitch);//удаление буквы обозначения рукоятки
		}
		//echo $PropSwitch["color"];
//------------------------------------------------------------------------------------------------------------------------
//А Н А Л И З   Л О Г И Ч Е С К И Х    О Ш И Б О К    В   Н А И М Е Н О В А Н И И    П Е Р Е К Л Ю Ч А Т Е Л Я
//------------------------------------------------------------------------------------------------------------------------
		
//Проверка наличия возвратных положение для схемы на 3 положения
	if($this->exsist($constr, "V") && $schemeX->qpos == 3){//если есть самовозврат и 3 положения
		if ($this->exsist($nameswitch, "V1-V0-V2")){
			$NameSwitch["momentfrom"]  = array("value" => "V1-V0-V2", "color" => "black");//запись положение самовозврата в массив имени переключателя
			$PropSwitch["momentfrom"] = "V1-V0-V2";
			$nameswitch = str_replace("V1-V0-V2", "", $nameswitch);//удаление V1-V0-V2
			}
		elseif ($this->exsist($nameswitch, "V1-V0")){
			$NameSwitch["momentfrom"]  = array("value" => "V1-V0", "color" => "black");//запись положение самовозврата в массив имени переключателя
			$PropSwitch["momentfrom"] = "V1-V0";
			$nameswitch = str_replace("V1-V0", "", $nameswitch);//удаление V1-V0
		}
		elseif ($this->exsist($nameswitch, "V0-V2")){
			$NameSwitch["momentfrom"]  = array("value" => "V0-V2", "color" => "black");//запись положение самовозврата в массив имени переключателя
			$PropSwitch["momentfrom"] = "V0-V2";
			$nameswitch = str_replace("V0-V2", "", $nameswitch);//удаление V0-V2
		}
		else {$PropSwitch["warning"] = "имеется самововрат (указана буква V) и схему ".$number." с тремя положениями ручки.</br>
	Для такого переключателя необходимо указать, из какого положения ручка должна возвращаться в центральное положение:
	</br>-из левого V1-V0 например, S25JVD2203C6V1-V0;</br>-из правого V0-V2 например, S25JVD2203C6V0-V2;</br>-из обоих V1-V0-V2 например, S25JVD2203C6V1-V0-V2";
		}
	}
	
	//Запись длинны оси для конструктивного исполнения "В"
	if($this->exsist($constr, "B")){
		if($this->exsist($nameswitch, "L")){
			$nameswitch = str_replace("L", "", $nameswitch);//удаление L
			$nameswitch = str_replace("=", "", $nameswitch);//удаление =
		//echo $nameswitch;	
		if(!ctype_digit($nameswitch)) {$PropSwitch["syntaxerror"] = "длина оси должна быть числом"; return $PropSwitch;}
		$length = (int)$nameswitch;
		$PropSwitch["length"] = $length;
		$NameSwitch["length"]  = array("value" => "L=".$length, "color" => "black");//запись длинны оси в массив имени переключателя
		$nameswitch = str_replace($length, "", $nameswitch);//удаление длины оси
		if($length < 300 || $length > 1000) {$PropSwitch["syntaxerror"] = "длина оси должна быть от 300 до 1000"; return $PropSwitch;}
		}
		else $PropSwitch["warning"] = "имеется вариант крепления: переключатель крепится на монтажную панель, а ручка - на дверь (указана буква B).
</br>Для такого переключателя необходимо указать расстояние в мм. от монтажной панели до двери, например L=450";
	}
	
	//print_r($nameswitch);
		//Запись наименования коробки для конструктивного исполнения "P"
	if($this->exsist($constr, "P")){
	//print_r($nameswitch);
		if(preg_match("/EC4[01]0C[4-7][VH]?/", $nameswitch, $MATCHES)){
			$NameSwitch["box"]  = array("value" => $MATCHES[0], "color" => "black");//запись наименования коробки в массив имени переключателя
			$PropSwitch["box"] = $MATCHES[0];
			$nameswitch = str_replace($MATCHES[0], "", $nameswitch);//удаление наимаенования коробки
			}
		else $PropSwitch["warning"] = "имеется вариант крепления переключателя в коробке (указана буква P).
</br>Для такого переключателя необходимо указать наименование коробки, например EC410C4";
		
			//Запись наименования кабельного зажима для конструктивного исполнения "P"
	if($this->exsist($constr, "P")){
		if(preg_match("/PG[1-9]?[1-9]/", $nameswitch, $MATCHES)){
		
			$pg = str_replace("PG", "", $MATCHES[0]);
		//echo $pg;
			$NameSwitch["pg"]  = array("value" => "PG".$pg, "color" => "black");//запись наименования кабельного зажима в массив имени переключателя
			$PropSwitch["pg"] = $pg;
			$nameswitch = str_replace("PG".$pg, "", $nameswitch);//удаление наименования кабельного зажима
			}
		}
	}
	if($nameswitch != "") {$PropSwitch["syntaxerror"] = "имеются неиспользуемые лишние символы ".$nameswitch.". "; return $PropSwitch;}
	
//-------------------------------------------------------------------------------------------------------------------------------------	
//Анализ введенного наименования переключателя
if($this->exsist($constr,"K") && $current > 25) {
	$PropSwitch["logicerror"] = ", на максимальный ток ".$current." A не может иметь ручку управления - ключ (указана буква К)";
	$NameSwitch["K"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	$NameSwitch["current"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($this->exsist($constr,"V") && $current > 25) {
	$PropSwitch["logicerror"] = ", на максимальный ток ".$current." A не может иметь самовозврат (указана буква V)";
	$NameSwitch["V"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	$NameSwitch["current"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else 
$CheckConstr = array();//массив недопустимых сочетаний букв конструктивного исполнения
$CheckConstr["B"] = "GOPKLV";
$CheckConstr["D"] = "UK";
$CheckConstr["G"] = "BOKL";
$CheckConstr["U"] = "DKVLO";
$CheckConstr["O"] = "BGPKLU";
$CheckConstr["P"] = "BOL";
$CheckConstr["K"] = "BDGUOLV";
$CheckConstr["L"] = "BGOPKU";
$CheckConstr["V"] = "BUK";
//Проверка совместимоси букв конструктивного исполнения
$uncorrectfirstletter = "";
$uncorrectsecondletter = "";
	for($firstletter = 0; $firstletter < strlen($constr); $firstletter++)
		for($secondletter = $firstletter + 1; $secondletter < strlen($constr); $secondletter++)
			foreach($CheckConstr as $key => $value)
				for($i = 0; $i < strlen($value); $i++)
					if($constr[$firstletter] == $key && $constr[$secondletter] == $value[$i]){
						$uncorrectfirstletter = $key;
						$uncorrectsecondletter = $value[$i];
						break 4;
						}

	if($uncorrectfirstletter != ""){
		$PropSwitch["logicerror"] = "имеет недопустимое сочетание букв ".$uncorrectfirstletter." и ".$uncorrectsecondletter." конструктивного исполнения"; 
		$NameSwitch[$constr[$firstletter]]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch[$constr[$secondletter]]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		}

	else if($this->exsist($constr,"K") && $schemeX->qcont > 12){
		$PropSwitch["logicerror"] = "имеет больше 12 контактных групп.</br> Для такого переключателя недопустимо управление ключом (указана буква К)"; 
		$NameSwitch["K"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($this->exsist($constr,"V") && $schemeX->qcont > 12){
		$PropSwitch["logicerror"] = "имеет больше 12 контактных групп.</br> Для такого переключателя недопустим самовозврат (указана буква V)"; 
		$NameSwitch["V"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($this->exsist($constr,"K") && $PropSwitch["initpos"] != "A"){
		$PropSwitch["logicerror"] = "имеет управление ключом (указана буква К).</br>
		Для такого переключателя недопустимо начальное положение ".$PropSwitch["initpos"].".</br>Возможно только начальное положение А"; 
		$NameSwitch["K"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["initpos"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($schemeX->qpos > 2 && $PropSwitch["initpos"] == "D"){
		$PropSwitch["logicerror"] = "имеет ".$this->position($schemeX->qpos)." ручки.</br>
		Для такого переключателя недопустимо начальное положение D."; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["initpos"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($schemeX->qpos == 3 && $this->exsist($constr,"V") && $PropSwitch["initpos"] != "C"){
		$PropSwitch["logicerror"] = "на 3 положения ручки имеет самовозврат (указана буква V).</br>
		Для такого переключателя недопустимо начальное положение ".$PropSwitch["initpos"].".</br>
		Возможно только начальное положение C "; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["V"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["initpos"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
}
	else if($schemeX->qpos > $PropSwitch["angle"]){
		$PropSwitch["logicerror"] = "имеет ".$this->position($schemeX->qpos)." ручки.</br>
		Для такого переключателя недопустим угол поворота ".(360/$PropSwitch["angle"])." градусов (указана цифра ".$PropSwitch["angle"].")."; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["angle"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	}
	else if($PropSwitch["initpos"] == "M" &&  $schemeX->qpos != $PropSwitch["angle"]){
		$PropSwitch["logicerror"] = " имеет ".$this->position($schemeX->qpos)." и угол поворота ".(360/$PropSwitch["angle"])." градусов (указана цифра ".$PropSwitch["angle"].").</br>
		Для такого переключателя недопустимо начальное положение ".$PropSwitch["initpos"]." (переключение по кругу без упора)."; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["initpos"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	}
	else if($PropSwitch["initpos"] == "C" &&  $schemeX->qpos == 2){
		$PropSwitch["logicerror"] = " имеет  2 положения ручки</br>
		Для такого переключателя недопустимо начальное положение C. Возможны только начальные положения А, B, D, V."; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["initpos"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	}
	else if($this->exsist($constr,"K") && ($schemeX->qpos-1)*360/$PropSwitch["angle"] > 180){
		$PropSwitch["logicerror"] = "с управлением ключом (указана буква К)</br>
		имеет угол между крайними положениями ключа больше 180 градусов, что недопустимо."; 
		$NameSwitch["number"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["K"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
		$NameSwitch["angle"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	}
	if($this->exsist($constr,"P")){
		if($PropSwitch["box"][6] == 4 && $PropSwitch["pg"] > 16 ||
			 $PropSwitch["box"][6] == 5 && $PropSwitch["pg"] > 21 ||
			 $PropSwitch["box"][6] == 6 && $PropSwitch["pg"] > 29){
		$PropSwitch["logicerror"] = "в коробке ".$PropSwitch["box"] .", габариты которой не позволяют установить кабельные зажимы PG".$pg;
		$NameSwitch["pg"]["color"] = "red";//выделение недопустимых наименований кабельных зажимов красным цветом
		$NameSwitch["box"]["color"] = "red";//выделение недопустимых сочетаний красным цветом
	}
	$qdesk = ceil($scheme->qcont / 2);
	
	if($this->exsist($constr,"V")) $qdesk ++;
	//echo "<pre>";print_r($PropSwitch); echo "<pre>";
	//echo $qdesk;
	if(empty($PropSwitch["box"]) && $PropSwitch["current"] < 30 && $qdesk < 3) $PropSwitch["box"] = "EC400C4";
	else if(empty($PropSwitch["box"]) && $PropSwitch["current"] < 30 && $qdesk < 4) $PropSwitch["box"] = "EC400C5";
	else if(empty($PropSwitch["box"]) && $PropSwitch["current"] < 30 && $qdesk < 6) $PropSwitch["box"] = "EC400C7";
	else if(empty($PropSwitch["box"]) && $PropSwitch["current"] < 70 && $qdesk < 3) $PropSwitch["box"] = "EC400C5";
	else if(empty($PropSwitch["box"]) && $PropSwitch["current"] < 70 && $qdesk < 4) $PropSwitch["box"] = "EC400C6";
	else if(empty($PropSwitch["box"]) && $scheme->qcont < 5) $PropSwitch["box"] = "EC400C6";
	else if(empty($PropSwitch["box"]) && $scheme->qcont < 7) $PropSwitch["box"] = "EC400C7";
	else if(empty($PropSwitch["box"])){
	//print_r($PropSwitch);
		$PropSwitch["logicerror"] = "по своим габаритам не может быть установлен в коробке ";
		$PropSwitch["nameswitchstyle"]  = "<b>";
		foreach($NameSwitch as $key => $value)
			$PropSwitch["nameswitchstyle"] .= "<span style = color:".$value["color"].";>".$value["value"]."</span>";
			$PropSwitch["nameswitchstyle"] .= "</b>";
		return $PropSwitch;}
	
	if(empty($PropSwitch["pg"]) && $PropSwitch["box"][6] == 4) $PropSwitch["pg"] = 16;
	if(empty($PropSwitch["pg"]) && $PropSwitch["box"][6] == 5) $PropSwitch["pg"] = 21;
	if(empty($PropSwitch["pg"]) && $PropSwitch["box"][6] == 6) $PropSwitch["pg"] = 29;
	if(empty($PropSwitch["pg"]) && $PropSwitch["box"][6] == 7) $PropSwitch["pg"] = 36;
	if($PropSwitch["pg"] != "9" && $PropSwitch["pg"] != "11" && $PropSwitch["pg"] != "16" && $PropSwitch["pg"] != "21" && $PropSwitch["pg"] != "29" && $PropSwitch["pg"] != "36"){ 
			$PropSwitch["logicerror"] = "имеет наименование, в котором неправильно указан номер кабельного зажима PG".$pg;
			$NameSwitch["pg"]["color"] = "red";//выделение недопустимых наименований кабельных зажимов красным цветом
	}
	
	
	if(($PropSwitch["box"][6] == 4 && $PropSwitch["current"] < 30 && $qdesk > 2) || 
		($PropSwitch["box"][6] == 4 && $PropSwitch["current"] > 30 ) || 
		($PropSwitch["box"][6] == 5 && $PropSwitch["current"] < 30 && $qdesk > 3) || 
		($PropSwitch["box"][6] == 5 && $PropSwitch["current"] > 30 && $PropSwitch["current"] < 70 && $qdesk > 2) || 
		($PropSwitch["box"][6] == 5 && $PropSwitch["current"] > 70) || 
		($PropSwitch["box"][6] == 6 && $PropSwitch["current"] < 30 && $qdesk > 3) ||
		($PropSwitch["box"][6] == 6 && $PropSwitch["current"] > 30 && $qdesk > 2) ||
		($PropSwitch["box"][6] == 7 && $PropSwitch["current"] < 30 && $qdesk > 5) ||
		($PropSwitch["box"][6] == 7 && $PropSwitch["current"] > 30 && $qdesk > 3)){
	$PropSwitch["logicerror"] = "по своим габаритам не может быть установлен в коробке ".$PropSwitch["box"];
	$NameSwitch["box"]["color"] = "red";//выделение недопустимых сочетаний красным цветом	
		}
	}	
	/*echo $PropSwitch["box"];
	echo "</br>";
	echo $PropSwitch["pg"];
	echo "</br>";
	echo $PropSwitch["logicerror"];*/
		
	
//------------------------------------------------------------------------------------------------------------------------	
//З А П И С Ь    С В О Й С Т В    П Е Р Е К Л Ю Ч А Т Е Л Я 
//------------------------------------------------------------------------------------------------------------------------
	//echo $PropSwitch["color"];
	//Запись ручки управления
	$PropSwitch["handle"] = "black";
	$PropSwitch["handleText"] = "черную ручку управления";
			
	
	if($this->exsist($constr,"K")) {
		$PropSwitch["handle"] = "key";
		$PropSwitch["handleText"] = "ручку управления ключем";
		}
	else if($this->exsist($constr,"U") && !$this->exsist($PropSwitch["color"],"B")) {
		$PropSwitch["handle"] = "ur";
		$board = 2;
		$PropSwitch["handleText"] = "красную ручку управления с возможностью фиксации навесным замком";
		}
	else if($this->exsist($constr,"U") && $this->exsist($PropSwitch["color"],"B")) {
		$PropSwitch["handle"] = "ub";
		$board = 2;
		$PropSwitch["handleText"] = "черную ручку управления с возможностью фиксации навесным замком";
		}
	 if($this->exsist($PropSwitch["color"],"T")) {
		$PropSwitch["handle"] = "t";
		$PropSwitch["handleText"] = " черную ручку управления специальной формы типа рукоятка";
		}
	
	 if($this->exsist($PropSwitch["color"],"R")) {
		$PropSwitch["handle"] = "red";
		$PropSwitch["handleText"] = "красную ручку управления";
		}
	 if($this->exsist($PropSwitch["color"],"TR")) {
		$PropSwitch["handle"] = "tr";
		$PropSwitch["handleText"] = " красную ручку управления специальной формы типа рукоятка";
		}	
	   
			//echo " ".$PropSwitch["handle"];
//Запись наличия лицевой панели
	if($this->exsist($constr, "D")) {
	$PropSwitch["board"] = 1;
	$PropSwitch["boardText"] = " и лицевую панель с информационной табличкой";
	}
	else {
	$PropSwitch["board"] = 0;
	$PropSwitch["boardText"] = "";
	}
	
//Запись наличия уплотнения по оси	
	if($this->exsist($constr, "G")) {
	$PropSwitch["ip54"] = 1;
	$PropSwitch["ip54Text"] = "Степень защиты IP54 за счет элементов уплотнения оси.";
	}
	else $PropSwitch["ip54"] = 0;
//Запись способа крепления
	if($this->exsist($constr, "O")) {
	$PropSwitch["fix"] = "O";
	$PropSwitch["fixText"] = "крепится на монтажную панель";
	}
	else if($this->exsist($constr, "L")) {
	$PropSwitch["fix"] = "L";
	$PropSwitch["fixText"] = "крепится на DIN - рейку";
	}
	else if($this->exsist($constr, "P")) {
	$PropSwitch["fix"] = "P";
	$PropSwitch["fixText"] = "установлен в пластсмассовой коробке ".$PropSwitch["box"];
	if($PropSwitch["box"][3] == 1) $PropSwitch["fixText"] .= " с кабельными зажимами PG".$PropSwitch["pg"];
	}
	else if($this->exsist($constr, "B")) {
	$PropSwitch["fix"] = "B";
	$PropSwitch["fixText"] = "крепится на монтажную панель, а ручка управления  - на дверь";
	}
	else  {
	$PropSwitch["fix"] = "_";
	$PropSwitch["fixText"] = "крепится на переднюю панель или дверь";
	}

//Запись количества положений
	 $PropSwitch["qpos"] = $schemeX->qpos;
//Запись количества контактных групп
	 $PropSwitch["qcont"] = $schemeX->qcont;
//Запись количества галет
	 $PropSwitch["qdesk"] = round($schemeX->qcont / 2);		 
//Запись маркировки положений
	 $PropSwitch["mark"] = $schemeX->mark;
//Запись самовозврата
	if($this->exsist($constr, "V"))  {
	$PropSwitch["moment"] = 1;
	if($PropSwitch["qpos"] == 3){
		if($PropSwitch["momentfrom"] == "V1-V0") $PropSwitch["momentText"] = "Крайнее левое положение ручки - с самовозвратом в центральное. Крайнее правое положение - фиксированное.";
		else if($PropSwitch["momentfrom"] == "V0-V2") $PropSwitch["momentText"] = "Крайнее правое положение ручки - с самовозвратом в центральное. Крайнее левое положение - фиксированное.";
		else if($PropSwitch["momentfrom"] == "V1-V0-V2") $PropSwitch["momentText"] = "Самовозврат из обоих крайних положений ручки  в центральное.";
		}
	else $PropSwitch["momentText"] = "Положения ручки переключателя - с самовозвратом (после отпускания руки она возвращается в исходное положение).";
	}
	else  {
	$PropSwitch["moment"] = 0;
	$PropSwitch["momentText"] = "Положения ручки переключателя - фиксированные.";
	}	 
//Запись номинального рабочего напряжения
	if($PropSwitch["current"] < 30)	 $PropSwitch["operating_voltage"] = 400;	 
	else $PropSwitch["operating_voltage"] = 500;	 
//Запись тока электродвигателя 1 фаза 220В	 
	 $PropSwitch["motor_current_1_phase_220V"]["10"] = "1,5 / 8,5";
	 $PropSwitch["motor_current_1_phase_220V"]["16"] = "1,7 / 9,6";
	 $PropSwitch["motor_current_1_phase_220V"]["25"] = "2,6 / 14";
	 $PropSwitch["motor_current_1_phase_220V"]["32"] = "4 / 22";
	 $PropSwitch["motor_current_1_phase_220V"]["63"] = "5 / 28";
	 $PropSwitch["motor_current_1_phase_220V"]["100"] = "10 / 56";
	 $PropSwitch["motor_current_1_phase_220V"]["160"] = "10 / 56";
//Запись тока электродвигателя 3 фазы 220В	 
	 $PropSwitch["motor_current_3_phase_220V"]["10"] = "3";
	 $PropSwitch["motor_current_3_phase_220V"]["16"] = "4";
	 $PropSwitch["motor_current_3_phase_220V"]["25"] = "5,5";
	 $PropSwitch["motor_current_3_phase_220V"]["32"] = "8";
	 $PropSwitch["motor_current_3_phase_220V"]["63"] = "17";
	 $PropSwitch["motor_current_3_phase_220V"]["100"] = "23";
	 $PropSwitch["motor_current_3_phase_220V"]["160"] = "30";	 
//Запись тока электродвигателя 3 фазы 380В	 
	 $PropSwitch["motor_current_3_phase_380V"]["10"] = "3,5 / 6,3";
	 $PropSwitch["motor_current_3_phase_380V"]["16"] = "4 / 7,2";
	 $PropSwitch["motor_current_3_phase_380V"]["25"] = "7,5 / 13";
	 $PropSwitch["motor_current_3_phase_380V"]["32"] = "12 / 21";
	 $PropSwitch["motor_current_3_phase_380V"]["63"] = "15 / 27";
	 $PropSwitch["motor_current_3_phase_380V"]["100"] = "30 / 54";
	 $PropSwitch["motor_current_3_phase_380V"]["160"] = "40 / 72";
//Запись тока электродвигателя 3 фазы 500В	 
	 $PropSwitch["motor_current_3_phase_500V"]["10"] = "6";
	 $PropSwitch["motor_current_3_phase_500V"]["16"] = "7,5";
	 $PropSwitch["motor_current_3_phase_500V"]["25"] = "11";
	 $PropSwitch["motor_current_3_phase_500V"]["32"] = "15";
	 $PropSwitch["motor_current_3_phase_500V"]["63"] = "30";
	 $PropSwitch["motor_current_3_phase_500V"]["100"] = "40";
	 $PropSwitch["motor_current_3_phase_500V"]["160"] = "55";	 
//Запись постоянного тока 6В	 
	 $PropSwitch["DC_6V"]["10"] = "0,01";
	 $PropSwitch["DC_6V"]["16"] = "";
	 $PropSwitch["DC_6V"]["25"] = "";
	 $PropSwitch["DC_6V"]["32"] = "";
	 $PropSwitch["DC_6V"]["63"] = "";
	 $PropSwitch["DC_6V"]["100"] = "";
	 $PropSwitch["DC_6V"]["160"] = "";
//Запись постоянного тока 24В	 
	 $PropSwitch["DC_24V"]["10"] = "10";
	 $PropSwitch["DC_24V"]["16"] = "16";
	 $PropSwitch["DC_24V"]["25"] = "25";
	 $PropSwitch["DC_24V"]["32"] = "32";
	 $PropSwitch["DC_24V"]["63"] = "63";
	 $PropSwitch["DC_24V"]["100"] = "100";
	 $PropSwitch["DC_24V"]["160"] = "160";
//Запись постоянного тока 48В	 
	 $PropSwitch["DC_48V"]["10"] = "6";
	 $PropSwitch["DC_48V"]["16"] = "6";
	 $PropSwitch["DC_48V"]["25"] = "6";
	 $PropSwitch["DC_48V"]["32"] = "25";
	 $PropSwitch["DC_48V"]["63"] = "25";
	 $PropSwitch["DC_48V"]["100"] = "32";
	 $PropSwitch["DC_48V"]["160"] = "32";
//Запись постоянного тока 110В	 
	 $PropSwitch["DC_110V"]["10"] = "1";
	 $PropSwitch["DC_110V"]["16"] = "1";
	 $PropSwitch["DC_110V"]["25"] = "1";
	 $PropSwitch["DC_110V"]["32"] = "4";
	 $PropSwitch["DC_110V"]["63"] = "4";
	 $PropSwitch["DC_110V"]["100"] = "5";
	 $PropSwitch["DC_110V"]["160"] = "5";
//Запись постоянного тока при активной нагрузке 220В	 
	 $PropSwitch["DC_220V_resistive_load"]["10"] = "0,3";
	 $PropSwitch["DC_220V_resistive_load"]["16"] = "0,3";
	 $PropSwitch["DC_220V_resistive_load"]["25"] = "0,3";
	 $PropSwitch["DC_220V_resistive_load"]["32"] = "1";
	 $PropSwitch["DC_220V_resistive_load"]["63"] = "1";
	 $PropSwitch["DC_220V_resistive_load"]["100"] = "1,2";
	 $PropSwitch["DC_220V_resistive_load"]["160"] = "1,5";
//Запись постоянного тока для электродвигателей 220В	 
	 $PropSwitch["DC_220V_electric_motors"]["10"] = "0,3";
	 $PropSwitch["DC_220V_electric_motors"]["16"] = "0,3";
	 $PropSwitch["DC_220V_electric_motors"]["25"] = "0,3";
	 $PropSwitch["DC_220V_electric_motors"]["32"] = "1";
	 $PropSwitch["DC_220V_electric_motors"]["63"] = "1";
	 $PropSwitch["DC_220V_electric_motors"]["100"] = "1,2";
	 $PropSwitch["DC_220V_electric_motors"]["160"] = "1,5";
//Запись кратковременного тока
	 $PropSwitch["short_time_current"]["10"] = "200";
	 $PropSwitch["short_time_current"]["16"] = "220";
	 $PropSwitch["short_time_current"]["25"] = "500";
	 $PropSwitch["short_time_current"]["32"] = "800";
	 $PropSwitch["short_time_current"]["63"] = "1200";
	 $PropSwitch["short_time_current"]["100"] = "1500";
	 $PropSwitch["short_time_current"]["160"] = "2000";
//Запись механической износостойкости
	 $PropSwitch["mechanical_wear_resistance"]["10"] = "1000000";
	 $PropSwitch["mechanical_wear_resistance"]["16"] = "1000000";
	 $PropSwitch["mechanical_wear_resistance"]["25"] = "1000000";
	 $PropSwitch["mechanical_wear_resistance"]["32"] = "300000";
	 $PropSwitch["mechanical_wear_resistance"]["63"] = "300000";
	 $PropSwitch["mechanical_wear_resistance"]["100"] = "100000";
	 $PropSwitch["mechanical_wear_resistance"]["160"] = "100000";
//Запись износостойкости при максимальной нагрузке
	 $PropSwitch["wear_resistance_at_maximum_load"]["10"] = "100000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["16"] = "100000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["25"] = "100000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["32"] = "30000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["63"] = "30000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["100"] = "10000";
	 $PropSwitch["wear_resistance_at_maximum_load"]["160"] = "10000";
//Запись сечения проводов
	 $PropSwitch["wire_size"]["10"] = "0,75 - 1,5";
	 $PropSwitch["wire_size"]["16"] = "1 - 2,5";
	 $PropSwitch["wire_size"]["25"] = "1,5 - 4";
	 $PropSwitch["wire_size"]["32"] = "2,5 - 6";
	 $PropSwitch["wire_size"]["63"] = "6 - 16";
	 $PropSwitch["wire_size"]["100"] = "16 - 35";
	 $PropSwitch["wire_size"]["160"] = "16 - 50";	 	 
	 
	 $PropSwitch["nameswitch"] = $nameswitch;
	 
/*echo"</br>";
echo"NameSwitch=";
echo"<pre>";
print_r($PropSwitch);
echo"</pre>";
echo"</br>";*/

$PropSwitch["nameswitchstyle"]  = "<b>";
	foreach($NameSwitch as $key => $value)
		$PropSwitch["nameswitchstyle"] .= "<span style = color:".$value["color"].";>".$value["value"]."</span>";
		$PropSwitch["nameswitchstyle"] .= "</b>";
	return $PropSwitch;

	}
private function style($PropSwitch, $NameSwitch){
	global $PropSwitch, $NameSwitch;

return 	$PropSwitch;	
	}	
private function exsist($word, $letter){
	if (strpos($word, $letter) !== false) return true;
	return false;	
	}
public function position ($qpos){
	if($qpos < 5) return $qpos." положения";
	return $qpos." положений";
	}

	
	

}
?>