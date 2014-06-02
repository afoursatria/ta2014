<?php
/* @var $this AliasesController */
/* @var $data Aliases */
?>

<div class="view">
	<div class ="entry">
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
		<?php echo CHtml::encode($data->ref->ref_name); ?>
		<br />
		<div class="element"></div>
	</div>
</div>