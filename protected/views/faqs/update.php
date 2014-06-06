<?php
/* @var $this FaqsController */
/* @var $model Faqs */

// $this->breadcrumbs=array(
// 	'Faqs'=>array('index'),
// 	$model->faqs_id=>array('view','id'=>$model->faqs_id),
// 	'Update',
// );

// $this->menu=array(
// 	array('label'=>'List Faqs', 'url'=>array('index')),
// 	array('label'=>'Create Faqs', 'url'=>array('create')),
// 	array('label'=>'View Faqs', 'url'=>array('view', 'id'=>$model->faqs_id)),
// 	array('label'=>'Manage Faqs', 'url'=>array('admin')),
// );
?>

<h1>Update Faqs</h1>

<?php echo Yii::t('main_data','Choose Language'); ?>
<br />
<?php echo CHtml::link('English', array('update/en'));?>
<br />
<?php echo CHtml::link('Bahasa', array());?>
<?php //$this->renderPartial('_form', array('model'=>$model)); ?>