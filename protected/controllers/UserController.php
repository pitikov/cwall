<?php

class UserController extends Controller
{
    function init()
    {
	if(Yii::app()->user->isGuest) {
	    $this->defaultAction='login';
	} else {
	    $this->defaultAction='info';
	    $this->layout='//layouts/column2';

	    $this->menu[0]['title']='Пользователь: '.Yii::app()->user->name;
	    $this->menu[0]['items']=array(
	        array('label'=>'Информация', 'url'=>array('/user/info')),
	        array('label'=>'Редактировать профиль', 'url'=>array('/user/profile')),
	        array('label'=>'История запросов', 'url'=>array('/user/history')),
	        array('label'=>'Выйти', 'url'=>array('/user/logout')),
	    );
	}
    }

    public function actionHistory()
    {
	$this->render('history');
    }

    public function actionInfo()
    {
	$this->render('info');
    }

    public function actionLogin()
    {
	$this->render('login');
    }

    public function actionLogout()
    {
	Yii::app()->user->logout();
	$this->redirect(Yii::app()->homeUrl);
    }

    public function actionProfile()
    {
	$this->render('profile');
    }

    public function actionPwdrestore()
    {
	$this->render('pwdrestore');
    }

    public function actionRegistration()
    {
	$this->render('registration');
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
	// return the filter configuration for this controller, e.g.:
	return array(
	    'inlineFilterName',
	    array(
		'class'=>'path.to.FilterClass',
		'propertyName'=>'propertyValue',
	    ),
	  );
      }

    public function actions()
    {
      // return external action classes, e.g.:
	  return array(
	      'action1'=>'path.to.ActionClass',
	      'action2'=>array(
		  'class'=>'path.to.AnotherActionClass',
		  'propertyName'=>'propertyValue',
	    ),
	);
    }
    */
}
