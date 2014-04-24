<?php
/* @var $this RefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refs',
);

$this->menu=array(
	array('label'=>'Create Ref', 'url'=>array('create')),
	array('label'=>'Manage Ref', 'url'=>array('admin')),
);
?>

<h1>Refs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
