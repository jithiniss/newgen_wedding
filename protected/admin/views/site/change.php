<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>	
<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">Change Password</h1>
        <p style="float: left;margin-top: 7px;margin-left: 11px;" class="description">Change Password</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <?php echo CHtml::link('<i class="fa-home"></i>Home', array('site/home')); ?>
            </li>

            <li class="active">

                <strong>Change Password</strong>
            </li>
        </ol>

    </div>

</div>

<div class="row">


    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
                <div class="panel-options">
                    <a href="#" data-toggle="panel">
                        <span class="collapse-icon">&ndash;</span>
                        <span class="expand-icon">+</span>
                    </a>
                    <a href="#" data-toggle="remove">
                        &times;
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'change-password--form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => "form-horizontal"),
                ));
                ?>


                <?php echo $form->errorSummary($model); ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="field-1">
                       <label for="AdminUsers_password" class="required">Old Password <span class="required">*</span></label>
                    </label>
                    <div class="col-sm-10">
                <?php echo $form->textField($model, 'password', array('size' => 60, 'maxlength' => 500, 'class' => "form-control", 'placeholder' => "Old Password")); ?>
                <?php echo $form->error($model, 'password'); ?>
                    </div>
                </div>  
                <div class="form-group-separator"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="field-1">
                        <label for="AdminUsers_CB" class="required">New Password <span class="required">*</span></label>
                    </label>
                    <div class="col-sm-10">
                       
                        <?php echo $form->textField($model, 'CB', array('size' => 60, 'maxlength' => 500, 'class' => "form-control", 'placeholder' => "New Password")); ?>
                        <?php echo $form->error($model, 'CB'); ?>
                    </div>
                </div>  
                <div class="form-group-separator"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="field-1">
                        <label for="AdminUsers_UB" class="required">Confirm Password <span class="required">*</span></label>
                    </label>
                    <div class="col-sm-10">
                       
                        <?php echo $form->textField($model, 'UB', array('size' => 60, 'maxlength' => 500, 'class' => "form-control", 'placeholder' => "Confirm Password")); ?>
                        <?php echo $form->error($model, 'UB'); ?>
                    </div>
                </div>  
                <div class="form-group-separator"></div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Change' : 'Save', array('class' => 'btn btn-info btn-single pull-right')); ?>
                </div>

                    <?php $this->endWidget(); ?>
            </div>

        </div>


    </div>

</div>





