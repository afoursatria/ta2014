<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
	if(!Yii::app()->user->isGuest)
		echo 'You are logged in as ' . CHtml::link(Yii::app()->user->id, array('user/profile/', 'id'=>Yii::app()->user->getState("no")));
	else
		echo CHtml::link('Login', array('login'));
?> 
<br />
<?php 
	if(Yii::app()->user->getState("role") == null)
	echo CHtml::link('Daftar Baru', array('register')); ?>
<br />

<?php 
	if(Yii::app()->user->getState("role") == 1){
			echo CHtml::link('List User', array('/user/admin'));	
	}
?>
<br />


<?php
	$this->renderPartial('_search', array('dataProvider'=>$dataProvider));
		// echo CHtml::link('Send Email', array('user/sendMail'));
?>
