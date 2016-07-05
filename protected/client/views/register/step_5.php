<section class="platinum">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <section class="membership">
                    <h1>Membership <span class="plans">Plans</span></h1>


                    <div class="container dotted full-width">

                        <?php
                        if(!empty($plans)) {
                                foreach($plans as $plan) {
                                        ?>

                                        <div class="col-md-4 col-sm-6">
                                            <div class="mem">
                                                <h2><?php echo $plan->plan_name; ?></h2>
                                                <h3><?php
                                                    if($plan->number_of_days == 0) {

                                                    } else {
                                                            echo $plan->number_of_days / 30 . " months";
                                                    }
                                                    ?></h3>
                                                <p><?php
                                                    if($plan->amount == 0) {

                                                    } else {
                                                            echo "Rs. " . $plan->amount;
                                                    }
                                                    ?></p>
                                            </div>
                                            <ul class="list-inline list-unstyled">
                                                <?php
                                                if($plan->view_contact > 0) {

                                                        echo "<li>View contact detail upto " . $plan->view_contact . "</li>";
                                                }
                                                ?>

                                                <?php
                                                if($plan->send_message == 1) {

                                                        echo " <li>Send Messages</li>";
                                                }
                                                ?>
                                                <?php
                                                if($plan->search == 1) {

                                                        echo " <li>Search Unlimited Profiles</li>";
                                                }
                                                ?>

                                                <?php
                                                if($plan->Interest == 1) {

                                                        echo " <li>Send and receive Interests</li>";
                                                }
                                                ?>
                                                <?php
                                                if($plan->sms_alerts == 1) {

                                                        echo " <li>SMS Alert Available</li>";
                                                }
                                                ?>
                                                <?php
                                                if($plan->email_alerts == 1) {

                                                        echo " <li>Email Alert Available</li>";
                                                }
                                                ?>
                                                <?php
                                                if($plan->set_featured == 1) {

                                                        echo " <li>Set as Featured Profile</li>";
                                                }
                                                ?>
                                            </ul>
                                            <?php echo CHtml::link('Choose<i class="fa fat fa-angle-right"></i>', array('Myaccount/Index'), array("class" => "btc")); ?>

                                        </div>
                                        <?php
                                }
                        }
                        ?>


                        <div class="rowpull-right">
                            <div class="col-md-12">

                                <?php echo CHtml::link('Skip<i class="fa fat fa-angle-right"></i>', array('Myaccount/Index'), array("class" => "btc  pull-right", "style" => "background-color: #982ed8;margin-top: 0;margin-bottom: 0;color: #fff;")); ?>
                            </div>  </div>




                    </div>





                </section>

            </div>
        </div>
    </div>
</section>