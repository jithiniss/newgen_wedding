<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="case-wrp">
    <div class="container">
        <div class="row">
            <?php
            $service = MasterServices::model()->findByPk($_REQUEST['id']);

            $serviceName = explode(' ', $service->name);
            $t = count($serviceName);
            ?>
            <h1>
                <?php
                foreach($serviceName as $serviceNames[$t]) {
                        if($t % 2 == 0) {
                                ?>
                                <span class="us"><?php echo $serviceNames[$t]; ?></span>
                                <?php
                        } else {
                                echo $serviceNames[$t];
                        }
                        $t++;
                }
                ?>
            </h1>

            <div id="posts">
                <?php foreach($posts as $post): ?>
                        <div class="col-xs-12 col-md-6 case-study-margin post">

                            <div class="case-box-main img-wraper-main">
                                <div class="model-ui">

                                    <div class="model-1">
                                        <h5><?php echo $post->name ?></h5>
                                    </div>
                                </div>

                                <div class="case-box-img img-inner">
                                    <?php
                                    if($post->image != '') {
                                            $folder = Yii::app()->Upload->folderName(0, 1000, $post->id);
                                            $servicePic = explode('.', $post->image);
                                            ?>
                                            <img class="img-responsive bor" src="<?php echo Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $post->vendor_id . '/services/' . $post->id . '/' . $servicePic[0] . '_246_172.' . $servicePic[1]; ?>">
                                    <?php } else {
                                            ?>
                                            <img class="img-responsive bor" src="<?php echo Yii::app()->baseUrl . '/uploads/service_246x172.jpg' ?>">

                                            <?php
                                    }
                                    ?>
                                </div>

                                <h6>Ayurveda Name: Gradhrasi</h6>
                                <p><?php echo $post->description ?></p>
                                <?php echo CHtml::link('<span class="tree">Read more</span>', array('weddingPlanner/detail', 'id' => $post->id)); ?>

                            </div>

                        </div>
                <?php endforeach; ?>
            </div>
            <?php
            $this->widget('application.client.extensions.yiiinfiniteScroll.YiinfiniteScroller', array(
                'contentSelector' => '#posts',
                'itemSelector' => 'div.post',
                'loadingText' => 'Loading...',
                'donetext' => 'This is the end... my only friend, the end',
                'pages' => $pages,
            ));
            ?>

        </div>


    </div>
</section>






