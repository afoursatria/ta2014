<?php
	Yii::app()->clientScript->registerScript('speciesSearch',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#aliasKey').keyup(function(){
        ajaxRequest = $(this).serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
// this is the id of the CListView
                'alias_list',
                {data: ajaxRequest}
            )
        },
// this is the delay
        200);
    });"
);
?>

<?php 
	CHtml::beginForm(CHtml::normalizeUrl(array('aliases/search')), 'get', array('id'=>'filter-form'));
	echo CHtml::textField('aliasKey', (isset($_GET['aliasKey'])) ? $_GET['aliasKey'] : '', 
        array('placeholder'=>Yii::t('main_data','Alias Name'), 'id'=>'aliasKey'));
    echo CHtml::submitButton('Search', array('name'=>''));
    CHtml::endForm();
?>

<?php 
    $this->widget('application.extensions.alphapager.ApListView', array(
    'template'=>"{alphapager}\n{pager}\n{items}",
	'dataProvider'=>$dataProvider,
	'itemView'=>'//aliases/_view',
	'id'=> 'alias_list',
)); ?>