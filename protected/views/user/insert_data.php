<h1>Insert Data</h1>
<?php

$this->widget('zii.widgets.jui.CJuiTabs',array(
    'tabs'=>array(
        'Species'=>array('id'=>'newSpecies','content'=>$this->renderPartial(
                                        '//species/_form',
                                        array('model'=>$speciesModel),TRUE
                                        )),       
        'Compound'=>array('id'=>'newCompound','content'=>$this->renderPartial(
                                        '//contents/_form',
                                        array('model'=>$compoundModel),TRUE
                                        )),
        'Localname'=>array('id'=>'newLocalname','content'=>$this->renderPartial(
                                        '//localname/_form',
                                        array('model'=>$localnameModel),TRUE
                                        )),
        'Aliases'=>array('id'=>'newAliases','content'=>$this->renderPartial(
                                        '//aliases/_form',
                                        array('model'=>$aliasesModel),TRUE
                                        )),
        'Virtue'=>array('id'=>'newVirtue','content'=>$this->renderPartial(
                                        '//virtue/_form',
                                        array('model'=>$virtueModel),TRUE
                                        )),
        'Content Group'=>array('id'=>'newContentgroup','content'=>$this->renderPartial(
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