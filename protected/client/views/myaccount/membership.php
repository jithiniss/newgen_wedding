<style>
    .slick-dots li{
        background-color: transparent;
    }
    .memb_det{
        padding-left: 20px;
    }
    .plan{
        margin-top: 16px;
        margin-left: 295px;
    }
    .mat{
        margin-left: -114px;
    }
</style>
<section class="religion">
    <div class="container">
        <div class="row">
            <?php echo $this->renderPartial('//myaccount/_leftmenu'); ?>
            <div class="col-md-9 any nop memb_det">
                <h4>Membership Details
                </h4>
                <div class="pull-right">
                    <!--<p>Fields in bold cannot be edited. Please contact customer care for any queries.</p>-->
                </div>
                <div class="clearfix"></div>
                <span class="labz">&nbsp;</span>


                <div class="care">
                    <div class="content">

                        <div class="box-2">
                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Plan Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz"><?php echo $detail->plan_name; ?>

                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Plan Amount</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        echo $detail->amount;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Total Days</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">

                                        <?php
                                        echo $detail->number_of_days;
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Remaining Days</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        $now = time(); // or your date as well
                                        $your_date = strtotime(date('Y-m-d', strtotime($detail->dou)));
                                        $datediff = $now - $your_date;
                                        $left_day = floor($datediff / (60 * 60 * 24));
                                        $remaining_day = ($detail->number_of_days - $left_day);
                                        echo $remaining_day;
                                        ?>

                                    </label>
                                </div>
                            </div>


                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">SMS Alert</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($detail->sms_alerts == "1") {
                                                echo 'YES';
                                        } else {
                                                echo 'NO';
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>


                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Email Alert</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($detail->email_alerts == "1") {
                                                echo 'YES';
                                        } else {
                                                echo 'NO';
                                        }
                                        ?></label>
                                </div>
                            </div>
                            <div class="status">
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <label for="textinput" class="control-labelz">Featured </label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-labelz">:</label>
                                </div>
                                <div class="col-sm-7 col-xs-7 zeros">
                                    <label for="textinput" class="control-labelz">
                                        <?php
                                        if ($detail->featured == "1") {
                                                echo 'YES';
                                        } else {
                                                echo 'NO';
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                            <?php if ($remaining_day <= 10) { ?>
                                    <?php echo CHtml::link('<button class="btn btn-default mat">Upgrade Now</button>', array('site/index', '#' => 'upgrade')) ?>
                            <?php } ?>
                            <?php echo CHtml::link('Membership Plan Details', 'Plan/plan', array('class' => 'btn btn-default plan')) ?>

                        </div>

                    </div>


                    <div class="clearfix"></div>

                </div>

            </div>
        </div>

    </div>
</section>
<!--<script type="text/javascript">
        $(document).ready(function () {
            $(".profile_pics").change(function () {


                var fd = new FormData();
                fd.append("UserDetails[photo]", $(".profile_pics")[0].files[0]);
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl("Profile/MyProfile"); ?>',
                    type: 'POST',
                    data: fd,
                    datatype: 'json',
                    // async: false,
                    beforeSend: function () {
                        $('#loading_prof').show();
                    },
                    success: function (data) {

                        // on success do some validation or refresh the content div to display the uploaded images
                        $("#ajax_pics").html(data);
                    },
                    complete: function () {
                        // success alerts
                        $('#loading_prof').hide();
                        // alert('Image uploaded successfully')
                    },
                    error: function (data) {
                        alert("There may a error on uploading. Try again later");
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });
        });
</script>-->