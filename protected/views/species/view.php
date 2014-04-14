<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	'Species'=>array('index'),
	$model->spe_speciesname,
);

$this->menu=array(
	array('label'=>'List Species', 'url'=>array('index')),
	array('label'=>'Add Species', 'url'=>array('create')),
	array('label'=>'Update Species', 'url'=>array('update', 'id'=>$model->spe_id)),
	array('label'=>'Delete Species', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spe_id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!(Yii::app()->user->role) == '1'),
	array('label'=>'Manage Species', 'url'=>array('admin'), 'visible'=>!(Yii::app()->user->role) == '1'),
	array('label'=>'Add Local Name', 'url'=>array('/localname/create', 'id'=>$model->spe_id)),
	array('label'=>'Update Local Name', 'url'=>array('/localname/update', 'id'=>$localName->loc_id)),
);
?>

<h1><?php echo $model->spe_speciesname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spe_species_id',
		'spe_speciesname',
		'spe_varietyname',
		'spe_familyname',
		'spe_foundername',
		'spe_foto',
		// 'ref_id',
		array(
    		'name'=>'ref_id',
    		'value'=>$model->ref->ref_name,
		)
	),
	'nullDisplay'=>'-',
)); ?>

<h1>Local Name</h1>
<?php
if ($localName !== NULL)
	// $this->widget('zii.widgets.CListView', array(
	// 	'data'=>$localName,
	// 	'attributes'=>array(
	// 		'loc_localname',
	// 		'loc_region',
	// 		'ref_id',
	// ),	
	// ));
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/localname/_view',
	));
	else echo "This Species has no local name"; 
// $this->renderPartial('/localname/view', array('localName'=>$localName, 'listLocalName'=>$listLocalName)); ?>