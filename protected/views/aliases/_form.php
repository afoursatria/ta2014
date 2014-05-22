<?php
/* @var $this AliasesController */
/* @var $model Aliases */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aliases-form',
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
		<?php echo $form->labelEx($model,'ali_speciesname'); ?>
		<?php echo $form->textField($model,'ali_speciesname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ali_speciesname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ali_foundername'); ?>
		<?php echo $form->textField($model,'ali_foundername',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ali_foundername'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ali_varietyname'); ?>
		<?php echo $form->textField($model,'ali_varietyname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ali_varietyname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ref_id'); ?>
		<?php 
			$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
			echo $form->dropDownList($model,'ref_id', $opts, array('prompt'=>Yii::t('main_data','Choose Reference'))); ?>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->