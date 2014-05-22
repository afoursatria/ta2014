<?php
/* @var $this VirtueController */
/* @var $model Virtue */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'virtue-form',
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
		<?php echo $form->labelEx($model,'spe_id'); ?>
		<?php echo $form->dropDownList($model,'spe_id', CHtml::listData(Species::model()->findAll(array('order' => 'spe_speciesname ASC')),'spe_id','spe_speciesname'),
		array('prompt'=>Yii::t('main_data','Choose Species'))); ?>
		<?php echo $form->error($model,'spe_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hp_code'); ?>
		<?php echo $form->dropDownList($model,'hp_code', CHtml::listData(HerbalPart::model()->findAll(array('order' => 'hp_part_name ASC')),'hp_code','hp_part_name'),
		array('prompt'=>Yii::t('main_data','Choose Herbal Part'))); ?>
		<?php echo $form->error($model,'hp_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vir_type'); ?>
		<?php echo $form->textField($model,'vir_type',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'vir_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vir_value'); ?>
		<?php echo $form->textArea($model,'vir_value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'vir_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vir_value_en'); ?>
		<?php echo $form->textArea($model,'vir_value_en',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'vir_value_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vir_value_latin'); ?>
		<?php echo $form->textArea($model,'vir_value_latin',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'vir_value_latin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_id'); ?>
		<?php 
			$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
			echo $form->dropDownList($model,'ref_id', $opts, array('prompt'=>Yii::t('main_data','Choose Reference'))); ?>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->