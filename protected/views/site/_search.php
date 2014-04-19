<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'search_form',
        'enableAjaxValidation'=>false,
)); ?>

    <?php
        $category = array(1=>'Species', 2=>'Localname');
            $options = array(
                'id' => 'country_id',
                'ajax' => array('type'=>'POST'
                                , 'url'=>CController::createUrl('playTest/udpateTxt')
                                , 'update'=>'#param_id'  //selector to update
                )
            );
        
        echo CHtml::dropDownList('', '', $category, $options);
    ?>

    <div id="param_id" class="row">
        <?php 
            echo CHtml::textField( 'temp_id') ;
        ?>
    </div>

<?php $this->endWidget(); ?>