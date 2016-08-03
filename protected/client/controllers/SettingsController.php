<?php

class SettingsController extends Controller {

        public function init() {
                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionIndex() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $account = UserDetails::model()->findByPk($user_id, array('select' => 'email,password,contact_number,address,country,city,state,zip_code'));

                        $this->render('index', ['account' => $account]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionEditcontact() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('contactupdate');
                        if (isset($_POST['UserDetails'])) {
                                if ($model->validate()) {
                                        $model->contact_number = $_POST['UserDetails']['contact_number'];
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
                        }
                        $this->render('contact', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionChangepassword() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('changePwd');
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                if ($model->validate()) {
                                        $model->password = $_POST['UserDetails']['repeat_password'];
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
                        }
                        $this->render('password', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionChangeaddress() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('addressupdate');
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                if ($model->validate()) {
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
//                                print_r($model->getErrors());
                        }
                        $this->render('address', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function loadModel($id) {
                $model = UserDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionContactFilters() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $partnerDetails = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if (!empty($partnerDetails)) {
                        if (isset($_POST['PartnerDetails'])) {
                                $partnerDetails->attributes = $_POST['PartnerDetails'];
                                if (!empty($_POST['PartnerDetails']['marital_status'])) {
                                        $marital_status = $_POST['PartnerDetails']['marital_status'];

                                        if (sizeof($marital_status) > 1) {
                                                if (in_array('-1', $marital_status) == 1) {

                                                        unset($marital_status[array_search('-1', $marital_status)]);
                                                } else {

                                                        $marital_status = $marital_status;
                                                }
                                        } else {
                                                $marital_status = $_POST['PartnerDetails']['marital_status'];
                                        }
                                        $partnerDetails->marital_status = implode(',', $marital_status);
                                } else {
                                        $partnerDetails->marital_status = '';
                                }
                                if (!empty($_POST['PartnerDetails']['religion'])) {
                                        $religion = $_POST['PartnerDetails']['religion'];

                                        if (sizeof($religion) > 1) {
                                                if (in_array('-1', $religion) == 1) {

                                                        unset($religion[array_search('-1', $religion)]);
                                                } else {

                                                        $religion = $religion;
                                                }
                                        } else {
                                                $religion = $_POST['PartnerDetails']['religion'];
                                        }

                                        $partnerDetails->religion = implode(',', $religion);
                                } else {
                                        $partnerDetails->religion = '';
                                }
                                if (!empty($_POST['PartnerDetails']['mothertongue'])) {
                                        $mothertongue = $_POST['PartnerDetails']['mothertongue'];

                                        if (sizeof($mothertongue) > 1) {
                                                if (in_array('-1', $mothertongue) == 1) {

                                                        unset($mothertongue[array_search('-1', $mothertongue)]);
                                                } else {

                                                        $mothertongue = $mothertongue;
                                                }
                                        } else {
                                                $mothertongue = $_POST['PartnerDetails']['mothertongue'];
                                        }

                                        $partnerDetails->mothertongue = implode(',', $mothertongue);
                                } else {
                                        $partnerDetails->mothertongue = '';
                                }

                                if (!empty($_POST['PartnerDetails']['caste'])) {
                                        $caste = $_POST['PartnerDetails']['caste'];

                                        if (sizeof($caste) > 1) {
                                                if (in_array('-1', $caste) == 1) {

                                                        unset($caste[array_search('-1', $caste)]);
                                                } else {

                                                        $caste = $caste;
                                                }
                                        } else {
                                                $caste = $_POST['PartnerDetails']['caste'];
                                        }

                                        $partnerDetails->caste = implode(',', $caste);
                                } else {
                                        $partnerDetails->caste = '';
                                }
                                if (!empty($_POST['PartnerDetails']['profile_created_by'])) {
                                        $profile_created_by = $_POST['PartnerDetails']['profile_created_by'];

                                        if (sizeof($profile_created_by) > 1) {
                                                if (in_array('-1', $profile_created_by) == 1) {

                                                        unset($profile_created_by[array_search('-1', $profile_created_by)]);
                                                } else {

                                                        $profile_created_by = $profile_created_by;
                                                }
                                        } else {
                                                $profile_created_by = $_POST['PartnerDetails']['profile_created_by'];
                                        }

                                        $partnerDetails->profile_created_by = implode(',', $profile_created_by);
                                } else {
                                        $partnerDetails->profile_created_by = '';
                                }

                                if (!empty($_POST['PartnerDetails']['country_living_in'])) {
                                        $country_living_in = $_POST['PartnerDetails']['country_living_in'];

                                        if (sizeof($country_living_in) > 1) {
                                                if (in_array('-1', $country_living_in) == 1) {

                                                        unset($country_living_in[array_search('-1', $country_living_in)]);
                                                } else {

                                                        $country_living_in = $country_living_in;
                                                }
                                        } else {
                                                $country_living_in = $_POST['PartnerDetails']['country_living_in'];
                                        }

                                        $partnerDetails->country_living_in = implode(',', $country_living_in);
                                } else {
                                        $partnerDetails->country_living_in = '';
                                }
                                if (!empty($_POST['PartnerDetails']['country_grew_up'])) {
                                        $country_grew_up = $_POST['PartnerDetails']['country_grew_up'];

                                        if (sizeof($country_grew_up) > 1) {
                                                if (in_array('-1', $country_grew_up) == 1) {

                                                        unset($country_grew_up[array_search('-1', $country_grew_up)]);
                                                } else {

                                                        $country_grew_up = $country_grew_up;
                                                }
                                        } else {
                                                $country_grew_up = $_POST['PartnerDetails']['country_grew_up'];
                                        }

                                        $partnerDetails->country_grew_up = implode(',', $country_grew_up);
                                } else {
                                        $partnerDetails->country_grew_up = '';
                                }
                                if (!empty($_POST['PartnerDetails']['residency_status'])) {
                                        $residency_status = $_POST['PartnerDetails']['residency_status'];

                                        if (sizeof($residency_status) > 1) {
                                                if (in_array('-1', $residency_status) == 1) {

                                                        unset($residency_status[array_search('-1', $residency_status)]);
                                                } else {

                                                        $residency_status = $residency_status;
                                                }
                                        } else {
                                                $residency_status = $_POST['PartnerDetails']['residency_status'];
                                        }

                                        $partnerDetails->residency_status = implode(',', $residency_status);
                                } else {
                                        $partnerDetails->residency_status = '';
                                }

                                if ($partnerDetails->validate()) {
                                        $partnerDetails->ub = $user->id;
                                        if ($partnerDetails->save())
                                                Yii::app()->user->setFlash('partner_fet', "Partner Preference Changed Successfully");
                                }
                        }
                        $this->render('contact_filter', array('partnerDetails' => $partnerDetails, 'user' => $user));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionSmsAlerts() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                //$user->email_sms_alert = $_POST['email_alert'];
                $user->save();
                $this->render('sms_alert', array('user' => $user));
        }

        public function actionMailSmsAlert() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $mail_alert = MailSmsAlert::model()->findByAttributes(array('cb' => $user->id));
                if ($mail_alert != '') {
                        $model = MailSmsAlert::model()->findByAttributes(array('cb' => $user->id));
                        $model->attributes = $_POST['MailSmsAlert'];
                        $model->ub = Yii::app()->session['user']['id'];
                        $model->dou = date('Y-m-d');
                        if ($model->validate()) {
                                $model->save();
                        }
                } else {
                        $model = new MailSmsAlert;
                        if (isset($_POST['MailSmsAlert'])) {
                                $model->attributes = $_POST['MailSmsAlert'];
                                $model->cb = Yii::app()->session['user']['id'];
                                $model->doc = date('Y-m-d');
                                if ($model->validate()) {
                                        $model->save();
                                }
                        }
                }
                $this->render('MailSmsAlert', array('model' => $model, 'user' => $user));
        }

        public function actionDeleteOrHide() {
//                $account = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if (Yii::app()->session['user']['id'] != '') {
                        $model = $this->loadModel(Yii::app()->session['user']['id']);
                        $model->setScenario('hide');
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                $model->status = 0;
                                $model->hide_from = date('Y-m-d');
                                if ($model->save()) {
                                        $this->redirect(array('index'));
                                }
                        }
                }
                $this->render('delete_or_hide', array('model' => $model));
        }

        public function actionDeleteAccount() {
                if ($_POST['UserDetails']['status'] == 1) {
                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $trash = new UserTrash;
                        $trash->attributes = $model->attributes;
                        if ($trash->save()) {
                                $model->delete();
                                $this->redirect(array('site/index'));
                        }
                }
                $this->render('delete_or_hide', array('model' => $model));
        }

}
