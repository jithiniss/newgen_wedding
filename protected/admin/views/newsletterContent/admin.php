<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */
?>

<style>
        .table th, td{
                text-align: center;
                width: 60px;

        }
        .table td{
                text-align: center;
        }
        tr.pink
        {
                background: #FFCCCC;
        }
        tr.green
        {
                background: #CCFF99;
        }
        tr.yellow
        {
                background: #FFFF99;
        }
        tr.white
        {
                background: #FFFFFF;
        }
</style>


<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title">Newsletter Details</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Newsletter Details</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage Newsletter Details</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/NewsletterContent/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add Newsletter Details</span>
                </a>
                <div class="panel panel-default">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                'type',
                                'heading',
                                'subheading',
                                'content',
                                array(
                                    'name' => 'image',
                                    'value' => function($data) {
                                            if ($data->image == "") {
                                                    return;
                                            } else {
                                                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/newsletter/' . $data->id . '.' . $data->image . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                'link',
                                array(
                                    'name' => 'status',
                                    'filter' => array('1' => 'enable', '0' => 'disable'),
                                    'value' => function($data) {
                                    if ($data->status == '1') {
                                            return 'enable';
                                    } elseif ($data->status == '0') {
                                            return 'disable';
                                    } else {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                /*
                                  'doc',
                                  'cb',
                                  'dou',
                                  'ub',
                                 */
                                array(
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'header' => '<th>Send Newsletter</th><th>Edit</th><th>Delete</th>',
                                    'template' => '<td>{send}</td><td>{update}</td><td>{delete}</td>',
                                    'buttons' => array(
                                        'send' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/NewsletterContent/EmailSend/id/".$data->id',
                                            'label' => '<i class="fa fa-newspaper-o" aria-hidden="true"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Send Newsletter',
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
