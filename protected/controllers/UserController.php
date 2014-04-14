<?php

class UserController extends Controller
{

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	public function actionLogin()
	{
		//inisiasi model
		$model=new LoginForm;
		$model->setScenario('login');
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				// $this->redirect(array('user/profile'));
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'register' page.
	 */
	public function actionRegister()
	{
		$model=new User;
		$model->setScenario('register');

		if(isset($_POST['User']))
		{	

			$model->attributes=$_POST['User'];
			
			if($model->validate()){
				$model->save();
				$this->redirect(array('site/index'));
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	public function actionProfile($id)
	{
		$this->render('profile',array(
			'model'=>$this->loadProfile($id),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadProfile($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadProfile($id);
		$model->setScenario('update');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('profile','id'=>$model->use_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionChangePassword()
	{
		$model=new ChangePasswordForm;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			if($model->validate() && $model->changePassword())
				{
					Yii::app()->user->setFlash('success','Password has been changed');
					$this->redirect(array('profile','id'=>Yii::app()->user->id));
				}
		}

		$this->render('changePassword',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Species']))
			$model->attributes=$_GET['Species'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}