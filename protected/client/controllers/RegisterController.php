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


                                //  $transaction = Yii::app()->db->beginTransaction();
                                //  try {
                                $firstStep->save();
                                UserDetails::model()->userId($firstStep->id)->save();
                                $this->partnerDetails($firstStep->id)->save(false);
                                $this->userPlan($firstStep->id)->save(false);
                                $user = UserDetails::model()->findByPk($firstStep->id);
                                $user->cb = $firstStep->id;
                                $user->ub = $firstStep->id;
                                $user->save(FALSE);
                                $plan = UserPlans::model()->findByAttributes(array('user_id' => $user->id));
                                Yii::app()->session['user'] = $user;
                                Yii::app()->session['plan'] = $plan;
                                $this->RegisterMail($firstStep, 1);
                                //$transaction->commit();

                                $this->redirect(array('SecondStep'));
//                                } catch(Exception $e) {
//                                        $transaction->rollback();
//                                        Yii::app()->user->setFlash('register_error1', $e->getMessage());
//                                }
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

        public function partnerDetails($id) {
                $user_details = UserDetails::model()->findByPk($id);
                if(!empty($user_details)) {
                        $age = date('Y') - date('Y', strtotime($user_details->dob_year));
                        $model = new PartnerDetails;
                        $model->user_id = $user_details->id;
                        if($user_details->gender == 1) {
                                $model->age_from = 18;
                                $model->age_to = $age;
                        } else if($user_details->gender == 2) {
                                $model->age_from = $age;
                                $model->age_to = $age;
                        }
                        $model->religion = $user_details->religion;
                        $model->status = 1;
                        $model->doc = date('Y-m-d');
                        $model->cb = $id;
                        return $model;
                } else {
                        return FALSE;
                }
        }

        public function userPlan($id) {
                $user_details = UserDetails::model()->findByPk($id);
                $plan_details = Plans::model()->findByPk($user_details->plan_id);
                $model = new UserPlans;
                $model->attributes = $plan_details->attributes;
                $model->view_contact_left = $plan_details->view_contact;
                $model->send_message_left = $plan_details->send_message;
                $model->number_of_days_left = $plan_details->number_of_days;
                $model->user_id = $id;
                return $model;
        }

        /* mail to user and admin */

        public function RegisterMail($model, $s) {
                $user = $model->email;
//                $user = 'sibys09@gmail.com';
                $user_subject = 'Welcome to NEWGEN.com!';
                $user_message = $this->renderPartial('mail/_register_user_mail', array('model' => $model), true);



// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
//$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                // mail($user, $user_subject, $user_message, $headers);
                if($s == 1) {
                        $admin = 'sibys09@gmail.com';
                        $admin_subject = $model->first_name . ' registered with NEWGEN.com';
                        $admin_message = $this->renderPartial('mail/_register_admin_mail', array('model' => $model), true);

                        // mail($admin, $admin_subject, $admin_message, $headers);
                }
        }

        public function actionResendMail() {
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL && Yii::app()->session['user'] != '') {
                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $this->RegisterMail($model, 0);
                        $this->redirect(Yii::app()->request->urlReferrer);
                } else {
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
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
                                                $this->redirect(array('FifthStep'));
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

        public function actionFifthStep() {
                $plans = Plans::model()->findAllByAttributes(array('status' => 1), array('condition' => 'amount!=0', 'order' => 'amount desc'));
                if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {
                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                } else {
                        $this->redirect('//site/index');
                }
                $this->render('step_5', array('model' => $model, 'plans' => $plans));
        }

        public function actionUpgradePlan($plan) {
                $plan_id = $this->encrypt_decrypt('decrypt', $plan);
                $plans = Plans::model()->findByPk($plan_id);
                if(!empty($plans)) {
                        if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != NULL) {

                                $this->redirect(array('PlanPaymentSuccess', 'plan_id' => $plan_id));
                        } else {
                                Yii::app()->session['unloggedUserPlan'] = $plan_id;
                                $this->redirect(array('site/login'));
                        }
                } else {
                        $this->render('//site/error');
                }
        }

        public function actionPlanPaymentSuccess($plan_id) {
                $plans = Plans::model()->findByPk($plan_id);
                if(!empty($plans)) {

                        $model = UserPlans::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $model->attributes = $plans->attributes;
                        $model->plan_id = $plans->id;
                        $model->featured = $plans->set_featured;
                        $model->dou = date('Y-m-d H:i:s');
                        $model->save();
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $user->register_step = 5;
                        $user->save();
                        Yii::app()->session['user'] = $user;
                        Yii::app()->session['plan'] = $model;
                        Yii::app()->user->setFlash('plan_success', "Payment for  " . $plans->plan_name . " plan successfully placed");
                        Yii::app()->session['unloggedUserPlan'] = '';
                        unset(Yii::app()->session['unloggedUserPlan']);
                        $this->redirect(array('//Myaccount/Index'));
                }
        }

        public function actionPlanPaymentError($plan_id) {
                $plans = Plans::model()->findByPk($plan_id);
                if(!empty($plans)) {

                        Yii::app()->user->setFlash('plan_error', "Transaction Failed.Try again later");
                        $this->redirect(array('//Myaccount/Index'));
                }
        }

        public function actionVerify($m) {
                if($m != '') {
                        $user_id = $this->encrypt_decrypt('decrypt', $m);
                        $model = UserDetails::model()->findByPk($user_id);
                        if(!empty($model)) {
                                if($model->email_verification == 0) {
                                        $model->email_verification = 1;
                                        if($model->save()) {
                                                Yii::app()->user->setFlash('email_verified', "Your account has been successfully verified.");
                                                $this->ReturnUrl($model);
                                        }
                                } else {
                                        Yii::app()->user->setFlash('email_verified', "You have already verified your account.");
                                        $this->ReturnUrl($model);
                                }
                        } else {

                        }
                } else {

                }
        }

        public function ReturnUrl($model) {
                if($model->register_step == 1) {
                        $this->redirect(array('//Register/SecondStep'));
                } else if($model->register_step == 2) {
                        $this->redirect(array('//Register/ThirdStep'));
                } else if($model->register_step == 3) {
                        $this->redirect(array('//Register/FourthStep'));
                } else if($model->register_step == 4) {
                        $this->redirect(array('//Register/FifthStep'));
                } else if($model->register_step == 5) {
                        $this->redirect(array('//Myaccount/Index'));
                } else {
                        $this->redirect(array('//site/Index'));
                }
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

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/newgen_wedding/';
        }

        public function encrypt_decrypt($action, $string) {
                $output = false;

                $encrypt_method = "AES-256-CBC";
                $secret_key = 'This is my secret key';
                $secret_iv = 'This is my secret iv';

// hash
                $key = hash('sha256', $secret_key);

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                if($action == 'encrypt') {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                } else if($action == 'decrypt') {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }

                return $output;
        }

}
