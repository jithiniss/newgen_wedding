<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="storyz">
    <div class="container wishes">
        <div class="row">
            <ul id="myTabs" class="nav nav-tabs nav-justified adv">
                <li class="sky active"><a href="#"> Featured success stories</a></li>
                <li class="sky"><a href="<?php echo yii::app()->baseUrl . '/index.php/tellusStory' ?>">Tell us your story</a> </li>

            </ul>
            <div class="col-md-12 col-sm-12 col-xs-12 thank mains2">

                <h1>Welcome to Newgen Pride </h1>
                <h2>This is where we celebrate newgen.com Success Stories.</h2>

            </div>
        </div>
    </div>
</section>
<section class="case-wrp">
    <div class="container">
        <div class="row">
            <?php
            if ($story) {
                    $i = 1;
                    foreach ($story as $stories) {
                            ?>
                            <div class="col-xs-12 col-md-6 case-study-margin">
                                <a href="javascript:void(0);" id="case-study-<?php echo $i; ?>">
                                    <div class="case-box-main img-wraper-main">
                                        <div class="model-ui">

                                            <div class="model-1">
                                                <h5><?php echo ucfirst($stories->name) . ' & ' . ucfirst($stories->partner_name) ?></h5>
                                            </div>

                                            <div class="model-2">
                                                <h4><img class="jyoti" src="<?php echo yii::app()->baseUrl ?>/images/calender.png"><?php echo date('jS F, Y', strtotime($stories->doc)) ?> </h4>
                                            </div>

                                        </div>

                                        <div class="case-box-img img-inner">
                                            <img class="img-responsive boxz" src="<?php echo yii::app()->baseUrl . '/uploads/wedding/' . $stories->id . '/wedding.' . $stories->image ?>">
                                        </div>

                                        <h6>Ayurveda Name: Gradhrasi</h6>
                                        <p><?php echo $stories->feedback; ?></p>
                                        <span class="tree">Read more</span>
                                        <div class="clearfix"></div>
                                        <h3><img class="jyoti" src="<?php echo yii::app()->baseUrl ?>/images/calender.png">Wedding Date: <?php echo date('jS F, Y', strtotime($stories->wedding_date)) ?> </h3>
                                    </div>
                                </a>
                            </div>
                            <?php
                            $i++;
                    }
            }
            ?>


        </div>









    </div>
</section>

<script>
        $(document).ready(function () {

            /*----------------------- Case Study Enlarging Starts ------------------------*/

            $("body").on('click', 'section.case-wrp .case-study-margin a', function (e) {
                e.preventDefault();
                var ids = $(this).attr('id');
                $('.case-wrp').find('a:not(#' + ids + ')').find('.case-box-main.case-detail-large').removeClass('case-detail-large');
                $(this).find('.case-box-main').toggleClass('case-detail-large');
                $(this).parent().toggleClass('assdds');
            });
        });

        /*----------------------- Case Study Enlarging Ends ------------------------*/
</script>