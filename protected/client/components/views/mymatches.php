<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_mymatches',
    'itemsCssClass' => 'table-class',
    'emptyText' => '<div class="col-md-12" style="background: #d2d2d2;padding:100px;text-align:center;color:#583402;">
                                   <label> No Matches Found.....</label>
                                </div>',
    'pager' => array(
        'maxButtonCount' => 5,
    ),
));
?>