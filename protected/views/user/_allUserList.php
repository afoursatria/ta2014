<?php 
// $this->widget('zii.widgets.grid.CListView', array(
// 	'id'=>'user-grid',
// 	'dataProvider'=>$model->verifiedUser(),
// 	// 'filter'=>$model,
// 	'columns'=>array(
// 		'use_fullname',
// 		'use_username',
// 		'use_email',
// 		'roles.rol_name',
// 		// array(
//   //   		'name'=>'rol_id',
//   //   		'value'=>$data->role->rol_name,
// 		// ),
// 		array(
// 		    'class'=>'CButtonColumn',
// 		    'template'=>'{update}{delete}',
// 		),
// 	),
// )); 
?>

<div class="view">
	<div class="entry">
	<b><?php echo CHtml::encode($data->getAttributeLabel('use_fullname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->use_fullname), array('profile', 'id'=>$data->use_id)); ?>
	<br /> 
	<b><?php echo CHtml::encode($data->getAttributeLabel('use_email')); ?>:</b>
	<?php echo CHtml::encode($data->use_email); ?>
	<br />
	 	<div class = "element"></div>
	 </div>
	</div>