<?php
/* @var $this UserDetailsController */
/* @var $data UserDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
	<?php echo CHtml::encode($data->contact_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_for')); ?>:</b>
	<?php echo CHtml::encode($data->profile_for); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_day')); ?>:</b>
	<?php echo CHtml::encode($data->dob_day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_month')); ?>:</b>
	<?php echo CHtml::encode($data->dob_month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob_year')); ?>:</b>
	<?php echo CHtml::encode($data->dob_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caste')); ?>:</b>
	<?php echo CHtml::encode($data->caste); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_caste')); ?>:</b>
	<?php echo CHtml::encode($data->sub_caste); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nakshatra')); ?>:</b>
	<?php echo CHtml::encode($data->nakshatra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suddha_jadhagam')); ?>:</b>
	<?php echo CHtml::encode($data->suddha_jadhagam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regional_site')); ?>:</b>
	<?php echo CHtml::encode($data->regional_site); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marital_status')); ?>:</b>
	<?php echo CHtml::encode($data->marital_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mothertongue')); ?>:</b>
	<?php echo CHtml::encode($data->mothertongue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skin_tone')); ?>:</b>
	<?php echo CHtml::encode($data->skin_tone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_type')); ?>:</b>
	<?php echo CHtml::encode($data->body_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('health_info')); ?>:</b>
	<?php echo CHtml::encode($data->health_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blood_group')); ?>:</b>
	<?php echo CHtml::encode($data->blood_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disablity')); ?>:</b>
	<?php echo CHtml::encode($data->disablity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smoke')); ?>:</b>
	<?php echo CHtml::encode($data->smoke); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('drink')); ?>:</b>
	<?php echo CHtml::encode($data->drink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('diet')); ?>:</b>
	<?php echo CHtml::encode($data->diet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_level')); ?>:</b>
	<?php echo CHtml::encode($data->education_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('education_field')); ?>:</b>
	<?php echo CHtml::encode($data->education_field); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_with')); ?>:</b>
	<?php echo CHtml::encode($data->working_with); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('working_as')); ?>:</b>
	<?php echo CHtml::encode($data->working_as); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('annual_income')); ?>:</b>
	<?php echo CHtml::encode($data->annual_income); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile_number')); ?>:</b>
	<?php echo CHtml::encode($data->mobile_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father_status')); ?>:</b>
	<?php echo CHtml::encode($data->father_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_status')); ?>:</b>
	<?php echo CHtml::encode($data->mother_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_married_brother')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_married_brother); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_unmarried_brother')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_unmarried_brother); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_married_sister')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_married_sister); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_of_unmarried_sister')); ?>:</b>
	<?php echo CHtml::encode($data->num_of_unmarried_sister); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('family_type')); ?>:</b>
	<?php echo CHtml::encode($data->family_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('family_value')); ?>:</b>
	<?php echo CHtml::encode($data->family_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('affluence_level')); ?>:</b>
	<?php echo CHtml::encode($data->affluence_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grow_up_in')); ?>:</b>
	<?php echo CHtml::encode($data->grow_up_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_me')); ?>:</b>
	<?php echo CHtml::encode($data->about_me); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mob_num_verification')); ?>:</b>
	<?php echo CHtml::encode($data->mob_num_verification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proof')); ?>:</b>
	<?php echo CHtml::encode($data->id_proof); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('register_step')); ?>:</b>
	<?php echo CHtml::encode($data->register_step); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_approval')); ?>:</b>
	<?php echo CHtml::encode($data->profile_approval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_approval')); ?>:</b>
	<?php echo CHtml::encode($data->image_approval); ?>
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