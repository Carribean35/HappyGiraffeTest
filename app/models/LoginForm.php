<?php

class LoginForm extends CFormModel
{

	public $email;
    public $password;
    
    private $_identity;

	public function rules()
    {
        return array(
            array('email, password', 'required'),
        	array('password', 'authenticate'),
		);
    }
    
    public function authenticate($attribute,$params)
    {
    	if(!$this->hasErrors())
    	{
    		$this->_identity=new UserIdentity($this->email,$this->password);
    			
    		if(!$this->_identity->authenticate()) {
    			$this->addError('password','Неверный логин или пароль');
    		}
    	}
    }
    
    public function login()
    {
    	if($this->_identity===null)
    	{
    		$this->_identity=new UserIdentity($this->email,$this->password);
    
    		Yii::app()->user->login($this->_identity);
    	}
    	if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
    	{
    		Yii::app()->user->login($this->_identity);
    		return true;
    	}
    	else
    		return false;
    }
	
}
