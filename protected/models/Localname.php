<?php

/**
 * This is the model class for table "localname".
 *
 * The followings are the available columns in table 'localname':
 * @property integer $loc_id
 * @property integer $spe_id
 * @property string $loc_localname
 * @property string $loc_region
 * @property integer $ref_id
 * @property integer $loc_insert_by
 * @property string $loc_insert_date
 * @property integer $loc_update_by
 * @property string $loc_update_date
 * @property integer $loc_verified_by
 * @property string $loc_verified_date
 */
class Localname extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'localname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('spe_id, loc_localname, loc_region', 'required'),
			array('loc_localname','unique','message'=>'{attribute}:{value} already exists!'),
			array('spe_id, ref_id, loc_insert_by, loc_update_by, loc_verified_by', 'numerical', 'integerOnly'=>true),
			array('loc_localname, loc_region', 'length', 'max'=>100),
			array('loc_insert_date, loc_update_date, loc_verified_date', 'length', 'max'=>20),
			array('spe_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('loc_id, spe_id, loc_localname, loc_region, ref_id, loc_insert_by, loc_insert_date, loc_update_by, loc_update_date, loc_verified_by, loc_verified_date', 'safe', 'on'=>'search'),
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
			'loc_id' => 'Loc',
			'spe_id' => 'Species',
			'loc_localname' => 'Local Name',
			'loc_region' => 'Region',
			'ref_id' => 'Reference',
			'loc_insert_by' => 'Loc Insert By',
			'loc_insert_date' => 'Loc Insert Date',
			'loc_update_by' => 'Loc Update By',
			'loc_update_date' => 'Loc Update Date',
			'loc_verified_by' => 'Loc Verified By',
			'loc_verified_date' => 'Loc Verified Date',
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

		$criteria->compare('loc_id',$this->loc_id);
		$criteria->compare('spe_id',$this->spe_id);
		$criteria->compare('loc_localname',$this->loc_localname,true);
		$criteria->compare('loc_region',$this->loc_region,true);
		$criteria->compare('ref_id',$this->ref_id);
		$criteria->compare('loc_insert_by',$this->loc_insert_by);
		$criteria->compare('loc_insert_date',$this->loc_insert_date,true);
		$criteria->compare('loc_update_by',$this->loc_update_by);
		$criteria->compare('loc_update_date',$this->loc_update_date,true);
		$criteria->compare('loc_verified_by',$this->loc_verified_by);
		$criteria->compare('loc_verified_date',$this->loc_verified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Localname the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
    	if ($this->isNewRecord) {
			$this->loc_insert_by = Yii::app()->user->role;
    		$this->loc_insert_date = new CDbExpression('NOW()');
    	}

    	else{
    		$this->loc_update_by = Yii::app()->user->role;
    		$this->loc_update_date = new CDbExpression('NOW()');
    	}

    	/*for status terverifikasi
    	if (Yii::app()->user->role == '2' OR Yii::app()->user->role == '3') {
    		$this->spe_insert_by = Yii::app()->user->role;
    	}
    	*/

		return true;
    }
}
