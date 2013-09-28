<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php if ((isset($this->menu[0]['title'])) and (isset($this->menu[0]['items']))) { ?>

<div class="span-5 last">
  <div id="sidebar">
    <?php
      foreach($this->menu as $p_menu) {
	  $this->beginWidget('zii.widgets.CPortlet', array('title'=>$p_menu['title'],));
	  $this->widget('zii.widgets.CMenu', array(
	      'items'=>$p_menu['items'],
	      'htmlOptions'=>array('class'=>'operations'),
	  ));
	  $this->endWidget();
      }
    ?>
  </div><!-- sidebar -->
</div>
<?php } ?>
<div class="span-19">
    <div id="content">
	<?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>
