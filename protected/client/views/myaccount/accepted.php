<section class="ui-teams">
        <div class="container">
                <div class="row">
                        <div class="col-md-3">
                                <?php $this->renderPartial('_leftSide'); ?>

                        </div>


                        <div class="col-md-9">
                                <div class="send">
                                        <h4>Accepted Members</h4>
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <strong>Sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php
                                        if (!empty($dataprovider) || $dataProvider != '') {
                                                $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider' => $dataProvider,
                                                    'itemView' => '_accepted',
                                                    'itemsCssClass' => 'data',
                                                ));
                                        } else {

                                        }
                                        ?>

                                </div>
                                <div class="clearfix"></div>

                        </div>

                </div>
        </div>
</section>