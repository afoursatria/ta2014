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
	 <b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->spe_is_verified == 0) {
		echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20))
		.Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<br />


	<?php
	if (Yii::app()->user->getState('role') == 1 && $data->spe_is_verified == 0) {
		echo CHtml::link("Verify", array('species/verify', 'id'=>$data->spe_id), array('submit'=>array('species/verify', "id"=>$data->spe_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>
	 	<div class = "element"></div>
	 </div>
</div>