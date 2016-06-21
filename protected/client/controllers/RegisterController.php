<?php

class RegisterController extends Controller {

        public $layout = '//layouts/inner_main';

        public function actionIndex() {
                $firstStep = new UserDetails('userFirstStep');
                if(isset($_POST['UserDetails'])) {
                        $firstStep = $this->setFirstStep($firstStep, $_POST['UserDetails']);
                        if($firstStep->validate()) {
                                if($firstStep->save()) {
                                        $user = UserDetails::model()->userId($firstStep->id)->save();
                                        Yii::app()->session['user'] = $user;
                                        $this->redirect(array('SecondStep'));
                                }
                        } else {

                        }
                }
                $this->render('step_1', array('firstStep' => $firstStep));
        }

        public function setFirstStep($model, $post) {
                $model->attributes = $post;
                $model->dob = $model->dob_year . '-' . $model->dob_month . '-' . $model->dob_day;
                $model->register_step = 1;
                $model->user_id = rand(100, 100000);
                $model->cb = $model->user_id;
                $model->ub = $model->user_id;
                $model->doc = date('Y-m-d');
                return $model;
        }

        public function actionSecondStep() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {
                        $this->render('step_2');
                } else {
                        $this->render('//site/error');
                }
        }

        public function actionThirdStep() {
                $this->render('step_3');
        }

        public function actionFourthStep() {
                $this->render('step_4');
        }

}
