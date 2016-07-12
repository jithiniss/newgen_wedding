<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_mymatches_list',
    'id' => 'search_item',
    'itemsCssClass' => 'table-class',
    'emptyText' => '<div class="col-md-12" style="    padding: 100px;
    text-align: center;
    color: #64536f;
    border: 1px solid #ccc;">
                                   <label> No Matches Found.....</label>
                                </div>',
    'pager' => array(
        'maxButtonCount' => 5,
    ),
));
?>

<script type="text/javascript">
        $(document).ready(function () {
            $("#guest_user_search").modal({backdrop: 'static', keyboard: false});
//                $('#guest_user_search').modal('show');
        });
</script>