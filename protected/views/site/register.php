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
        <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Fullname')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_fullname');?>
        <span class="form-hint">(Max.Length 25 characters)</span>
        <?php echo $form->error($model,'use_fullname'); ?>
    </div>

    <div class="row">
        <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Gender')); ?><span class="red">*</span></span>
        <?php echo $form->radioButtonList($model,'use_gender', 
            array( 0 => Yii::t('user','Male'),
                    1 => Yii::t('user','Female'))); ?><span class="form-hint">(Choose one)</span>
        <?php echo $form->error($model,'use_gender'); ?>
    </div>
    
    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Birthdate')); ?><span class="red">*</span></span>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model, 'attribute'=>'use_birthdate',
        'options'=>array(
        'dateFormat'=>'yy-mm-dd',
        'yearRange'=>'-70:+0',
        'changeYear'=>'true',
        'changeMonth'=>'true',
            ),
        )); ?><span class="form-hint">(Click text field to pick from calendar)</span>
        <?php echo $form->error($model,'use_birthdate'); ?>
    </div>
    
    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Email')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_email'); ?><span class="form-hint">(Max.Length 25 characters)</span>
        <?php echo $form->error($model,'use_email'); ?>
    </div>

    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Username')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_username'); ?><span class="form-hint">(Max.Length 15 characters)</span>
        <?php echo $form->error($model,'use_username'); ?>
    </div>

    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Password')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'use_password'); ?><span class="form-hint">(Must be around 6 to 12 characters)</span>
        <?php echo $form->error($model,'use_password'); ?>
    </div>

    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Repeat Password')); ?><span class="red">*</span></span>
        <?php echo $form->textField($model,'repeat_password'); ?><span class="form-hint">(Must be match with 'Password' field)</span>
        <?php echo $form->error($model,'repeat_password'); ?>
    </div>

    <div class="row">
         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Role')); ?><span class="red">*</span></span>
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
            ?><span class="form-hint">(Choose one)</span>
        <?php echo $form->error($model,'rol_id'); ?>
    </div>
    
    <?php if(CCaptcha::checkRequirements()): ?>
    <div class= "row">

         <span class ="col-xs-3"><?php echo $form->labelEx($model,Yii::t('user','Verification Code')); ?><span class="red">*</span></span>
        <div class = "col-xs-9">
        <div class = "row">
        <?php $this->widget('CCaptcha', array('buttonLabel'=>Yii::t('main_data','Refresh code'))); ?>
        </div>
        <div class = "row">
        <?php echo $form->textField($model,'verifyCode'); ?>
        </div>
        <div class="row hint"><?php echo Yii::t('main_data','Please enter the letters as they are shown in the image above. <br/>(Letters are not case-sensitive)');?>.</div>
        <?php echo $form->error($model,'verifyCode'); ?>
    </div>
        
    </div>
    <?php endif; ?>

    <div class="row buttons">
        <div class="col-xs-3"></div>
        <div class="col-xs-9"><?php echo CHtml::submitButton('Submit', array('id'=>'blue','class'=>'button')); ?></div>
    </div>
    
    <?php $this->endWidget(); ?>
</div>