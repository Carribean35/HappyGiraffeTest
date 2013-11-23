<?php
class UserRegistration extends Portlet
{
	public $title='Registration';

	protected function renderContent()
	{
		$form=new User();
		$form->formId = 'registrationForm';

		$this->render('userRegistration',array('model'=>$form));
	}
}