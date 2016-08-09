<?php if (SavedSearch::model()->findByPk($id)->status != 1) { ?>
        <?php //echo CHtml::link('Save this Search', array('SaveSearch', 'partnerid' => $this->encrypt_decrypt('encrypt', $id)), array('class' => 'offset save_link'));                           ?>
        <a href="#" id="save_link" class="offset ">Save this Search</a>
<?php } else { ?>
        <a href="#" class="offset">You Saved This Search</a>
<?php } ?>
<script>
        $(document).ready(function () {
                $("#save_link").click(function () {
                        $("#saved_search_name").modal({backdrop: 'static', keyboard: false});
                });
        });
</script>
<div id="saved_search_name" class="modal fade" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content dialogs">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                                <div class="common">
                                        <h4>Please Enter a Search Name</h4>
                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/SaveSearch/partnerid/<?php echo $this->encrypt_decrypt('encrypt', $id); ?>" id="search_form1" method="POST">
                                                <div class="form-group">
                                                        <input type="text" required="" class="form-control" name="search_name" placeholder="Enter Search Name">
                                                </div>
                                                <button type="submit"  class="btn btn-info offsets-btn" >Submit</button>
                                        </form>
                                </div>
                        </div>


                </div>

        </div>
</div>