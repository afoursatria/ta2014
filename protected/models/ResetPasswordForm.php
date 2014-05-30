<?php
/**
* 
*/

class ResetPasswordForm extends CFormModel
{
	
	public $email;

	public $verifyCode;

	private $_user;

	public function rules()
    {
        return array(
            array('email', 'validateEmail'),
            array('email', 'required', 'message'=>Yii::t('user','{attribute} is required')),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message'=>Yii::t('user','Verification code is invalid')),
        );
    }

    public function init()
    {
    	$this->_user = User::model()->findByAttributes( array( 'use_email'=>$this->email ) );
    }

    public function validateEmail($attribute,$params)
    { 
  
        if(empty($this->_user->use_email))
        {
            $this->addError($attribute,Yii::t('user', 'Your Email is not registered'));
            // return false;
        }

        // return false;
    }
}
