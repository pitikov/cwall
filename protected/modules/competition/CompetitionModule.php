<?php

class CompetitionModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'competition.models.*',
			'competition.components.*',
		));
		if (isset(Yii::app()->request->cookies['competition']->value)) {
		      $this->defaultController='current';
		} else {
		      $this->defaultController='list';
		}
	}

	public function beforeControllerAction(Controller $controller, CAction $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$controller->menu[0]['title']='Соревнования';

			return true;
		}
		else
			return false;
	}
}
