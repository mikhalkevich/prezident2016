<?php
/* @var $this CandidatsController */
/* @var $model Candidats */

$this->breadcrumbs=array(
	'Кандидаты'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

?>

<h2>Редактирование кандидата №<?php echo $model->id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>