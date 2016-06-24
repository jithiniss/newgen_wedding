<?php
include('./includes/header-inner.php')
?>
<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="login">
    <div class="container wishes">
        <div class="row">
            <div class="col-md-12 ">

                <ul id="myTabf" class="nav nav-tabs ppl nav-justified ">
                    <li class="sim active"><a href="register-1.php">Primary Info</a></li>
                    <li class="sim"><a href="register-2.php">Location & Background</a> </li>
                    <li class="sim"><a href="register-3.php">Lifestyle & Appearance </a> </li>
                    <li class="sim"><a href="register-4.php">Education & Career</a> </li>
                </ul>


                <form action="action_page.php">

                    <div class="col-md-8 col-sm-12 col-xs-12 prime">


                        <h1>Register</h1>

                        <div class="zeros">

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Email</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <input type="text" class="ui_apps" id="email">
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Password</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <input type="text" class="ui_apps" id="email">
                                    </div>
                                </div>

                            </div>

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Profile for</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">--Select State--</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Name</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-4 col-xs-4 zeros">
                                    <div class="form-group">

                                        <input type="text" class="ui_apps" id="email">
                                    </div>
                                </div>

                                <div class="col-sm-4 col-xs-4 zeros">
                                    <div class="form-group">

                                        <input type="text" class="ui_apps" id="email">
                                    </div>
                                </div>
                            </div>

                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Gender</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <label class="radio-inline sec">
                                        <input type="radio" name="optradio">Male
                                    </label>
                                    <label class="radio-inline sec">
                                        <input type="radio" name="optradio">Female
                                    </label>
                                </div>
                            </div>


                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Date of Birth</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-2 col-xs-2 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">Day</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-sm-3 col-xs-3 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">Month</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-xs-3 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">Year</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Religion</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">--Select State--</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>

                            </div>



                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Mother Tonuge</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">--Select State--</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="common">
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Living In</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <select class="aps" name="carlist" form="carform">
                                            <option value="volvo">--Select State--</option>
                                            <option value="saab">1</option>
                                            <option value="opel">2</option>
                                            <option value="audi">3</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="common tops">
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <input type="checkbox" name="vehicle" value="Car"> &nbsp; &nbsp; I agree to the <a class="privacy" href="#">Privacy Policy</a> and <a class="privacy" href="#">T&C</a>
                                </div>
                                <div class="col-sm-4 col-xs-4 zeros">

                                    <button type="submit" class="btn sub-btn btn-default">Submit</button>
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="infos">
                            <div class="item">
                                <div class="main">
                                    <img class="sliders" src="images/t1.jpg">
                                </div>
                            </div>
                            <div class="item">
                                <div class="main">
                                    <img class="sliders" src="images/t2.jpg">
                                </div>
                            </div>
                            <div class="item">
                                <div class="main">
                                    <img class="sliders" src="images/t3.jpg">
                                </div>
                            </div>
                            <div class="item">
                                <div class="main">
                                    <img class="sliders" src="images/t2.jpg">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>

<?php
include('./includes/footer.php')
?>






<script>

    $(document).ready(function () {

        $('.infos').slick({
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToScroll: 1,
            pauseOnHover: false,
            fade: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 1000,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1
                    }
                }
            ]
        });

    });

</script>


