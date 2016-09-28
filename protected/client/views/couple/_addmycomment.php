<div class="cont couple_comment">
        <?php
        $comment_id = CoupleUploadReport::model()->findAllByAttributes(array('couple_upload_id' => $post->id));
        foreach ($comment_id as $comment_ids) {
                $users_id = CoupleDetails::model()->findByPk($comment_ids->comment_id);
                ?>
                <p><?php echo $comment_ids->comment; ?></p>
                <div class = "couple_text">

                        <?php ?>
                        <div class="comment_text"><?php echo 'veena-mahesh' ?></div>
                        <div class="couple_text_date">
                                <?php // echo date(" dS F Y, H:i", strtotime($comments->doc)); ?>
                        </div>
                <?php } ?>
        </div>
</div>
