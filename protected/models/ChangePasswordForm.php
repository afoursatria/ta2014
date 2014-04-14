<?php
// models/ChangePasswordForm.php

class ChangePasswordForm extends CFormModel
{
    /**
     * @var string
     */
    public $currentPassword;

    /**
     * @var string
     */
    public $newPassword;

    /**
     * @var string
     */
    public $newPasswordRepeat;

    /**
     * Validation rules for this form.
     *
     * @return array
     */

    private $_user;

    public function rules()
    {
        return array(
            array('currentPassword', 'validateCurrentPassword'),
            array('currentPassword, newPassword, newPasswordRepeat', 'required'),
            array('newPassword', 'compare', 'compareAttribute'=>'newPasswordRepeat'),
            // array('newPassword', 'match', 'pattern'=>'/^[a-z0-9_\-]{5,}/i', 'message'=>'Your password does not meet our password complexity policy.'),
        );
    }

    public function init()
    {
    $this->_user = User::model()->findByAttributes( array( 'use_username'=>Yii::app()->user->username ) );
    }

    /**
     * Saves the new password.
     */
    public function changePassword()
    {
        $this->_user->use_password = md5($this->newPassword);
        if( $this->_user->save() )
          return true;
        return false;

    }

    /**
     * Validates current password.
     *
     * @return bool Is password valid
     */
    public function validateCurrentPassword($attribute,$params)
    {
        if( md5($this->currentPassword) !== $this->_user->use_password )
        {
            $this->addError($attribute,'Your current password does not match');
        }
    }
}