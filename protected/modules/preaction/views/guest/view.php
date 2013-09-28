<?php
/* @var $this GuestController */

$this->breadcrumbs=array(
	'Заявка'=>array('/preaction/guest'),
	'Просмотр заявки',
);
$this->setPageTitle(Yii::app()->name.'. Просмотр заявки');
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
