<?php
/* @var $this LocalnameController */
/* @var $model Localname */

$this->breadcrumbs=array(
	$speId->spe_speciesname=>array('/species/view/id/'.$speId->spe_id),
	'Create',
);

$this->menu=array(
	array('label'=>'List Localname', 'url'=>array('index')),
	array('label'=>'Manage Localname', 'url'=>array('admin')),
);
?>

<h1>Create Localname</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'speId'=>$speId)); ?>