<?php
/* @var $this CompetitionController */
/* @var $model Competition */
/* @var $form CActiveForm */
?>
<?php
$this->breadcrumbs=array(
	'Соревнования'=>array('/competition/current','cid'=>Yii::app()->request->cookies['competition']->value),
	'Описание соревнований',
);
?>
<h1>Описание соревнований</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-pasport-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'localtion'); ?>
		<?php echo $form->textField($model,'localtion'); ?>
		<?php echo $form->error($model,'localtion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
		    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'date',
			// additional javascript options for the date picker plugin
			'options'=>array(
			    'showAnim'=>'fold',
			),
			'htmlOptions'=>array(
			),
			'language'=>'ru',
		    ));
		?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php
		    echo $form->dropDownList($model, 'type', CHtml::listData(LibCompetitiontype::model()->findAll(),'id','title'));
		?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_referee'); ?>
		<?php
		    echo $form->dropDownList($model, 'main_referee', CHtml::listData(SiteUser::model()->findAll(),'uid','name'));
		?>
		<?php echo $form->error($model,'main_referee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_secretar'); ?>
		<?php
		    echo $form->dropDownList($model, 'main_secretar', CHtml::listData(SiteUser::model()->findAll(),'uid','name'));
		?>
		<?php echo $form->error($model,'main_secretar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php
		    echo $form->dropDownList($model,
					     'class',
					     // data list
					     array(
						'III класс'=>'III класс (прочие официальные соревнования)',
						'II класс'=>'II класс (межрегиональные соревнования, включенные в ЕКП)',
						'I класс'=>'I класс (всероссийские соревнования, включенные в ЕКП)',
					     ),
					     // html options
					     array(
					     ));
		?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emblem'); ?>
		<?php echo $form->textField($model,'emblem'); ?>
		<?php echo $form->error($model,'emblem'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохранить изменения'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
