<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->verifiedUser(),
	// 'filter'=>$model,
	'columns'=>array(
		'use_fullname',
		'use_username',
		'use_email',
		'roles.rol_name',
		// array(
  //   		'name'=>'rol_id',
  //   		'value'=>$data->role->rol_name,
		// ),
		array(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}{delete}',
		),
	),
)); ?>