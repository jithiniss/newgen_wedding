<?php
/* @var $this AdminPostController */
/* @var $data AdminPost */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_name')); ?>:</b>
	<?php echo CHtml::encode($data->post_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('static_content')); ?>:</b>
	<?php echo CHtml::encode($data->static_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dynamic_content')); ?>:</b>
	<?php echo CHtml::encode($data->dynamic_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slider')); ?>:</b>
	<?php echo CHtml::encode($data->slider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gallery')); ?>:</b>
	<?php echo CHtml::encode($data->gallery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_us')); ?>:</b>
	<?php echo CHtml::encode($data->contact_us); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('social_media')); ?>:</b>
	<?php echo CHtml::encode($data->social_media); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_content')); ?>:</b>
	<?php echo CHtml::encode($data->site_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service')); ?>:</b>
	<?php echo CHtml::encode($data->service); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news')); ?>:</b>
	<?php echo CHtml::encode($data->news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('settings')); ?>:</b>
	<?php echo CHtml::encode($data->settings); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb')); ?>:</b>
	<?php echo CHtml::encode($data->cb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ub')); ?>:</b>
	<?php echo CHtml::encode($data->ub); ?>
	<br />

	*/ ?>

</div>