<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $use_id
 * @property string $use_fullname
 * @property string $use_email
 * @property integer $use_gender
 * @property string $use_birthdate
 * @property integer $use_occupation
 * @property integer $use_country
 * @property integer $use_city
 * @property string $use_address
 * @property string $use_foto
 * @property string $use_cv
 * @property integer $rol_id
 * @property string $use_username
 * @property string $use_password
 * @property string $use_pass_ori
 * @property integer $use_is_active
 * @property string $use_update_date
 * @property integer $use_update_by
 * @property string $use_reg_date
 * @property string $use_last_login_ip
 * @property string $use_last_login_date
 */
class User extends CActiveRecord
{	
	public $verifyCode;
	public $repeat_password;
	private $_identity;

    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('use_username', 'length', 'min'=>6, 'max'=>10, 'tooShort'=>'Username doesn\'t meet criteria','tooLong'=>'Username doesn\'t meet criteria', 'on'=>'register'),
			array('use_password', 'match', 'pattern'=>'/^[\*a-zA-Z0-9]{6,12}$/', 'message' => 'Invalid characters in password.'),
			array('use_username, use_password', 'required', 'on'=>'register, login'),
			array('use_username, use_email', 'unique', 'message'=>'This {attribute} is already registered'),	
			array('use_fullname, use_email' , 'required', 'on'=>'register, update'),
			array('use_email', 'email', 'message'=>'Email is not valid'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
			array('use_gender, use_occupation, use_country, use_city, rol_id, use_is_active, use_update_by', 'numerical', 'integerOnly'=>true),
			array('use_fullname, use_email', 'length', 'max'=>25),
			array('use_birthdate', 'length', 'max'=>10),
			array('use_username, use_update_date', 'length', 'max'=>15),
			// array('use_password, use_pass_ori', 'length', 'min'=>6, 'max'=>12),
			array('use_password','compare', 'compareAttribute'=>'repeat_password', 'on'=>'users'),
			array('use_last_login_ip', 'length', 'max'=>15),
			array('use_address', 'safe'),
			// The following rule is used by searchedrch().
			// @todo Please remove those attributes that should not be searched.
			array('use_id, use_fullname, use_email, use_gender, use_birthdate, use_occupation, use_country, use_city, use_address, use_foto, use_cv, rol_id, use_username, use_password, use_pass_ori, use_is_active, use_update_date, use_update_by, use_reg_date, use_last_login_ip, use_last_login_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'use_id' => 'Use',
			'use_fullname' => 'Fullname',
			'use_email' => 'Email',
			'use_gender' => 'Gender',
			'use_birthdate' => 'Birthdate',
			'use_occupation' => 'Occupation',
			'use_country' => 'Country',
			'use_city' => 'City',
			'use_address' => 'Address',
			'use_foto' => 'Foto',
			'use_cv' => 'Cv',
			'rol_id' => 'Role',
			'use_username' => 'Username',
			'use_password' => 'Password',
			'use_pass_ori' => 'Pass Ori',
			'use_is_active' => 'Is Active',
			'use_update_date' => 'Use Update Date',
			'use_update_by' => 'Use Update By',
			'use_reg_date' => 'Use Reg Date',
			'use_last_login_ip' => 'Use Last Login Ip',
			'use_last_login_date' => 'Use Last Login Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('use_id',$this->use_id);
		$criteria->compare('use_fullname',$this->use_fullname,true);
		$criteria->compare('use_email',$this->use_email,true);
		$criteria->compare('use_gender',$this->use_gender);
		$criteria->compare('use_birthdate',$this->use_birthdate,true);
		$criteria->compare('use_occupation',$this->use_occupation);
		$criteria->compare('use_country',$this->use_country);
		$criteria->compare('use_city',$this->use_city);
		$criteria->compare('use_address',$this->use_address,true);
		$criteria->compare('use_foto',$this->use_foto,true);
		$criteria->compare('use_cv',$this->use_cv,true);
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('use_username',$this->use_username,true);
		$criteria->compare('use_password',$this->use_password,true);
		$criteria->compare('use_pass_ori',$this->use_pass_ori,true);
		$criteria->compare('use_is_active',$this->use_is_active);
		$criteria->compare('use_update_date',$this->use_update_date,true);
		$criteria->compare('use_update_by',$this->use_update_by);
		$criteria->compare('use_reg_date',$this->use_reg_date,true);
		$criteria->compare('use_last_login_ip',$this->use_last_login_ip,true);
		$criteria->compare('use_last_login_date',$this->use_last_login_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {

    	if ($this->isNewRecord) {
    		$pass = md5($this->use_password);
			$this->use_password = $pass;
			$this->use_reg_date = new CDbExpression('NOW()');
    	}
    	
		return true;
    }
}