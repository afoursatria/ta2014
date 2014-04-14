<h2>Registration Form</h2>
<div class="form">
<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Fullname'); ?>
        <?php echo CHtml::activeTextField($model,'use_fullname') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Gender'); ?>
        <?php echo CHtml::activeDropdownList($model,'use_gender', 
            array(  0 => 'Laki-laki',
                    1 => 'Perempuan')) ?>
    </div>
     
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Tanggal Lahir'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model'=>$model, 'attribute'=>'use_birthdate',
        'options'=>array(
        'dateFormat'=>'yy-mm-dd',
        'yearRange'=>'-70:+0',
        'changeYear'=>'true',
        'changeMonth'=>'true',
            ),
        )); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Email'); ?>
        <?php echo CHtml::activeTextField($model,'use_email') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Username'); ?>
        <?php echo CHtml::activeTextField($model,'use_username') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Password'); ?>
        <?php echo CHtml::activePasswordField($model,'use_password') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'Ulang Password'); ?>
        <?php echo CHtml::activePasswordField($model, 'repeat_password') ?>
    </div>


    <div class="row">
        <?php echo CHtml::activeLabel($model,'Role'); ?>
        <?php 
            if (!Yii::app()->user->isGuest)  
                echo CHtml::activeDropdownList($model,'rol_id', 
                array(1 => 'Admin')); 
            
            echo CHtml::activeDropdownList($model,'rol_id', 
                array(  
                    2 => 'Expert',
                    3 => 'Contributor'), array('empty'=>'Choose Role')); 
            ?>
    </div>

    <?php if(CCaptcha::checkRequirements()): ?>
    <div class="row">

        <?php echo CHtml::activeLabel($model,'verifyCode'); ?>
        <div>
        <?php $this->widget('CCaptcha'); ?>
        <?php echo CHtml::activeTextField($model,'verifyCode'); ?>
        </div>
        <div class="hint">Please enter the letters as they are shown in the image above.
        <br/>Letters are not case-sensitive.</div>
    </div>
    <?php endif; ?>

    <div class="row submit">
        <?php echo CHtml::submitButton('Register'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div>