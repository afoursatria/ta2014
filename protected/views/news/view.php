<?php
/* @var $this NewsController */
/* @var $model News */

// $this->breadcrumbs=array(
// 	'News'=>array('index'),
// 	$model->news_id,
// );
?>

<?php if (Yii::app()->user->getState('role')==1) {
	?>
<?php echo CHtml::link(Yii::t('main_layout','Update'),  array('news/update', 'id'=>$model->news_id)); ?>
<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('localname/delete', 'id'=>$model->news_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); }?>
<h1><?php echo $model->news_title; ?></h1>
<div>
<?php echo $model->news_content;?>
</div>
