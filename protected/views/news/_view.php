<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="news-view">
	<div class="news-operation">
		<?php echo CHtml::link('<span class="glyphicon glyphicon-pencil green-text"></span>Update',  array('news/update', 'id'=>$data->news_id),array('visible'=>Yii::app()->user->getState("role")==1)); ?>
		<?php echo CHtml::link('Delete',  array('news/delete', 'id'=>$data->news_id)); ?>
	</div>
	<!--Judul-->
	<div class = "title-news">
	<h3><?php echo CHtml::encode($data->news_title); ?></h3>
	</div>
	<!--isi-->
	<?php echo $data->news_content; ?>
	<br />
	<!--Kategori-->
	<b class="news-category"><?php echo CHtml::encode($data->getAttributeLabel('newscat_id')); ?>:</b>
	<?php echo CHtml::encode($data->newscat->newscat_name); ?>
</div>