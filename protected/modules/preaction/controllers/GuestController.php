<?php

class GuestController extends Controller
{
    function init()
    {
	if (!Yii::app()->user->isGuest) $this->redirect($this->createUrl('/preaction/juide/list'));
	$this->defaultAction='submit';
	$this->layout='//layouts/column2';
    }

    protected function beforeAction($action)
    {
	$this->menu[0]['title']='Электронная заявка';
	$this->menu[0]['items']=array(
	    array('label'=>'Подать заявку', 'url'=>array('/preaction/guest/submit')),
	    array('label'=>'Статус', 'url'=>array('/preaction/guest/status')),
	);
        $ret = parent::beforeAction($action);
        return $ret;
    }


	public function actionBackcall()
	{
		$this->render('backcall');
	}

	public function actionStatus()
	{
		$this->render('status');
	}

	public function actionView()
	{
		$this->render('view');
	}

	public function actionSubmit()
	{
		$this->render('submit');
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
