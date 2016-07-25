<?php
/* @var $this VendorDetailsController */
/* @var $data VendorDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no1')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_no2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_no2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_type')); ?>:</b>
	<?php echo CHtml::encode($data->business_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_website_link')); ?>:</b>
	<?php echo CHtml::encode($data->company_website_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_address')); ?>:</b>
	<?php echo CHtml::encode($data->company_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('our_services')); ?>:</b>
	<?php echo CHtml::encode($data->our_services); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approval_status')); ?>:</b>
	<?php echo CHtml::encode($data->approval_status); ?>
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