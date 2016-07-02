<div class="col-md-3 newgens">
    <h3>NEWGEN</h3>
    <ul class="list-unstyled">
        <?php
        $active_menu = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
        if($active_menu == 'settings/index') {
                $active1 = 'active';
        } else if($active_menu == 'profile/MyProfile') {
                $active2 = 'active';
        } else if($active_menu == 'profile/MyPhotos' || $active_menu == 'profile/PhotoSettings') {
                $active3 = 'active';
        }
        ?>
        <li class="<?= $active1; ?>"><?php echo CHtml::link('My Contact Details', array('settings/index')); ?></a></li>
        <li class="<?= $active2; ?>"><?php echo CHtml::link('My Profile', array('profile/MyProfile')); ?></li>
        <li class="<?= $active3; ?>"><?php echo CHtml::link('My Photos', array('Profile/MyPhotos')); ?></li>
        <li><?php echo CHtml::link('My Partner Preferences', array('profile/MyProfile', '#' => 'partner')); ?></li>
    </ul>
</div>