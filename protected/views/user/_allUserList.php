<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_fullname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->use_fullname), array('profile', 'id'=>$data->use_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_email')); ?>:</b>
	<?php echo CHtml::encode($data->use_email); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('use_reg_date')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->format->date(strtotime($data->use_reg_date))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_is_active')); ?>:</b>
	<?php 
		if ($data->use_is_active == 0) {
			echo Yii::t('user','Inactive');	
		}
			else echo Yii::t('user','Active');	
	?>
	<br />
	
	<?php 
	if ($data->use_is_active == 0)
		echo CHtml::link(Yii::t('user','Activate'), '',array('submit'=>array('user/verify', "id"=>$data->use_id), 'confirm' => 'Are you sure you want to activate this user?'));
	?>	

</div>