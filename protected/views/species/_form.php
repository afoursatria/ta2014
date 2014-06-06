<?php
/* @var $this SpeciesController */
/* @var $model Species */
/* @var $form CActiveForm */
?>

<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>

<script type="text/javascript" src = "<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap232.min.js"></script>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'species-form',
	'type'=>'inline',
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
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_species_id'); ?></span>
		<?php echo $form->textField($model,'spe_species_id',array('size'=>60,'maxlength'=>100)); ?>
        <span class="form-hint">(Max.Length 20 characters)</span>
		<?php echo $form->error($model,'spe_species_id'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_speciesname'); ?></span>
		<?php echo $form->textField($model,'spe_speciesname',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'spe_speciesname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_varietyname'); ?></span>
		<?php echo $form->textField($model,'spe_varietyname',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'spe_varietyname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_familyname'); ?></span>
		<?php echo $form->textField($model,'spe_familyname',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'spe_familyname'); ?>
	</div>

	<div class="row">
		<span class="col-md-3"><?php echo $form->labelEx($model,'spe_foundername'); ?></span>
		<?php echo $form->textField($model,'spe_foundername',array('size'=>60,'maxlength'=>100)); ?>
		<span class="form-hint">(Max.Length 100 characters)</span>
		<?php echo $form->error($model,'spe_foundername'); ?>
	</div>

	<div class="row">
		<div class="control-group" id="fields">
			<span class="col-md-3"><?php echo $form->labelEx($model,'ref_id'); ?></span>
			<?php 
				$opts = CHtml::listData(Ref::model()->findAll(),'ref_id','ref_name');
				$tes = Ref::model()->findAll();
				$ref_array = array();
				foreach ($tes as $key) {
					array_push($ref_array, $key->ref_id);
				}
				// echo $tes;
			?>
				<div class ="col-xs-9">
				<?php
					$this->widget('bootstrap.widgets.TbTypeahead',array(
						'model'=>$model,
						'attribute'=>'ref_id',
						'id'=>'field1',
						'name'=>'ref_id1',
						'options'=>array(
							'source'=>$ref_array,
							'matcher'=>"js:function(item){return ~item.toLowerCase().indexOf(this.query.toLowerCase());}",
							'items'=>5,
							// 'class'=>'input-append',
							'autocomplete'=>'off'
						)
					));
				?>
			<button id="b1" class="btn add-more" type="button">+</button>
        	<span class="form-hint">(Max.Length 100 characters)</span>
			</div>
		</div>
		<?php echo $form->error($model,'ref_id'); ?>
	</div>

	<div class="row buttons">
		<div class="col-md-3"></div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main_layout','Save') : Yii::t('main_layout','Update'),array('id'=>'blue','class'=>'button')); ?>
		</div>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->