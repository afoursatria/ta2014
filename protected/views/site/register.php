<h2><?php echo Yii::t('user','Registration Form');?></h2>



<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'register-form',
    'type'=>'inline',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Fullname*')); ?>
        <?php echo $form->textFieldRow($model,'use_fullname'); ?>
        <span class="form-hint"></span>
        <?php echo $form->error($model,'use_fullname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Gender')); ?>
        <?php echo $form->radioButtonList($model,'use_gender', 
            array( 0 => Yii::t('user','Male'),
                    1 => Yii::t('user','Female'))); ?>
        <?php echo $form->error($model,'use_gender'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Birthdate')); ?>
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
        <?php echo $form->labelEx($model,Yii::t('user','Email')); ?>
        <?php echo $form->textField($model,'use_email'); ?>
        <?php echo $form->error($model,'use_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Username')); ?>
        <?php echo $form->textField($model,'use_username'); ?>
        <?php echo $form->error($model,'use_username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Password')); ?>
        <?php echo $form->textField($model,'use_password'); ?>
        <?php echo $form->error($model,'use_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Repeat Password')); ?>
        <?php echo $form->textField($model,'repeat_password'); ?>
        <?php echo $form->error($model,'repeat_password'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('user','Role')); ?>
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

        <?php echo $form->labelEx($model,Yii::t('user','Verification Code')); ?>
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