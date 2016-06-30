<section class="ui-teams">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php $this->renderPartial('_sent_leftSide'); ?>

            </div>

            <div class="col-md-9">
                <div class="send">
                    <h4>Rejected Members</h4>

                    <?php
                    if (!empty($dataprovider) || $dataProvider != '') {
                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider' => $dataProvider,
                                'itemView' => '_rejected',
                                'itemsCssClass' => 'data',
                            ));
                    } else {

                    }
                    ?>

                </div>
                <div class="clearfix"></div>
                <!--                <div class="sen">
                                    <nav>
                                        <ul class="pagination pagination-sm pull-right">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                            <li class="page-item"><a class="page-link" href="#">8</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>


                                </div>-->
            </div>

        </div>
    </div>
</section>