<div class="col-md-4 col-sm-6 col-xs-6 sized">
        <div class="load">
                <?php
                $this->widget("application.client.widgets.PhotoVisibility", array(
                    'id' => $data->id,
                ));
                ?>
                <h1><?php echo $data->first_name; ?> - <?php echo $data->id; ?></h1>
                <h2>Profile created by Parent </h2>
                <h3>24 yrs, 5' 4", Christian, English</h3>
                <h3>Doctor</h3>
                <h3>Lives in Cuttack, India</h3>
                <h3>Grew up in India</h3>

                <div class="connect">
                        <h5>Connect with her?</h5>


                        <div class="f2"><a href="#" class="connect-1">Yes</a></div>
                        <div class="f3"><a href="#" class="connect-2">No</a></div>


                </div>
        </div>
</div>