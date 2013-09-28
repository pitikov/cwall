<?php
/* @var $this ListController */

$this->breadcrumbs=array(
	'Соревнования'=>array('/competition'),
	'Список'
);
?>
<h1>Список соревнований</h1>

<p>
    <a href='<?php echo $this->createUrl('/competition/list/create');?>'>Создать новые</a>
    <table>
	<thead bgcolor='#5c5c5c' style='color:white;font-style:oblique;'>
	    <tr>
		<td>№</td>
		<td>Название</td>
		<td>дата</td>
		<td>Класс</td>
		<td>вид</td>
		<td>участников</td>
		<td>гл.судья</td>
		<td>гл.секретарь</td>
	      </tr>
	</thead>
	<tbody>
	    <tr>
		<td>1</td>
		<td><a href='<?php echo $this->createUrl('/competition/list/select');?>'>Болдерфест 2013</a></td>
		<td>12/12/2013</td>
		<td>III класс</td>
		<td>Боулдеринг</td>
		<td>56</td>
		<td>Питиков Н.А.</td>
		<td>Питиков Е.А.</td>
	    </tr>
	</tbody>
    </table>
    <a href='<?php echo $this->createUrl('/competition/list/create');?>'>Создать новые</a>
</p>