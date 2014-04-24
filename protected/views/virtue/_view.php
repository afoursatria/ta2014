<?php
/* @var $this VirtueController */
/* @var $data Virtue */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vir_id), array('view', 'id'=>$data->vir_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_id')); ?>:</b>
	<?php echo CHtml::encode($data->spe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hp_code')); ?>:</b>
	<?php echo CHtml::encode($data->hp_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_type')); ?>:</b>
	<?php echo CHtml::encode($data->vir_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_value')); ?>:</b>
	<?php echo CHtml::encode($data->vir_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_value_en')); ?>:</b>
	<?php echo CHtml::encode($data->vir_value_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_value_latin')); ?>:</b>
	<?php echo CHtml::encode($data->vir_value_latin); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::encode($data->ref_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->vir_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vir_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->vir_verified_date); ?>
	<br />

	*/ ?>

</div>