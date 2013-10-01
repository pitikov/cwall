<?php
/* @var $this CurrentController */

$this->breadcrumbs=array(
	'Соревнования'=>array('/competition/current','cid'=>Yii::app()->request->cookies['competition']->value),
	'Участники',
);
?>
<h1>Список участников соревнований</h1>

<p>Здесь следует разместить таблицу участников с распределением по группам.</p>
