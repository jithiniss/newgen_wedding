<?php
/* @var $this VendorDetailsController */
/* @var $model VendorDetails */
?>
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
                <h1 style="float: left;" class="title">Newsletter Details</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Create Newsletter Details</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Create Newsletter Details</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">
                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/NewsletterContent/admin'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Manage Newsletter Details</span>
                </a>

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"></h3>

                        </div>
                        <div class="panel-body">
                                <?php $this->renderPartial('_form', array('model' => $model)); ?>            </div>

                </div>


        </div>

</div>


