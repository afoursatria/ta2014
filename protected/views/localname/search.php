<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#lnameKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'lname_list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('localname/search')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('lnameKey', (isset($_GET['lnameKey'])) ? $_GET['lnameKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Local Name'), 'id'=>'lnameKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"{alphapager}\n{pager}\n{items}",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//localname/_view',
	'id'=> 'lname_list',
)); ?>