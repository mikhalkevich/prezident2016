<?php
/* @var $this CandidatsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Кандидаты',
);
?>

<h1>Все кандидаты</h1>
<div class="view">Кандидат набравший больше всего голосов, становится Президентом Мира.</div>
<table class="table-bordered">
    <tr>
        <th class="nomer">
             №
        </th>
        <th class="small_img">
            Кандидат
        </th>
        <th class="about">
           Программа
        </th>
        <th class="raiting">
            Результаты голосования
        </th>
        <th class="golos">
            Голосовать
        </th>
    </tr>  
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_all',
	'viewData'=>array('votes_all'=>$votes_all)
)); ?>
</table>