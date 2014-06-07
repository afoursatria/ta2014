
<div class="form">
    <div id="custom-form" class="well">
        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($model); ?>

        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'currentPassword'); ?></span>
            <?php echo CHtml::activePasswordField($model,'currentPassword') ?>
        </div>

        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'newPassword'); ?></span>
            <?php echo CHtml::activePasswordField($model,'newPassword') ?>
        </div>

        <div class="row">
            <span class="col-md-3"><?php echo CHtml::activeLabel($model,'newPasswordRepeat'); ?></span>
            <?php echo CHtml::activePasswordField($model,'newPasswordRepeat') ?>
        </div>

        <div class="row submit buttons">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <?php echo CHtml::submitButton('Change password',array('id'=>'blue','class'=>'button')); ?>
            </div>
        </div>

        <?php echo CHtml::endForm(); ?>
    </div>
</div><!-- form -->