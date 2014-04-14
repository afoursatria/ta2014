<?php
/* @var $this LocalnameController */
/* @var $model Localname */

$this->breadcrumbs=array(
	'Localnames'=>array('index'),
	$model->loc_id=>array('view','id'=>$model->loc_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Localname', 'url'=>array('index')),
	array('label'=>'Create Localname', 'url'=>array('create')),
	array('label'=>'View Localname', 'url'=>array('view', 'id'=>$model->loc_id)),
	array('label'=>'Manage Localname', 'url'=>array('admin')),
);
?>

<h1>Update Localname <?php echo $model->loc_id; ?></h1>

<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>