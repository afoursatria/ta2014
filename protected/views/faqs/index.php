<?php
/* @var $this FaqsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faqs',
);

if (Yii::app()->user->getState("role") == 1) 

$this->menu=array(
	array('label'=>'Create Faqs', 'url'=>array('create')),
	array('label'=>'Manage Faqs', 'url'=>array('admin')),
);

?>

<b><?php
	if (Yii::app()->user->getState('role')==1) {

		echo Yii::t('main_data', 'Update');
?></b>
<br />
<?php echo Yii::t('main_data','Choose Language'); ?>
<br />
<?php echo CHtml::link('English', array('faqs/update/en'));?>
<br />
<?php echo CHtml::link('Bahasa', array('update/id'));}?>
<h1>Faqs</h1>


<?php echo $faqs->faqs_content; ?>

<?php 
	// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider,
	// 'itemView'=>'_view',
// )); 
?>
