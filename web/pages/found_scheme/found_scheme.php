<?php
if(count($_GET) == 1){
require_once "found_scheme1.php";
echo $_GET['number0'];
require_once "found_scheme2.php";
echo $_GET['number0'];
require_once "found_scheme3.php"; 

}
else{
include "found_scheme1m.php";
 for($j=0; $j<count($_GET); $j++){
	include "found_scheme2m.php";
	echo $_GET['number'.$j];
	include "found_scheme3m.php";
	echo $_GET['number'.$j];
	include "found_scheme4m.php";
	echo $_GET['number'.$j];
	include "found_scheme5m.php";
	}
include "found_scheme6m.php"; 
}
 ?> 
 