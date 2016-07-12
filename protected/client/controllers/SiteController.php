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
                $plans = Plans::model()->findAllByAttributes(array('status' => 1), array('condition' => 'amount!=0', 'order' => 'amount desc'));
                $featured = UserPlans::model()->findAllByAttributes(array('featured' => 1));
                $this->render('index', array('plans' => $plans, 'featured' => $featured));
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
                                                $plan = UserPlans::model()->findByAttributes(array('user_id' => $user_login->id));

                                                if ($plan->number_of_days != 0 && $plan->status != 0) {
                                                        $curdate = date('Y-m-d');
                                                        $plan_date = date('Y-m-d', strtotime($plan->dou));



                                                        if ($curdate > $plan_date) {
                                                                $days = (strtotime($curdate) - strtotime($plan_date)) / (60 * 60 * 24);
                                                                $plan->number_of_days_left = $days;

                                                                if ($days > $plan->number_of_days) {
                                                                        $plan->status = 0;
                                                                }
                                                                $plan->save();
                                                        }
                                                }
                                                Yii::app()->session['user'] = $user_login;

                                                Yii::app()->session['plan'] = $plan;

                                                if ($user_login->register_step == 1) {
                                                        $this->redirect(array('//Register/SecondStep'));
                                                } else if ($user_login->register_step == 2) {
                                                        $this->redirect(array('//Register/ThirdStep'));
                                                } else if ($user_login->register_step == 3) {
                                                        $this->redirect(array('//Register/FourthStep'));
                                                } else if (Yii::app()->session['unloggedUserPlan'] != '') {
                                                        $this->redirect(array('Register/UpgradePlan', 'plan' => $this->encrypt_decrypt('encrypt', Yii::app()->session['unloggedUserPlan'])));
                                                } else if ($user_login->register_step == 5 || $user_login->register_step == 4) {
                                                        $this->redirect(array('//Myaccount/Index'));
                                                } else {

                                                        $this->redirect(array('//site/Index'));
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

        public function actionStatic($page) {
                if (!empty($page)) {
                        $model = StaticPage::model()->findByAttributes(array('canonical_name' => $page));
                        if ($model != '') {

                                $this->render('static_page', array('model' => $model));
                        } else {
                                $this->redirect(Yii::app()->baseUrl . '/index.php/site/Error');
                        }
                } else {
                        $this->redirect(Yii::app()->baseUrl . '/index.php/site/Error');
                }
        }

        public function actionAwards() {
                $criteria = new CDbCriteria(array('order' => 'sort_order ASC'));
                $about = Awards::model()->findAllByAttributes(array('status' => '1'), $criteria);
                $banner = $model = StaticPage::model()->findByAttributes(array('canonical_name' => 'awards'));
                $this->render('awards', ['about' => $about, 'banner' => $banner]);
        }

        public function actionFaq() {
                // $criteria = new CDbCriteria(array('order' => 'sort_order ASC'));
                $about = Faq::model()->findAll(['order' => 'id ASC']);
                $banner = $model = StaticPage::model()->findByAttributes(array('canonical_name' => 'faq'));
                $this->render('faq', ['about' => $about, 'banner' => $banner]);
        }

        public function actionContact() {
                $banner = $model = StaticPage::model()->findByAttributes(array('canonical_name' => 'contact-us'));
                $this->render('contactus', ['banner' => $banner]);
        }

        public function actionEnquiry() {

                if (isset($_REQUEST['Enquiry'])) {
                        $name = $_REQUEST['name'];
                        $email = $_REQUEST['email'];
                        $phones = $_REQUEST['phones'];
                        $subject = $_REQUEST['subject'];
                        $coment = $_REQUEST['coment'];
                        $subject = "Enquiry";
                        $model = new Enquiry;
                        $model->name = $name;
                        $model->email = $email;
                        $model->mobile = $phones;
                        $model->subject = $subject;
                        $model->message = $coment;
                        if ($model->save()) {
                                // if ($this->SendMail($name, $email, $subject, $phones, $coment)) {
                                //   $this->SendMail1($name, $email, $phones);

                                $this->redirect(Yii::app()->request->urlReferrer);
                                //  }
                        }
                }
        }

        public function SendMail($name, $email, $subject, $phones, $coment) {



                $to = "dhanya@intersmartsolutions.com";
                $subject = $subject;
                $message = '<html>

    <body>
        <table border="0" style="border-spacing: 20px;    background-color: rgba(250, 200, 59, 0.77);">

            <tr>
                <td colspan="2">Enquiry Details</td>
            </tr>

            <tr>
                <td>Name</td> <td>: ' . $name . '</td>
            </tr>
   <tr>
                <td>Email</td> <td>: ' . $email . '</td>
            </tr>

   <tr>
                <td>Phone</td> <td>: ' . $phones . '</td>
            </tr>

   <tr>
                <td>Subject </td> <td>: ' . $subject . '</td>
            </tr>

   <tr>
                <td>Message</td> <td>: ' . $coment . '</td>
            </tr>


        </table>


    </body>
</html>';
// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                $headers .= 'From: Newgen Matrimony<no-reply@intersmarthosting.in>' . "\r\n";
                if (mail($to, $subject, $message, $headers)) {
                        return true;
                } else {
                        return false;
                }
        }

        public function SendMail1($name, $email, $phones) {



                $to = $email;
                $subject = $subject;
                $message = '<html>

    <body>
        <table border="0" style="border-spacing: 20px;    background-color: rgba(250, 200, 59, 0.77);">
<tr>
                <td>Dear ' . $name . ',</td>
            </tr>
            <tr>
                <td>Thank You for your enquiry. We will contact you soon.</td>
            </tr>
<tr>
                <td>Thanks and regards</td>
            </tr>

                <tr>
                <td>Newgen Matrimony Team</td>
            </tr>

        </table>


    </body>
</html>';
// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                $headers .= 'From: Newgen Matrimony<no-reply@intersmarthosting.in>' . "\r\n";
                if (mail($to, $subject, $message, $headers)) {
                        return true;
                } else {
                        return false;
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

        public function encrypt_decrypt($action, $string) {
                $output = false;

                $encrypt_method = "AES-256-CBC";
                $secret_key = 'This is my secret key';
                $secret_iv = 'This is my secret iv';

// hash
                $key = hash('sha256', $secret_key);

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                if ($action == 'encrypt') {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                } else if ($action == 'decrypt') {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }

                return $output;
        }

}
