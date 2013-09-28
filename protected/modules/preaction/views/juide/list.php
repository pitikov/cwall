<?php
/* @var $this JuideController */

$this->breadcrumbs=array(
	'Juide'=>array('/preaction/juide'),
	'List',
);
?>
<h1>Электронные заявки</h1>

<p>
	<table>
	<thead bgcolor='#5c5c5c' style='color:white;font-style:oblique;font-weight: bold;'>
	  <tr>
	    <td>№</td>
	    <td>Команда/Участник</td>
	    <td>Участников</td>
	    <td>Подано</td>
	    <td>Соревнования</td>
	    <td>Статус</td>
	  </tr>
	</thead>
	<tbody>
	  <tr>
	    <td>1</td>
	    <td><a href='<?php echo $this->createUrl('/preaction/juide/process'); ?>'>Альптур</a></td>
	    <td>12</td>
	    <td>20/11/1979</td>
	    <td><a href="#">Болдерфест 13</a></td>
	    <td>Не обработано</td>
	  </tr>
	  <td>2</td>
	    <td><a href='<?php echo $this->createUrl('/preaction/juide/process'); ?>'>Лично</a></td>
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
</p>
