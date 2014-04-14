<?php
	$this->breadcrumbs=array(
	'Profile'=>$model->use_id,
	);
?>
<h1><?php echo $model->use_fullname?></h1> 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'use_fullname',
		'use_email',
		'use_birthdate',
		'use_occupation',
		'use_city',
		'use_country',
		'use_address',
	),
	'nullDisplay'=>'-',
)); ?>

<?php echo CHtml::link('Update Profile', array('update','id'=>$model->use_id)); ?>
<br />
<br />
<?php echo CHtml::link('Change Password', array('changePassword','id'=>$model->use_id)); ?>