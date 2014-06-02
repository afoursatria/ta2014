<?php
/* @var $this SpeciesController */
/* @var $data Species */
?>

<div class="view">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('spe_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->spe_id), array('view', 'id'=>$data->spe_id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_species_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->spe_species_id), array('species/view', 'id'=>$data->spe_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_speciesname')); ?>:</b>
	<?php echo CHtml::encode($data->spe_speciesname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_varietyname')); ?>:</b>
	<?php echo CHtml::encode($data->spe_varietyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_familyname')); ?>:</b>
	<?php echo CHtml::encode($data->spe_familyname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_foundername')); ?>:</b>
	<?php echo CHtml::encode($data->spe_foundername); ?>
	<br />

	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->spe_is_verified == 0) {
		echo Yii::t('main_data', 'not verified');
		}
		else echo Yii::t('main_data', 'verified');
	?>
	<br />


	<?php
	if (Yii::app()->user->getState('role') == 1 && $data->spe_is_verified == 0) {
		echo CHtml::link("Verify", array('species/verify', 'id'=>$data->spe_id), array('submit'=>array('species/verify', "id"=>$data->spe_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php echo CHtml::encode($data->ref_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->spe_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->spe_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->spe_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->spe_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->spe_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spe_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->spe_verified_date); ?>
	<br />

	*/ ?>

</div>