<?php
/* @var $this AliasesController */
/* @var $data Aliases */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ali_id), array('view', 'id'=>$data->ali_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_id')); ?>:</b>
	<?php echo CHtml::encode($data->spe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_speciesname')); ?>:</b>
	<?php echo CHtml::encode($data->ali_speciesname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_foundername')); ?>:</b>
	<?php echo CHtml::encode($data->ali_foundername); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_varietyname')); ?>:</b>
	<?php echo CHtml::encode($data->ali_varietyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::encode($data->ref_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->ali_insert_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->ali_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->ali_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->ali_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->ali_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ali_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->ali_verified_date); ?>
	<br />

	*/ ?>

</div>