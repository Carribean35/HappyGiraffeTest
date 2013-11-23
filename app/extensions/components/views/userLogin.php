<?php 
	/* @var $model LoginForm*/
?>


<?php echo CHtml::beginForm(false, false, array('class' => 'navbar-form pull-right')); ?>

	<?php echo CHtml::textField('LoginForm[email]', false, array('class'=>'span2', 'placeholder'=>'Email'));?>
	
	<?php echo CHtml::passwordField('LoginForm[password]', false, array('class'=>'span2', 'placeholder'=>'Password')); ?>
	
	<?php echo CHtml::ajaxSubmitButton('Войти', '/user/login/', array('success' => 'myAfterlogin', 'dataType' => 'json'), array('class' => 'btn')); ?>
		
	<?php echo CHtml::button('Регистрация', array('class' => 'btn', 'data-toggle' => 'modal', 'href' => '#registration_form')); ?>

<?php echo CHtml::endForm(); ?>


<script language="javascript">
	function myAfterlogin (response) {

		if (response['errors'] == false) {
			window.location.reload();
		}
		else { 
			$("#alertModalLabel").html("Ошибка");
			$("#alertModalBody").html(response['errors']['password']);
			$("#alertModal").modal('show');
		}
		
		
	}
</script>
