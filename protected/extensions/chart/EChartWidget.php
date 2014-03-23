<?php
 class EChartWidget extends CWidget{
     public $title;
     public $data = array();
     public $labels = array();
     public function run(){
echo "<p align=center><img src='http://chart.apis.google.com/chart?chtt=".urlencode($this->title)."&chco=FF0000,008000&cht=pc&chs=350x200&chd=t:".(int)$this->data[0].",".(int)$this->data[1]."&chl=".implode('|', $this->labels)."'></p>";
     }
 }