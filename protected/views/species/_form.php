<?php
/* @var $this SpeciesController */
/* @var $model Species */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'species-form',
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

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spe_speciesname'); ?>
		<?php echo $form->textField($model,'spe_speciesname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spe_speciesname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spe_varietyname'); ?>
		<?php echo $form->textField($model,'spe_varietyname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spe_varietyname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spe_familyname'); ?>
		<?php echo $form->textField($model,'spe_familyname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spe_familyname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spe_foundername'); ?>
		<?php echo $form->textField($model,'spe_foundername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spe_foundername'); ?>
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