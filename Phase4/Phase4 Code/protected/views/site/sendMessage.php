<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<h1 align="right"><font size = 5><b>ثبت نظرات</b></font></h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p align="right">لطفا نظرات، پیشنهادات و انتقادات خود را در زیر وارد نمایید</p>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p align="right" class="note">فیلدهای دارای<span class="required">*</span> لازم هستند.</p>

	<div class="row">
        <?php echo $form->labelEx($model,'receiverType'); ?>
        <?php if(Yii::app()->user->getId()==1): ?>
		<?php echo CHtml::dropDownList('receiverType',$model->receiverType,array(1 => 'مسئول مسجد',2 => 'مسئول مدرسه',3 => 'والدین'),
        array(
			'empty'=>"",
            'value'=>'1',
            'ajax' => array(
                'type'=>'POST', 
                'url'=>CController::createUrl('site/type'),             
                'data'=>array('type'=>'js:this.value'),
                'dataType'=>'html',
				'update' => '#receiver',
            ))); ?>
		<?php elseif(Yii::app()->user->getId()==3): ?>
		<?php echo CHtml::dropDownList('receiverType',$model->receiverType,array(1 => 'مسئول مسجد',2 => 'مسئول مدرسه'),
        array(
			'empty'=>"",
            'value'=>'1',
            'ajax' => array(
                'type'=>'POST', 
                'url'=>CController::createUrl('site/type'),             
                'data'=>array('type'=>'js:this.value'),
                'dataType'=>'html',
				'update' => '#receiver',
            ))); ?>
		<?php else: ?>
		<?php echo CHtml::dropDownList('receiverType',$model->receiverType,array(1 => 'مسئول مسجد',2 => 'والد'),
        array(
			'empty'=>"",
            'value'=>'1',
            'ajax' => array(
                'type'=>'POST', 
                'url'=>CController::createUrl('site/type'),             
                'data'=>array('type'=>'js:this.value'),
                'dataType'=>'html',
				'update' => '#receiver',
            ))); ?>
		<?php endif; ?>
		
    </div>

    <div class="row">

        <?php echo $form->labelEx($model,'receiver'); ?>
        <?php echo CHtml::dropDownList('receiver',$model->receiver,array()); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<div class="compactRadioGroup">
		 	<?php echo $form->radioButtonList($model, 'category',
                    array(  0 => 'پیام',1 => 'انتقاد',2 => 'پیشنهاد',3 => 'سایر' ),
                    array( 'separator' => "	" ) );?>
		</div>
		<?php echo $form->error($model,'category'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>10, 'cols'=>100,'style'=>'width: 60%')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<!--captcha-->	
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('Captcha',array(
						    'buttonLabel' => "کد جدید",
						    'clickableImage' => true,
						    'refresh' => $refreshCaptcha));?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">لطفا عبارت مشاهده شده در بالا را وارد نمایید
		<br/>
		عبارت به حروف بزرگ و کوچک حساس نمیباشد</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('ارسال'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>