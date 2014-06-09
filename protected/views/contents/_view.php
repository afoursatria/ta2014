<?php
/* @var $this ContentsController */
/* @var $data Contents */
?>

<div class="view">
	<div class="entry">
		<?php
	if (Yii::app()->user->getState('role') == 1 && $data->contents->con_is_verified == 0) {
		echo CHtml::link("Verify", array('contents/verify', 'id'=>$data->contents->con_id), array('submit'=>array('contents/verify', "id"=>$data->contents->con_id), 'confirm' => 'Are you sure you want to verify?'));
	 } 
    ?>
	<b><?php echo "Status"; ?>:</b>
	<?php 
		if ($data->contents->con_is_verified == 0) {
			echo CHtml::image(Yii::app()->request->baseUrl."/images/cross.png","image",array('width'=>20)).
		Yii::t('main_data', 'not verified');
		}
		else echo CHtml::image(Yii::app()->request->baseUrl."/images/check.png","image",array('width'=>20)).Yii::t('main_data', 'verified');
	?>
	<ul class="news-operation">
		<li>
		<?php echo CHtml::link('update', array('contents/update', 'id'=>$data->contents->con_id));?>
 		</li>
 		<li>
	<?php
	echo CHtml::link('delete',"#", 
          array('submit'=>array('contents/delete', 'id'=>$data->contents->con_id), 
                'confirm' => Yii::t('main_data','Are you sure?'))); ?>
 		</li>
 	</ul>
 	<br/>
	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_contentname')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->contents->con_contentname), array('contents/view', 'id'=>$data->contents->con_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_knapsack_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_knapsack_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_metabolite_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_metabolite_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_pubchem_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_pubchem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('contgroup_id')); ?>:</b>
	<?php echo CHtml::encode($data->contents->contgroup->contgroup_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_source')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_source); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol1')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_file_mol1); ?>
	<br />

	<b><?php echo CHtml::encode($data->contents->getAttributeLabel('con_file_mol2')); ?>:</b>
	<?php echo CHtml::encode($data->contents->con_file_mol2); ?>
	<br />

	
	 	<div class = "element"></div>
	 </div>
</div>