<h1><?php echo Yii::t('user','Change Password');?></h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'custom-form',
    'enableClientValidation'=>true,
       'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>
        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'currentPassword'); ?></span>
            <?php echo CHtml::PasswordField($model,'currentPassword') ?>
        <?php echo $form->error($model,'currentPassword'); ?>

        </div>

        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'newPassword'); ?></span>
            <?php echo CHtml::PasswordField($model,'newPassword') ?>
            <?php echo $form->error($model,'newPassword'); ?>
        </div>

        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'newPasswordRepeat'); ?></span>
            <?php echo CHtml::PasswordField($model,'newPasswordRepeat') ?>
            <?php echo $form->error($model,'newPasswordRepeat'); ?>
        </div>

        <div class="row submit buttons">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <?php echo CHtml::submitButton(Yii::t('main_data','Change password'),array('id'=>'blue','class'=>'button')); ?>
                <?php if (!$model->isNewRecord){
            echo CHtml::link(Yii::t('main_data','Cancel'), array('user/view', 'id'=>$model->use_id));
            }?>
            </div>
        </div>

 <?php $this->endWidget(); ?>
    </div><!-- form -->