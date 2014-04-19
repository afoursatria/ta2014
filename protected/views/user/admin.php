<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	// 'Species'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#species-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>List of User</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'New User'=>array('id'=>'newUser-id','content'=>$this->renderPartial(
                                        '_newUser',
                                        array('model'=>$model,'Values'=>'This Is My Renderpartial Page'),TRUE
                                        )),       
        'All Registered User'=>array('id'=>'registeredUser-id','content'=>$this->renderPartial(
                                        '_allUserList',
                                        array('model'=>$model,'Values'=>'This Is My Renderpartial Page'),TRUE
                                        )),       // 'Render Partial'=>array('id'=>'test-id','content'=>$this->renderPartial(
      	// panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
    'id'=>'MyTab-Menu',
));
?>
