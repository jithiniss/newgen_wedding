<div class="col-md-4 col-sm-6 col-xs-6 sized">
        <div class="load">
                <?php
                $this->widget("application.client.widgets.PhotoVisibility", array(
                    'id' => $data->id,
                ));
                ?>
                <h1>  <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $data->user_id; ?>"><?php echo $data->first_name; ?> - <?php echo $data->id; ?></a></h1>
                <h2>Profile created by <?php echo MasterProfileFor::model()->findByPk($data->profile_for)->profile_for ?>  </h2>
                <h3><?php echo date('Y') - $data->dob_year; ?> yrs,  <?php echo MasterHeight::model()->findByPk($data->height)->height ?>, <?php echo MasterReligion::model()->findByPk($data->religion)->religion ?>, <?php echo MasterMotherTongue::model()->findByPk($data->mothertongue)->mother_tongue ?></h3>
                <h3><?php echo MasterEducationField::model()->findByPk($data->education_field)->education_field ?></h3>
                <h3>Lives in <?php echo MasterState::model()->findByPk($data->state)->state ?>, <?php echo MasterCountry::model()->findByPk($data->country)->country ?></h3>
                <h3>Grew up in <?php echo MasterCountry::model()->findByPk($data->grow_up_in)->country ?> </h3>

                <div class="connect">
                        <?php
                        $this->widget("application.client.components.UserInterest", array(
                            'interest_id' => $data->user_id,
                        ));
                        ?>

                </div>
        </div>
</div>