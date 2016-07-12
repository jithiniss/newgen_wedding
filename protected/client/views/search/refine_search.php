<div class="col-lg-3 col-md-3 col-sm-4 mains">
    <h3>Refine Search</h3>
    <div class="panel-group" id="accordion">
        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/Result/id/<?php echo $this->encrypt_decrypt('encrypt', $id); ?>" id="refine_form" method="POST">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Photo Settings
                        </h4>
                    </a>

                </div>
                <div id="panel1" class="panel-collapse collapse in">
                    <div class="panel-body">

                        <ul class="list-unstyled">
                            <?php
                            if(!is_array($photo)) {
                                    $photo_setting = explode(',', $photo);
                            } else {
                                    $photo_setting = $photo;
                            }

                            echo CHtml::checkboxList('photo', $photo_setting, array(
                                0 => 'All',
                                1 => 'Visible to all(100)',
                                2 => 'Visible Only on Invitation Sent/Accepted(392)',
                                3 => 'Password Protected (1000+)',
                                    ), array('template' => '<li>{input}{label}</li>',
                                'separator' => '',
                                'labelOptions' => array(
                                    'style' => 'color: #333;font-size: 12px;'),
                                'class' => 'chk',
                                'onchange' => 'refinesearch()',
                            ));
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel2">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Recently Joined
                        </h4>
                    </a>

                </div>
                <div id="panel2" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            echo CHtml::radioButtonList('joined', $joined, array(
                                0 => 'All',
                                1 => 'Within a day (39)',
                                2 => 'Within a week (168)',
                                3 => 'Within a month (341)',
                                    ), array('template' => '<li>{input}{label}</li>',
                                'separator' => '',
                                'labelOptions' => array(
                                    'style' => 'color: #333;font-size: 12px;'),
                                'class' => 'rad',
                                'onchange' => 'refinesearch()',
                                'value' => $joined,
                            ));
                            ?>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Active Members
                        </h4>
                    </a>
                </div>
                <div id="panel3" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            echo CHtml::radioButtonList('active_member', $active_mem, array(
                                0 => 'All',
                                1 => 'Within a day (39)',
                                2 => 'Within a week (168)',
                                3 => 'Within a month (341)',
                                    ), array('template' => '<li>{input}{label}</li>',
                                'separator' => '',
                                'labelOptions' => array(
                                    'style' => 'color: #333;font-size: 12px;'),
                                'class' => 'rad',
                                'onchange' => 'refinesearch()',
                                'value' => $active_mem,
                            ));
                            ?>

                        </ul>

                    </div>
                </div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel4">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Marital Status
                        </h4>
                    </a>
                </div>
                <div id="panel4" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            if(!is_array($marital_stat)) {
                                    $marital_status = explode(',', $marital_stat);
                            } else {
                                    $marital_status = $marital_stat;
                            }

                            echo CHtml::checkboxList('marital_status', $marital_status, CHtml::listData(MasterMaritalStatus::model()->findAll(array('condition' => 'status=1')), 'id', 'marital_status'), array('template' => '<li>{input}{label}</li>',
                                'separator' => '',
                                'labelOptions' => array(
                                    'style' => 'color: #333;font-size: 12px;'),
                                'class' => 'chk',
                                'onchange' => 'refinesearch()',
                            ));
                            ?>

                        </ul>
                    </div>
                </div>
            </div>





            <!--                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel5">
                                            <h4 class="panel-title">
                                                <i class="glyphicon glyphicon-minus"></i>Working With
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="panel5" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list-unstyled">
                                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">All</li>
                                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Visible to all (1000+)</li>
                                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Protected Phot... (392)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>-->


            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel6">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Profile Created by
                        </h4>
                    </a>
                </div>
                <div id="panel6" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            if(!is_array($profile_crea)) {
                                    $profile_created = explode(',', $profile_crea);
                            } else {
                                    $profile_created = $profile_crea;
                            }

                            echo CHtml::checkboxList('profile_created_by', $profile_created, CHtml::listData(MasterProfileFor::model()->findAll(array('condition' => 'status=1')), 'id', 'profile_for'), array('template' => '<li>{input}{label}</li>',
                                'separator' => '',
                                'labelOptions' => array(
                                    'style' => 'color: #333;font-size: 12px;'),
                                'class' => 'chk',
                                'onchange' => 'refinesearch()',
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel7">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Smoking
                        </h4>
                    </a>
                </div>
                <div id="panel7" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">All</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Visible to all (1000+)</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Protected Phot... (392)</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel8">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Drinking
                        </h4>
                    </a>
                </div>
                <div id="panel8" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">All</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Visible to all (1000+)</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Protected Phot... (392)</li>
                        </ul>
                    </div>
                </div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordions" href="#panel9">
                        <h4 class="panel-title">
                            <i class="glyphicon glyphicon-minus"></i>Eating habits
                        </h4>
                    </a>
                </div>
                <div id="panel9" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">All</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Visible to all (1000+)</li>
                            <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Protected Phot... (392)</li>
                        </ul>
                    </div>
                </div>
            </div>


        </form>


    </div>
</div>