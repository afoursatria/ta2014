<?php
/* @var $this LocalnameController */
/* @var $data Localname */
?>

<div class="view">

<!-- 	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->loc_id), array('view', 'id'=>$data->loc_id)); ?>
	<br />
 -->
<!-- 	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_id')); ?>:</b>
	<?php echo CHtml::encode($data->spe_id); ?>
	<br />
 -->
	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_localname')); ?>:</b>
	<?php echo CHtml::encode($data->loc_localname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_region')); ?>:</b>
	<?php echo CHtml::encode($data->loc_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::encode($data->ref_id); ?>
	<br />

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