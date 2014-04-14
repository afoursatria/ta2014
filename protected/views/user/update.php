<?php
	$this->breadcrumbs=array(
	'Profile'=>array('profile','id'=>$model->use_id),
	'Update'
	);
?>

<h1>Update Profile</h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>