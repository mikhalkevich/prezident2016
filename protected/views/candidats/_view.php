<div>
    <?
    $this->widget('ext.chart.EChartWidget', array(
                        'title'=>'Результаты голосования', 
                        'data'=>array($value1,$value2),
                        'labels'=>array('Против', 'За')
                    ));
    ;?>
</div>