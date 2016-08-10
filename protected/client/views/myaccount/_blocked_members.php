
<?php
if (!empty($data)) {
        ?>
        <div class="col-md-4 col-sm-6 col-xs-6 sized">
                <div class="load_custom">
                        <div class="profile ">
                                <?php
                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                    'id' => $data->id,
                                    'width' => 262,
                                    'height' => 257,
                                ));
                                ?>
                        </div>
                        <h1><?= $data->first_name; ?></h1>
                        <h2>Profile created by <?= $data->profileFor->profile_for; ?> </h2>
                        <h3><?php echo date('Y') - date('Y', strtotime($data->dob_year)); ?>
                                <?php
                                if ($data->height != 0) {
                                        echo "," . MasterHeight::model()->findByPk($data->height)->height;
                                }
                                ?>, <?= $data->religion0->religion; ?></h3>
                        <h3><?= $data->workingAs->working_as; ?></h3>
                        <h3><?= $data->state0->state; ?>, <?= $data->country0->country; ?></h3>
                        <h3>Grew up in <?= $data->country0->country; ?></h3>

                        <div class="connect">
                                <?php
                                $this->widget("application.client.components.UserInterestConnect", array(
                                    'interest_id' => $data->user_id,
                                ));
                                ?>


                        </div>
                </div>
        </div>
        <?php
}
?>
