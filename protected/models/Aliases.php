<?php

/**
 * This is the model class for table "aliases".
 *
 * The followings are the available columns in table 'aliases':
 * @property integer $ali_id
 * @property integer $spe_id
 * @property string $ali_speciesname
 * @property string $ali_foundername
 * @property string $ali_varietyname
 * @property integer $ref_id
 * @property integer $ali_insert_by
 * @property string $ali_insert_date
 * @property integer $ali_update_by
 * @property string $ali_update_date
 * @property integer $ali_verified_by
 * @property string $ali_verified_date
 */
class Aliases extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aliases';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ali_insert_by, ali_insert_date, ali_update_by, ali_update_date', 'required'),
			array('spe_id, ref_id, ali_insert_by, ali_update_by, ali_verified_by', 'numerical', 'integerOnly'=>true),
			array('ali_speciesname, ali_foundername, ali_varietyname', 'length', 'max'=>100),
			array('ali_insert_date, ali_update_date, ali_verified_date', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ali_id, spe_id, ali_speciesname, ali_foundername, ali_varietyname, ref_id, ali_insert_by, ali_insert_date, ali_update_by, ali_update_date, ali_verified_by, ali_verified_date', 'safe', 'on'=>'search'),
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
			'ali_id' => 'Ali',
			'spe_id' => 'Spe',
			'ali_speciesname' => 'Ali Speciesname',
			'ali_foundername' => 'Ali Foundername',
			'ali_varietyname' => 'Ali Varietyname',
			'ref_id' => 'Ref',
			'ali_insert_by' => 'Ali Insert By',
			'ali_insert_date' => 'Ali Insert Date',
			'ali_update_by' => 'Ali Update By',
			'ali_update_date' => 'Ali Update Date',
			'ali_verified_by' => 'Ali Verified By',
			'ali_verified_date' => 'Ali Verified Date',
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

		$criteria->compare('ali_id',$this->ali_id);
		$criteria->compare('spe_id',$this->spe_id);
		$criteria->compare('ali_speciesname',$this->ali_speciesname,true);
		$criteria->compare('ali_foundername',$this->ali_foundername,true);
		$criteria->compare('ali_varietyname',$this->ali_varietyname,true);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('ali_insert_by',$this->ali_insert_by);
		$criteria->compare('ali_insert_date',$this->ali_insert_date,true);
		$criteria->compare('ali_update_by',$this->ali_update_by);
		$criteria->compare('ali_update_date',$this->ali_update_date,true);
		$criteria->compare('ali_verified_by',$this->ali_verified_by);
		$criteria->compare('ali_verified_date',$this->ali_verified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aliases the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
