<?php

class CandidatsController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
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
                'actions' => array('index', 'view', 'new', 'all','admin'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->layout = '//layouts/column1';
        $candidats = Candidats::model()->findAll('status','=','show');
        $this->render('index',array('candidats'=>$candidats));
        
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
       $votes=Controller::votes($id);
       $model = $this->loadModel($id);
       if(Yii::app()->request->isAjaxRequest){
       echo CHtml::encode($model->biografy);
            // Завершаем приложение
            Yii::app()->end();
        }

        $result = $this->renderPartial('_view', $votes, true);
        $this->render('view', ['r' => $result,'main' => $model,'votes'=>$votes]);
        
    }
/**
     * Lists all models.
     */
    public function actionAll() {
        $dataProvider = new CActiveDataProvider('Candidats');
		$votes_all = Votes::model()->count();
        $this->render('all', array(
            'dataProvider' => $dataProvider,'votes_all'=>$votes_all));
    }
	
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
         $this->layout = '//layouts/column2';
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Candidats'])) {
            $model->attributes = $_POST['Candidats'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if ($model->picture) {
            $dir = $_SERVER['DOCUMENT_ROOT'] . '/' . Yii::app()->createUrl('/') . '/images/';
            $pic = $dir . $model->picture;
            @unlink($pic);
        }
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionNew() {
        $model = new Candidats;
        if (Yii::app()->request->getPost('Candidats')) {
            $model->attributes = Yii::app()->request->getPost('Candidats');
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
         $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
        $this->render('new', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Candidats('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Candidats']))
            $model->attributes = $_GET['Candidats'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Candidats the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Candidats::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Candidats $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'candidats-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
