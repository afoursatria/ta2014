<?php
/* @var $this VirtueController */
/* @var $data Virtue */
?>

<div class="view">
	<div class="entry">
		<?php
	if (Yii::app()->user->getState('role') == 1 && $data->vir_is_verified == 0) {
		echo CHtml::link("Verify", array('virtue/verify', 'id'=>$data->vir_id), array('submit'=>array('virtue/verify', "id"=>$data->vir_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>
			<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->vir_is_verified == 0) {
		echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<?php if (Yii::app()->user->getState('role')==2):?>
	<ul class="news-operation">
	
	<li><?php echo CHtml::link('update', array('virtue/update', 'id'=>$data->vir_id));?></li>
	<li>
	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('virtue/delete', 'id'=>$data->vir_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	</li>
 </ul>
	<?php endif?>	
 	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hp_code')); ?>:</b>
	<?php if ($data->herbal_part!==null) {echo CHtml::encode($data->herbal_part->hp_part_name);}
	else echo "-"; 
	?>
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
	<div class="element"></div>
	</div>
	
</div>