<?php
/* @var $this CompetitionController */
/* @var $model Competition */
/* @var $form CActiveForm */
?>
<?php
$this->breadcrumbs=array(
	'Соревнования'=>array('/competition/current'),
	'Описание соревнований',
);
?>
<h1>Описание соревнований</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competition-pasport-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_referee'); ?>
		<?php echo $form->textField($model,'main_referee'); ?>
		<?php echo $form->error($model,'main_referee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_secretar'); ?>
		<?php echo $form->textField($model,'main_secretar'); ?>
		<?php echo $form->error($model,'main_secretar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->textField($model,'class'); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emblem'); ?>
		<?php echo $form->textField($model,'emblem'); ?>
		<?php echo $form->error($model,'emblem'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
