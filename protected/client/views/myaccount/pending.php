<section class="ui-teams">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php $this->renderPartial('_leftSide'); ?>
            </div>

            <div class="col-md-9">
                <div class="send">
                    <h4>Pending Invitations</h4>
                    <?php
                    if (!empty($dataprovider) || $dataProvider != '') {
                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_pending',
                                'itemsCssClass' => 'data',
                            ));
                    } else {

                    }
                    ?>

                </div>

            </div>

        </div>
    </div>
</section>
