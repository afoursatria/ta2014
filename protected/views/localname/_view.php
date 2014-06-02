<?php
/* @var $this LocalnameController */
/* @var $data Localname */
?>

<div class="view">

<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('loc_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->loc_id), array('view', 'id'=>$data->loc_id)); ?>
	<br />
 -->
<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('spe_id')); ?>:</b>
	<?php echo CHtml::encode($data->spe_id); ?>
	<br />
 -->
 	<?php echo CHtml::link('update', array('localname/update', 'id'=>$data->loc_id));?>
 	<br />

	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('localname/delete', 'id'=>$data->loc_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	<br />
 	
	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_localname')); ?>:</b>
	<?php echo CHtml::encode($data->loc_localname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_region')); ?>:</b>
	<?php echo CHtml::encode($data->loc_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php if (!is_null($data->ref_local)) echo CHtml::encode($data->ref_local->ref_name); 
		else echo "-";?>
	<br />

	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->loc_is_verified == 0) {
		echo Yii::t('main_data', 'not verified');
		}
		else echo Yii::t('main_data', 'verified');
	?>
	<br />

	<?php
	if (Yii::app()->user->getState('role') == 1 && $data->loc_is_verified == 0) {
		echo CHtml::link("Verify", array('localname/verify', 'id'=>$data->loc_id), array('submit'=>array('localname/verify', "id"=>$data->loc_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>

<!-- 	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->loc_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->loc_insert_date); ?>
	<br /> -->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->loc_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->loc_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->loc_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->loc_verified_date); ?>
	<br />

	*/ ?>

</div>