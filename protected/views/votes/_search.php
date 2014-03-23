<?php
/* @var $this VotesController */
/* @var $model Votes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'candidat_id'); ?>
		<?php echo $form->textField($model,'candidat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip'); ?>
		<?php echo $form->textArea($model,'ip',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'protiv_za'); ?>
		<?php echo $form->textField($model,'protiv_za',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->