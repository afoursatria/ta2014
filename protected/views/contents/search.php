<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#compoundKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'content_list',
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
	echo CHtml::textField('compoundKey', (isset($_GET['compoundKey'])) ? $_GET['compoundKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Compound Name'),'id'=>'compoundKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"{alphapager}\n{pager}\n{items}",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//contents/_view',
	'id'=> 'content_list',
    'emptyText'=>'-',
)); ?>