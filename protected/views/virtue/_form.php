<?php
/* @var $this VirtueController */
/* @var $model Virtue */
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
    <p class="note"><?php echo Yii::t('main_data','Fields with').' '?> <span class="required">*</span><?php echo ' '.Yii::t('main_data','are required').'.'?></p>
	

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_id'); ?></span>
		<?php echo $form->dropDownList($model,'spe_id', CHtml::listData(Species::model()->findAll(array('order' => 'spe_speciesname ASC')),'spe_id','spe_speciesname'),
		array('prompt'=>Yii::t('main_data','Choose Species'))); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Choose Species of the virtue')?></span>
		<?php echo $form->error($model,'spe_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'hp_code'); ?></span>
		<?php echo $form->dropDownList($model,'hp_code', CHtml::listData(HerbalPart::model()->findAll(array('order' => 'hp_part_name ASC')),'hp_code','hp_part_name'),
		array('prompt'=>Yii::t('main_data','Choose Herbal Part'))); ?>
		<?php echo $form->error($model,'hp_code'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'vir_type'); ?></span>
		<?php echo $form->textField($model,'vir_type',array('size'=>12,'maxlength'=>12)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Max. Length 12 Characters')?></span>
		<?php echo $form->error($model,'vir_type'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'vir_value'); ?></span>
		<?php echo $form->textArea($model,'vir_value',array('rows'=>6, 'cols'=>50)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Virtue of the species in Bahasa')?></span>
		<?php echo $form->error($model,'vir_value'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'vir_value_en'); ?></span>
		<?php echo $form->textArea($model,'vir_value_en',array('rows'=>6, 'cols'=>50)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Virtue of the species in English')?></span>
		<?php echo $form->error($model,'vir_value_en'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'vir_value_latin'); ?></span>
		<?php echo $form->textArea($model,'vir_value_latin',array('rows'=>6, 'cols'=>50)); ?>
        <span class="form-hint"><?php echo Yii::t('main_data','Virtue of the species in Latin')?></span>
		<?php echo $form->error($model,'vir_value_latin'); ?>
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