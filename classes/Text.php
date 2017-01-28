<?php
//КЛАСС ТЕКСТ
class Text extends Adatabase{
public function __construct() {
parent::__construct();
	}
	
//Замена русских букв на совпадающие по написанию латинские
public function replaceRusLat ($text){
$text = str_replace("А", "A", $text);
$text = str_replace("В", "B", $text);
$text = str_replace("Е", "E", $text);
$text = str_replace("К", "K", $text);
$text = str_replace("М", "M", $text);
$text = str_replace("Н", "H", $text);
$text = str_replace("О", "O", $text);
$text = str_replace("Р", "P", $text);
$text = str_replace("С", "C", $text);
$text = str_replace("Т", "T", $text);
$text = str_replace("Х", "X", $text);
return $text;
	}

	
//Склонение слова "положение"
public function polozhenie($n){
	if($n < 5) return " положения";
		else return " положений";
	}
//Склонение слова "направление"
public function napravlenie($n){
	if($n < 5) return " направления";
		else return " направлений";
	}
//Склонение фразы  "контактные группы"
public function contgruppy($n){
	if($n == 1) return " контактную группу";
	if($n < 5) return " контактные группы";
		else return " контактных групп";	
	}
//Склонение слова  "один"
public function one($n){
	if($n == 1) return "одно";
	if($n == 2) return "двух";
	if($n == 3) return "трех";
	if($n == 4) return "четырех";
	if($n == 5) return "пяти";
	if($n == 6) return "шести";
	if($n == 7) return "семи";
	if($n == 8) return "восьми";
	if($n == 9) return "девяти";
	if($n == 10) return "десяти";
	if($n == 11) return "одиннадцати";
	if($n == 12) return "двенадцати";
	
		else return " ";	
	}	
//Склонение фразы  "n-позиционный"
public function npos($n){
	if($n == 2) return "двухпозиционный";
	if($n == 3) return "трехпозиционный";
	if($n == 4) return "четырехпозиционный";
	if($n == 5) return "пятипозиционный";
	if($n == 6) return "шестипозиционный";
	if($n == 7) return "семипозиционный";
	if($n == 8) return "восьмипозиционный";
	if($n == 9) return "девятипозиционный";
	if($n == 10) return "десятипозиционный";
	if($n == 11) return "одиннадцатипозиционный";
	if($n == 12) return "двенадцатипозиционный";
	
		else return " ";	
	}
//Генератор фразы из слов "электрический", "кулачковый", "галетный", "поворотный", "пакетный" 
public function genphras_epithets_switch($name){
$name = (string) $name;
$name =  substr($name, 0, 4);//вырезание первых 4 символов из имени схемы
$name1 = $name[0]+$name[1]+$name[2]+$name[3];//вычисление суммы цифр
$name1 = decbin ($name1);//перевод в двоичную систему
$name1 = strrev($name1);//переворачивание числа
	$phrase = "";
	if($name1[0] == 1) $phrase .= "электрический ";
	if($name1[1] == 1) $phrase .= "кулачковый ";
	if($name1[2] == 1) $phrase .= "галетный ";
	if($name1[3] == 1) $phrase .= "поворотный ";
	if($name1[4] == 1) $phrase .= "пакетный ";
	return $phrase;
	}
//Генератор фразы из слов "электрического", "кулачкового", "галетного", "поворотного", "пакетного" 
public function genphras_epithets_scheme($name){
$name = (string) $name;
$name =  substr($name, 0, 4);//вырезание первых 4 символов из имени схемы
$name1 = $name[0]+$name[1]+$name[2]+$name[3];//вычисление суммы цифр
$name1 = decbin ($name1);//перевод в двоичную систему
$name1 = strrev($name1);//переворачивание числа
	$phrase = "";
	if($name1[0] == 1) $phrase .= "электрического ";
	if($name1[1] == 1) $phrase .= "кулачкового ";
	if($name1[2] == 1) $phrase .= "галетного ";
	if($name1[3] == 1) $phrase .= "поворотного ";
	if($name1[4] == 1) $phrase .= "пакетного ";
	return $phrase;
	}
	

	
}

?>