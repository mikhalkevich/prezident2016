<? $this->breadcrumbs=array(
    'Кандидаты'=>array('/candidats/index'),
    $main->name);?>
<h1 align="center"><?php echo $model->name; ?></h1>
<table width="100%">
    <tr>
        <td width="25%" align="center" valign="top">
        </td>
        <td align="center">
    <div class="about_cand">
    <img width="330px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?=$main->picture?>" align="center" />   
    <?=CHtml::link($main->name, array('candidats/view/'.$main->id), array('class'=>'bigname'))?>
    <div align="left">
    <div class="div zaza" style="width:<?= $votes[value2] ?>%"><?= $votes[value2] ?>% (<?= $votes[votes_za]; ?>)</div>
    <div class="div protivprotiv" style="width:<?=$votes[value1] ?>%"><?= $votes[value1] ?>% (<?= $votes[votes_protiv]; ?>)</div>
    </div>
<?= $r?>
    </div>
         <?=CHtml::link('Все кандидаты ('.$votes[cand_all].')', array('candidats/index'), array('class'=>'more'))?>
         <?=CHtml::link('Предложить своего кандидата', array('candidats/new'),array('class'=>'more'))?>     
        </td>
        <td width="25%" align="center" valign="top">
        </td>
     </tr>
</table>
