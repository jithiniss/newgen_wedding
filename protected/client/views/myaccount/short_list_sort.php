<section class="searches">
        <div class="container">
                <div class="row">

                        <div class="col-md-3 newgens short">
                                <h3>Inbox</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideInbox');
                                        ?>

                                </ul>
                                <h3>Accepted</h3>
                                <h3>Sent</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                                        <li><?php echo CHtml::link('Invitations', array('Myaccount/SentInvitations')); ?></li>
                                </ul>
                                <h3>Quick Links</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideQuickLinks');
                                        ?>
                                </ul>
                                <h3>Explore</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Blocked Members', array('Myaccount/ListBlockedMembers'), array('target' => 'blank')); ?></li>
                                        <li><?php echo CHtml::link('Favorite List', array('Partner/Favoritelist')); ?></li>
                                        <li><?php echo CHtml::link('Membership Details', array('Myaccount/Membershipdetails')); ?></li>
                                </ul>

                        </div>


                        <div class="col-lg-9 col-md-9 col-sm-8 search">
                                <div class="row">
                                        <h4>Shortlist & More </h4>

                                        <div class=row>
                                                <div class="col-xs-3 col-sm-4 col-md-3 col-md-offset-2 ">
                                                        <!--                                                                <a href="#" class="offset">Save this Search</a>-->
                                                </div>
                                                <div class="col-xs-3 col-md-2 col-sm-2">
                                                        <div class="form-group">
                                                                <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Myaccount/shortlist_sort" id="search_form_shortlist" method="post">
                                                                        <select class="ord" name="sort"  onchange="changesearch();">
                                                                                <option value="id DESC">Default Order</option>
                                                                                <option value="first_name ASC">Name(A->Z)</option>
                                                                                <option value="first_name DESC">Name(Z->A)</option>
                                                                                <option value="dob_year ASC">Age(Low->High)</option>
                                                                                <option value="dob_year DESC">Age(High->Low)</option>
                                                                        </select>
                                                                </form>
                                                        </div>
                                                </div>
                                                <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Myaccount/ListOfShortlist"><img class="center-block grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g2.jpg"></a>
                                                </div>
                                                <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Myaccount/ShortList"><img class="center-block ans grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g3.jpg"></a>
                                                </div>
                                                <!--                                                        <div class="col-xs-3 col-md-3 col-sm-4">
                                                                                                                <span>2000 profiles found</span>
                                                                                                        </div>-->
                                        </div>



                                        <?php
//                                        var_dump($dataProvider);
//                                        exit;
                                        if (!empty($dataprovider) || $dataProvider != '') {
                                                $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider' => $dataProvider,
                                                    'itemView' => '_short_list_sort',
                                                    'itemsCssClass' => 'data',
                                                ));
                                        } else {

                                        }
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
        function changesearch() {
                $('#search_form_shortlist').submit();
        }
</script>
