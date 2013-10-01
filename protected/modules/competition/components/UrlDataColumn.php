<?php
class UrlDataColumn extends CDataColumn {
	/**
	 * Renders the data cell content.
	 * This method evaluates {@link value} or {@link name} and renders the result.
	 * @param integer $row the row number (zero-based)
	 * @param mixed $data the data associated with the row
	 */
	protected function renderDataCellContent($row,$data)
	{
		if($this->value!==null)
			$value=$this->evaluateExpression($this->value,array('data'=>$data,'row'=>$row));
		else if($this->name!==null)
			$value=CHtml::value($data,$this->name);
		$post=Competition::model()->find(array(
		    'select'=>'cid',
		    'condition'=>'title=:postID',
		    'params'=>array(':postID'=>$value),
		));
		echo $value===null ? $this->grid->nullDisplay : CHtml::link($this->grid->getFormatter()->format($value,$this->type),array('/competition/list/select', 'cid'=>$post->cid,));
	}
}

?>
