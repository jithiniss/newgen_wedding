<style>
        .slick-dots li{
                background-color: transparent;
        }
</style>
<section class="advance">
        <div class="container wishes">
                <div class="row">
                        <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                                <li class="sims "><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search">Basic Search</a></li>
                                <li class="sims active"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/search/advanced">Advanced Search</a> </li>



                        </ul>
                        <div class="col-md-8 col-sm-12 col-xs-12 outs mains2">



                                <form action="action_page.php">

                                        <div class="zeros">

                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Looking For</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="optradio">Bride
                                                                </label>
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="optradio">Groom
                                                                </label>
                                                        </div>
                                                </div>

                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Age</label>
                                                        </div>

                                                        <div class="col-sm-2 col-xs-2 zeros">
                                                                <div class="form-group">

                                                                        <select class="ages" name="carlist" form="carform">
                                                                                <option value="volvo">20</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">To</label>
                                                        </div>
                                                        <div class="col-sm-2 col-xs-2 zeros">
                                                                <div class="form-group">

                                                                        <select class="ages" name="carlist" form="carform">
                                                                                <option value="volvo">26</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                </div>



                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Height</label>
                                                        </div>

                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <div class="form-group">

                                                                        <select class="height" name="carlist" form="carform">
                                                                                <option value="volvo">4'5" - 134cm</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">To</label>
                                                        </div>
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <div class="form-group">

                                                                        <select class="height" name="carlist" form="carform">
                                                                                <option value="volvo">7' - 213cm</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                </div>


                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Martial Status</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <div class="form-group">

                                                                        <select class="aps" name="carlist" form="carform">
                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                </div>




                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Have Children</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="optradio">Doesn't Matter
                                                                </label>
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="optradio">No
                                                                </label>
                                                                <label class="radio-inline sec">
                                                                        <input type="radio" name="optradio">Ok, if not staying together
                                                                </label>
                                                        </div>
                                                </div>





                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Religion</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <div class="form-group">

                                                                        <select class="aps" name="carlist" form="carform">
                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                </div>



                                                <div class="common">
                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Mother Tonuge</label>
                                                        </div>

                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                <div class="form-group">

                                                                        <select class="aps" name="carlist" form="carform">
                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                <option value="saab">1</option>
                                                                                <option value="opel">2</option>
                                                                                <option value="audi">3</option>
                                                                        </select>
                                                                </div>
                                                        </div>

                                                </div>




                                                <div class="clearfix"></div>



                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default pan">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel1">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i>Location & Grew up in details
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel1" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Country Living In</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Residency Status</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>


                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Country Grew up In</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>


                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>



                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel2">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i>Education & Profession Details
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel2" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Education</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Education Area</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>


                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Working With</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Profession Area</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <select class="aps" name="carlist" form="carform">
                                                                                                                <option value="volvo">Doesn't Matter</option>
                                                                                                                <option value="saab">1</option>
                                                                                                                <option value="opel">2</option>
                                                                                                                <option value="audi">3</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>






                                                                                <div class="common">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Annual Income</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <label class="radio-inline sec">
                                                                                                        <input type="radio" name="optradio">Doesn't Matter
                                                                                                </label>
                                                                                                <label class="radio-inline sec">
                                                                                                        <input type="radio" name="optradio">Select an income range
                                                                                                </label>
                                                                                        </div>
                                                                                </div>






                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>









                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel3">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i> Lifestyle & Appearance
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel3" class="panel-collapse collapse in">
                                                                        <div class="panel-body">
                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Diet</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <ul class="list-unstyled">
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Doesn't Matter</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Veg</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Non-Veg</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Jain</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Vegan</li>
                                                                                                        </ul>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Smoke</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <label class="radio-inline seven">
                                                                                                        <input class="matter" type="radio" name="optradio">Doesn't Matter
                                                                                                </label>
                                                                                                <label class="radio-inline seven">
                                                                                                        <input class="matter" type="radio" name="optradio">Don't include profiles who smoke
                                                                                                </label>
                                                                                        </div>
                                                                                </div>


                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Drink</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <label class="radio-inline seven">
                                                                                                        <input class="matter" type="radio" name="optradio">Doesn't Matter
                                                                                                </label>
                                                                                                <label class="radio-inline seven">
                                                                                                        <input class="matter" type="radio" name="optradio">Never Drinks
                                                                                                </label>
                                                                                                <label class="radio-inline seven">
                                                                                                        <input class="matter" type="radio" name="optradio">Drinks Occasionally
                                                                                                </label>
                                                                                        </div>
                                                                                </div>

                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Body Type</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <ul class="list-unstyled">
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Doesn't Matter</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Slim</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Average/Athletic</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Heavy</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Vegan</li>
                                                                                                </ul>
                                                                                        </div>
                                                                                </div>

                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Skin Tone</label>
                                                                                        </div>
                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <ul class="list-unstyled">
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Doesn't Matter</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Fair</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Wheatish</li>
                                                                                                        <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Dark</li>
                                                                                                </ul>
                                                                                        </div>
                                                                                </div>





                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>






                                                <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel4">
                                                                                <h4 class="panel-title">
                                                                                        <i class="glyphicon glyphicon-minus"></i> Select Any Options
                                                                                </h4>
                                                                        </a>

                                                                </div>
                                                                <div id="panel4" class="panel-collapse collapse in">
                                                                        <div class="panel-body">


                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Photo Settings</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <ul class="list-unstyled">
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Visible to all</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Procted Photo<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></li>

                                                                                                        </ul>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>



                                                                                <div class="commons">
                                                                                        <div class="col-sm-4 col-xs-3 zeros">
                                                                                                <label for="textinput" class="control-label">Photo Settings</label>
                                                                                        </div>

                                                                                        <div class="col-sm-8 col-xs-9 zeros">
                                                                                                <div class="form-group">

                                                                                                        <ul class="list-unstyled">
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Doesn't Matter</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Self</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Parent/Guardian</li>
                                                                                                                <li><input type="checkbox" class="chkk" name="vehicle" value="Bike">Sibling/Friend/Others</li>
                                                                                                        </ul>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>


                                                                                <div class="common tops">

                                                                                        <div class="col-sm-6 col-xs-6 zeros"></div>

                                                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                                                <button type="submit" class="btn sub-btn btn-default">Search</button>
                                                                                        </div>
                                                                                        <div class="col-sm-3 col-xs-3 zeros">

                                                                                                <button type="submit" class="btn sub-btns btn-default">Reset</button>
                                                                                        </div>
                                                                                </div>


                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>








                                        </div>

                                </form>
                        </div>
                        <div class="clearfix visible-xs"></div>
                        <div class="col-md-4 col-sm-12">
                                <h2>My Saved Searches</h2>
                                <div class="right-box">
                                        <p>You can access up to 5 Saved Searches as logged-in user<img class="question" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></p>
                                        <a href="#" class="frees">Sign Up Free</a>
                                        <p>Already a member?<a href="#" class="logins">Login Now</a></p>
                                </div>
                                <h2>Profile ID Search</h2>
                                <div class="right-box">
                                        <form class="form-inline" role="form">
                                                <div class="form-group">
                                                        <input type="email" class="form-control" id="email" placeholder="Enter Profile ID">
                                                </div>
                                                <button type="submit" class="btn btn-default go">GO</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</section>



<script>
        $(document).ready(function () {
                var selectIds = $('#panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>