<?php
/* @var $this AliasesController */
/* @var $data Aliases */
?>

<div class="view">

	<?php echo CHtml::link('update', array('aliases/update', 'id'=>$data->ali_id));?>
 	<br />

	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('aliases/delete', 'id'=>$data->ali_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
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
	<?php if (!is_null($data->ref)) echo CHtml::encode($data->ref->ref_name);
		else echo "-"; ?>
	<br />

	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->ali_is_verified == 0) {
		echo Yii::t('main_data', 'not verified');
		}
		else echo Yii::t('main_data', 'verified');
	?>
	<br />

	<?php
	if (Yii::app()->user->getState('role') == 1 && $data->ali_is_verified == 0) {
		echo CHtml::link("Verify", array('aliases/verify', 'id'=>$data->ali_id), array('submit'=>array('aliases/verify', "id"=>$data->ali_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>

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