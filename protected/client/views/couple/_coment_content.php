<?php foreach ($comments as $comment) { ?>
        <div class="post_user">
                <div class="post_user_image">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo.jpg" />
                </div>
                <div class="post_user_content">
                        <h5 style="font-weight: bold">  <?php echo CoupleDetails::model()->findByPk($comment->couple_id)->couple_name; ?> On (<?php echo $comment->doc; ?>)</h5>
                        <p><?php echo $comment->comments; ?></p>
                </div>
                <div class="clearfix"></div>
        </div>
<?php } ?>