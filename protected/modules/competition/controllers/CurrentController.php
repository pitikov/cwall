<?php

class CurrentController extends Controller
{

	public function init()
	{
	    $this->defaultAction='pasport';
	    if(!isset(Yii::app()->request->cookies['competition']->value)) {
		throw new CHttpException(404,'Указанная запись не найдена');
	    } else {
	      $this->layout='//layouts/column2';
	      $this->menu[0]['title']='Соревнования';
	      $this->menu[0]['items']=array(
	          array('label'=>'Описание соревнований', 'url'=>array('/competition/current/pasport')),
	          array('label'=>'Структура соревнований', 'url'=>array('/competition/current/struct')),
	          array('label'=>'Участники', 'url'=>array('/competition/current/memberlist')),


	          array('label'=>'Закрыть', 'url'=>array('/competition/current/close')),

	      );
	    }
	}

	public function actionDraw()
	{
		$this->render('draw');
	}

	public function actionMemberadd()
	{
		$this->render('memberadd');
	}

	public function actionMemberdel()
	{
		$this->render('memberdel');
	}

	public function actionMemberlist()
	{
		$this->render('memberlist');
	}

	public function actionRoundadd()
	{
		$this->render('roundadd');
	}

	public function actionRounddel()
	{
		$this->render('rounddel');
	}

	public function actionRoundselect()
	{
		$this->render('roundselect');
	}

	public function actionStruct()
	{
		$this->render('struct');
	}

	public function actionPasport()
	{
	    $model=new Competition;

	    // uncomment the following code to enable ajax-based validation
	    /*
	    if(isset($_POST['ajax']) && $_POST['ajax']==='competition-pasport-form')
	    {
		echo CActiveForm::validate($model);
		Yii::app()->end();
	    }
	    */

	    if(isset($_POST['Competition']))
	    {
		$model->attributes=$_POST['Competition'];
		if($model->validate())
		{
		    // form inputs are valid, do something here
		    return;
		}
	    }
	  $this->render('pasport',array('model'=>$model));
	}

	public function actionClose()
	{
		unset(Yii::app()->request->cookies['competition']);
		$this->redirect($this->createUrl('/competition/list/index'));
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
