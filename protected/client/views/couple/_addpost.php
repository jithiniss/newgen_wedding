<div class="couple_post">
        <form action="<?= Yii::app()->baseUrl ?>/index.php/couple/AddNewPost" method="post" enctype="multipart/form-data">
                <div class="form-group  couple_class" >
                        <div class="col-sm-8 col-xs-8 ">
                                <textarea placeholder="Type here text,Embeded video etc..." name="title" class="ui_apps" rows="20"placeholder=" your title"></textarea>
                        </div>
                </div>

                <div class="form-group couple_class"  id="file_uploads">
                        <div class="col-sm-8 col-xs-8 ">
                                <input type="file" name="file" />
                        </div>
                </div>


                <div class="form-group couple_class"  >
                        <button type="submit" name="CoupleUploads" class="couple_post_class">POST</button>
                </div>
        </form>
</div>