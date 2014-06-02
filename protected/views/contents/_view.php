<?php
/* @var $this ContentsController */
/* @var $data Contents */
?>

<div class="view">

	<?php echo CHtml::link('update', array('contents/update', 'id'=>$data->contents->con_id));?>
 	<br />

	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('contents/delete', 'id'=>$data->contents->con_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_contentname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contents->con_contentname), array('contents/view', 'id'=>$data->contents->con_id)); ?>
	<?php //echo CHtml::encode($data->contents->con_contentname); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_knapsack_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_knapsack_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_metabolite_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_metabolite_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_pubchem_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_pubchem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('contgroup_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->contgroup->contgroup_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_source')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol1')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_file_mol1); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol2')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_file_mol2); ?>
	<br />

	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->contents->con_is_verified == 0) {
		echo Yii::t('main_data', 'not verified');
		}
		else echo Yii::t('main_data', 'verified');
	?>
	<br />

	<?php
	if (Yii::app()->user->getState('role') == 1 && $data->contents->con_is_verified == 0) {
		echo CHtml::link("Verify", array('contents/verify', 'id'=>$data->contents->con_id), array('submit'=>array('contents/verify', "id"=>$data->contents->con_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>

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