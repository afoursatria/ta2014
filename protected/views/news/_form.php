<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'news_title'); ?>
		<?php echo $form->textField($model,'news_title'); ?>
		<?php echo $form->error($model,'news_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_content'); ?>
		<?php echo $form->textArea($model,'news_content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'news_content'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'newscat_id'); ?>
		<?php echo $form->dropDownList($model,'newscat_id', 
			CHtml::listData(NewsCategory::model()->findAll(),'newscat_id','newscat_name'), 
			array('prompt'=>'Choose category')); ?>
		<?php echo $form->error($model,'newscat_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->widget('application.extensions.tinymce.TinyMce'); ?>
 
	<script>
	    tinymce.init({
	    selector: "textarea#News_news_content",
	    menubar: false,
	    width: 900,
	    height: 300,
	   toolbar1: "undo redo | bold | italic underline | alignleft aligncenter alignright alignjustify ", 
	   toolbar2: "outdent indent | hr | sub sup | bullist numlist | formatselect fontselect fontsizeselect | cut copy paste pastetext pasteword | search replace ", 
	 
	 }); 
	</script>

<?php $this->endWidget(); ?>

</div><!-- form -->