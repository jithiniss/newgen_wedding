<style>
        #upload{
                display:none
        }
        input#file-6 {
                visibility: hidden;
        }
</style>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <h3>Chat Home</h3>
                </div>
                <!--                <div class="col-md-5">

                <?php //$this->renderPartial('//myaccount/_leftSide'); ?>
                                </div>-->
                <div class="col-md-7">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        Chat
                                        <div class="btn-group pull-right">
                                                <span><?php $partnernew = UserDetails::model()->findByAttributes(array('id' => $partner)); ?>
                                                        <?php echo $partnernew->first_name . ' ' . $partnernew->last_name; ?></span>

                                        </div>
                                </div>
                                <div class="panel-body" id="panel_bd">
                                        <ul class="chatdet">
                                                <?php
                                                $numbers = array();
                                                foreach ($chats as $chat) {
                                                        $numbers[] = $chat->id;

                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $chat->id);
                                                        $user_details = UserDetails::model()->findByPk($chat->sender);
//                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $chat->id);
                                                        if ($chat->sender == Yii::app()->session['user']['id']) {
                                                                ?>

                                                                <?php
                                                                ?>
                                                                <li class="right clearfix"><span class="chat-img pull-right">
                                                                        <?php } else { ?>
                                                                                <li class="left clearfix"><span class="chat-img pull-left">
                                                                                        <?php }
                                                                                        ?>

                                                                                        <img alt="New Gen" class="img-circle"  src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--<img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" alt="User Avatar" class="img-circle" />-->
                                                                                </span>
                                                                                <div class="chat-body clearfix">
                                                                                        <div class="header">
                                                                                                <strong class="primary-font"><?php echo $user_details->first_name . ' ' . $user_details->last_name; ?> </strong> <small class="pull-right text-muted">
                                                                                                        <span class="glyphicon glyphicon-time"></span><input class="datetime_<?php echo $chat->id; ?>" type="hidden" value="<?php echo $chat->date; ?>" /><span id="timeago"><?php echo $this->time_elapsed_string($chat->date); ?></span></small>
                                                                                        </div>
                                                                                        <p>
                                                                                                <?php if ($chat->feild1 == '') { ?>

                                                                                                        <?php echo $chat->message; ?>
                                                                                                <?php } else {
                                                                                                        ?>

                                                                                                        <img src = "<?php echo Yii::app()->baseUrl; ?>/uploads/chat/<?php echo $folder; ?>/<?php echo $chat->id; ?>/chatimage/<?php echo $chat->feild1; ?> " width = '100px;'/>

                                                                                                        <!--                                                                                                <div style="
                                                                                                                                                                                                             position: absolute;
                                                                                                                                                                                                             height: 212px;
                                                                                                                                                                                                             top: 0px;
                                                                                                                                                                                                             left: 0px;
                                                                                                                                                                                                             padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                                                                                                                                                                                        </div>-->

                                                                                                <div class="ajax_pics"></div>

                                                                                        <?php } ?>
                                                                                        </p>
                                                                                </div>
                                                                        </li>
                                                                <?php } ?>
                                                                <div id ="ajax_chat">    </div>
                                                                <div id="scores">



                                                                </div>
                                                                <!--                                                                <div style="
                                                                                                                                     position: absolute;    height: 212px;
                                                                                                                                     top: 0px;
                                                                                                                                     left: 0px;
                                                                                                                                     padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                                                                                                                </div>-->
                                        </ul>

                                        <input type="hidden" id="last_id" value="<?php
                                        if (count($numbers) == 0) {
                                                echo 0;
                                        } else {
                                                echo max($numbers);
                                        }
                                        ?>"/>

                                </div>

                                <div class="panel-footer">
                                        <div class="input-group chat-footer">

                                                <div class="upload-photo">
                                                        <input id="upload" type="file"/>
                                                        <input id="sender" type="hidden" value="<?php echo Yii::app()->session['user']['id']; ?>"/>
                                                        <input id="reciever" type="hidden" value="<?php echo $partner; ?>"/>
                                                        <label for="file-6" id="ajax_pics" style="position: relative;cursor: pointer;">   <i class="fa fa-camera"></i></label>

                                                </div>
                                                <!--<textarea required="" id="btn-input" type="text" class="form-control input-sm chat-area" name="chat-message" placeholder="Type your message here..." ></textarea>-->
                                                <form method="post" enctype="multipart/form-data"  id="chat-form">
                                                        <input  name="ChatBox[reciever]" type="hidden" class="recieveclass" value="<?php echo $partner; ?>"/>
                                                        <input type="file" name="ChatBox[feild1]" id="file-6" class="inputfile inputfile-5 chat_pics"/>


                                                </form>
                                                <input id="btn-input" required="" type="text" autocomplete="off" class="form-control input-sm chat-area" name="chat-message" placeholder="Type your message here..." />
                                                <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-warning btn-sm bchat" id="btn-chat">
                                                                <i class="fa fa-paper-plane"></i></button>
                                                </span>
                                        </div>
                                </div>


                        </div>
                </div>
                <script>
                        $(function () {
                                $('#panel_bd').scrollTop($('#panel_bd')[0].scrollHeight);


                        });</script>
                <script type="text/javascript">
                        $(document).ready(function () {

                                $('#btn-input').keypress(function (e) {
                                        var key = e.which;
                                        if (key == 13)
                                        {
                                                sibychat();
                                        }
                                });
                                var statusIntervalId = window.setInterval(update, 1000);
                                //$("#scores").load("ashik");
//                                var $scores = $("#scores");
//                                setInterval(function () {
//                                        $scores.load("index.php #scores");
//                                }, 30000);

                                $(".bchat").click(function () {
                                        sibychat();
                                });
                        });
                        function update() {
                                $id = $('#last_id').val();
                                $partner_id = $('#reciever').val();
                                $.ajax({
                                        url: '<?php echo Yii::app()->createUrl("Chat/NewMessage"); ?>',
                                        data: {id: $id, partner_id: $partner_id},
                                        success: function (data) {
                                                if (data == 'failed') {
                                                } else {
                                                        $(".chatdet").append(data);
                                                        $('#last_id').val(parseFloat($('#last_id').val()) + 1);
                                                        $('#panel_bd').scrollTop($('#panel_bd')[0].scrollHeight);
                                                }
                                        }
                                });
                        }

