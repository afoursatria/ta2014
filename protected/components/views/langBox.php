<?php echo CHtml::form('','post',array('id'=>'formId')); ?>
	<div id = "dropdown">
	    <div id="langdrop">
	        <?php echo CHtml::dropDownList('_lang', $currentLang, array(
	            'en' => 'English', 'in' => 'Bahasa'), array('submit' => '')); ?>
	    </div>
	</div>
<?php echo CHtml::endForm(); ?>