<?php
class UserLogin extends Portlet
{
	public $title='Login';

	protected function renderContent()
	{
		$form=new LoginForm();
		
		$this->render('userLogin',array('model'=>$form));
	}
}