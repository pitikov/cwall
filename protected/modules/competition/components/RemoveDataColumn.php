<?php
class RemoveDataColumn extends CDataColumn {
	public $value=0; //Заткнем стандартный класс на предмет значения отсутствия поля

	protected function renderDataCellContent($row,$data)
	{
	    echo CHtml::link('<img src="/images/delete.png" alt="Удалить" title="Удалить">',
			      array('/competition/list/delete','cid'=>$this->grid->dataProvider->data[$row]['cid']),
			      array('onclick'=>'return confirm(\'Удалить соревнования\n\"'.
						$this->grid->dataProvider->data[$row]['title'].
						'\"?\')')
	    );
	}
}
?>
