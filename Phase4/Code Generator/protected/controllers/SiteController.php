<?php
public function actionActivities()
{
    $model=new activities;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='activities-activities-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['activities']))
    {
        $model->attributes=$_POST['activities'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('activities',array('model'=>$model));
}

public function actionComment()
{
    $model=new comment;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='comment-comment-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['comment']))
    {
        $model->attributes=$_POST['comment'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('comment',array('model'=>$model));
}

public function actionGooglemap()
{
    $model=new googlemap;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='googlemap-googlemap-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['googlemap']))
    {
        $model->attributes=$_POST['googlemap'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('googlemap',array('model'=>$model));
}

public function actionMosqueculturalliablee()
{
    $model=new mosqueculturalliablee;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='mosqueculturalliablee-mosqueculturalliablee-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['mosqueculturalliablee']))
    {
        $model->attributes=$_POST['mosqueculturalliablee'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('mosqueculturalliablee',array('model'=>$model));
}

public function actionParentclass()
{
    $model=new parentclass;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='parentclass-parentclass-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['parentclass']))
    {
        $model->attributes=$_POST['parentclass'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('parentclass',array('model'=>$model));
}

public function actionParticipantcounter()
{
    $model=new participantcounter;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='participantcounter-participantcounter-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['participantcounter']))
    {
        $model->attributes=$_POST['participantcounter'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('participantcounter',array('model'=>$model));
}

public function actionPoint()
{
    $model=new point;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='point-point-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['point']))
    {
        $model->attributes=$_POST['point'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('point',array('model'=>$model));
}

public function actionReward()
{
    $model=new reward;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='reward-reward-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['reward']))
    {
        $model->attributes=$_POST['reward'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('reward',array('model'=>$model));
}

public function actionRefrencepoint()
{
    $model=new refrencepoint;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='refrencepoint-refrencepoint-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['refrencepoint']))
    {
        $model->attributes=$_POST['refrencepoint'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('refrencepoint',array('model'=>$model));
}

public function actionSchool()
{
    $model=new school;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='school-school-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['school']))
    {
        $model->attributes=$_POST['school'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('school',array('model'=>$model));
}

public function actionStudent()
{
    $model=new student;

    // uncomment the following code to enable ajax-based validation
    /*
    if(isset($_POST['ajax']) && $_POST['ajax']==='student-student-form')
    {
        echo CActiveForm::validate($model);
        Yii::app()->end();
    }
    */

    if(isset($_POST['student']))
    {
        $model->attributes=$_POST['student'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            return;
        }
    }
    $this->render('student',array('model'=>$model));
}
?>