//                        function sibychat() {
//                                //                        var sender = <?php Yii::app()->session['user']['id']; ?>;
//                                var message = $(".chat-area").val();
//                                var sender = $("#sender").val();
//                                var reciever = $("#reciever").val();
//                                if (message == "") {
//                                        return false;
//                                }
////                                alert(sender);
//                                $.ajax({
//                                        url: '<?php echo Yii::app()->createUrl("Chat/Chatoperation"); ?>',
//                                        type: 'POST',
//                                        data: {sender: sender, reciever: reciever, message: message},
//                                        datatype: 'json',
//                                        // async: false,
//                                        beforeSend: function () {
//                                                // $('#loading_prof').show();
//                                        },
//                                        success: function (data) {
//                                                $(".chatdet").append(data);
//                                                $(".chat-area").val('');
//                                                $("#panel_bd").scrollTop($("#panel_bd")[0].scrollHeight);
//                                                $('#last_id').val(parseFloat($('#last_id').val()) + 1);
//                                                $('#panel_bd').scrollTop($('#panel_bd')[0].scrollHeight);
////                                                        location.reload();
//                                                // on success do some validation or refresh the content div to display the uploaded images
//                                                //     $("#ajax_pics").html(data);
//                                        },
//                                        complete: function () {
//                                                // success alerts
//                                                // $('#loading_prof').hide();
//                                                // alert('Image uploaded successfully')
//                                        },
////                                                error: function (data) {
////                                                        alert("There may a error on uploading. Try again later");
////                                                },
//                                });
//                        }
                </script>
                <script type="text/javascript">
                        $(document).ready(function () {
                                var reciever = $("#reciever").val();
                                $(".chat_pics").change(function () {
                                        var fd = new FormData();
                                        fd.append("ChatBox[feild1]", $(".chat_pics")[0].files[0]);
                                        fd.append("ChatBox[reciever]", $(".recieveclass").val());

                                        $.ajax({
                                                url: '<?php echo Yii::app()->createUrl("Chat/ChatImage"); ?>',
                                                type: 'POST',
                                                data: fd,
                                                datatype: 'json',
                                                // async: false,
                                                beforeSend: function () {
                                                        $('#loading_prof').show();
                                                },
                                                success: function (data) {

                                                        $(".chatdet").append(data);
                                                        $('#panel_bd').scrollTop($('#panel_bd')[0].scrollHeight);
                                                },
                                                complete: function () {
                                                        // success alerts
                                                        $('#loading_prof').hide();
                                                        // alert('Image uploaded successfully')
                                                },
                                                error: function (data) {
                                                        alert("There may a error on uploading. Try again later");
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false
                                        });
                                        return false;
                                });
                        });
                </script>



        </div>
</div>
