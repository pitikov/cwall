<?php

class DefaultController extends Round
{
	public function actionIndex()
	{
		$this->render('index');
	}
}