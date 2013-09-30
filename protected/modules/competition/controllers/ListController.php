<?php

class ListController extends Controller
{
	public function actionCreate()
	{
	    $model=new Competition;
	    // uncomment the following code to enable ajax-based validation
	    if(isset($_POST['ajax']) && $_POST['ajax']==='competition-create-form')
	    {
		echo CActiveForm::validate($model);
		Yii::app()->end();
	    }


	    if(isset($_POST['Competition']))
	    {
		$model->attributes=$_POST['Competition'];
		if($model->validate())
		{
		    if ($model->save()) {

			$this->redirect($this->createUrl('/competition/list/select'));
		    } else throw new CHttpException(500,'Ошибка сервера БД');
		}
	    }
	    $this->render('create',array('model'=>$model));
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSelect()
	{
		Yii::app()->request->cookies['competition']= new CHttpCookie('competition',1);
		$this->redirect($this->createUrl('/competition/current'));
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
