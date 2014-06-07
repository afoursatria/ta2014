<?php
/* @var $this AliasesController */
/* @var $model Aliases */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'custom-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_id'); ?></span>
		<?php echo $form->dropDownList($model,'spe_id', CHtml::listData(Species::model()->findAll(array('order' => 'spe_speciesname ASC')),'spe_id','spe_speciesname'),
		array('prompt'=>Yii::t('main_data','Choose Species'))); ?>
        <span class="form-hint">Choose Species of the aliases</span>
		<?php echo $form->error($model,'spe_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ali_speciesname'); ?></span>
		<?php echo $form->textField($model,'ali_speciesname',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint">Max. length 100 characters</span>
		<?php echo $form->error($model,'ali_speciesname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ali_foundername'); ?></span>
		<?php echo $form->textField($model,'ali_foundername',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint">Max. length 100 characters</span>
		<?php echo $form->error($model,'ali_foundername'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ali_varietyname'); ?></span>
		<?php echo $form->textField($model,'ali_varietyname',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint">Max. length 100 characters</span>
		<?php echo $form->error($model,'ali_varietyname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ref_id'); ?></span>
		<?php 
			$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
			echo $form->dropDownList($model,'ref_id', $opts, array('prompt'=>Yii::t('main_data','Choose Reference'))); ?>
        <span class="form-hint">Choose reference</span>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>

	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('id'=>'blue','class'=>'button')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->