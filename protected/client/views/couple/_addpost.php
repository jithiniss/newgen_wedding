<div class="couple_post">
        <form action="<?= Yii::app()->baseUrl ?>/index.php/couple/AddNewPost" id="coupleupload"  method="post" enctype="multipart/form-data">
                <div class="form-group  couple_class" >
                        <div class="">
                                <textarea placeholder="Type here text,Embeded video etc..." name="title" class="ui_apps" rows="20"placeholder=" your title"></textarea>
                        </div>
                </div>

                <div class="form-group couple_class"  id="file_uploads">
                        <div class=" ">
                                <input type="file" name="file" />
                                <input type="hidden" class="share_friend" name="to_friend" value="0" />
                        </div>
                </div>


                <div class="couple_class_share">
                        <button type="button" name="CoupleUploads" data-toggle="modal" data-target="#myModal_misuse" class="share_friends">Share to friend</button>
                        <button type="submit" name="CoupleUploads" class="share_friends">Post to Public </button>

                        <ul class="list-inline">

                                <!--                                <li><button type="submit" name="CoupleUploads" class="couple_post_class">POST</button></li>
                                                                <li><button type="submit" name="share_friends" data-toggle="modal" data-target="#myModal_misuse" class="share_friends">POST A FRIEND</button></li>-->
                        </ul>

                </div>
        </form>





        <div id="myModal_misuse" class="modal fade" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content dialogs report">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <!--<form action="<?= Yii::app()->baseUrl; ?>/index.php/couple/AddNewPostShere" method="post" id="misuse_report">-->
                                        <span class="newpops_blocked">Tag your post to a friend</span>
                                        <select class="aps" name="misuse_reason">
                                                <option value="0">Select Friend</option>
                                                <?php
                                                $user = CoupleDetails::model()->findAll();
                                                foreach ($user as $users) {
                                                        ?>
                                                        <option value="<?php echo $users->id; ?>"><?php echo $users->couple_name; ?></option>
                                                <?php } ?>
                                        </select>
                                        <div class="row">
                                                <div class="col-md-6 share">
                                                        <a href="#" style="text-decoration: none;" class="connect-3" onclick="share();"  data-dismiss="modal" id="cancel_block">CONFIRM</a>
                                                </div>
                                                <!--<div class="col-md-6"><a href="#" class="connect-4" data-dismiss="modal" id="cancel_block">Cancel</a></div>-->
                                        </div>
                                        <!--</form>-->
                                </div>

                        </div>

                </div>
        </div>
</div>


<script>
        $(document).ready(function () {
                $(".connect-3").on('click', function () {
                        $("form#misuse_report").submit();
//                        alert("Submit Successfully");
                });
        });
        function share() {
                var id = $(".aps").val();
                $(".share_friend").val(id);
                $("#coupleupload").submit();
        }

</script>