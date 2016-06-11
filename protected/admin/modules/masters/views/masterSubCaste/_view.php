<?php
/* @var $this MasterSubCasteController */
/* @var $data MasterSubCaste */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
	<?php echo CHtml::encode($data->religion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caste_id')); ?>:</b>
	<?php echo CHtml::encode($data->caste_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_caste')); ?>:</b>
	<?php echo CHtml::encode($data->sub_caste); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	*/ ?>

</div>