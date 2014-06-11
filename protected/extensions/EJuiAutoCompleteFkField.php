<?php
/* 
 * EJuiAutoCompleteFkField class file
 *
 * @author Jeremy Dunn <jeremy.j.dunn@gmail.com>
 * @link http://www.yiiframework.com/
 * @version 1.5
 */

Yii::import('zii.widgets.jui.CJuiAutoComplete');
class EJuiAutoCompleteFkField extends CJuiAutoComplete {

    /**
     * @var boolean whether to show the FK field.
     */
    public $showFKField = false;

    /**
     * @var integer length of the FK field if visible
     */
    public $FKFieldSize = 10;
    /**
     * @var string the relation name to the FK table
     */
    public $relName;
    /**
     * @var string the relation name to the FK table
     */
    public $idSuffix;
    /**
     * @var string extension to append to id fields for uniqneness
     */
    public $displayAttr;

    /**
     * @var integer width of the AutoComplete field
     */
    public $autoCompleteLength = 50;

    /**
     * @var string the ID of the FK field
     */
    private $_fieldID;

    /**
     * @var string the ID of the hidden field to save the display value
     */
    private $_saveID;

    /**
     * @var string the ID of the AutoComplete field
     */
    private $_lookupID;

    /**
     * @var string the ID for the hidden field
     */
    private $_hiddenID;

    /**
     * @var string the initial display value
     */
    private $_display;
    /**
     * @var string name of the lookup field
     */
    private $_name;

    public function init() {
        parent::init(); // ensure necessary assets are loaded

        // JJD 8/3/11 make EJuiAutoCompleteFkField work for child rows where attribute like [$i]FieldName
        // get the ID which will be created for the actual field when it is rendered.
        // don't let resolveNameID() change $this->attribute which is needed to generate the actual field
        $attr = $this->attribute;
        $tempHtmlOpts = array();
        CHtml::resolveNameID($this->model, $attr, $tempHtmlOpts);
        $id = $tempHtmlOpts['id'].'_'.$this->idSuffix;
        $this->_fieldID = $id;
        $this->_saveID = $id . '_save';
        $this->_lookupID = $id .'_lookup';
        $this->_hiddenID = $id .'_hidden';
        $this->_name = $tempHtmlOpts['id'].'_lookup';

        $related = $this->model->{$this->relName}; // get the related record
        $value = CHtml::resolveValue($this->model, $this->attribute);
        $this->_display=(!empty($value) ? $related->{$this->displayAttr} : '');

        if (!isset($this->options['minLength']))
            $this->options['minLength'] = 2;

        if (!isset($this->options['maxHeight']))
            $this->options['maxHeight']='100';

        $this->htmlOptions['size'] = $this->autoCompleteLength;
        // fix problem with Chrome 10 validating maxLength for the auto-complete field
        $this->htmlOptions['maxlength'] = $this->autoCompleteLength;

        // setup javascript to do the work
        $this->options['create']="js:function(event, ui){\$(this).val('".addslashes($this->_display)."');}";  // show initial display value
        // after user picks from list, save the ID in model/attr field, and Value in _save field for redisplay
        $this->options['select']="js:function(event, ui){\$('#".$this->_fieldID."').val(ui.item.id);\$('#".$this->_saveID."').val(ui.item.value);}";
        // when the autoComplete field loses focus, refresh the field with current value of _save
        // this is either the previous value if user didn't pick anything; or the new value if they did
        // $this->htmlOptions['onblur']="$(this).val($('#".$this->_saveID."').val());";
    }

    public function run() {
        // first render the FK field.  This is the actual data field, populated by autocomplete.select()
        if ($this->showFKField) {
            echo CHtml::activeTextField($this->model, $this->attribute, array('size'=>$this->FKFieldSize, 'readonly'=>'readonly'));
        } else {
            echo CHtml::activeHiddenField($this->model,$this->attribute, array('id'=>$this->_hiddenID));
        }

        // second, the hidden field used to refresh the display value
        echo CHtml::hiddenField($this->_saveID,$this->_display, array('id'=>$this->_saveID)); 

        // third, the autoComplete field itself
        $this->htmlOptions['id'] = $this->_lookupID;
        $this->htmlOptions['name'] = $this->_name;       
        parent::run();

        // fouth, an image button to empty all three fields
        /*
        $label=Yii::t('DR','Remove '). ucfirst($this->relName); // TODO: how to translate relname?
        $deleteImageURL = '/images/text_field_remove.png'; 
        echo CHtml::image($deleteImageURL, $label,
            array('title'=>$label,
                'name' => 'remove'.$this->_fieldID,
                'style'=>'margin-left:6px;',
                // JJD 4/27/12 #1350 trigger onchange event for display field, in case there's an event attached (e.g. unsaved-changes-warning)
                'onclick'=>"$('#".$this->_fieldID."').val('').trigger('change');$('#".$this->_saveID."').val('');$('#".$this->_lookupID."').val('');",
            )
        );
         * 
         */
    }
}
?>