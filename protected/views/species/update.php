<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	'Species'=>array('index'),
	$model->spe_speciesname=>array('view','id'=>$model->spe_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Species', 'url'=>array('index')),
	array('label'=>'Create Species', 'url'=>array('create')),
	array('label'=>'View Species', 'url'=>array('view', 'id'=>$model->spe_id)),
	array('label'=>'Manage Species', 'url'=>array('admin')),
);
?>

<h1>Update Species <?php echo $model->spe_speciesname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>