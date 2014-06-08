<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#speciesKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'specieslistview',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('species/search')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('speciesKey', (isset($_GET['speciesKey'])) ? $_GET['speciesKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Species Name'), 'id'=>'speciesKey'));
    echo CHtml::submitButton(Yii::t('main_data','Search'), array('name'=>''));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"{alphapager}\n{pager}\n{items}",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//species/_view',
	'id'=> 'specieslistview',
)); ?>