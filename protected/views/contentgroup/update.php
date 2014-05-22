<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */

$this->breadcrumbs=array(
	'Contentgroups'=>array('index'),
	$model->contgroup_id=>array('view','id'=>$model->contgroup_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contentgroup', 'url'=>array('index')),
	array('label'=>'Create Contentgroup', 'url'=>array('create')),
	array('label'=>'View Contentgroup', 'url'=>array('view', 'id'=>$model->contgroup_id)),
	array('label'=>'Manage Contentgroup', 'url'=>array('admin')),
);
?>

<h1>Update Contentgroup <?php echo $model->contgroup_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>