<?php

class MainController extends Controller
{
    public function actionIndex(){
     $user = yii::app()->getUser();
     if($user->isGuest){
         $this->redirect('/');
     }else{
      if($user->checkAccess('admin')){

      }
     }
    }
}