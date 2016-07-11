<?php
/* @var $this PlansController */
/* @var $model Plans */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
<?php echo $form->label($model, 'id'); ?>
<?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'plan_name'); ?>
<?php echo $form->textField($model, 'plan_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'amount'); ?>
<?php echo $form->textField($model, 'amount', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'view_contact'); ?>
<?php echo $form->textField($model, 'view_contact', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'send_message'); ?>
<?php echo $form->textField($model, 'send_message', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'search'); ?>
<?php echo $form->textField($model, 'search', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'Interest'); ?>
<?php echo $form->textField($model, 'Interest', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'sms_alerts'); ?>
<?php echo $form->textField($model, 'sms_alerts', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'email_alerts'); ?>
<?php echo $form->textField($model, 'email_alerts', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'premium_tag'); ?>
<?php echo $form->textField($model, 'premium_tag', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'featured'); ?>
<?php echo $form->textField($model, 'featured', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'number_of_days'); ?>
<?php echo $form->textField($model, 'number_of_days', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'status'); ?>
<?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'cb'); ?>
<?php echo $form->textField($model, 'cb', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'ub'); ?>
<?php echo $form->textField($model, 'ub', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'doc'); ?>
<?php echo $form->textField($model, 'doc', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'dou'); ?>
<?php echo $form->textField($model, 'dou', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->