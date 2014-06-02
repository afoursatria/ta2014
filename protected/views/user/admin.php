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

<h1><?php echo Yii::t('user','List of User') ;?></h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'//user/_allUserList',
        // 'id'=> 'specieslistview',
        )); 
// $this->widget('zii.widgets.jui.CJuiTabs',array(
//     'tabs'=>array(
//         Yii::t('user','New User')=>array('id'=>'newUser-id','content'=>$this->renderPartial(
//                                         '_newUser',
//                                         array('model'=>$model,'Values'=>'This Is My Renderpartial Page'),TRUE
//                                         )),       
//         Yii::t('user','All Registered User')=>array('id'=>'registeredUser-id','content'=>$this->renderPartial(
//                                         '_allUserList',
//                                         array('model'=>$model,'Values'=>'This Is My Renderpartial Page'),TRUE
//                                         )),
//         Yii::t('user','Add User')=>array('id'=>'addUser-id','content'=>$this->renderPartial(
//                                         '/site/register',
//                                         array('model'=>$userModel,'Values'=>'This Is My Renderpartial Page'),TRUE
//                                         )),
//       	// panel 3 contains the content rendered by a partial view
//         // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
//     ),
//     // additional javascript options for the tabs plugin
//     'options'=>array(
//         'collapsible'=>true,
//     ),
//     'id'=>'MyTab-Menu',
// ));
?>
