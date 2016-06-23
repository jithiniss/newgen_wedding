<?php

class RegisterController extends Controller {

        public function actionFirstStep() {
                if(!isset(Yii::app()->session['user']) && Yii::app()->session['user'] == NULL && Yii::app()->session['user'] == '') {
                        $firstStep = new UserDetails('userFirstStep');
                } else {
                        $firstStep = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        if(!empty($firstStep)) {
                                $firstStep->scenario = 'userFirstStep';
                        } else {
                                $firstStep = new UserDetails('userFirstStep');
                        }
                }
                $this->performAjaxValidation($firstStep, 'register-one-form');
                if(isset($_POST['UserDetails'])) {
                        $firstStep = $this->setFirstStep($firstStep, $_POST['UserDetails']);
                        if($firstStep->validate()) {
                                if($firstStep->save()) {
                                        UserDetails::model()->userId($firstStep->id)->save();
                                        $user = UserDetails::model()->findByPk($firstStep->id);
                                        $user->cb = $firstStep->id;
                                        $user->ub = $firstStep->id;
                                        $user->save(FALSE);
                                        Yii::app()->session['user'] = $user;
                                        $this->redirect(array('SecondStep'));
                                } else {
                                        Yii::app()->user->setFlash('register_error1', "Some Error Occured.Try Again");
                                }
                        }
                }
                $this->render('step_1', array('firstStep' => $firstStep));
        }

        public function setFirstStep($model, $post) {
                $model->attributes = $post;
                $model->dob = $model->dob_year . '-' . $model->dob_month . '-' . $model->dob_day;
                $model->register_step = 1;
                $model->created_by = 2;
                $model->doc = date('Y-m-d');
                $model->status = 1;
                return $model;
        }

        public function actionSecondStep() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {
                        $secondStep = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $secondStep->scenario = 'userSecondStep';
                        $this->performAjaxValidation($secondStep, 'register-two-form');
                        if(isset($_POST['UserDetails'])) {

                                $secondStep = $this->setSecondStep($secondStep, $_POST['UserDetails']);
                                if($secondStep->validate()) {
                                        if($secondStep->save()) {
                                                $this->redirect(array('ThirdStep'));
                                        } else {
                                                Yii::app()->user->setFlash('register_error2', "Some Error Occured.Try Again");
                                        }
                                }
                        }
                        $this->render('step_2', array('secondStep' => $secondStep));
                } else {
                        $this->render('//site/error');
                }
        }

        public function setSecondStep($model, $post) {
                $model->attributes = $post;
                $model->register_step = 2;
                return $model;
        }

        public function actionThirdStep() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {
                        $thirdStep = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $thirdStep->scenario = 'userThirdStep';
                        $this->performAjaxValidation($thirdStep, 'register-three-form');
                        if(isset($_POST['UserDetails'])) {

                                $thirdStep = $this->setThirdStep($thirdStep, $_POST['UserDetails']);
                                if($thirdStep->validate()) {
                                        if($thirdStep->save()) {
                                                $this->redirect(array('FourthStep'));
                                        } else {
                                                Yii::app()->user->setFlash('register_error3', "Some Error Occured.Try Again");
                                        }
                                }
                        }
                        $this->render('step_3', array('thirdStep' => $thirdStep));
                } else {
                        $this->render('//site/error');
                }
        }

        public function setThirdStep($model, $post) {
                $model->attributes = $post;
                $model->register_step = 3;
                return $model;
        }

        public function actionFourthStep() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {
                        $fourthStep = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        if(isset($_POST['UserDetails'])) {
                                $fourthStep = $this->setFourthStep($fourthStep, $_POST['UserDetails']);
                                if($fourthStep->validate()) {
                                        if($fourthStep->save()) {
                                                $this->redirect(array('MyHome'));
                                        } else {
                                                Yii::app()->user->setFlash('register_error4', "Some Error Occured.Try Again");
                                        }
                                }
                        }
                        $this->render('step_4', array('fourthStep' => $fourthStep));
                } else {
                        $this->render('//site/error');
                }
        }

        public function setFourthStep($model, $post) {
                $model->attributes = $post;
                $model->register_step = 4;
                $model->last_login = date('Y-m-d');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param UserDetails $model the model to be validated
         */
        protected function performAjaxValidation($model, $model_id) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
