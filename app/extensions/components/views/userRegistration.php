<?php 
	/* @var $model User*/
?>

<div id="registration_form" class="modal hide fade" tabindex="-1" data-width="100" data-height="2000">

	<div class="modal-header"><button data-dismiss="modal" type="button" class="close">x</button><p></p>
	<h3 id="myModalLabel">Регистрация</h3>
	</div>

	<div class="modal-body">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'registrationForm',
			'enableAjaxValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>false,
				'errorCssClass'=>'text-error',
				'afterValidate'=>'js:myAfterValidate',

			),
			'action'=>'/user/registration/'
		)); ?>
		
		
		<div class="control-group">
			<?php echo $form->label($model,'name'); ?>
			<?php echo $form->textField($model,'name'); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
		<div class="control-group">
			<?php echo $form->label($model,'email'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		<div class="control-group">
			<?php echo $form->label($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="control-group">
			<?php echo $form->label($model,'passwordRepeat'); ?>
			<?php echo $form->passwordField($model,'passwordRepeat'); ?>
			<?php echo $form->error($model,'passwordRepeat'); ?>
			
		</div>
		
		<div class="control-group">
		<?php echo CHtml::submitButton('Зарегестрироваться', array('class' => 'btn')); ?>
		</div>
		<div class="control-group">
		<?php echo CHtml::htmlButton('Закрыть', array('class' => 'btn', 'type' => 'reset', 'id' => 'registrationFormReset')); ?>
		</div>
		
	<?php $this->endWidget(); ?>
	
	</div>

</div>

<script language="javascript">

	$("#registrationFormReset").click(function() {
		$("#registration_form").modal('hide');
	})
	
	function myAfterValidate (form, data, hasError) {

		if (hasError) {
			
		} else {
			$("#registrationFormReset").click();			
		}

		return false;
	}
</script>
