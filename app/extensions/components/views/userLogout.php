<?php echo CHtml::beginForm(false, false, array('class' => 'navbar-form pull-right')); ?>

	<div class="brand">
	<?php echo Yii::app()->user->name;?>
	</div>
	
	<?php echo CHtml::ajaxSubmitButton('Выйти', '/user/logout/', array('success' => 'myAfterlogout', 'dataType' => 'json'), array('class' => 'btn')); ?>
		
<?php echo CHtml::endForm(); ?>


<script language="javascript">
	function myAfterlogout (response) {
		window.location.reload();
	}
</script>
