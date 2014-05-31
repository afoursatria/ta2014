<h1>Reset Password</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resetPassword-form',
	'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	<?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">

        <?php echo $form->labelEx($model,Yii::t('user','verifyCode')); ?>
        <div>
        <?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('main_data','Refresh code'))); ?>
        <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <div class="hint"><?php echo Yii::t('main_data','Please enter the letters as they are shown in the image above. <br/>Letters are not case-sensitive');?>.</div>
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
    <?php endif; ?>

	<div class="row submit">
        <?php echo CHtml::submitButton('Reset'); ?>
    </div>
<?php $this->endWidget(); ?>
</div>
