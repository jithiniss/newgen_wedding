
<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">

<section class="vendors">
    <div class="container">



        <div class="row">

            <?php
            $this->renderPartial('_leftSide', array('model' => $model));
            ?>



            <div class="col-md-9 enquiry_list ">
                <h4>Enquiry List</h4>
                <div class="vendormy">

                    <?php if(!empty($enquiry)) { ?>
                            <div id="posts">
                                <?php
                                foreach($enquiry as $enquirys) {
                                        $user = UserDetails::model()->findByPk($enquirys->user_id);
                                        ?>
                                        <div class="vendor_1 post" style="    padding-bottom: 15px;">

                                            <?php
                                            if($user->photo != '') {
                                                    $folder = Yii::app()->Upload->folderName(0, 1000, $user->id);
                                                    $userPic = explode('.', $user->photo);

                                                    echo '<img class="img-responsive  pull-left"  src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user->id . '/profile/' . $userPic[0] . '_72_79.' . $userPic[1] . '" />';
                                            }
                                            ?>
                                            <h5><?php echo $user->first_name . ' ' . $user->last_name . ' - ' . $user->user_id; ?></h5>
                                            <p><B>Email : </B><?php echo $enquirys->email; ?> , <b>Contact No : </b><?php echo $enquirys->contact_no; ?> , <b>Address : </b><?php echo $enquirys->address; ?></p>
                                            <div class="clearfix"></div>
                                            <p><b>Message : </b><?php echo $enquirys->message; ?></p>
                                            <h6 class="pull-right"><?php echo date('d F Y ', strtotime($enquirys->doc)); ?></h6>
                                        </div>


                                        <?php
                                }
                                ?></div><?php
                            $this->widget('application.client.extensions.yiiinfiniteScroll.YiinfiniteScroller', array(
                                'contentSelector' => '#posts',
                                'itemSelector' => 'div.post',
                                'loadingText' => 'Loading...',
                                'donetext' => 'This is the end... my only friend, the end',
                                'pages' => $pages,
                            ));
                    }
                    ?>

                </div>
            </div>







        </div>

    </div>
</section>
