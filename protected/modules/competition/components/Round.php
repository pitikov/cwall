<?php
class Round extends Controller {
    /// @var  vrvs_code Код вида спорта по ВРВС
    public $vrvs_code = '';
    /// @var vrvs_title Наименование вида спорта по ВРВС
    public $vrvs_title = '';
    /// @var db_prefix Префикс таблиц БД
    public $db_prefix = '';
    
    
    public function init()
    {
	$this->layout = '//layouts/column2';
        parent::init();
    }
    
}

?>