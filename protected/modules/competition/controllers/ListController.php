<?php

class ListController extends Controller
{
	public function actionCreate()
	{
		$this->render('create');
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
