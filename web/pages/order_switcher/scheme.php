<?php
class Scheme {
public $qSchemas = 0;//количество схем в базе
public $minNumber;//минимальный номер для новых схем   
public $maxNumber;//максимальный номер для новых схем
public $name;//имя схемы
public $qPos;//количество положений
public $qCont;//количество контактов
public $closDiag;//диаграмма замыканий
public $att;//атрибуты
public $presMark;//наличие маркировки положений
public $mark;//маркировка положений
public $qJump;//количество пермычек
public $jump;//перемычки 
public $presAddlField;//наличие текста дополнительного поля
public $addFild;//текст дополнительного поля
public $presNameCust;//наличие имени заказчика
public $nameCust;//имя заказчика
public function __construct($qSchemas,$minNumber,$maxNumber,$name,$qPos,$qCont,$closDiag,$attrib,$presMark,$mark,$qJump,$jump,$presAddlField,$addFild,$presNameCust,$nameCust) {
    $this->name = $name;
    $this->qPos = $qPos;
    $this->qCont = $qCont;
	$this->closDiag = $closDiag;
	$this->attrib =$attrib;
	$this->presMark = $presMark;
	$this->mark = $mark;
	$this->qJump = $qJump;
	$this->jump = $jump;
	$this->presAddlField = $presAddlField;
	$this->addFild = $addFild;
	$this->presNameCust = $presNameCust;
	$this->nameCust = $nameCust;
	
  }
}
$scheme = new Scheme(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
?>