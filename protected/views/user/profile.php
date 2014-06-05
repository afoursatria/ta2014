<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php
	$this->breadcrumbs=array(
	'Profile'=>$model->use_id,
	);
?>
<h1><?php echo $model->use_fullname?></h1> 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'use_fullname',
		'use_email',
		'use_birthdate',
		array(
			'name'=>'Curriculum Vitae',
			'type'=>'raw',
			'value'=>CHtml::link(CHtml::encode($model->use_cv),Yii::app()->request->baseUrl.'/assets/user/cv/'.$model->use_cv.'.pdf')),
		array(        
           	'name'=>Yii::t('user', 'Photo'),
           	'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->request->baseUrl."/assets/user/photo/".$model->use_foto.'.jpg','image',array("style"=>"width:200px;")),
           	),
	),
	'nullDisplay'=>'-',
)); ?>

<?php echo CHtml::link(Yii::t('user','Update Profile'), array('update','id'=>$model->use_id)); ?>
<br />
<br />
<?php echo CHtml::link(Yii::t('user','Change Password'), array('changePassword','id'=>$model->use_id)); ?>