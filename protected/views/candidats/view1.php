<?php
/* @var $this CandidatsController */
/* @var $model Candidats */

$this->breadcrumbs=array(
	'Candidats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список кандидатов', 'url'=>array('index')),
	array('label'=>'Добавить кандидата', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить кандидата?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Анкета кандидата #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'picture' => array(
                    'label'=>'фото',
                    'type'=>'raw',
                    'value'=>CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->picture,'', array('width'=>'200px'))
                ),
		'about',
        array(               // related city displayed as a link
            'label'=>'ФИО',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->name), array('candidats/view','id'=>$model->name)),
        ),
	),
)); ?>
