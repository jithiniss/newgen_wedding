<h2>My Saved Searches</h2>
<div class="right-box">
    <?php if(isset(Yii::app()->session['user'])) { ?>
            <?php $saved_searchs = SavedSearch::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 1), array('limit' => 5, 'order' => 'id DESC')); ?>
            <div class="saved_search_li"   >
                <ul class="list-unstyled">
                    <?php
                    $i = 1;
                    foreach($saved_searchs as $saved_search) {
                            ?>
                            <li> <?php echo CHtml::link($saved_search->search_name, array('Search/AdvanceResult', 'id' => $this->encrypt_decrypt('encrypt', $saved_search->id))); ?></li>
                            <?php
                            $i++;
                    }
                    ?>
                </ul>
            </div>
    <?php } else { ?>
            <p>You can access up to 5 Saved Searches as logged-in user<img class="question" src="<?php echo Yii::app()->request->baseUrl; ?>/images/question.jpg"></p>
            <?php echo CHtml::link('Sign Up Free', array('register/FirstStep'), array('class' => 'frees')); ?>
            <p>Already a member?<?php echo CHtml::link('Login Now', array('site/login'), array('class' => 'logins')); ?></p>
    <?php } ?>
</div>
<h2>Profile ID Search</h2>
<div class="right-box">
    <form class="form-inline"  role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Search/SearchById" id="search_form" method="POST">
        <div class="form-group">
            <input type="text" required="" class="form-control" name="user_id" placeholder="Enter Profile ID">
        </div>
        <button type="submit" class="btn btn-default go">GO</button>
    </form>
</div>