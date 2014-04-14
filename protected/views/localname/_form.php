<?php
/* @var $this LocalnameController */
/* @var $model Localname */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'localname-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spe_id'); ?>
		<?php echo $form->textField($model,'spe_id', array('value'=>$speId->spe_id, 'readOnly'=>true)); ?>
		<?php echo $form->error($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_localname'); ?>
		<?php echo $form->textField($model,'loc_localname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'loc_localname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_region'); ?>
		<?php echo $form->textField($model,'loc_region',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'loc_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_id'); ?>
		<?php 
			$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
			echo $form->dropDownList($model,'ref_id', $opts, array('empty'=>'Choose Reference')); ?>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->