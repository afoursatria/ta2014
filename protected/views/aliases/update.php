<?php
/* @var $this AliasesController */
/* @var $model Aliases */

$this->breadcrumbs=array(
	'Aliases'=>array('index'),
	$model->ali_id=>array('view','id'=>$model->ali_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aliases', 'url'=>array('index')),
	array('label'=>'Create Aliases', 'url'=>array('create')),
	array('label'=>'View Aliases', 'url'=>array('view', 'id'=>$model->ali_id)),
	array('label'=>'Manage Aliases', 'url'=>array('admin')),
);
?>

<h1>Update Aliases <?php echo $model->ali_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>