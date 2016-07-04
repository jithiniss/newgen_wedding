<section class="banner">
        <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/static_pages/' . $banner->id . '/banner.' . $banner->banner; ?>">
</section>


<section class="about-us">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h1><span class="us">Faq</span></h1>



                                <div class="panel-group" id="accordion">
                                        <?php
                                        $i = 1;
                                        foreach ($about as $abouts) {
                                                ?>
                                                <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel<?php echo $i; ?>"> <h4 class="panel-title">
                                                                                <i class="glyphicon glyphicon-minus mis"></i> <?php echo $abouts->question; ?>
                                                                        </h4></a>

                                                        </div>
                                                        <div id="panel<?php echo $i; ?>" class="panel-collapse collapse in">
                                                                <div class="panel-body"> <?php echo $abouts->answer; ?></div>
                                                        </div>
                                                </div>
                                                <?php
                                                $i = $i + 1;
                                        }
                                        ?>


                                </div>








                        </div>
                </div>
        </div>
</section>

<script>
        var selectIds = $('#panel1,#panel2,#panel3');
        $(function($) {
                selectIds.on('show.bs.collapse hidden.bs.collapse', function() {
                        $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                })
        });
</script>