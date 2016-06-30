<section class="ui-teams">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php $this->renderPartial('_sent_leftSide'); ?>
            </div>

            <div class="col-md-9">
                <div class="send">
                    <h4>Sent Invitations</h4>
                    <?php
                    if (!empty($dataprovider) || $dataProvider != '') {
                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_sentpending',
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
