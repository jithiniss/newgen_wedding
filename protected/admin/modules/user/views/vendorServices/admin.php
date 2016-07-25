<?php
/* @var $this VendorServicesController */
/* @var $model VendorServices */
?>
<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>

<?php
$vendor = VendorDetails::model()->findByPk($model->vendor_id);
?>
<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title"><?php echo $vendor->first_name . ' ' . $vendor->last_name; ?> Services</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Services</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Services</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/user/vendorServices/create?id=' . $_REQUEST['id']; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Services</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'vendor-services-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'category_id',
                        'filter' => CHtml::listData(MasterServices::model()->findAllByAttributes(array('status' => 1)), 'id', 'name'),
                        'value' => '$data->category->name'
                    ),
                    'name',
                    array(
                        'name' => 'image',
                        'value' => function($data) {
                                if($data->image == "") {

                                } else {
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                        return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/vendor/' . $folder . '/' . $data->vendor_id . '/services/' . $data->id . '/' . $data->image . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'featured',
                        'filter' => array('0' => 'No', '1' => 'Yes'),
                        'value' => function($data) {
                        return $data->featured == 1 ? 'Yes ' : 'No';
                }
                    ),
                    array(
                        'name' => 'status',
                        'filter' => array('0' => 'In-Active', '1' => 'Active'),
                        'value' => function($data) {
                        return $data->status == 1 ? 'Active ' : 'In-Active';
                }
                    ),
                    /* 'address',
                      'description',

                      'phn_no',
                      'email',
                      'website',
                      'map',
                      'video',

                      'facebook',
                      'google_plus',
                      'twitter',
                      'linkdin',

                      'cb',
                      'ub',
                      'doc',
                      'dou',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

