<?php
/* @var $this AliasesController */
/* @var $data Aliases */
?>

<div class="view">
	<div class ="entry">
		<?php
			if (Yii::app()->user->getState('role') == 1 && $data->ali_is_verified == 0) {
			echo CHtml::link("Verify", array('aliases/verify', 'id'=>$data->ali_id), array('submit'=>array('aliases/verify', "id"=>$data->ali_id), 'confirm' => 'Are you sure you want to verify?'));
			} 
		?>
		<br/>
		<b><?php echo "Status"; ?>:</b>
		<?php 
			if ($data->ali_is_verified == 0) {
			echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20))
		.Yii::t('main_data', 'not verified');
			}
			else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
		?>
		<?php if (Yii::app()->user->getState('role')==2):?>
		<ul class="news-operation">
		<li><?php echo CHtml::link('update', array('aliases/update', 'id'=>$data->ali_id));?></li>
	 	<li>
		<?php
		echo CHtml::link('delete',"#", 
	          array('submit'=>array('aliases/delete', 'id'=>$data->ali_id), 
	                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
	    </li>
	 	</ul>
		<?php endif?>	
	 	<br/>
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
	
		<div class="element"></div>
	</div>
</div>