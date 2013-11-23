<?php 
	/* @var $model Images*/
?>
<div class="container">
	<h2><?php echo $model->title;?></h2>
	<img src="<?php echo $model->link?>">
	
	<?php $this->widget('CommentsWiget', array('params' => array('module_id' => $model->module_id, 'item_id' => $model->id))); ?>
	
</div>
