<?php
/* @var $this ContentgroupController */
/* @var $model Contentgroup */

$this->breadcrumbs=array(
	'Contentgroups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contentgroup', 'url'=>array('index')),
	array('label'=>'Manage Contentgroup', 'url'=>array('admin')),
);
?>

<h1>Create Contentgroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>