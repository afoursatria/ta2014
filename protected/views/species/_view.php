<?php
/* @var $this SpeciesController */
/* @var $data Species */
?>

<div class="view">
	<div class="entry">
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
	 
	 	<div class = "element"></div>
	 </div>
</div>