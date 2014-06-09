<?php
/* @var $this SpeciesController */
/* @var $model Species */

$this->breadcrumbs=array(
	// 'Species'=>array('index'),
	'Manage',
);
?>

<h1><?php echo Yii::t('user','List of User') ;?></h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->
<span id="add-user"></span>
<?php echo CHtml::link(Yii::t('user','Add User'), array('add'));?>

	<?php
	    $this->widget('zii.widgets.CListView', array(
	        'dataProvider'=>$model->search(),
	        'itemView'=>'//user/_allUserList',
	        // 'id'=> 'specieslistview',
	        )); 
	?>
