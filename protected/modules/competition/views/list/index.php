<?php
/* @var $this ListController */

$this->breadcrumbs=array(
	'Соревнования'=>array('/competition'),
	'Список'
);
?>
<h1>Список соревнований</h1>
<?php
    $dataProvider=new CActiveDataProvider('Competition');

    $this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider'=>$dataProvider,
	    'enablePagination'=>true,
	    'columns'=>array(
		array(
		    'name'=>'cid',
		    'htmlOptions'=>array('style'=>'text-align:center'),
		    'sortable'=>true,
		),
		array(
		    'class'=>'UrlDataColumn',
		    'name'=>'title',
		    'type'=>'html',
		    'footer'=>CHtml::link('Зарегистрировать новые',$this->createUrl('/competition/list/create')),
		    'sortable'=>true,
		),
		array(
		    'name'=>'date',
		    'htmlOptions'=>array('style'=>'text-align:center'),
		    'sortable'=>true,
		),
		array(
		      'name'=>'class',
		      'sortable'=>true,
		),
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
		array(
		    'class'=>'RemoveDataColumn',
		),
	    ),
	)
    );
?>

