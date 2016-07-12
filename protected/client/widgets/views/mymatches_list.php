<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_mymatches_list',
    'id' => 'search_item',
    'itemsCssClass' => 'table-class',
    'emptyText' => '<div class="col-md-12" style="background: #d2d2d2;padding:100px;text-align:center;color:#583402;">
                                   <label> No Matches Found.....</label>
                                </div>',
    'pager' => array(
        'maxButtonCount' => 5,
    ),
));
?>
<?php // echo $dataProvider->getTotalItemCount();  ?>
<?php if ($dataProvider->getTotalItemCount() == 0) { ?>
        <div class="col-md-12" style="background: #d2d2d2;padding:100px;text-align:center;color:#583402;">
                <label> No Matches Found.....</label>
        </div>
<?php } ?>

<script type="text/javascript">
        $(document).ready(function () {
                $("#guest_user_search").modal({backdrop: 'static', keyboard: false});
//                $('#guest_user_search').modal('show');
        });
</script>