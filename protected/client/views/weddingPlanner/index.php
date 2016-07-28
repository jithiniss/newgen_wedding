<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="detail-list">
    <div class="container">
        <div class="row">

            <h1>Wedding <span class="us">Planner</span></h1>
            <?php
            if(!empty($category)) {
                    foreach($category as $category_planner) {
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="wed-plan">
                                    <a href="#"><img class="img-responsive center-block" src="<?= Yii::app()->baseUrl ?>/uploads/services/<?= $category_planner->id ?>/<?= $category_planner->field ?>"></a>
                                    <div class="plan-hover">
                                        <h4><?php echo $category_planner->name; ?></h4>
                                        <i class="fa violets fa-angle-right"></i>
                                        <?php echo CHtml::link('View more', array('weddingPlanner/category', 'id' => $category_planner->id), array('class' => 'readzz')); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                    }
            } else {
                    echo 'there is no services available';
            }
            ?>


        </div>
    </div>
</section>

<section class="case-wrp">
    <div class="container">
        <div class="row">
            <h1>featured <span class="us">listings</span></h1>

            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l1.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>


            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l2.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>


            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l3.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>



            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l4.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>




            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l5.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>


            <div class="col-xs-12 col-md-6 case-study-margin">
                <a href="" id="case-study-1">
                    <div class="case-box-main img-wraper-main">
                        <div class="model-ui">

                            <div class="model-1">
                                <h5>Shubham & Jyoti </h5>
                            </div>
                        </div>

                        <div class="case-box-img img-inner">
                            <img class="img-responsive bor" src="images/l6.jpg">
                        </div>

                        <h6>Ayurveda Name: Gradhrasi</h6>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
                            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <span class="tree">Read more</span>

                    </div>
                </a>
            </div>




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
