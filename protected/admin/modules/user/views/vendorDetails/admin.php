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
        <h1 style="float: left;" class="title">Vendor Details</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Vendor Details</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Vendor Details</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/user/vendorDetails/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Vendor Details</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'vendor-details-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'photo',
                        'value' => function($data) {
                                if($data->photo == "") {
                                        if($data->gender == 2) {
                                                return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/images/w1.jpg" />';
                                        } else if($data->gender == 1) {
                                                return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/images/pp.jpg" />';
                                        }
                                } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/vendor/' . $folder . '/' . $data->id . '/profile/' . $data->photo . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    'first_name',
                    'last_name',
                    'email',
                    array(
                        'name' => 'business_type',
                        'filter' => CHtml::listData(MasterBusiness::model()->findAll(), 'id', 'type'),
                        'value' => function($data) {
                                return $data->businessType->type;
                        }
                    ),
                    array(
                        'name' => 'approval_status',
                        'filter' => array(0 => 'Pending', 1 => 'Approved', 2 => 'Declined'),
                        'value' => function($data) {
                        if($data->approval_status == 0) {
                                return 'Pending';
                        } else if($data->approval_status == 1) {
                                return 'Approved';
                        } else if($data->approval_status == 2) {
                                return 'Declined';
                        }
                }
                    ),
                    array(
                        'name' => 'status',
                        'filter' => array('0' => 'In-Active', '1' => 'Active'),
                        'value' => function($data) {
                        return $data->status == 1 ? 'Active ' : 'In-Active';
                }
                    ),
                    /*
                      'country',
                      'state',
                      'city',
                      'street',
                      'dob',
                      'gender',
                      'phone_no1',
                      'phone_no2',
                      'fax',
                      'business_type',
                      'company_name',
                      'company_website_link',
                      'company_address',
                      'our_services',

                      'cb',
                      'ub',
                      'doc',
                      'dou',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'header' => '<th>Services</th><th>Edit</th><th>Delete</th>',
                        'template' => '<td>{service}</td><td>{update}</td><td>{delete}</td>',
                        'buttons' => array(
                            'service' => array(
                                'url' => 'Yii::app()->request->baseUrl."/admin.php/user/VendorServices/admin?id=".$data->id',
                                'label' => '<i class="fa fa-cogs" aria-hidden="true"></i>',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Services',
                                    'target' => '_blank',
                                ),
                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

