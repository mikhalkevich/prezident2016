<?php
class MongoController extends Controller {
    
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
      /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }  
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'new', 'all','captcha','index1'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
     public function actionIndex() {
        $this->layout = '//layouts/column1';
        $candidats = Candidatsm::model()->find(array("status"=>"show"));
        $this->render('index',array('candidats'=>$candidats));
        
    }
    
    
    public function actionNew() {
        $model = new Candidatsm;
        if (Yii::app()->request->getPost('Candidatsm')) {
            $model->attributes = Yii::app()->request->getPost('Candidatsm');
            $model->save();
            $file = CUploadedFile::getInstance($model, 'picture');
            $uploaded = false;
            if ($model->validate()) {
                if ($file) {
                    $uploaded = $file->saveAs($_SERVER['DOCUMENT_ROOT'] . '/' . Yii::app()->createUrl('/') . '/images/' . $file->getName());
                    $model->picture = $file->getName();
                }
            }

            if (!$model->save()) {
                $model->getErrors();
            }
        }
        $this->render('new', array(
            'model' => $model,
        ));
    }  
}
?>
