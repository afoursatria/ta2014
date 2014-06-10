<?php
/* @var $this LocalnameController */
/* @var $data Localname */
?>

<div class="view">
		<div class="entry">
			<?php
	if (Yii::app()->user->getState('role') == 1 && $data->loc_is_verified == 0) {
		echo CHtml::link("Verify", array('localname/verify', 'id'=>$data->loc_id), array('submit'=>array('localname/verify', "id"=>$data->loc_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>
    <br/>
	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->loc_is_verified == 0) {
		echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<ul class="news-operation">
	<?php if (Yii::app()->user->getState('role')==2):?>
	<li>
 	<?php echo CHtml::link('update', array('localname/update', 'id'=>$data->loc_id));?>
 	</li>
 	<li>
	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('localname/delete', 'id'=>$data->loc_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 	</li>
	<?php endif?>	
 	</ul>
 	<br/>
	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_localname')); ?>:</b>
	<?php echo CHtml::encode($data->loc_localname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_region')); ?>:</b>
	<?php echo CHtml::encode($data->loc_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_id')); ?>:</b>
	<?php if (!is_null($data->ref_id)) echo CHtml::encode($data->ref_local->ref_name);
	else echo "-";?>
	<br />


<div class = "element"></div>
	 </div>
</div>