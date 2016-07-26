<style>
        #upload{
                display:none
        }
</style>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <h3>Chat Home</h3>
                </div>
                <div class="col-md-7">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        Chat
                                        <!--                                        <div class="btn-group pull-right">
                                                                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                                                                <span class="glyphicon glyphicon-chevron-down"></span>
                                                                                        </button>
                                                                                        <ul class="dropdown-menu slidedown">
                                                                                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                                                                                                                </span>Refresh</a></li>
                                                                                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                                                                                                                </span>Available</a></li>
                                                                                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                                                                                                                </span>Busy</a></li>
                                                                                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                                                                                                Away</a></li>
                                                                                                <li class="divider"></li>
                                                                                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                                                                                                Sign Out</a></li>
                                                                                        </ul>
                                                                                </div>-->
                                </div>
                                <div class="panel-body" id="panel_bd">
                                        <ul class="chatdet">
                                                <?php
                                                foreach ($chats as $chat) {
                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $chat->id);
                                                        $user_details = UserDetails::model()->findByPk($chat->sender);
                                                        if ($chat->sender == Yii::app()->session['user']['id']) {
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
                                                                                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                                                                        </div>
                                                                                        <p>
                                                                                                <?php if ($chat->feild1 == '') { ?>

                                                                                                        <?php echo $chat->message; ?>
                                                                                                <?php } else { ?>
                                                                                                        <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" alt="User Avatar" class="img-circle" />

                                                                                                <?php } ?>
                                                                                        </p>
                                                                                </div>
                                                                        </li>
                                                                <?php } ?>
                                                                <div id="scores">


                                                                        <div style="
                                                                             position: absolute;
                                                                             height: 212px;
                                                                             top: 0px;
                                                                             left: 0px;
                                                                             padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                                                        </div>

                                                                </div>

                                                                <!--                                                                <div style="
                                                                                                                                     position: absolute;    height: 212px;
                                                                                                                                     top: 0px;
                                                                                                                                     left: 0px;
                                                                                                                                     padding: 81px;display: none;background-color:#d2d2d2;background-image: url(<?= Yii::app()->baseUrl; ?>/images/profile_loader.gif); background-repeat: no-repeat;background-position: center; " id="loading_prof">


                                                                                                                                </div>-->

                                        </ul>
                                </div>
                                <div class="panel-footer">
                                        <div class="input-group chat-footer">

                                                <div class="upload-photo">
                                                        <input id="upload" type="file"/>
                                                        <input id="sender" type="hidden" value="<?php echo Yii::app()->session['user']['id']; ?>"/>
                                                        <input id="reciever" type="hidden" value="<?php echo $partner; ?>"/>
                                                        <a href="" id="upload_link"> <i class="fa fa-camera"></i></a>​

                                                </div>
                                                <textarea required="" id="btn-input" type="text" class="form-control input-sm chat-area" name="chat-message" placeholder="Type your message here..." ></textarea>
                                                <!--<input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />-->
                                                <span class="input-group-btn">
                                                        <button type="" class="btn btn-warning btn-sm bchat" id="btn-chat">
                                                                <i class="fa fa-paper-plane"></i></button>
                                                </span>
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
                <script>
                        $(function () {
                                $("#upload_link").on('click', function (e) {
                                        e.preventDefault();
                                        $("#upload:hidden").trigger('click');
                                });
                        });</script>
                <script type="text/javascript">
                        $(document).ready(function () {
                                $("#scores").load("ashik");
//                                var $scores = $("#scores");
//                                setInterval(function () {
//                                        $scores.load("index.php #scores");
//                                }, 30000);

                                $(".bchat").click(function () {
                                        //                        var sender = <?php Yii::app()->session['user']['id']; ?>;
                                        var message = $(".chat-area").val();
                                        var sender = $("#sender").val();
                                        var reciever = $("#reciever").val();
                                        //                        alert(sender);
                                        $.ajax({
                                                url: '<?php echo Yii::app()->createUrl("Chat/Chatoperation"); ?>',
                                                type: 'POST',
                                                data: {sender: sender, reciever: reciever, message: message},
                                                datatype: 'json',
                                                // async: false,
                                                beforeSend: function () {
                                                        // $('#loading_prof').show();
                                                },
                                                success: function (data) {
                                                        $(".chatdet").append(data);
                                                        $(".chat-area").val('');
                                                        $("#panel_bd").scrollTop($("#panel_bd")[0].scrollHeight);
//                                                        location.reload();
                                                        // on success do some validation or refresh the content div to display the uploaded images
                                                        //     $("#ajax_pics").html(data);
                                                },
                                                complete: function () {
                                                        // success alerts
                                                        // $('#loading_prof').hide();
                                                        // alert('Image uploaded successfully')
                                                },
//                                                error: function (data) {
//                                                        alert("There may a error on uploading. Try again later");
//                                                },
                                        });

                                });
                        });
                </script>




        </div>
</div>
