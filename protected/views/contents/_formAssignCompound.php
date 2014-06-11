<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'custom-form',
  // Please note: When you enable ajax validation, make sure the corresponding
  // controller action is handling ajax validation correctly.
  // There is a call to performAjaxValidation() commented in generated controller code.
  // See class documentation of CActiveForm for details on this.
  'enableAjaxValidation'=>false,
  'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<div class="row">
<?php 
echo $form->labelEx($model, 'spe_id');
 $this->widget('EJuiAutoCompleteFkField', array(
      'model'=>$model, 
      'attribute'=>'spe_id', //the FK field (from CJuiInputWidget)
      // controller method to return the autoComplete data (from CJuiAutoComplete)
      'sourceUrl'=>Yii::app()->createUrl('/user/findSpeciesName'), 
      // defaults to false.  set 'true' to display the FK field with 'readonly' attribute.
      // 'showFKField'=>true,
       // display size of the FK field.  only matters if not hidden.  defaults to 10
      'FKFieldSize'=>15, 
      'relName'=>'species', // the relation name defined above
      'displayAttr'=>'SpeciesName',  // attribute or pseudo-attribute to display
      // length of the AutoComplete/display field, defaults to 50
      'autoCompleteLength'=>60,
      // any attributes of CJuiAutoComplete and jQuery JUI AutoComplete widget may 
      // also be defined.  read the code and docs for all options
      'options'=>array(
          // number of characters that must be typed before 
          // autoCompleter returns a value, defaults to 2
          'minLength'=>3, 
      ),
 ));
 echo $form->error($model, 'spe_id');
 ?>
<div/>
<div class="row">
 <?php 
 echo $form->labelEx($model, 'con_id');
 $this->widget('EJuiAutoCompleteFkField', array(
      'model'=>$model, 
      'attribute'=>'spe_id', //the FK field (from CJuiInputWidget)
      // controller method to return the autoComplete data (from CJuiAutoComplete)
      'sourceUrl'=>Yii::app()->createUrl('/user/findSpeciesName'), 
      // defaults to false.  set 'true' to display the FK field with 'readonly' attribute.
      // 'showFKField'=>true,
       // display size of the FK field.  only matters if not hidden.  defaults to 10
      'FKFieldSize'=>15, 
      'relName'=>'species', // the relation name defined above
      'displayAttr'=>'SpeciesName',  // attribute or pseudo-attribute to display
      // length of the AutoComplete/display field, defaults to 50
      'autoCompleteLength'=>60,
      // any attributes of CJuiAutoComplete and jQuery JUI AutoComplete widget may 
      // also be defined.  read the code and docs for all options
      'options'=>array(
          // number of characters that must be typed before 
          // autoCompleter returns a value, defaults to 2
          'minLength'=>3, 
      ),
 ));
 echo $form->error($model, 'spe_id');
?>
</div>
<?php $this->endWidget(); ?>
