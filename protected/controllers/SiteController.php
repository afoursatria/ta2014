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
		$this->render('index');
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
		// // if it is ajax validation request
		// if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		// {
		// 	echo CActiveForm::validate($model);
		// 	Yii::app()->end();
		// }

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
				$this->sendRegistrationMail();
				$this->redirect(array('site/index'));
			}
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	public function actionResetPassword()
	{
		$model = new ResetPasswordForm;

		if (isset($_POST['ResetPasswordForm'])) {
			$model->attributes=$_POST['ResetPasswordForm'];
			
			echo $model->email;
			if ($model->getEmail() == Null) {
				echo "kosong";
			}
			
			if ($model->validate() && $model->resetPass()) {
				$this->sendResetPasswordMail($model->email, $model->getNewPassword());
				Yii::app()->user->setFlash('success','Reset password has been sent to your email');
				$this->refresh();
			}
		}
		$this->render('resetPassword', array(
			'model'=>$model,
			)
		);
	}

	public function sendRegistrationMail()
    {   
        $message            = new YiiMailMessage;
          
        //this points to the file verificationRequest.php inside the view path
        $message->view = "user\\verificationRequest";
        
        $criteria=new CDbCriteria;
		$criteria->select='use_email';  // only select the 'use_email' column
		$criteria->condition='rol_id=1';
		$adminModel1=User::model()->findAll($criteria);
        $params              = array('myMail'=>$adminModel1);
        $message->subject    = 'Verifikasi Akun Baru';
      	 $message->setBody($params, 'text/html');               

        foreach($adminModel1 as $email) {
			$message->addTo($email->use_email);        	
		}
		$message->setFrom(array('herbaldb.ui@gmail.com' => 'Herbal DB UI'));   
      	Yii::app()->mail->send($message); 
		$this->redirect(array('site/index'));
    }

    public function sendResetPasswordMail($email, $newPass)
    {   
        $message            = new YiiMailMessage;
          
        //this points to the file resetPasswordMail.php inside the view path
        $message->view = "user\\resetPasswordMail";
        
		$userModel=User::model()->find('use_email=:use_email', array('use_email'=>$email));
        $params              = array('myMail'=>$userModel, 'newPass'=>$newPass);
        $message->subject    = 'Password Reset';
      	$message->setBody($params, 'text/html');               
		
		$message->addTo($userModel->use_email);        	

		$message->setFrom(array('herbaldb.ui@gmail.com' => 'Herbal DB'));   
      	Yii::app()->mail->send($message); 
    }
}