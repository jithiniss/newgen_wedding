
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
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Create Awards</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <?php echo CHtml::link('<i class="fa-home"></i>Home', array('site/home')); ?>
            </li>

            <li class="active">

                <strong>Create Awards</strong>
            </li>
        </ol>

    </div>

</div>

<div class="row">


    <div class="col-sm-12">
        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseUrl . '/admin.php/awards/admin'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Manage Awards</span>
        </a>

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
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
            </div>

        </div>


    </div>

</div>