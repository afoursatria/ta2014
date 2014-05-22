<?php
/* @var $this FaqsController */
/* @var $model Faqs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faqs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'faqs_content'); ?>
		<?php echo $form->textArea($model,'faqs_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'faqs_content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'faqs_lang'); ?>
		<?php echo $form->textField($model,'faqs_lang',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'faqs_lang'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->