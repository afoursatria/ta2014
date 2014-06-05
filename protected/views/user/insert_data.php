<!-- <h1>Insert Data</h1> -->

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        Yii::t('main_data','Species')=>array('id'=>'newSpecies','content'=>$this->renderPartial(
                                        '//species/_form',
                                        array('model'=>$speciesModel),TRUE
                                        )),       
        Yii::t('main_data','Compound')=>array('id'=>'newCompound','content'=>$this->renderPartial(
                                        '//contents/_form',
                                        array('model'=>$compoundModel),TRUE
                                        )),
        Yii::t('main_data','Local Name')=>array('id'=>'newLocalname','content'=>$this->renderPartial(
                                        '//localname/_form',
                                        array('model'=>$localnameModel),TRUE
                                        )),
        Yii::t('main_data','Alias')=>array('id'=>'newAliases','content'=>$this->renderPartial(
                                        '//aliases/_form',
                                        array('model'=>$aliasesModel),TRUE
                                        )),
        Yii::t('main_data','Virtue')=>array('id'=>'newVirtue','content'=>$this->renderPartial(
                                        '//virtue/_form',
                                        array('model'=>$virtueModel),TRUE
                                        )),
        Yii::t('main_data','Compound Group')=>array('id'=>'newContentgroup','content'=>$this->renderPartial(
                                        '//contentgroup/_form',
                                        array('model'=>$contentGroupModel),TRUE
                                        )),
        'Reference'=>array('id'=>'newReference','content'=>$this->renderPartial(
                                        '//ref/_form',
                                        array('model'=>$referenceModel),TRUE
                                        )),
        
      	// panel 3 contains the content rendered by a partial view
        // 'AjaxTab'=>array('ajax'=>$this->createUrl('ajax')),
    ),
    // additional javascript options for the tabs plugin
    'options'=>array(
        'collapsible'=>true,
    ),
    'id'=>'MyTab-Menu',
));
?>