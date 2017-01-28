<?php
//Вывод перемычек

$jumpLeft = array();//массив трасс левых перемычек
$jumpRight = array();//массив трасс правых перемычек
$jumpCenter = array();//массив трасс центральных перемычек
//Обнуление массив трасс перемычек
	for ($nContGr=0; $nContGr<$numCont; $nContGr++){ //$nContGr - номер контактной группы
		$jumpCenter[$nContGr] = 0;
		for ($nTrace=0; $nTrace<$numCont/2; $nTrace++){ //nTrace - номер трассы перемычки
			$jumpLeft[$nTrace][$nContGr] = 0;
			$jumpRight[$nTrace][$nContGr] = 0;
		}
	}

$maxNTrace=0;//максимальный номер вертикальной трассы перемычки	
for ($n=0; $n<$numJump; $n++){
	if(($jump[0][$n]%2==1)&&($jump[1][$n]%2==1)) {outLeftJump1($jump[0][$n], $jump[1][$n]); goto nextJmp1;}//вывод левой внешней перемычки
	if(($jump[0][$n]%2==0)&&($jump[1][$n]%2==0)) {outRightJump1($jump[0][$n], $jump[1][$n]); goto nextJmp1;}//вывод правой внешней перемычки
	if(($jump[0][$n]%2==1)&&($jump[1][$n]%2==0)) {outLeftRightJump1($jump[0][$n], $jump[1][$n]); goto nextJmp1;}//вывод лево-правой внешней перемычки
	if(($jump[0][$n]%2==0)&&($jump[1][$n]%2==1)) {outRightLeftJump1($jump[0][$n], $jump[1][$n]); goto nextJmp1;}//вывод право-левой внешней перемычки
nextJmp1:;	
	}
//вывод левой внешней перемычки
function outLeftJump1($n1, $n2){//n1, n2 - номера контактов перемычки
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $numCont, $maxNTrace;
//определение ближайщей доступной трассы
	for($nextTraceLeft=0; $nextTraceLeft < $numCont/2; $nextTraceLeft++){//$nextTraceLeft - номер трассы левой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-1)/2; $nContGr<($n2-1)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpLeft[$nextTraceLeft][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceLeft=$nextTraceLeft+1;//номер левой вертикальной трассы;
	if ($nextTraceLeft > $maxNTrace) $maxNTrace = $nextTraceLeft;//определение максимального номера вертикальной трассы
	
//запись маркеров занятости трассы	
		for($nContGr=($n1-1)/2; $nContGr<($n2-1)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpLeft[$nextTraceLeft][$nContGr] = 1;

}
//вывод правой внешней перемычки	
function outRightJump1($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Запись маркеров занятости трассы	
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
}	
//вывод лево-правой внешней перемычки
function outLeftRightJump1($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-2)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Запись маркеров занятости трассы	
		for($nContGr=($n1-1)/2; $nContGr<($n2-2)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
}
//вывод право-левой внешней перемычки
function outRightLeftJump1($n1, $n2){
global $canvaScheme, $color, $cellSize, $widthFirstCol, $heightTxt, $heightMarkPos, $jumpLeft, $jumpRight, $numCont, $maxNTrace;
//определение ближайщей доступной трассы
	for($nextTraceRight=0; $nextTraceRight < $numCont/2; $nextTraceRight++){//$nextTraceRight - номер трассы правой перемычки
		$flagAvailable = 1;
		for($nContGr=($n1-2)/2; $nContGr<($n2-1)/2; $nContGr++){//$nContGr - номер контактной группы
			if($jumpRight[$nextTraceRight][$nContGr] != 0) $flagAvailable = 0;
		}
		if($flagAvailable == 1) break;
	}
	$nTraceRight=$nextTraceRight+1;//номер правой вертикальной трассы;
	if ($nextTraceRight > $maxNTrace) $maxNTrace = $nextTraceRight;//определение максимального номера вертикальной трассы
//Запись маркеров занятости трассы	
		for($nContGr=($n1-2)/2; $nContGr<($n2-1)/2; $nContGr++)//$nContGr - номер контактной группы
			$jumpRight[$nextTraceRight][$nContGr] = 1;
}

?>
