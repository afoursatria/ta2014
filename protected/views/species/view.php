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
	array('label'=>'Delete Species', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->spe_id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>!(Yii::app()->user->getState("role"))),
	array('label'=>'Manage Species', 'url'=>array('admin'), 'visible'=>!(Yii::app()->user->getState("role"))),
	array('label'=>'Add Local Name', 'url'=>array('/localname/create', 'id'=>$model->spe_id)),
	// array('label'=>'Update Local Name', 'url'=>array('/localname/update', 'id'=>$localName->loc_id)),
);
?>

<h1><?php echo $model->spe_speciesname; ?></h1>


<?php if (Yii::app()->user->getState('role')==2):?>
<?php echo CHtml::link('update', array('localname/update', 'id'=>$model->spe_id));?>
<?php
    echo CHtml::link('delete',"#", 
          array('submit'=>array('virtue/delete', 'id'=>$model->spe_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
<?php endif?>   

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'spe_species_id',
		'spe_speciesname',
		'spe_varietyname',
		'spe_familyname',
		'spe_foundername',
		// 'spe_foto',
		array(
            'name'=>'spe_foto',
            'type'=>'raw',
            'value'=>
            $model->spe_foto == null ? CHtml::image(Yii::app()->request->baseUrl."/images/species.png",'image',array("class"=>'user-image')):
                CHtml::image(Yii::app()->request->baseUrl."/assets/species/pic/".$model->spe_foto.'.jpg','image',array("class"=>'user-image')),
        ),
        array(
    		'name'=>'ref_id',
    		'value'=>$model->ref->ref_name,
		)
	),
	'nullDisplay'=>'-',
)); ?>

<?php
	Yii::app()->clientScript->registerScript('search',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#lnameKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'localname-list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php

$this->widget('bootstrap.widgets.TbTabs',array(
    'tabs'=>array(
        Yii::t('main_data','Local Name')=>array('label'=>'Local Name','id'=>'localName-id','active'=>true,'content'=>$this->
            renderPartial(
                            '_localname',
                            array('dataProvider'=>$localnameDataProvider),TRUE
                            )),       
        Yii::t('main_data','Alias')=>array('label'=>'Alias','id'=>'aliases-id','content'=>$this->renderPartial(
	                        '_alias',
	                        array('dataProvider'=>$aliasesDataProvider),TRUE
                            )),
        Yii::t('main_data','Virtue')=>array('label'=>'Virtue','id'=>'virtue-id','content'=>$this->renderPartial(
                            '_virtue',
                            array('dataProvider'=>$virtueDataProvider),TRUE
                            )),                                              
      	Yii::t('main_data','Compound')=>array('label'=>'Compound','id'=>'contents-id','content'=>$this->renderPartial(
	                        '_contents',
	                        array('dataProvider'=>$contentsDataProvider),TRUE
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