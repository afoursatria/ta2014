<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contentgroup-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contgroup_code'); ?>
		<?php echo $form->textField($model,'contgroup_code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contgroup_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contgroup_name'); ?>
		<?php echo $form->textField($model,'contgroup_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contgroup_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->