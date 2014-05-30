<h2><?php echo Yii::t('user','Registration Form');?></h2>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <?php echo $form->errorSummary($model); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_fullname')); ?>
        <?php echo $form->textField($model,'use_fullname'); ?>
        <?php echo $form->error($model,'use_fullname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_gender')); ?>
        <?php echo $form->radioButtonList($model,'use_gender', 
            array( 0 => Yii::t('user','Male'),
                    1 => Yii::t('user','Female'))); ?>
        <?php echo $form->error($model,'use_gender'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_birthdate')); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model, 'attribute'=>'use_birthdate',
        'options'=>array(
        'dateFormat'=>'yy-mm-dd',
        'yearRange'=>'-70:+0',
        'changeYear'=>'true',
        'changeMonth'=>'true',
            ),
        )); ?>
        <?php echo $form->error($model,'use_birthdate'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_email')); ?>
        <?php echo $form->textField($model,'use_email'); ?>
        <?php echo $form->error($model,'use_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_username')); ?>
        <?php echo $form->textField($model,'use_username'); ?>
        <?php echo $form->error($model,'use_username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','use_password')); ?>
        <?php echo $form->textField($model,'use_password'); ?>
        <?php echo $form->error($model,'use_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','repeat_password')); ?>
        <?php echo $form->textField($model,'repeat_password'); ?>
        <?php echo $form->error($model,'repeat_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','rol_id')); ?>
         <?php 
            if (!Yii::app()->user->isGuest)  
                echo $form->dropdownList($model,'rol_id', 
                array(
                    1 => 'Admin',
                    2 => 'Expert',
                    3 => 'Contributor'), array('empty'=>'Choose Role')); 
            
            else echo $form->dropdownList($model,'rol_id', 
                array(  
                    2 => 'Expert',
                    3 => 'Contributor'), array('empty'=>'Choose Role')); 
            ?>
        <?php echo $form->error($model,'rol_id'); ?>
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

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>