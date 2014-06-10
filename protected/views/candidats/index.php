<?php
/* @var $this CandidatsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Кандидаты',
);
?>
<h2 align="center">Все кандидаты</h2>
<div class="view" align="center"><h3>Кандидат набравший больше всего голосов, становится Духовным лидером года.</h3></div>
<table class="table-bordered">
    <tr>
        <th class="nomer">
             №
        </th>
        <th class="small_img">
             Кандидат
        </th >
        <th class="about">
            Программа
        </th>
        <th class="raiting">
            Голосов 
        </th>
        <th class="golos">
            Голосовать
        </th>
    </tr>  
    <? foreach ($candidats as $c): ?>
        <tr>
            <td>
                <h5><?= $c->id ?></h5>
            </td>
            <td>
                <img width=250px src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?= $c->picture; ?>" align="center" />
                <h5><?= CHtml::link($c->name, array('candidats/view/' . $c->id), array('class' => 'bigname')) ?></h5>
            </td>
            <td>
    <h4 class ="prog1">Мировоззрение</h4>
    <p class="program1"> <?php echo $c->about; ?></p>
            </td>
            <td>
                <?$za = 0?>
                <?$protiv = 0?>
                <?foreach($c->Votes as $yes):?>
                 <?$yes->protiv_za == 'za' ? $za++ : $protiv++;?>
                <?endforeach;?>
               <h3 class="gol_za"> <?=$za?> </h3>
               <h3 class="gol_protiv"> <?=$protiv?> </h3>
            </td>
            <td>
                <a name="<?=$c->id?>"></a>
                <h3 class="link za"><?= CHtml::link('ЗА', array('base/page', 'alias' => 'za', 'id' => $c->id)) ?></h3>
                <h3 class="link protiv"><?= CHtml::link('ПРОТИВ', array('base/page', 'alias' => 'protiv', 'id' => $c->id)) ?></h3>
            </td>
        </tr>  
    <? endforeach; ?>
</table>
<script type="text/javascript">
$(document).ready(function() {
    $(".program1").hide();
   $(".prog1").click(function() {
      var elem = $(".program1");
      if (elem.is(":hidden")) { // Если элемент скрыт
           $("elem:visible").hide();
         // Скрываем видимые элементы
         elem.show();
      }
      else { // Если элемент был отображен ранее
         elem.hide(); // Скрываем элемент
      }
      return false; // Прерываем переход по ссылке
   });
});
</script>