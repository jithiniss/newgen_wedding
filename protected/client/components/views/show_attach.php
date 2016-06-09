<span style="color: #979898;float: left;"> Attachment(s) :</span>
<?php
 foreach ($files as $file){
     ?>

<a target="_blank" href="<?php echo Yii::app()->request->baseUrl.'/'.$this->type.'/'.$this->folder.'/'.$this->id.'/'.$file.''; ?>" style="display: block;float: left;margin-left: 10px;" class="">
                                      <span class="tag label label-info">  <?php echo $file; ?></span></a>
<?php
        echo '';
 }
?>

