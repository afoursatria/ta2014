<?php
/* @var $this ContentsController */
/* @var $model Contents */

$this->breadcrumbs=array(
	'Contents'=>array('search'),
	$model->con_contentname,
);

$this->menu=array(
	array('label'=>'List Contents', 'url'=>array('index')),
	array('label'=>'Create Contents', 'url'=>array('create')),
	array('label'=>'Update Contents', 'url'=>array('update', 'id'=>$model->con_id)),
	array('label'=>'Delete Contents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->con_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1>Contents #<?php echo $model->con_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'con_id',
		'con_contentname',
		'con_knapsack_id',
		'con_metabolite_id',
		'con_pubchem_id',
		array(
    		'name'=>'contgroup_id',
    		'value'=>$model->contgroup->contgroup_name,
		),
		'con_source',
		'con_file_mol1',
		'con_file_mol2',
		// 'con_insert_by',
		// 'con_insert_date',
		// 'con_update_by',
		// 'con_update_date',
		// 'con_verified_by',
		// 'con_verified_date',
	),
	'nullDisplay'=>'-',
)); ?>

<?php

$this->widget('bootstrap.widgets.TbTabs',array(
    'tabs'=>array(
        Yii::t('main_data','Species')=>array('label'=>'Species','id'=>'Species-id','active'=>true,'content'=>$this->renderPartial(
                            '_species',
                            array('dataProvider'=>$speciesDataProvider),TRUE
                            )),       
          	// panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
    ),
    // additional javascript options for the tabs plugin
    // 'options'=>array(
    //     // 'collapsible'=>true,
    // ),
    'id'=>'MyTab-Menu',
));
?>
