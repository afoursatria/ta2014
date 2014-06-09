<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	'Update',
);
?>
<h1>Update News <?php echo $model->news_id; ?></h1>
<div class="row">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>