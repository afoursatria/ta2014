<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'search_form',
        'enableAjaxValidation'=>false,
)); ?>

    <?php
        echo CHtml::dropDownList('category', '', array(
            'Species'=>'Species', 'Localname'=>'Localname'), 
        array(
            'prompt'=>'Select Category',
            'ajax'=>array(
                'type'=>'POST',
                'url'=>Yii::app()->createUrl('site/loadCategory'),
                'update'=>'#input_name',
            )));
    ?>

    <div id="input_name" class="row">
        <?php 
            echo CHtml::textField('temp') ;
        ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>
<div id="search_result">

</div>

<?php $this->endWidget(); ?>