<?php
/* @var $this CandidatsController */
/* @var $model Candidats */

$this->breadcrumbs=array(
	'Кандидаты'=>array('index'),
	'Административная панель',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#candidats-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление кандидатами</h1>
<?php echo CHtml::link('Поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'candidats-grid',
	'dataProvider'=>$model->search(),
        'selectableRows'=>3,
	'filter'=>$model,
	'columns'=>array(
                array(
                'class'=>'CCheckBoxColumn',
		        'id'=>'checked',
                ),
                array(
                    'name'=>'picture',
                    'header'=> 'Изображение',
                    'type' => 'raw',
					'cssClassExpression'=>'($data->id>7)?"my":""', //Добавили класс
                    'headerHtmlOptions'=> array('width'=>200),
                    'value'=>'CHtml::image(Yii::app()->request->baseUrl."/images/".$data->picture,"", array("width"=>"200px"))'
                   ),
		'name',
		'about',
		'biografy',
		'status',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Действия'
		),
	),
)); ?>
