<?php
/* @var $this ContentsController */
/* @var $model Contents */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'con_contentname'); ?>
		<?php echo $form->textField($model,'con_contentname',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'con_contentname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con_knapsack_id'); ?>
		<?php echo $form->textField($model,'con_knapsack_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'con_knapsack_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con_metabolite_id'); ?>
		<?php echo $form->textField($model,'con_metabolite_id',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'con_metabolite_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con_pubchem_id'); ?>
		<?php echo $form->textField($model,'con_pubchem_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'con_pubchem_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contgroup_id'); ?>
		<?php echo $form->dropdownList($model,'contgroup_id', 
			CHtml::listData(Contentgroup::model()->findAll(array('order' => 'contgroup_name ASC')),'contgroup_id','contgroup_name'),
			array('prompt'=>Yii::t('main_data','Choose Compound Group'))); ?>
		<?php echo $form->error($model,'contgroup_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con_source'); ?>
		<?php echo $form->textField($model,'con_source',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'con_source'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'con_file_mol1'); ?>
		<?php echo $form->fileField($model,'con_file_mol1'); ?>
		<?php echo $form->error($model,'con_file_mol1'); ?>
	</div>

	<?php if($model->isNewRecord!='1'){ ?>
	<div class="row">
     	<?php echo CHtml::link(CHtml::encode($model->con_contentname.".mol"),Yii::app()->request->baseUrl.'/assets/mol/mol1/'.$model->con_contentname.'.mol');} ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'con_file_mol2'); ?>
		<?php echo $form->fileField($model,'con_file_mol2'); ?>
		<?php echo $form->error($model,'con_file_mol2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->