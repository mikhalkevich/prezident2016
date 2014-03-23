
 <tr>
            <td>
                <h5><?= $data->id ?></h5>
            </td>
            <td>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/small_<?= $data->picture; ?>" align="center" />
                <h5><?= CHtml::link($data->name, array('candidats/view/' . $data->id), array('class' => 'bigname')) ?></h5>
            </td>
            <td>
			<h4 class ="prog1">Программа кандидата в президенты</h4>
                <?= $data->about ?>
				<h4>Видеоролик кандидата</h4>
			   <video src="/audio/koldunv.ogg" wirdth ="320" heigth="240" controls poster= "">
			   <a href ="/audio/koldunv.ogg">Загрузка видеоролика</a>
			   </video> 
            </td>
            <td>
         <? $this->widget('ext.chart.EChartWidget', array(
                        'data'=>array($votes_all,$data->raiting),
                        'labels'=>array("Против($votes_all)", "За ($data->raiting)")
                    ));
    ;?>
            <td>

                <h3 class="link za"><?= CHtml::link('ЗА', array('base/page', 'alias' => 'za', 'id' => $data->id)) ?></h3>
                <br/><br/><br/>
                <h3 class="link protiv"><?= CHtml::link('ПРОТИВ', array('base/page', 'alias' => 'protiv', 'id' => $data->id)) ?></h3>


            </td>
        
</tr>  

