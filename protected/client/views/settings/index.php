<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="religion">
    <div class="container">
        <div class="row">

            <div class="col-md-3 newgens">
                <h3>Settings</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Account Settings</a></li>
                    <li><a href="#">Contact Filters</a></li>
                    <li><a href="#">Email / SMS Alerts</a></li>
                    <li><a href="#">Privacy Options</a></li>
                    <li><a href="#">Hide / Delete Profile</a></li>

                </ul>
            </div>
            <div class="col-md-9">
                <h4>My Account</h4>

                <form action="action_page.php">
                    <div class="zeros">
                        <!--****-->
                        <div class="strip">
                            <div class="rel">
                                <div class="rel-1">
                                    <h2>Contacts</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('/settings/editcontact'), array('class' => edit)); ?></h6>
                                </div>
                            </div>
                            <div class="strip-padding">


                                <div class="common">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-label">Email</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-label">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <div class="form-group">
                                            <label for="textinput" class="control-labelz"><?php echo $account->email ?></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-label">Contact Number</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-label">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <div class="form-group">
                                            <label for="textinput" class="control-labelz"><?php echo $account->contact_number ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--****-->
                        <div class="strip">
                            <div class="rel">
                                <div class="rel-1">
                                    <h2>Password</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Change<i class="fa cart fa-caret-right"></i>', array('/settings/changepassword'), array('class' => edit)); ?></h6>
                                </div>
                            </div>
                            <div class="strip-padding">


                                <div class="common">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-label">Password</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-label">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <div class="form-group">

                                            <input type="text" class="ui_apps" id="email" readonly="readonly" placeholder="******">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--****-->
                        <div class="strip">
                            <div class="rel">
                                <div class="rel-1">
                                    <h2>Address</h2>
                                </div>

                                <div class="rel-2">
                                    <h6><?php echo CHtml::link('Edit<i class="fa cart fa-caret-right"></i>', array('/settings/changeaddress'), array('class' => edit)); ?></h6>
                                </div>
                            </div>
                            <div class="strip-padding">

                                <div class="copyz">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Address:</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php
                                            if ($account->address) {
                                                    echo $account->address;
                                            } else {
                                                    echo '-';
                                            }
                                            ?></label>
                                    </div>
                                </div>


                                <div class="copyz">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">City</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz">
                                            <?php
                                            if (empty($account->city) || $account->city == "0") {
                                                    echo '-';
                                            } else {
                                                    echo $account->city;
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="copyz">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">State</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo $account->state0->state ?></label>
                                    </div>
                                </div>

                                <div class="copyz">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Country</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz">
                                            <?php echo $account->country0->country; ?></label>
                                    </div>
                                </div>

                                <div class="copyz">
                                    <div class="col-sm-3 col-xs-3 zeros">
                                        <label for="textinput" class="control-labelz">Pin/Zip Code</label>
                                    </div>
                                    <div class="col-sm-1 col-xs-1 zeros">
                                        <label for="textinput" class="control-labelz">:</label>
                                    </div>
                                    <div class="col-sm-8 col-xs-8 zeros">
                                        <label for="textinput" class="control-labelz"><?php echo $account->zip_code; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>