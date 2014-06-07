<?php
/* @var $this LocalnameController */
/* @var $model Localname */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
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
        <span class="form-hint">Choose Species of the localname</span>
		<?php echo $form->error($model,'spe_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'loc_localname'); ?></span>
		<?php echo $form->textField($model,'loc_localname',array('size'=>60,'maxlength'=>100)); ?>
		 <span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'loc_localname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'loc_region'); ?></span>
		<?php echo $form->textField($model,'loc_region',array('size'=>60,'maxlength'=>100)); ?>
		 <span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'loc_region'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'ref_id'); ?></span>
		<?php 
			$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
			echo $form->dropDownList($model,'ref_id', $opts, array('prompt'=>Yii::t('main_data','Choose Reference'))); ?>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>
	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->