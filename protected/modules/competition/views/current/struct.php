<?php
/* @var $this CurrentController */

$this->breadcrumbs=array(
	'Соревнования'=>array('/competition/current','cid'=>Yii::app()->request->cookies['competition']->value),
	'Структура',
);
?>
<h1>Структура соревнований</h1>

<p>Здесь следует разместить описание структуры соревнований (в виде дерева CTreeView)</p>

<p><?php
	$competitionStruct = array(
	    array(
		'id'=>0,
		'text'=>'Болдерфест 2013',
		'expanded'=>true,
		'children'=>array(
		array(
			'id'=>1,
			'text'=>CHtml::link('Квалификация ж 10-13','#'),
			'expanded' => true,
			'children'=>array(
				array(
					'text'=>CHtml::link('Финал ж 10-13','#'),
				),
			),
		),
		array(
			'id'=>2,
			'text'=>CHtml::link('Квалификация м 10-13','#'),
			'expanded' => true,
			'children'=>array(
				array(
					'text'=>CHtml::link('Финал м 10-13','#'),
				),
			),
		),
	    )),
	);
	$this->widget('CTreeView', array('data'=>$competitionStruct));
?></p>
