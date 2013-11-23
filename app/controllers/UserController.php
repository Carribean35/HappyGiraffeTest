<?php

class UserController extends EController
{
	public function actionLogin()
	{
		if(isset($_POST['LoginForm'])) {
			$model = new LoginForm();
			$model->attributes=$_POST['LoginForm'];
			
			if($model->validate() && $model->login()) {
				echo CJSON::encode(
						array('errors' => false)
				);
			} else {
				echo CJSON::encode(
						array('errors' => $model->getErrors())
				);
			}
			Yii::app()->end();
			
		}
	}
	
	public function actionRegistration()
	{
		if(isset($_POST['User'])) {
			$model = new User();
			$model->formId = 'registrationForm';
			$model->attributes=$_POST['User'];
			$this->performAjaxValidation($model);
			$model->password = crypt($model->password,$model->password);
			$model->passwordRepeat = crypt($model->passwordRepeat,$model->passwordRepeat);
			if($model->save()) {
				if (Yii::app()->request->isAjaxRequest) {
					echo CJSON::encode(
							array(
									'error'=>false,
							)
					);
					Yii::app()->end();
				}
			}
		}
	}
	
	public function actionLogout() 
	{
		Yii::app()->user->logout();
	}

}