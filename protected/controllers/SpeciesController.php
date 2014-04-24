<?php

class SpeciesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{	
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				// 'expression'=>'allowContributor,allowExpert',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=>'!Yii::app()->user->role==2 OR Yii::app()->user->role==3',
			
			),
			// array('deny',  // deny all users
			// 	'users'=>array('*'),
			// ),
		);
	}

	public function allowContributor()
	{
		if(Yii::app()->user->role == 3)
			return true;
		else
			return false;
	}


	public function allowExpert()
	{
		if(Yii::app()->user->role == 2)
			return true;
		else
			return false;
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$listLocalName=new CActiveDataProvider('Localname',array(
			'criteria'=>array(
        	'condition'=>'spe_id='.$id	
    	)));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'localName'=>$this->loadLocalName($id),
			'aliases'=>$this->loadAliases($id),
			'virtue'=>$this->loadVirtue($id),
			'contents'=>$this->loadContents($id),
			'dataProvider'=>$listLocalName,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Species;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Species']))
		{
			$model->attributes=$_POST['Species'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->spe_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Species']))
		{
			$model->attributes=$_POST['Species'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->spe_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$criteria = new CDbCriteria();

		// $criteria->condition ='spe_verified_by IS NOT NULL'; // only view verified species
		if(isset($_GET['q']))
		{
			$q = $_GET['q'];
			$criteria->compare('spe_speciesname', $q, true, 'OR');
			// $criteria->compare('spe_varietyname', $q, true, 'OR');
		}

		$dataProvider=new CActiveDataProvider('Species', array(
			'criteria'=>$criteria,
			// 'sort'=>array('defaultOrder'=>'spe_update_date DESC'),
			 // array('order'=>'spe_update_date DESC')
			 ));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Species('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Species']))
			$model->attributes=$_GET['Species'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Species the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Species::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadLocalName($id)
	{
		$model=Localname::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadAliases($id)
	{
		$model=Aliases::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadVirtue($id)
	{
		$model=Virtue::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Localname the loaded model
	 * @throws CHttpException
	 */
	public function loadContents($id)
	{
		$model=Species_content::model()->findAllByAttributes(array('spe_id'=>$id));
		// if($model===null)
		// 	throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Species $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='species-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
