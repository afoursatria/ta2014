<?php
/* @var $this SiteController */

$this->pageTitle=Yii::t('main_layout', 	Yii::app()->name);
?>

<?php
	if(!Yii::app()->user->isGuest)
		echo Yii::t('main_data','You are logged in as ') . CHtml::link(Yii::app()->user->id, array('user/profile/', 'id'=>Yii::app()->user->getState("no")));
	else
		echo CHtml::link(Yii::t('main_layout','Login'), array('login'));
?> 
<br />
<?php 
	if(Yii::app()->user->getState("role") == null)
	echo CHtml::link(Yii::t('user','Register'), array('register')); ?>
<br />

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiListView.update('specieslistview', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="row">
		<?php echo CHtml::dropDownList('Cat','', 
			array(
				'Species'=>Yii::t('main_data','Species'),
				'Localname'=>Yii::t('main_data','Localname'),
				'Virtue'=>Yii::t('main_data','Virtue'),
				'Contents'=>Yii::t('main_data','Compound')),
			array(
				'prompt'=>Yii::t('main_data','Choose Category'),
                'ajax'=>array(
                    'empty'=>'Choose Category',
                    'type'=>'POST',
                    'url' => CController::createUrl('category'),
                    // 'data'=> array('jdok'=>'js:this.value'),
                    'update'=>'#field_search',
                    ))
			); ?>
	</div>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>

<?php  $this->renderPartial('/species/_search',array(
    'model'=>$model,
)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'//species/_view',
	'id'=> 'specieslistview',
)); ?>