<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'use_fullname'); ?>
		<?php echo $form->textField($model,'use_fullname',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'use_fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_email'); ?>
		<?php echo $form->textField($model,'use_email',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'use_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_birthdate'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        	'model'=>$model, 'attribute'=>'use_birthdate',
        	'options'=>array(
        	'dateFormat'=>'yy-mm-dd',
        	'yearRange'=>'-70:+0',
        	'changeYear'=>'true',
        	'changeMonth'=>'true',
            ),
		)); 
        ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_occupation'); ?>
		<?php echo $form->textField($model,'use_occupation'); ?>
		<?php echo $form->error($model,'use_occupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_city'); ?>
		<?php echo $form->textField($model,'use_city'); ?>
		<?php echo $form->error($model,'use_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_country'); ?>
		<?php echo $form->textField($model,'use_country'); ?>
		<?php echo $form->error($model,'use_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'use_address'); ?>
		<?php echo $form->textField($model,'use_address'); ?>
		<?php echo $form->error($model,'use_address'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->