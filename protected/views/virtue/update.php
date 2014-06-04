<?php
/* @var $this VirtueController */
/* @var $model Virtue */

$this->menu=array(
	array('label'=>'List Virtue', 'url'=>array('index')),
	array('label'=>'Create Virtue', 'url'=>array('create')),
	array('label'=>'View Virtue', 'url'=>array('view', 'id'=>$model->vir_id)),
	array('label'=>'Manage Virtue', 'url'=>array('admin')),
);
?>

<h1>Update Virtue</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>