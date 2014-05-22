<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">
	<?php echo CHtml::link('Update',  array('news/update', 'id'=>$data->news_id)); ?>
	<?php echo CHtml::link('Delete',  array('news/delete', 'id'=>$data->news_id)); ?>

	<div class = "title">
	<h3><?php echo CHtml::encode($data->news_title); ?></h3>
	</div>

	<?php echo $data->news_content; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newscat_id')); ?>:</b>
	<?php echo CHtml::encode($data->newscat->newscat_name); ?>
	<br />


</div>