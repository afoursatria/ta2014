<?php
	$this->breadcrumbs=array(
	'Profile'=>array('profile','id'=>Yii::app()->user->no),
	'Change Password'
	);
?>

<h1><?php echo Yii::t('user','Change Password');?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'changePassword-form',
    'enableClientValidation'=>true,
       'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <div class="row">
        <?php echo $form->labelEx($model,'currentPassword'); ?>
        <?php echo $form->passwordField($model,'currentPassword'); ?>
        <?php echo $form->error($model,'currentPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'newPassword'); ?>
        <?php echo $form->passwordField($model,'newPassword'); ?>
        <?php echo $form->error($model,'newPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'newPasswordRepeat'); ?>
        <?php echo $form->passwordField($model,'newPasswordRepeat'); ?>
        <?php echo $form->error($model,'newPasswordRepeat'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton(Yii::t('user','Change password')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<!-- form -->