<?php

class User extends CActiveRecord
{

    public $passwordRepeat;
    public $formId;

    public function tableName()
    {
    	return 'user';
    }
    
	public function rules()
    {
        return array(
            array('email, password, name', 'required'),
            array('email', 'email'),        		
            array('name', 'unique', 'attributeName' => 'name', 'className' => 'User'),        		
            array('email', 'unique', 'attributeName' => 'email', 'className' => 'User'),        		
            array('passwordRepeat', 'compare', 'compareAttribute' => 'password'),
		);
    }
    
    public function attributeLabels()
    {
    	return array(
    			'name' => "Имя",
    			'email' => "Email",
    			'password' => "Пароль",
    			'passwordRepeat' => "Подтверждение пароля",

    	);
    }
    
    /**
     * @return array relational rules.
     */
    public function relations()
    {
    	// NOTE: you may need to adjust the relation name and the related
    	// class name for the relations automatically generated below.
    	return array(
    		'comments'=>array(self::HAS_MANY, 'Comments', 'user_id'),
    	);
    }
    
    public static function model($className=__CLASS__)
    {
    	return parent::model($className);
    }
}
