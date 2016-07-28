<section class="searches">
        <div class="container">
                <div class="row">
                        <?php
                        $this->renderPartial('refine_search', array('id' => $id, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
                        ?>


                        <div class="col-lg-9 col-md-9 col-sm-8 search">
                                <div class="row">
                                        <h4>Your Search Results</h4>



                                        <div class="row">
                                                <div class="col-xs-3 col-sm-4 col-md-3 col-md-offset-2 ">
                                                        <?php echo $this->renderPartial('_saved_search_link', array('id' => $id)); ?>

                                                </div>

                                                <div class="col-xs-3 col-md-2 col-sm-2">
                                                        <div class="form-group">

                                                                <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/AdvanceResult/id/<?php echo $this->encrypt_decrypt('encrypt', $id); ?>" id="search_form" method="POST">
                                                                        <?php
                                                                        echo CHtml::dropDownList('sort', '', array(
                                                                            'id DESC' => "Default Order",
                                                                            'first_name ASC' => 'Name(A->Z)',
                                                                            'first_name DESC' => 'Name(Z->A)',
                                                                            'dob_year ASC' => 'Age(Low->High)',
                                                                            'dob_year DESC' => 'Age(High->Low)'
                                                                                ), array('id' => 'sortDrop', 'class' => 'ord',
                                                                            'onchange' => 'changesearch()',
                                                                            'options' => array($sort => array('selected' => 'selected'))
                                                                        ));
                                                                        ?>
                                                                </form>
                                                        </div>
                                                </div>

                                                <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/AdvanceResultList/id/<?php echo $this->encrypt_decrypt('encrypt', $id); ?>"><img class="center-block grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g2.jpg"></a>
                                                </div>
                                                <div class="col-xs-1 col-md-1 col-sm-1 nop">
                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/AdvanceResult/id/<?php echo $this->encrypt_decrypt('encrypt', $id); ?>"><img class="center-block ans grids" src="<?php echo Yii::app()->request->baseUrl; ?>/images/g3.jpg"></a>
                                                </div>
                                                <!--                        <div class="col-xs-3 col-md-3 col-sm-4">
                                                                            <span>2000 profiles found</span>
                                                                        </div>-->
                                        </div>











                                        <?php
                                        $this->widget("application.client.widgets.AdvanceSearch", array('id' => $id, 'sort' => $sort, 'view' => 1, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
                                        ?>



                                </div>
                        </div>



                </div>
        </div>
</section>

<script>
        $(document).ready(function () {
                var selectIds = $('#panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });

        });
        function changesearch() {
                $('#search_form').submit();
        }
        function refinesearch() {
                $('#refine_form').submit();
        }
</script>
