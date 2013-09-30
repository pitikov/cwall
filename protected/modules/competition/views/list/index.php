<?php
/* @var $this ListController */

$this->breadcrumbs=array(
	'Соревнования'=>array('/competition'),
	'Список'
);
?>
<h1>Список соревнований</h1>

<p>
    <a href='<?php echo $this->createUrl('/competition/list/create');?>'>Зарегистрировать новые</a>
<?php /*
    <table>
	<thead bgcolor='#5c5c5c' style='color:white;'>
	    <tr>
		<td>№</td>
		<td>название</td>
		<td>дата</td>
		<td>класс</td>
		<td>вид</td>
		<td>участников</td>
		<td>гл.судья</td>
		<td>гл.секретарь</td>
	      </tr>
	</thead>
	<tbody>
	<?php
	    foreach($model as $item) {
	?>  
		    <tr>
		<td><?php echo $item->cid;?></td>
		<td><a href='<?php echo $this->createUrl('/competition/list/select',array(
		    'cid'=>$item->cid));?>'><?php echo $item->title;?></a></td>
		<td><?php echo $item->date;?></td>
		<td><?php echo $item->class;?></td>
		<td><?php echo $item->type0->title;?></td>
		<td><?php echo $item->memberCount;?></td>
		<td><?php echo $item->mainReferee->name;?></td>
		<td><?php echo $item->mainSecretar->name;?></td>
	    </tr>
	<?php
	    }
	    
	?>

	</tbody>
    </table>
    */ ?>
    <?php

    $dataProvider=new CActiveDataProvider('Competition');

    $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'columns'=>array(
		array(
		    'name'=>'cid',
		    'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
		    'name'=>'title',
		),
		array(
		    'name'=>'date',
		    'htmlOptions'=>array('style'=>'text-align:center'),
		),
		'class',
		array(
		    'name'=>'type0.title',
		    'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
		    'name'=>'memberCount',
		    'htmlOptions'=>array('style'=>'text-align:right'),
		),
		array(
		    'name'=>'mainReferee.name',
		    'header'=>'гл.судья'
		),
		array(
		    'name'=>'mainSecretar.name',
		    'header'=>'гл.секретарь'
		),
		array(            // display a column with "view", "update" and "delete" buttons
		    'class'=>'CButtonColumn',		        
		),

	    ),
	));
    ?>
    <a href='<?php echo $this->createUrl('/competition/list/create');?>'>Зарегистрировать новые</a>
</p>
