<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#virtueKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'virtue_list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('virtue/search')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('virtueKey', (isset($_GET['virtueKey'])) ? $_GET['virtueKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Virtue'), 'id'=>'virtueKey'));

    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"{alphapager}\n{pager}\n{items}",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//virtue/_view',
	'id'=> 'virtue_list',
)); ?>