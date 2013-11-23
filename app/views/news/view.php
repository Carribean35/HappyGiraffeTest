<?php 
	/* @var $model News*/
?>
<div class="container">
	<h2><?php echo $model->title;?></h2>
	<p><?php echo $model->text;?></p>
	
	<?php $this->widget('CommentsWiget', array('params' => array('module_id' => $model->module_id, 'item_id' => $model->id))); ?>

</div>