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
	<div class="col-xs-2">
<?php
$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
    array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>'Manage News', 'url'=>array('admin')),
    ),
    'htmlOptions'=>array('class'=>'news-manage')
));
?>
</div>
<div class="col-xs-10">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>