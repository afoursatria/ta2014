<?php
/* @var $this RefController */
/* @var $model Ref */

$this->breadcrumbs=array(
	'Refs'=>array('index'),
	$model->ref_id=>array('view','id'=>$model->ref_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ref', 'url'=>array('index')),
	array('label'=>'Create Ref', 'url'=>array('create')),
	array('label'=>'View Ref', 'url'=>array('view', 'id'=>$model->ref_id)),
	array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1>Update Ref <?php echo $model->ref_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>