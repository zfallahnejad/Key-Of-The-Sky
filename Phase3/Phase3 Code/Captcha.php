<?php

Yii::import("web.system.widgets.CCaptcha");

class Captcha extends CCaptcha
{
    public $refresh = false;

    protected function renderImage()
    {
        if (!isset($this->imageOptions['id']))
            $this->imageOptions['id'] = $this->getId();

        if ($this->refresh)
        {
            $url = $this->getController()->createUrl($this->captchaAction, array(
                'v' => uniqid(),
                CaptchaAction::RENDER_REFRESHED_GET_VAR => 1
            ));
        }
        else
        {
            $url = $this->getController()->createUrl($this->captchaAction, array(
                'v' => uniqid()
            ));
        }
        $alt = isset($this->imageOptions['alt']) ? $this->imageOptions['alt'] : '';
        echo CHtml::image($url, $alt, $this->imageOptions);
    }
}