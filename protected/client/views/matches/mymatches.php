<section class="searches">
        <div class="container">
                <div class="row">

                        <?php echo $this->renderPartial('//myaccount/_leftmenu'); ?>


                        <div class="col-lg-9 col-md-9 col-sm-8 search">
                                <div class="row">
                                        <h4>Your Matches</h4>
                                        <form action="action_page.php">
                                                <div class=row>
                                                        <div class="col-xs-3 col-sm-4 col-md-3 col-md-offset-2 ">
                                                                <!--                                                                <a href="#" class="offset">Save this Search</a>-->
                                                        </div>
                                                        <div class="col-xs-3 col-md-2 col-sm-2">
                                                                <div class="form-group">

                                                                        <select class="ord" name="carlist" form="carform">
                                                                                <option value="volvo">Default Order</option>
                                                                                <option value="1">Sorting By Age</option>
                                                                                <option value="2">Recently Posted</option>
                                                                                <option value="3">Name (A-Z)</option>
                                                                                <option value="4">Name (Z-A)</option>
                                                                        </select>
                                                                </div>
                                                        </div>
                                                        <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                                <a href="#"><img class="center-block grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g2.jpg"></a>
                                                        </div>
                                                        <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                                <a href="#"><img class="center-block ans grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g3.jpg"></a>
                                                        </div>
                                                        <!--                                                        <div class="col-xs-3 col-md-3 col-sm-4">
                                                                                                                        <span>2000 profiles found</span>
                                                                                                                </div>-->
                                                </div>

                                        </form>

                                        <?php
                                        $this->widget("application.client.widgets.Matches", array('id' => Yii::app()->session['user']['id']));
                                        ?>





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
