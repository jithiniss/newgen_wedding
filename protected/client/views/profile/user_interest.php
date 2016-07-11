<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.tokenize.js"></script>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/jquery.tokenize.css" />
<style>
    .slick-dots li{
        background-color: transparent;
    }


</style>
<section class="profiles" id="basics">
    <div class="container">
        <div class="row">

            <?php $this->renderPartial('_leftSide'); ?>
            <div class="col-md-9">
                <h4>INTERESTS & MORE</h4>
                <?php if(Yii::app()->user->hasFlash('my_interests')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('my_interests'); ?>
                        </div>
                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'my-interest-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <div class="zeros">
                    <!--****-->

                    <div class="strip">
                        <h2>Basic Info</h2>
                        <div class="strip-padding">

                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Hobbies</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!empty($userInterest->hobbies)) {

                                                $hobbies = explode(',', $userInterest->hobbies);
                                        }

                                        $hobbies_opt = array();
                                        if(!empty($hobbies)) {
                                                foreach($hobbies as $value) {
                                                        $hobbies_opt[$value] = array('selected' => 'selected');
                                                }
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($userInterest, 'hobbies', CHtml::listData(MasterHobbies::model()->findAllByAttributes(array('status' => 1)), 'id', 'hobbies'), array('empty' => 'Select Your Hobbies', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $hobbies_opt)); ?>
                                        <?php echo $form->error($userInterest, 'hobbies'); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Music</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!empty($userInterest->music)) {

                                                $music = explode(',', $userInterest->music);
                                        }

                                        $music_opt = array();
                                        if(!empty($music)) {
                                                foreach($music as $value) {
                                                        $music_opt[$value] = array('selected' => 'selected');
                                                }
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($userInterest, 'music', CHtml::listData(MasterMusic::model()->findAllByAttributes(array('status' => 1)), 'id', 'music'), array('empty' => 'Select Your Favorite music', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $music_opt)); ?>
                                        <?php echo $form->error($userInterest, 'music'); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Movies</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!empty($userInterest->movies)) {

                                                $movies = explode(',', $userInterest->movies);
                                        }

                                        $movies_opt = array();
                                        if(!empty($movies)) {
                                                foreach($movies as $value) {
                                                        $movies_opt[$value] = array('selected' => 'selected');
                                                }
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($userInterest, 'movies', CHtml::listData(MasterMovies::model()->findAllByAttributes(array('status' => 1)), 'id', 'movies'), array('empty' => 'Select Your Favorite Movie', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $movies_opt)); ?>
                                        <?php echo $form->error($userInterest, 'movies'); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="common">
                                <div class="col-sm-4 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Sports</label>
                                </div>

                                <div class="col-sm-8 col-xs-9 zeros">
                                    <div class="form-group">
                                        <?php
                                        if(!empty($userInterest->sports)) {

                                                $sports = explode(',', $userInterest->sports);
                                        }

                                        $sports_opt = array();
                                        if(!empty($sports)) {
                                                foreach($sports as $value) {
                                                        $sports_opt[$value] = array('selected' => 'selected');
                                                }
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($userInterest, 'sports', CHtml::listData(MasterSports::model()->findAllByAttributes(array('status' => 1)), 'id', 'sports'), array('empty' => 'Select Your Favorite Sports', 'class' => 'aps tokenize-sample', 'multiple' => "multiple", 'options' => $sports_opt)); ?>
                                        <?php echo $form->error($userInterest, 'sports'); ?>

                                    </div>
                                </div>

                            </div>
                            <div class="common">

                                <div class="form-group">
                                    <button type="submit" class="btn row-btn btn-default">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>

    </div>
</section>
<script type="text/javascript">
        $('#UserInterests_hobbies').tokenize({displayDropdownOnFocus: true});
        $('#UserInterests_music').tokenize({displayDropdownOnFocus: true});
        $('#UserInterests_movies').tokenize({displayDropdownOnFocus: true});
        $('#UserInterests_sports').tokenize({displayDropdownOnFocus: true});

</script>