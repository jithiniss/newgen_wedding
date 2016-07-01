
<?php if ($model->banner) { ?>
        <section class="banner">
            <img src="<?php echo yii::app()->baseUrl . '/uploads/static_pages/' . $model->id . '/banner.' . $model->banner ?>">
            <!--<img src="<?php echo yii::app()->baseUrl ?>/images/luv.jpg">-->
        </section>
<?php } ?>

<section class="profile-ui">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ($model->title) { ?><h1><?php echo $model->title ?><span class="us"><?php echo $model->heading; ?></span></h1><?php } ?>
                    <?php if ($model->big_content) { ?>
                            <?php echo $model->big_content; ?>
                    <?php } ?>
            </div>
        </div>
    </div>
</section>