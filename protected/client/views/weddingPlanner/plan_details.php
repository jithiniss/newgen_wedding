<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="detail-list">
    <div class="container">
        <div class="row" data-sticky_parent>
            <h1>featured <span class="us">listings</span></h1>
            <div class="col-md-9 col-sm-12 sticky-div" data-sticky_column>
                <h2>AdM  jewellery shop</h2>
                <div class="feat">
                    <div class="scales">
                        <img class="img-responsive maps" src="images/jew.jpg">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>


                    <div class="list-f1">
                        <h3>CONTACT INFO</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur </p>
                        <p>adipisicing elit, sed do </p>
                        <p>eiusmod tempor incidid</p>
                        <p>12323545840</p>
                        <p>info@newgen.com</p>
                    </div>

                    <div class="list-f2">
                        <h3>Our Location</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125758.14833706782!2d76.25039372455792!3d9.938772762602305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d514abec6bf%3A0xbd582caa5844192!2sKochi%2C+Kerala!5e0!3m2!1sen!2sin!4v1469524665249" width="100%" height="190" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="clearfix"></div>

                    <a href="#" class="connect-85">Book Now</a>
                </div>

                <div class="clearfix"></div>
                <div class="row addi">
                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r1.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>


                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r2.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>
                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r3.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>


                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r4.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>


                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r4.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>



                    <div class="teamx">
                        <div class="wed-plan">
                            <a href="#"><img class="img-responsive center-block" src="images/r4.jpg"></a>
                            <div class="plan-hover">
                                <h4>lorem ipsum dummylorem ipsum dummy text</h4>
                                <i class="fa violets fa-angle-right"></i>
                                <a class="readzz" href="#">View more</a>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-3 col-sm-12" id="sidebar" data-sticky_column>

                <img src="<?= Yii::app()->baseUrl ?>/images/ad.jpg">

            </div>

        </div>
    </div>
</section>


<script src="<?= Yii::app()->baseUrl ?>/js/jquery.sticky-kit.min.js"></script>

<script>

        $(document).ready(function () {
            if ($(window).width() > 1200) {

                $("#sidebar").stick_in_parent();
            }
        });

</script>