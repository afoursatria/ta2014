<?php

class SiteController extends Controller
{
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
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 * halaman utama web dengan menul login dan register user
	 */
	public function actionIndex()
	{	
		// $criteria = new cDbCriteria();
			
		$model = new Species;
		$dataProvider = '';
		$this->render('index', array('dataProvider'=>$dataProvider));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionFaqs()
	{
		$this->render('faqs');
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		//inisiasi model
		$model=new LoginForm;
		$model->setScenario("login");

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
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'register' page.
	 */
	public function actionRegister()
	{
		$model=new User;

		$model->setScenario("register");	
		if(isset($_POST['User']))
		{	

			$model->attributes=$_POST['User'];
			
			if($model->validate()){
				$model->save();
				$this->sendMail();
				$this->redirect(array('site/index'));
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	public function actionLoadCategory(){
		
		// $category = $_POST['cat']
		// if (condition) {
		// 	# code...
		// }
	}

	public function actionGetSearchResult()
	{
		if ($_POST['category'] && $_POST['search_key']) {	
			echo("a");

			// if ($_POST['category'] == 'Species') {
			// 	$model = new Species;
			// 	$criteria = new cDbCriteria;
			// 	$q = $_POST['search_key'];
			// 	$criteria->compare('spe_speciesname', $q, true, 'OR');

			// 	$dataProvider=new CActiveDataProvider('Species', array(
			// 	'criteria'=>$criteria,
			// 	'sort'=>array('defaultOrder'=>'spe_update_date DESC'),
			// 	 // array('order'=>'spe_update_date DESC')
			// 	 ));

			// 	$this->render('index',array(
			// 	'dataProvider'=>$dataProvider,
			// 	));
			// }
		}
	}
}