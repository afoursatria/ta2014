<?php
	$this->breadcrumbs=array(
	'Profile'=>array('profile','id'=>Yii::app()->user->no),
	'Change Password'
	);
?>

<h1>Change Password</h1>

<?php $this->renderPartial('_formChangePassword', array('model'=>$model)); ?>