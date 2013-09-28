<?php
/* @var $this GuestController */

$this->breadcrumbs=array(
	'Заявка'=>array('/preaction/guest'),
	'Статус',
);
$this->setPageTitle(Yii::app()->name.'. Статус заявок');
?>
<h1>Статус заявок</h1>

<p>
	<table>
	<thead bgcolor='#5c5c5c' style='color:white;font-style:oblique;'>
	  <tr>
	    <td>№</td>
	    <td>Команда/Участник</td>
	    <td>Участников</td>
	    <td>Подано</td>
	    <td>Соревнования</td>
	    <td>Статус</td>
	  </tr>
	</thead style="color:white; background:black;">
	<tbody>
	  <tr>
	    <td>1</td>
	    <td><a href='<?php echo $this->createUrl('/preaction/guest/view'); ?>'>Альптур</a></td>
	    <td>12</td>
	    <td>20/11/1979</td>
	    <td><a href="#">Болдерфест 13</a></td>
	    <td>Не обработано</td>
	  </tr>
	  <td>2</td>
	    <td><a href='<?php echo $this->createUrl('/preaction/guest/view'); ?>'>Лично</a></td>
	    <td>1</td>
	    <td>20/11/1979</td>
	    <td><a href="#">Болдерфест 13</a></td>
	    <td>Не обработано</td>
	  </tr>
	  <td>3</td>
	    <td><a href='<?php echo $this->createUrl('/preaction/guest/view'); ?>'>Лично</a></td>
	    <td>1</td>
	    <td>20/11/1979</td>
	    <td><a href="#">Болдерфест 13</a></td>
	    <td>Принято</td>
	  </tr>
	</tbody>
      </table>
</p>
