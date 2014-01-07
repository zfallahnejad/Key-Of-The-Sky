<?php
/*
 * Author Rasoul Ashiri AshiriRasoul@gmail.com
 * Version 1.1.0
 * 23/03/1392
 * 2013-06-12
 */
class JalaliCalendar extends CInputWidget
{
    public $options;
//    public $button;
    public $htmlOptions;
    
    public function run() {
        $id = $this->getId();
        $this->htmlOptions['id'] = $id;
        if(isset($this->model))
        {
            if(isset($this->attribute))
                echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
            else
                throw new Exception('Jalali Calendar Widget needs attribute property.');
        }
        else
        {
            throw new Exception('Jalali Calendar Widget needs a Model.');
        }
        $assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . '/assets/');
        $skin = isset($this->options['skin']) ? $this->options['skin'] : 'aqua/theme';
        $skin .= '.css';
        $cs = Yii::app()->clientScript;
        $cs->registerCssFile($assetUrl . '/skins/' . $skin, false, -1, YII_DEBUG);
        
        $cs->registerScriptFile($assetUrl . '/js/jalali.js');
        $cs->registerScriptFile($assetUrl . '/js/calendar.js');
        $cs->registerScriptFile($assetUrl . '/js/calendar-setup.js');
        $cs->registerScriptFile($assetUrl . '/js/lang/calendar-fa.js');
        
        $script = "inputField: '$id'";
        foreach ($this->options as $option => $value)
        {
            if($option == 'skin')
                continue;
            elseif($option == 'showsTime' or $option == 'showOthers' or $option == 'langNumbers')
            {
                if($value == 1)
                    $script .= ', ' . $option . ": true" ;
                continue;
            }
            else
            {
                $script .= ', ';
                $script .= $option . ": '" . $value . "'";
            }
        }
        $cs->registerScript(__CLASS__ . '#' . $id, 'Calendar.setup({' . $script . '});', CClientScript::POS_LOAD);
    }
}
?>
