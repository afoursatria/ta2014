<?php
/* @var $this ContentsController */
/* @var $data Contents */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->con_id), array('view', 'id'=>$data->con_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_contentname')); ?>:</b>
	<?php echo CHtml::encode($data->con_contentname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_knapsack_id')); ?>:</b>
	<?php echo CHtml::encode($data->con_knapsack_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_metabolite_id')); ?>:</b>
	<?php echo CHtml::encode($data->con_metabolite_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_pubchem_id')); ?>:</b>
	<?php echo CHtml::encode($data->con_pubchem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contgroup_id')); ?>:</b>
	<?php echo CHtml::encode($data->contgroup_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_source')); ?>:</b>
	<?php echo CHtml::encode($data->con_source); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('con_speciesname')); ?>:</b>
	<?php echo CHtml::encode($data->con_speciesname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_file_mol1')); ?>:</b>
	<?php echo CHtml::encode($data->con_file_mol1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_file_mol2')); ?>:</b>
	<?php echo CHtml::encode($data->con_file_mol2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_insert_by')); ?>:</b>
	<?php echo CHtml::encode($data->con_insert_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->con_insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_update_by')); ?>:</b>
	<?php echo CHtml::encode($data->con_update_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->con_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_verified_by')); ?>:</b>
	<?php echo CHtml::encode($data->con_verified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_verified_date')); ?>:</b>
	<?php echo CHtml::encode($data->con_verified_date); ?>
	<br />

	*/ ?>

</div>