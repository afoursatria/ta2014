<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">
	<?php if (Yii::app()->user->getState('role')==1) {
	?>
	<?php echo CHtml::link(Yii::t('main_layout','Update'),  array('news/update', 'id'=>$data->news_id)); ?>
	<?php
	echo CHtml::link(Yii::t('main_layout','Delete'),"#", 
          array('submit'=>array('localname/delete', 'id'=>$data->news_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); }?>

	<div class = "title">
	<h3><?php echo CHtml::encode($data->news_title); ?></h3>
	</div>

	<?php 
	if (strlen($data->news_content) > 500) {
		echo substr($data->news_content, 0, 490)."...".CHtml::link(Yii::t('main_data','Read More'),array('news/view', 'id'=>$data->news_id));
	}
	else echo $data->news_content;?>
	<br />
<!-- 
	<b><?php echo CHtml::encode($data->getAttributeLabel('newscat_id')); ?>:</b>
	<?php echo CHtml::encode($data->newscat->newscat_name); ?>
	<br /> -->


</div>