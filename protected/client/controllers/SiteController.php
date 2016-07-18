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
                $story = TellUsStory::model()->findAllByAttributes(array('status' => 1, 'admin_approval' => 1), array('limit' => 8));
                $this->render('index', array('plans' => $plans, 'featured' => $featured, 'story' => $story));
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
                $banner = StaticPage::model()->findByAttributes(array('canonical_name' => 'awards'));
                $this->render('awards', ['about' => $about, 'banner' => $banner]);
        }

        public function actionFaq() {
                // $criteria = new CDbCriteria(array('order' => 'sort_order ASC'));
                $about = Faq::model()->findAll(['order' => 'id ASC']);
                $banner = StaticPage::model()->findByAttributes(array('canonical_name' => 'faq'));
                $this->render('faq', ['about' => $about, 'banner' => $banner]);
        }

        public function actionContact() {
                $model = new Enquiry;
                if (isset($_POST['Enquiry'])) {
                        $model->attributes = $_POST['Enquiry'];
                        $model->date = date("Y-m-d");
                        $model->name = $_POST['name'];
                        $model->email = $_POST['email'];
                        $model->mobile = $_POST['phones'];
                        $model->subject = $_POST['subject'];
                        $model->message = $_POST['coment'];
                        if ($model->save(false)) {
                                $this->contactmail_admin($model);
                                $this->contactmail_user($model);
                                Yii::app()->user->setFlash('success', " Your Contact sent successfully");
                        } else {
                                Yii::app()->user->setFlash('error', "Error Occured");
                        }
                        $this->redirect(array('site/contact'));
                }
                $this->render('contactus', array('model' => $model));
        }

        public function contactmail_admin($model) {
                $admin = 'shahana@intersmart.in';
//                $admin = AdminUser::model()->findByPk(4)->email;
                $admin_subject = 'Newgen Wedding Matrimony:New Enquiry Recieved';
                $admin_message = $this->renderPartial('mail/_admin_contact_email', array('model' => $model), true);
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From:Newgen Wedding Matrimony <no-reply@intersmarthosting.in>' . "\r\n";

                mail($admin, $admin_subject, $admin_message, $headers);
        }

        public function contactmail_user($model) {
//                $user = 'shahana@intersmart.in';
                $user = $model->email;
                $user_subject = 'Newgen Wedding Matrimony:New Enquiry Recieved';
                $user_message = $this->renderPartial('mail/_user_contact_email', array('model' => $model), true);
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From:Newgen Wedding Matrimony <no-reply@intersmarthosting.in>' . "\r\n";

                mail($user, $user_subject, $user_message, $headers);
        }

        public function actionLogout() {
                unset(Yii::app()->session['user']);

                Yii::app()->user->logout();
                $this->redirect(array('site/index'));
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/newgen/';
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

        public function actionSearchResult() {
                $model = new SavedSearch();
                if (isset($_POST['SearchResult'])) {
                        $model->attributes = $_POST['SearchResult'];
                        $model->age_from = $_POST['age_from'];
                        $model->age_to = $_POST['age_to'];
                        $model->religion = $_POST['religion'];
                        $model->mothertongue = $_POST['mothertongue'];
                        if ($_POST['gender'] == 2) {
                                $model->gender = "1";
                        } else {
                                $model->gender = "2";
                        }
                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Result/id/' . $this->encrypt_decrypt('encrypt', $model->id));
                                }
                        }
                }
//                $this->redirect('index');
        }

        public function actionResult($id) {

                if (isset($_POST['photo'])) {
                        $ph = $_POST['photo'];
                        if (count($ph) > 1) {
                                if (($key1 = array_search(0, $ph)) !== false) {
                                        unset($ph[$key1]);
                                }
                        }
                        $photo = implode(',', $ph);
                }
                if (isset($_POST['joined'])) {
                        $joined = $_POST['joined'];
                } else {
                        $joined = 0;
                }
                if (isset($_POST['active_member'])) {
                        $active_mem = $_POST['active_member'];
                } else {
                        $active_mem = 0;
                }
                if (isset($_POST['marital_status'])) {
                        $ms = $_POST['marital_status'];
                        if (count($ms) > 1) {
                                if (($key = array_search(0, $ms)) !== false) {
                                        unset($ms[$key]);
                                }
                        }
                        $marital_stat = implode(',', $ms);
                }
                if (isset($_POST['profile_created_by'])) {
                        $pcb = $_POST['profile_created_by'];
                        if (count($pcb) > 1) {
                                if (($key2 = array_search(0, $pcb)) !== false) {
                                        unset($pcb[$key2]);
                                }
                        }
                        $profile_crea = implode(',', $pcb);
                }
                if (isset($_POST['smoke'])) {
                        $smk = $_POST['smoke'];
                        if (count($smk) > 1) {
                                if (($key3 = array_search(0, $smk)) !== false) {
                                        unset($smk[$key3]);
                                }
                        }
                        $smoking = implode(',', $smk);
                }
                if (isset($_POST['drink'])) {
                        $drk = $_POST['drink'];
                        if (count($drk) > 1) {
                                if (($key4 = array_search(0, $drk)) !== false) {
                                        unset($drk[$key4]);
                                }
                        }
                        $drinking = implode(',', $drk);
                }
                if (isset($_POST['diet'])) {
                        $dit = $_POST['diet'];
                        if (count($dit) > 1) {
                                if (($key5 = array_search(0, $dit)) !== false) {
                                        unset($dit[$key5]);
                                }
                        }
                        $diets = implode(',', $dit);
                }
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);

                $this->render('search_result', array('id' => $result_id, 'sort' => $sort, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
        }

}
