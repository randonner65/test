<?php
class Scheme {
public $qSchemas = 0;//���������� ���� � ����
public $minNumber;//����������� ����� ��� ����� ����   
public $maxNumber;//������������ ����� ��� ����� ����
public $name;//��� �����
public $qPos;//���������� ���������
public $qCont;//���������� ���������
public $closDiag;//��������� ���������
public $att;//��������
public $presMark;//������� ���������� ���������
public $mark;//���������� ���������
public $qJump;//���������� ��������
public $jump;//��������� 
public $presAddlField;//������� ������ ��������������� ����
public $addFild;//����� ��������������� ����
public $presNameCust;//������� ����� ���������
public $nameCust;//��� ���������
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