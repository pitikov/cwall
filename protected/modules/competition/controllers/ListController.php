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
			$model->update();
			$this->redirect($this->createUrl('/competition/list/select',array('cid'=>$model->cid)));
		    } else throw new CHttpException(500,'Ошибка сервера БД');
		}
	    }
	    $this->render('create',array('model'=>$model));
	}

	public function actionIndex()
	{
	    $model=Competition::model()->findAll();

	    $this->render('index', array('model'=>$model));
	}

	public function actionDelete($cid)
	{
	    if (isset($cid)) {
		$competition = Competition::model()->findByPk($cid);
		$competition->delete();
		$this->redirect($this->createUrl('/competition/list/index'));
	    } else throw new CHttpException(400,'Некорректный набор параметров');
	}

	public function actionSelect()
	{
	    if (isset($_GET['cid'])) {
	      $cid=(int)$_GET['cid'];
	      Yii::app()->request->cookies['competition']= new CHttpCookie('competition',$cid);
	      $this->redirect($this->createUrl('/competition/current'));

	    } else {
		if (isset(Yii::app()->request->cookies['competition'])) unset(Yii::app()->request->cookies['competition']);
		throw new CHttpException(400,'Некорректный набор параметров');
	    }
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
