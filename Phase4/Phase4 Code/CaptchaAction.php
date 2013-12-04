<?php

Yii::import("system.web.widgets.captcha.CCaptchaAction");

class CaptchaAction extends CCaptchaAction
{
    const RENDER_REFRESHED_GET_VAR = "render_refreshed";

    public function run()
    {
        if (isset($_GET[self::REFRESH_GET_VAR]))  // AJAX request for regenerating code
        {
            $code = $this->getVerifyCode(true);
            echo CJSON::encode(array(
                'hash1' => $this->generateValidationHash($code),
                'hash2' => $this->generateValidationHash(strtolower($code)),
                // we add a random 'v' parameter so that FireFox can refresh the image
                // when src attribute of image tag is changed
                'url'=> $this->getController()->createUrl($this->getId(), array(
                    'v' => uniqid()
                )),
            ));
        }
        else if (isset($_GET[self::RENDER_REFRESHED_GET_VAR]))
        {
            $this->renderImage($this->getVerifyCode(true));
        }
        else
            $this->renderImage($this->getVerifyCode());
        Yii::app()->end();
    }
}