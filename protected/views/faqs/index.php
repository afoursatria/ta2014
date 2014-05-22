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

<h1>Faqs</h1>


<?php echo $faqs->faqs_content; ?>

<?php 
	// $this->widget('zii.widgets.CListView', array(
	// 'dataProvider'=>$dataProvider,
	// 'itemView'=>'_view',
// )); 
?>
