<?php

class BaseController extends Controller {

    protected $a;
    protected $golos;
    protected $main;
    public $id_max;

    public function actions()
	{
		return array(
			'captcha'=>array(
			//	'class'=>'CCaptchaAction',//выводит буквы
                              'class'=>'MathCaptchaAction',
				'minLength' => 1,
				'maxLength' => 10,           
			),
		);
	}
    
    
    public function __construct($id, $module = null) {
        parent::__construct('Base');
        $this->main = Candidats::model()->find('id= :id', array('id' => $id));
        $this->a = Votes::model()->find('ip = :ip', array(':ip' => $_SERVER['REMOTE_ADDR']));
        if ($this->a) {
            $this->golos = $this->a;
        } else {
            $this->golos = Null;
        }
    }

    public function actionIndex() {
        $id = Candidats::model()->findBySql("SELECT * FROM candidats ORDER BY raiting DESC LIMIT 1");
        $votes=Controller::votes($id->id);
        $result = $this->renderPartial('_index',$votes, true);
        $this->render('index', ['r' => $result, 'golos' => $this->golos,'votes'=>$votes, 'main' => $id]);
    }

    public function actionPage($alias, $id) {
        $id_cand = Candidats::model()->findByPk($id);
        $model = new Votes();

        if (!$this->golos) {
            $model->candidat_id = $id_cand->id;
            $model->ip = $_SERVER['REMOTE_ADDR'];
            $model->protiv_za = $alias;
            $model->save();
            if ($alias == 'za') {
                $id_cand->raiting++;
            } else {
                $id_cand->raiting--;
            }
            $id_cand->save();
        } else {
                $a = Votes::model()->updateAll(array('protiv_za' => $alias), 'id = :id AND ip = :ip', array(':id' => $this->a->id, ':ip' => $_SERVER['REMOTE_ADDR']));
            }
            $id_cand->save();
            Controller::redirect('/');
        }
    }