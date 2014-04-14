<div class="form">
<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'currentPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'currentPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPasswordRepeat'); ?>
        <?php echo CHtml::activePasswordField($model,'newPasswordRepeat') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Change password'); ?>
    </div>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->