<?php
/* @var $this VotesController */
/* @var $data Votes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('candidat_id')); ?>:</b>
	<?php echo CHtml::encode($data->Candidat->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
	<?php echo CHtml::encode($data->ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('protiv_za')); ?>:</b>
	<?php echo CHtml::encode($data->protiv_za); ?>
	<br />


</div>