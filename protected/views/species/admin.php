<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	'Species'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Species', 'url'=>array('index')),
	array('label'=>'Create Species', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#species-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Species</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'species-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'spe_id',
		'spe_species_id',
		'spe_speciesname',
		'spe_varietyname',
		'spe_familyname',
		'spe_foundername',
		/*
		'spe_foto',
		'ref_id',
		'spe_insert_by',
		'spe_insert_date',
		'spe_update_by',
		'spe_update_date',
		'spe_verified_by',
		'spe_verified_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
