<? $this->breadcrumbs = array('Кандидат'); ?>
<table width="100%">
    <tr>
        <td width="15%" align="center" valign="top">

            <? if ($golos != 'za'): ?>
                <h1 class="link za"><?= CHtml::link('ЗА', array('base/page', 'alias' => 'za', 'id' => $main->id)) ?></h1>
            <? else: ?>
                <h2>Вы проголосовали ЗА.</h2> 
                Вы можете изменить свое решение.
            <? endif; ?>
        </td>
        <td align="center">
            <div class="about_cand">
                <img width="333px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?= $main->picture ?>" align="center" />   
                <?php echo CHtml::encode($main->name); ?>
                <div align="left">
                    <div class="div zaza" style="width:<?= $votes[value2] ?>%"><?= $votes[value2] ?>% (<?= $votes[votes_za]; ?>)</div>
                    <div class="div protivprotiv" style="width:<?=$votes[value1] ?>%"><?= $votes[value1] ?>% (<?= $votes[votes_protiv]; ?>)</div>
                </div>
                <?= $r ?>
            </div>
        </td>
        <td width="15%" align="center" valign="top">
            <? if ($golos != 'protiv'): ?>
                <h1 class="link protiv"><?= CHtml::link('ПРОТИВ', array('base/page', 'alias' => 'protiv', 'id' => $main->id)) ?></h1>
            <? else: ?>
                <h2>Вы проголосовали ПРОТИВ. </h2>
                <p>Вы можете изменить свое решение, или предложить  своего  кандидата.</p>
                <?= CHtml::link('Предложить кандидата', array('candidats/new')) ?>
            <? endif; ?>
        </td>
    </tr>
</table>
<div class="about_cand" >
    <h2 class ="prog">Программа кандидата в президенты</h2>
    <div class="program"> <?php echo $main->about; ?></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".program").hide();
   $(".prog").click(function() {
      var elem = $(".program");
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
<div class="about_cand">
    <h2 style="display: block;margin: o auto;">
        <?php echo CHtml::ajaxLink('Биография', '', array('type' => 'POST', 'update' => '.biografy')) ?></h2>
    <div class="biografy"></div> 
</div>
<h3> <?= CHtml::link('Все кандидаты (' . $cand_all . ')', array('candidats/index'), array('class' => 'more')) ?></h3>
