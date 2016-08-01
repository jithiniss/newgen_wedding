<div class="chat-box-outer">
        <div class="chat hidden-xs col-sm-6 col-md-4 col-lg-2">
                <div class="chat_main">
                        <div class="chat-header">
                                <h3><i class="fa fa-comments-o"></i>  &nbsp;Users On chat &nbsp;&nbsp;&nbsp;<span class="chat-down"><i class="fa fa-arrows-v"></i></span></h3>
                        </div>
                        <div class="chat-box">

                                <?php
                                if (!empty($models)) {
                                        foreach ($models as $model) {
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                                ?>
                                                <div class="chat-individual">
                                                        <div class="uimg">
                                                                <a href="<?= Yii::app()->baseUrl ?>/index.php/chat/chating/partnerid/<?php echo $model->user_id; ?>">
                                                                        <img  src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $model->id . '/profile/' . $model->photo; ?>">
                                                                        <h5><?php echo $model->first_name . ' ' . $model->last_name; ?></h5>
                                                                        <p style="color: red">Active 10  min Ago (Offline)  <?php //echo $this->time_elapsed_string($chat->date);  ?></p>
                                                                </a>
                                                        </div>
                                                </div>
                                                <?php
                                        }
                                } else {
                                        ?>
                                        <div class="chat-individual">
                                                <div class="uimg">
                                                        <p style="color: red">No Chats Available</p>
                                                </div>
                                        </div>
                                <?php } ?>

                                <!--                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min (online)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>

                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                <h5>Ashik</h5>
                                                                                <p>Active from 10 min</p>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a2.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p style="color: red">Active 10  min Ago (Offline)</p>
                                                                                </a>
                                                                        </div>
                                                                </div>
                                                                <div class="chat-individual">
                                                                        <div class="uimg">
                                                                                <a href="">    <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" />
                                                                                        <h5>Ashik </h5>
                                                                                        <p>Active from 10 min</p>
                                                                                </a>
                                                                        </div>
                                                                </div>-->
                        </div>
                </div>


        </div>

</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->

<script>
        $(document).ready(function () {
                $(".chat-header").click(function () {
                        $(".chat-box").slideToggle("slow");
                });
        });
</script>