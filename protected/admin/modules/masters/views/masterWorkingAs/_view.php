<?php
/* @var $this MasterWorkingAsController */
/* @var $data MasterWorkingAs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_as')); ?>:</b>
	<?php echo CHtml::encode($data->working_as); ?>
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


</div>