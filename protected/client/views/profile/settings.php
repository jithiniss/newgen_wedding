<style>
    .slick-dots li{
        background-color: transparent;
    }



</style>
<section class="my">
    <div class="container">
        <div class="row">

            <?php $this->renderPartial('_leftSide'); ?>
            <div class="col-md-9 details">
                <h1>My Photos</h1>

                <ul id="myTabs" class="nav nav-tabs nav-justified adv">

                    <li class="sims"><?php echo CHtml::link('Photo Album', array('Profile/MyPhotos')); ?></li>
                    <li class="sims active"><?php echo CHtml::link('Settings', array('Profile/PhotoSettings')); ?></li>
                </ul>



                <div class="outs-2">

                    <p>Choose Display Option</p>
                    <form  method="post">
                        <div class="common">
                            <?php if($model->photo_visibility == 1) { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" value="1" checked > Visible to all</span>
                                    </div>
                            <?php } else { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" value="1" > Visible to all</span>
                                    </div>
                            <?php } ?>
                            <?php if($model->photo_visibility == 2) { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" value="2" checked > Visible Only on Invitation Sent/Accepted<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></span>
                                    </div>
                            <?php } else { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" value="2" > Visible Only on Invitation Sent/Accepted<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></span>
                                    </div>
                            <?php } ?>
                            <?php if($model->photo_visibility == 3) { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" id="photo_visibility" value="3" checked> Password Protected<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg">
                                        </span>
                                        <div class="photos_set">
                                            <input type='checkbox' name='photo_visibility_check' value='2' id='photo_visibility_check' /><span class="photo_pass">Change Password(<span class="current_pass">Current Password:<?php echo $model->photo_password; ?></span>)</span>
                                        </div>
                                    </div>

                            <?php } else { ?>
                                    <div class="col-sm-12 zeros">

                                        <span class="vis"> <input type="radio" class="radios" name="photo_visibility" value="3" > Password Protected<img class="ques" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></span>
                                    </div>
                            <?php } ?>
                            <div class="col-sm-12 zeros submit_class">
                                <button type="submit" class="btn new-btn btn-default" id="photo_visibility_submit">Save my settings</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
</section>

<script>
        (function (e, t, n) {
            var r = e.querySelectorAll("html")[0];
            r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2");
        })(document, window, 0);
</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-file-input.js"></script>
<script>
        $(document).ready(function () {
            $('input[name=photo_visibility]:checked').each(function () {
                var check = $("#photo_visibility").val();
                if ($("#photo_visibility").val() == '3') {
                    $("#photo_visibility_submit").attr('disabled', true);
                    $('input[name=photo_visibility_check]').click(function () {
                        var r = confirm("Are you sure wish to change your photo password??");
                        if (r == true) {
                            $("#photo_visibility_submit").attr('disabled', false);
                        }
                        else {
                            $("#photo_visibility_submit").attr('disabled', true);
                        }
                    });
                }
            });
            $('input[name=photo_visibility]').click(function () {
                $("#photo_visibility_submit").attr('disabled', false);
            });
        });
</script>