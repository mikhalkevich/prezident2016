<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        
        public static function votes($id) {
        $votes_za = Votes::model()->count('candidat_id = :id AND protiv_za = "za"', array(':id' => $id));
        $votes_all = Votes::model()->count('candidat_id = :id', array(':id' => $id));
        $cand_all = Candidats::model()->count();
        $votes_protiv = $votes_all - $votes_za;
        $value1 = round($votes_protiv * 100 / $votes_all);
        $value2 = 100 - $value1;
        return array('value1' => $value1, 'value2' => $value2, 'votes_za' => $votes_za, 'votes_protiv' => $votes_protiv,'cand_all' => $cand_all);
        }
}