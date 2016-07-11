<?php
/* @var $this PlansController */
/* @var $data Plans */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('plan_name')); ?>:</b>
    <?php echo CHtml::encode($data->plan_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
    <?php echo CHtml::encode($data->amount); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('view_contact')); ?>:</b>
    <?php echo CHtml::encode($data->view_contact); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('send_message')); ?>:</b>
    <?php echo CHtml::encode($data->send_message); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('search')); ?>:</b>
    <?php echo CHtml::encode($data->search); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('Interest')); ?>:</b>
    <?php echo CHtml::encode($data->Interest); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('sms_alerts')); ?>:</b>
      <?php echo CHtml::encode($data->sms_alerts); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('email_alerts')); ?>:</b>
      <?php echo CHtml::encode($data->email_alerts); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('premium_tag')); ?>:</b>
      <?php echo CHtml::encode($data->premium_tag); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('featured')); ?>:</b>
      <?php echo CHtml::encode($data->featured); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('number_of_days')); ?>:</b>
      <?php echo CHtml::encode($data->number_of_days); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($data->status); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('cb')); ?>:</b>
      <?php echo CHtml::encode($data->cb); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('ub')); ?>:</b>
      <?php echo CHtml::encode($data->ub); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
      <?php echo CHtml::encode($data->doc); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
      <?php echo CHtml::encode($data->dou); ?>
      <br />

     */ ?>

</div>