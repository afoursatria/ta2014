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
			
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			 	'actions'=>array('create','profile', 'update', 'changePassword', 'insertData', 'captcha'),
			 	'users'=>array('@'),
				 'expression'=>
				 	'Yii::app()->user->getState("role")==1',		
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

			$_POST['User']['photo'] = $model->use_foto;
			$_POST['User']['cv'] = $model->use_cv;
			$model->attributes=$_POST['User'];
			$uploadedFile=CUploadedFile::getInstance($model,'use_foto');
			$uploadedCV=CUploadedFile::getInstance($model,'use_cv');
            
            $fileName = $model->use_username;  
            $model->use_foto = $fileName;

            $cvName = 'CV-'.$model->use_username;  
            $model->use_cv = $cvName;
 
			if($model->save()){
				if(!empty($uploadedFile))
				{  // check if uploaded file is set or not
					$uploadedFile->saveAs(Yii::app()->basePath.'/../assets/user/photo/'.$model->use_username.'.jpg');  // image will uplode to rootDirectory/photo/
				}

				if(!empty($uploadedCV))
				{  // check if uploaded file is set or not
					$uploadedCV->saveAs(Yii::app()->basePath.'/../assets/user/cv/CV-'.$model->use_username.'.pdf');  // image will uplode to rootDirectory/photo/
				}
				
				$this->redirect(array('profile','id'=>$model->use_id));

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
		
		// if it is ajax validation request
		
			// echo CActiveForm::validate($model);
			// Yii::app()->end();
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='changePassword-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			if($model->validate() && $model->changePassword())
				{
					Yii::app()->user->setFlash('success','Password has been changed');
					$this->redirect(array('profile','id'=>Yii::app()->user->id));
				}
		}
		}
		$this->render('changePassword',array('model'=>$model));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$userModel= new User;
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Species']))
			$model->attributes=$_GET['Species'];

		$this->render('admin',array(
			'model'=>$model,
			'userModel'=>$userModel,
		));
	}

    public function actionVerify($id)
	{
		$model=User::model()->findByPk($id);
    	$model->verifyUser();
    	if ($model->save()) {
    		$this->sendMailVerivication($id);
			$this->redirect(array('user/admin'));		
    	}
		
	}

	public function sendMailVerivication($id)
    {   
        $message            = new YiiMailMessage;
          
        //this points to the file verificationRequest.php inside the view path
        $message->view = "user\\verificationApproval";
        $criteria=new CDbCriteria;
		$criteria->select='use_email';  // only select the 'use_email' column
		$criteria->condition='rol_id='.$id;
		$userModel=User::model()->findByPk($id);
        $params              = array('myMail'=>$userModel);
        $message->subject    = 'Your Account is Active Now';
      	$message->setBody($params, 'text/html');               
		
		$message->addTo($userModel->use_email);        	

		$message->setFrom(array('afour.satria@gmail.com' => 'Herbal DB'));   
      	Yii::app()->mail->send($message); 
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
			{
				Yii::app()->user->setFlash('success', "Species saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Localname']))
		{
			$localnameModel->attributes=$_POST['Localname'];
			if($localnameModel->save())
			{
				Yii::app()->user->setFlash('success', "Localname saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Aliases']))
		{
			$aliasesModel->attributes=$_POST['Aliases'];
			if($aliasesModel->save())
			{
				Yii::app()->user->setFlash('success', "Aliases saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Virtue']))
		{
			$virtueModel->attributes=$_POST['Virtue'];
			if($virtueModel->save())
			{
				Yii::app()->user->setFlash('success', "Virtue saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Ref']))
		{
			$referenceModel->attributes=$_POST['Ref'];
			if($referenceModel->save())
			{
				Yii::app()->user->setFlash('success', "Reference saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}

		if(isset($_POST['Contents']))
		{
			$compoundModel->attributes=$_POST['Contents'];
			// $compoundModel->con_file_mol1=CUploadedFile::getInstance($compoundModel,'con_file_mol1');
			// $compoundModel->con_file_mol2=CUploadedFile::getInstance($compoundModel,'con_file_mol2');
			if($compoundModel->save()){
                // $model->image->saveAs('path/to/localFile');
				Yii::app()->user->setFlash('success', "Contents saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
		}
		
		if(isset($_POST['Contentgroup']))
		{
			$contentGroupModel->attributes=$_POST['Contentgroup'];
			if($contentGroupModel->save())
			{
				Yii::app()->user->setFlash('success', "Content group saved!");
				$this->redirect(array('insertData')); //bisa success alert
			}
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