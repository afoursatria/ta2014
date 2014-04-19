<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'newUser-grid',
	'dataProvider'=>$model->notVerifiedUser(),
	// 'filter'=>$model,
	'columns'=>array(
		'use_fullname',
		'use_username',
		'use_email',
		'roles.rol_name',
		
		array(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
		    'updateButtonUrl'=>'Yii::app()->createUrl("user/verify", array("id"=>$data->use_id))',		            
		  
		    
		),
	),
)); ?>