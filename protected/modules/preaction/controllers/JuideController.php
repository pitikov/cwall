<?php

class JuideController extends Controller
{
    function init()
    {
	if (Yii::app()->user->isGuest) $this->redirect($this->createUrl('/preaction/guest/submit'));
	$this->layout='//layouts/column2';
	$this->defaultAction='list';
    }

    protected function beforeAction($action)
    {
	$this->menu[0]['title']='Электронная заявка';
	$this->menu[0]['items']=array(
	    array('label'=>'Список заявок', 'url'=>array('/preaction/juide/list')),
	    array('label'=>'Принять', 'url'=>array('/preaction/juide/accept'),'visible'=>($action->id == 'process')),
	    array('label'=>'Отклонить', 'url'=>array('/preaction/juide/reject'),'visible'=>($action->id == 'process')),

	);
        $ret = parent::beforeAction($action);
        return $ret;
    }

    public function actionList()
    {
	$this->render('list');
    }

    public function actionProcess()
    {
	$this->render('process');
    }

    public function actionRequest()
    {
	$this->render('request');
    }

    public function actionReject()
    {
	$this->render('request');
    }

    public function actionAccept()
    {
	$this->render('request');
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
