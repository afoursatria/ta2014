<?php
/* @var $this UserController */

$this->breadcrumbs=array(
	'Login'
);
$this->pageTitle=Yii::app()->name;
?>

<h1 class="text-center">Login</h1>

<div class="login col-xs-5">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'custom-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	  'htmlOptions'=>array('class'=>'col-xs-12 well'),
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<span class ="col-xs-5"><?php echo $form->labelEx($model,'username'); ?></span>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<span class ="col-xs-5"><?php echo $form->labelEx($model,'password'); ?></span>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div>
		<?php echo $form->error($model, 'use_is_active'); ?>
	</div>
	<?php 
  		if(Yii::app()->user->getState("role") == null)
  		echo CHtml::link(Yii::t('user','Forget Password'), array('resetPassword')); 
  	?>

	<div class="row submit text-center">
        <?php echo CHtml::submitButton('Login',array('name'=>'','id'=>'green','class'=>'button')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>