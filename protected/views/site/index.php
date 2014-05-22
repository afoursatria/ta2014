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
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'search_form',
        'enableAjaxValidation'=>false,
)); ?>

    <?php
        $category = array(
        		'Species'=>Yii::t('main_data','Species'),
				'Localname'=>Yii::t('main_data','Localname'),
				'Virtue'=>Yii::t('main_data','Virtue'),
				'Contents'=>Yii::t('main_data','Compound'));
            $options = array(
                'id' => 'category_id',
                'ajax' => array('type'=>'POST'
                                , 'url'=>CController::createUrl('site/updateTextField')
                                , 'update'=>'#param_id'  //selector to update
                )
            );
        
        echo CHtml::dropDownList('category_name', '', $category, $options);
    ?>

    <div class="row">
        <?php 
            echo CHtml::textField('temp_id','',array('id'=>'param_id')) ;
        ?>
    </div>

<?php $this->endWidget(); ?>

<div class="row">
		<?php 
		// echo CHtml::dropDownList('Cat','', 
		// 	array(
		// 		'Species'=>Yii::t('main_data','Species'),
		// 		'Localname'=>Yii::t('main_data','Localname'),
		// 		'Virtue'=>Yii::t('main_data','Virtue'),
		// 		'Contents'=>Yii::t('main_data','Compound')),
		// 	array(
		// 		'prompt'=>Yii::t('main_data','Choose Category'),
  //               'ajax'=>array(
  //                   'empty'=>'Choose Category',
  //                   'type'=>'POST',
  //                   'url' => CController::createUrl('category'),
  //                   // 'data'=> array('jdok'=>'js:this.value'),
  //                   'update'=>'#field_search',
  //                   ))
		// 	); ?>
	</div>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('site/index')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('speNameKey', (isset($_GET['speNameKey'])) ? $_GET['speNameKey'] : '', array('id'=>'speNameKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'//species/_view',
	'id'=> 'specieslistview',
)); ?>