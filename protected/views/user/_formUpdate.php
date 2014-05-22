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
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
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
        <?php echo $form->labelEx($model,'use_foto'); ?>
        <?php echo CHtml::activeFileField($model, 'use_foto'); ?> 
        <?php echo $form->error($model,'use_foto'); ?>
	</div>
	
	<?php if($model->isNewRecord!='1'){ ?>
	<div class="row">
     	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/assets/user/photo/'.$model->use_foto.'.jpg',"image",array("width"=>200));} ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'use_cv'); ?>
		<?php echo $form->fileField($model,'use_cv'); ?>
		<?php echo $form->error($model,'use_cv'); ?>
	</div>

	<?php if($model->isNewRecord!='1'){ ?>
	
	<div class="row">
     	<?php echo CHtml::link(CHtml::encode($model->use_cv),Yii::app()->request->baseUrl.'/assets/user/cv/'.$model->use_cv.'.pdf');} ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->