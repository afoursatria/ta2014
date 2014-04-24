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
		$criteria=new CDbCriteria;
		$criteria->select='use_username';  // only select the 'use_email' column
		$criteria->condition='rol_id=1';
		$adminModel=User::model()->findAll($criteria);
	
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			 	'actions'=>array('create','profile', 'update', 'changePassword', 'insertData'),
			 	'users'=>array('@'),
				// 'expression'=>
				// 	'if(YiiMailMessage::app()->user->hasState("username")){
				// 		!Yii::app()->user->role==2 OR Yii::app()->user->role==3;}',		
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','verify'),
			 	'users'=>array('@'),				
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->setScenario("update");
		if(isset($_POST['User']))
		{

			$rnd = rand(0,9999);  // generate random number between 0-9999
			$model->attributes=$_POST['User'];
			$uploadedFile=CUploadedFile::getInstance($model,'use_foto');
            $fileName = $model->use_username;  // random number + file name
            $model->use_foto = $fileName;
 
			if($model->save()){
				if(!empty($uploadedFile))
				{  // check if uploaded file is set or not
					$uploadedFile->saveAs(Yii::app()->basePath.'/../photo/'.$model->use_username.'.jpg');  // image will uplode to rootDirectory/photo/
					$this->redirect(array('profile','id'=>$model->use_id));
				}
			}
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
		$this->loadProfile($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionChangePassword()
	{
		$model=new ChangePasswordForm;
		$model->setScenario('changePassword');
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

	public function sendMail()
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
		$message->setFrom(array('afour.satria@gmail.com' => 'Herbal DB'));   
      	Yii::app()->mail->send($message); 
		$this->redirect(array('site/index'));
    }

    public function actionVerify($id)
	{
		$model=User::model()->findByPk($id);
    		$model->use_is_active='1';

    	if(isset($_POST['User']))
		{
    		$model->use_is_active='1';
			echo('a');
			if($model->validate() && $model->save())
				$this->redirect(array('profile','id'=>$model->use_id));
		}

		// $this->redirect(Yii::app()->user->returnUrl);
		
	}

	public function actionInsertData()
	{
		$speciesModel = new Species;
		$localnameModel = new Localname;
		$aliasesModel = new ALiases;
		$virtueModel = new virtue;
		$referenceModel = new Ref;
		$compoundModel = new Contents;
		$contentGroupModel = new Contentgroup;

		if(isset($_POST['Species']))
		{
			$speciesModel->attributes=$_POST['Species'];
			if($speciesModel->save())
				$this->redirect(array('view','id'=>$speciesModel->spe_id)); //bisa success alert
		}

		if(isset($_POST['Localname']))
		{
			$localnameModel->attributes=$_POST['Localname'];
			if($localnameModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}

		if(isset($_POST['Aliases']))
		{
			$aliasesModel->attributes=$_POST['Aliases'];
			if($aliasesModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}

		if(isset($_POST['Virtue']))
		{
			$virtueModel->attributes=$_POST['Virtue'];
			if($virtueModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}

		if(isset($_POST['Aliases']))
		{
			$aliasesModel->attributes=$_POST['Aliases'];
			if($aliasesModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}

		if(isset($_POST['Contents']))
		{
			$compoundModel->attributes=$_POST['Contents'];
			if($compoundModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}
		
		if(isset($_POST['Contentgroup']))
		{
			$contentGroupModel->attributes=$_POST['Contentgroup'];
			if($contentGroupModel->save())
				$this->redirect(array('view','id'=>$local->spe_id)); //bisa success alert
		}
		$this->render('insert_data',array(
			'speciesModel'=>$speciesModel,
			'localnameModel'=>$localnameModel,
			'aliasesModel'=>$aliasesModel,
			'virtueModel'=>$virtueModel,
			'referenceModel'=>$referenceModel,
			'compoundModel'=>$compoundModel,
			'contentGroupModel'=>$contentGroupModel,
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
	*/

}