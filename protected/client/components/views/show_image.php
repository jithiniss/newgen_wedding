 <div class="mail-single-attachments">
    <h3>
            <i class="linecons-attach"></i>
            Attachments
    </h3>

    <ul class="list-unstyled list-inline">
        <?php
            foreach ($files as $file){

                ?>
                    <li>
                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/'.$this->type.'/'.$this->folder.'/'.$this->id.'/'.$file.''; ?>"  class="thumb">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/theme/images/attach-1.png" class="img-thumbnail">
                        </a>

                        <a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/'.$this->type.'/'.$this->folder.'/'.$this->id.'/'.$file.''; ?>" style="display: block;
                                                                                                                                                                    margin-top: 12px;
                                                                                                                                                                    color: #717272;
                                                                                                                                                                    font-weight: 700;" class="name">
                                <?php echo $file; ?>

                        </a>

                        <div class="links">

                            <a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/'.$this->type.'/'.$this->folder.'/'.$this->id.'/'.$file.''; ?>" style="color: #717272;font-size: 12px;">Download</a>
                        </div>
                    </li>

                <?php

            }
        ?>

    </ul>
</div>

                                   
