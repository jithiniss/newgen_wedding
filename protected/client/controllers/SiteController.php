<?php

class SiteController extends Controller {

        /**
         * Declares class-based actions.
         */
        public function actions() {
                return array(
                    // captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha' => array(
                        'class' => 'CCaptchaAction',
                        'backColor' => 0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
                    // They can be accessed via: index.php?r=site/page&view=FileName
                    'page' => array(
                        'class' => 'CViewAction',
                    ),
                );
        }

        /**
         * This is the default 'index' action that is invoked
         * when an action is not explicitly requested by users.
         */
        public function actionIndex() {
                $this->layout = '//layouts/main_home';
                $this->render('index');
        }

        public function actionLogin() {



                if (isset(Yii::app()->session['user'])) {

                        $this->redirect($this->createUrl('index'));
                } else {
                        $login = new UserDetails();

                        if (isset($_REQUEST['UserDetails'])) {



                                $user_login = UserDetails::model()->find(['condition' => '(email = "' . $_REQUEST['UserDetails']['email'] . '" or user_id = "' . $_REQUEST['UserDetails']['email'] . '") and  password = "' . $_REQUEST['UserDetails']['password'] . '" ']);

                                if (!empty($user_login)) {
                                        if ($user_login->status == 0) {
                                                Yii::app()->user->setFlash('login_error', "<h3>Access Denied</h3>.Please contact customer care");
                                        } else {
                                                Yii::app()->session['user'] = $user_login;
                                                if ($user_login->register_step == 1) {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Register/SecondStep');
                                                } else if ($user_login->register_step == 2) {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Register/ThirdStep');
                                                } else if ($user_login->register_step == 3) {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Register/FourthStep');
                                                } else if ($user_login->register_step == 4) {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Myaccount/');
//                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/index');
                                                } else {
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Myaccount/');
//                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/index');
                                                }
                                        }
                                } else {
                                        $login->addError('email', '');
                                        $login->addError('password', '');
                                        Yii::app()->user->setFlash('login_error', "NEWGEN Userid or password invalid.Try again");
                                }
                        }



                        $this->render('login', array('login' => $login));
                }
        }

        public function actionLogout() {
                unset(Yii::app()->session['user']);

                Yii::app()->user->logout();
                $this->redirect(array('site/index'));
        }

        public function actionError() {
                $error = Yii::app()->errorHandler->error;
                if ($error)
                        $this->render('error', array('error' => $error));
                else
                        throw new CHttpException(404, 'Page not found.');
        }

        /**
         * Performs the AJAX validation.
         * @param UserDetails $model the model to be validated
         */
        protected function performAjaxValidation($model, $model_id) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
