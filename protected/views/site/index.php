<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
	if(Yii::app()->user->hasState("username"))
		echo 'You are logged in as ' . CHtml::link(Yii::app()->user->username, array('user/profile', 'id'=>Yii::app()->user->id));
	else
		echo CHtml::link('Login', array('user/login'));
?> 
<br />
<?php 
	if(Yii::app()->user->hasState("username") == false)
	echo CHtml::link('Daftar Baru', array('user/register')); ?>
<br />

<?php 
	if(Yii::app()->user->hasState("username")){
		if(Yii::app()->user->role == 1)
			echo CHtml::link('List User', array('/user/admin'));	
	}
?>
<br />
<?php
		// echo CHtml::link('Send Email', array('user/sendMail'));
?>
