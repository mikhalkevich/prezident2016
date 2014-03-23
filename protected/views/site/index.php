<table width="100%">
    <tr>
        <td width="33%" align="center" valign="top">
            <h1 class="link za">
                <?=CHtml::link('ЗА', array('base/page', 'alias'=>'za'))?>
            </h1>
        </td>
        <td align="center">
         <img width="333px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/luka.jpg" align="center" />   
        </td>
        <td width="33%" align="center" valign="top">
            <h1 class="link protiv">
                <?=CHtml::link('ПРОТИВ', array('base/page', 'alias'=>'protiv'))?>
            </h1>
            Голосуя против, вы можете предложить свою кондидатуру.
        </td>
     </tr>
</table>