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
                <h1 style="float: left;" class="title">Awards</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Update Awards</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Update Awards</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">
                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/enquiry/admin'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Manage Awards</span>
                </a>
                <?php
                /* @var $this EnquiryController */
                /* @var $model Enquiry */

                $this->breadcrumbs = array(
                    'Enquiries' => array('index'),
                    $model->name,
                );

                $this->menu = array(
//	array('label'=>'List Enquiry', 'url'=>array('index')),
//	array('label'=>'Create Enquiry', 'url'=>array('create')),
//	array('label'=>'Update Enquiry', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Enquiry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Enquiry', 'url'=>array('admin')),
                );
                ?>

                <h1>View Enquiry #<?php echo $model->id; ?></h1>

                <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'id',
                        'name',
                        'subject',
                        'mobile',
                        'email',
                        'message',
                    ),
                ));
                ?>
        </div>
</div>
