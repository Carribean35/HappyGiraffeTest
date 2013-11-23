<?php
class UserLogout extends Portlet
{
	public $title='Logout';

	protected function renderContent()
	{
		$this->render('userLogout');
	}
}