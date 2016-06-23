<?php

class ProfileController extends Controller {

        public function init() {


                if(!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionMyProfile() {
                $myProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if(!empty($myProfile)) {
                        $this->render('my_profile', array('myProfile' => $myProfile));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

}
