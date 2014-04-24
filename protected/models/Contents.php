<?php

/**
 * This is the model class for table "contents".
 *
 * The followings are the available columns in table 'contents':
 * @property integer $con_id
 * @property string $con_contentname
 * @property string $con_knapsack_id
 * @property string $con_metabolite_id
 * @property string $con_pubchem_id
 * @property integer $contgroup_id
 * @property string $con_source
 * @property string $con_speciesname
 * @property string $con_file_mol1
 * @property string $con_file_mol2
 * @property integer $con_insert_by
 * @property string $con_insert_date
 * @property integer $con_update_by
 * @property string $con_update_date
 * @property integer $con_verified_by
 * @property string $con_verified_date
 */
class Contents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('con_contentname, con_knapsack_id, con_metabolite_id, con_pubchem_id, contgroup_id, con_source', 'required'),
			array('contgroup_id, con_insert_by, con_update_by, con_verified_by', 'numerical', 'integerOnly'=>true),
			array('con_contentname', 'length', 'max'=>200),
			array('con_knapsack_id, con_pubchem_id, con_insert_date, con_update_date, con_verified_date', 'length', 'max'=>20),
			array('con_metabolite_id, con_source, con_speciesname, con_file_mol1, con_file_mol2', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('con_id, con_contentname, con_knapsack_id, con_metabolite_id, con_pubchem_id, contgroup_id, con_source, con_speciesname, con_file_mol1, con_file_mol2, con_insert_by, con_insert_date, con_update_by, con_update_date, con_verified_by, con_verified_date', 'safe', 'on'=>'search'),
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
			'con_id' => 'Con id',
			'con_contentname' => 'Content name',
			'con_knapsack_id' => 'Knapsack ID',
			'con_metabolite_id' => 'Metabolite ID',
			'con_pubchem_id' => 'Pubchem ID',
			'contgroup_id' => 'Content Group',
			'con_source' => 'Content Source',
			'con_speciesname' => 'Con Speciesname',
			'con_file_mol1' => 'File Mol1',
			'con_file_mol2' => 'File Mol2',
			'con_insert_by' => 'Con Insert By',
			'con_insert_date' => 'Con Insert Date',
			'con_update_by' => 'Con Update By',
			'con_update_date' => 'Con Update Date',
			'con_verified_by' => 'Con Verified By',
			'con_verified_date' => 'Con Verified Date',
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

		$criteria->compare('con_id',$this->con_id);
		$criteria->compare('con_contentname',$this->con_contentname,true);
		$criteria->compare('con_knapsack_id',$this->con_knapsack_id,true);
		$criteria->compare('con_metabolite_id',$this->con_metabolite_id,true);
		$criteria->compare('con_pubchem_id',$this->con_pubchem_id,true);
		$criteria->compare('contgroup_id',$this->contgroup_id);
		$criteria->compare('con_source',$this->con_source,true);
		$criteria->compare('con_speciesname',$this->con_speciesname,true);
		$criteria->compare('con_file_mol1',$this->con_file_mol1,true);
		$criteria->compare('con_file_mol2',$this->con_file_mol2,true);
		$criteria->compare('con_insert_by',$this->con_insert_by);
		$criteria->compare('con_insert_date',$this->con_insert_date,true);
		$criteria->compare('con_update_by',$this->con_update_by);
		$criteria->compare('con_update_date',$this->con_update_date,true);
		$criteria->compare('con_verified_by',$this->con_verified_by);
		$criteria->compare('con_verified_date',$this->con_verified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
