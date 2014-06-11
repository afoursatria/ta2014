<?php
/* @var $this FaqsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faqs',
);

if (Yii::app()->user->getState("role") == 1) 
?>

<b><?php
	if (Yii::app()->user->getState('role')==1) {

		echo Yii::t('main_data', 'Update');
?></b>
<br />
<?php echo Yii::t('main_data','Choose Language'); ?>
<br />
<?php echo CHtml::link('English', array('faqs/update','id'=>'en'));?>
<br />
<?php echo CHtml::link('Bahasa', array('update', 'id'=>'in'));}?>
<h1>Faqs</h1>


<?php echo $faqs->faqs_content; ?>

<?php 
	// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider,
	// 'itemView'=>'_view',
// )); 
?>
