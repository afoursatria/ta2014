<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->con_id=>array('view','id'=>$model->con_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contents', 'url'=>array('index')),
	array('label'=>'Create Contents', 'url'=>array('create')),
	array('label'=>'View Contents', 'url'=>array('view', 'id'=>$model->con_id)),
	array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1>Update Contents <?php echo $model->con_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>