<?php
/* @var $this TellUsStoryController */
/* @var $data TellUsStory */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('partner_name')); ?>:</b>
    <?php echo CHtml::encode($data->partner_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('partner_email')); ?>:</b>
    <?php echo CHtml::encode($data->partner_email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('feedback')); ?>:</b>
    <?php echo CHtml::encode($data->feedback); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('wedding_date')); ?>:</b>
      <?php echo CHtml::encode($data->wedding_date); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
      <?php echo CHtml::encode($data->image); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('field1')); ?>:</b>
      <?php echo CHtml::encode($data->field1); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('field2')); ?>:</b>
      <?php echo CHtml::encode($data->field2); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('admin_approval')); ?>:</b>
      <?php echo CHtml::encode($data->admin_approval); ?>
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

      <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($data->status); ?>
      <br />

     */ ?>

</div>