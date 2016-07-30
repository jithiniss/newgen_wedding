<?php

class PartnerController extends Controller {

        public function actionIndex() {
                if (isset(Yii::app()->session['user'])) {
                        $this->render('index');
                }
        }

        public function folderName($min, $max, $id) {
                if ($id > $min && $id < $max) {
                        return $max;
                } else {
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                }
        }

        public function actionPartnerdetails($userid) {
                if (isset(Yii::app()->session['user'])) {

                        if ($userid != '') {
                                $user_details = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                                $current_user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $partner_details = PartnerDetails::model()->findByAttributes(array('user_id' => $user_details->id));
                                $interest = UserInterests::model()->findByAttributes(array('user_id' => $user_details->id));

                                $similar_profile = $this->Similar($userid);
                                $story = TellUsStory::model()->findAllByAttributes(array('admin_approval' => '1', 'status' => '1'), array('limit' => 3));
                                $profile_viewed = new ProfileVisitors;
                                $profile_viewed->user_id = $current_user->user_id;
                                $profile_viewed->visited_id = $userid;
                                $profile_viewed->date = date('Y-m-d');
                                $profile_viewed->status = 1;
//                                var_dump($profile_viewed->visited_id);
//                                exit;
                                $profile_viewed->save(FALSE);
                                $this->render('index', array('user_details' => $user_details, 'partner_details' => $partner_details, 'current_user' => $current_user, 'similar_profiles' => $similar_profile, 'story' => $story, 'interest' => $interest));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionFavorites($userid) {
                $user_details = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                $favrt = Favorites::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'partner_id' => $user_details->id));
                if (!empty($favrt)) {
                        $model = $this->loadModel($userid);
                        $model->status = 1;
                        if ($model->save(FALSE)) {
                                $this->redirect(array('partnerdetails?userid=' . $userid));
                        }
                } else {
                        $model = new Favorites;
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->partner_id = $user_details->id;
                        $model->doc = date('Y-m-d');
                        if ($model->save(FALSE)) {
                                $this->redirect(array('partnerdetails?userid=' . $userid));
                        }
                }
        }

        public function actionRemove($userid) {
                $model = $this->loadModel($userid);
                $model->status = 0;
                if ($model->save(FALSE)) {
                        $this->redirect(array('partnerdetails?userid=' . $userid));
                }
        }

        public function actionFavoritelist() {
//                $favrt = Favorites::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                $dataProvider = new CActiveDataProvider('Favorites', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 1',
//                        'order' => 'doc desc',
//                        'group' => 'user_id',
//                        'distinct' => TRUE
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                ));
                $this->render('favorite', array('dataProvider' => $dataProvider));
        }

        public function Similar($userid) {
                $user = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                $similar_profile1 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                    'country' => $user->country,
                    'state' => $user->state,
                    'city' => $user->city,
                    'education_level' => $user->education_level,
                    'working_as' => $user->working_as), array('condition' => 'user_id != "' . $userid . '"'));

                $similar_profile2 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                    'country' => $user->country,
                    'state' => $user->state,
                    'city' => $user->city,
                    'education_level' => $user->education_level), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile3 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                    'country' => $user->country,
                    'state' => $user->state,
                    'city' => $user->city,
                        ), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile4 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                    'country' => $user->country,
                    'state' => $user->state,
                        ), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile5 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                    'country' => $user->country,
                        ), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile6 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                    'dob_year' => $user->dob_year,
                        ), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile7 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion,
                    'caste' => $user->caste,
                        ), array('condition' => 'user_id != "' . $userid . '"'));
                $similar_profile8 = UserDetails::model()->findAllByAttributes(array(
                    'gender' => $user->gender,
                    'religion' => $user->religion), array('condition' => 'user_id != "' . $userid . '"'));


                if (!empty($similar_profile1)) {
                        return $similar_profile1;
                } else if (!empty($similar_profile2)) {
                        return $similar_profile2;
                } else if (!empty($similar_profile3)) {
                        return $similar_profile3;
                } else if (!empty($similar_profile4)) {
                        return $similar_profile4;
                } else if (!empty($similar_profile5)) {
                        return $similar_profile5;
                } else if (!empty($similar_profile6)) {
                        return $similar_profile6;
                } else if (!empty($similar_profile7)) {
                        return $similar_profile7;
                } else if (!empty($similar_profile8)) {
                        return $similar_profile8;
                } else {
                        return NULL;
                }
        }

// Uncomment the following methods and override them if needed
        /*
          public function filters()
          {
          // return the filter configuration for this controller, e.g.:
          return array(
          'inlineFilterName',
          array(
          'class'=>'path.to.FilterClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }

          public function actions()
          {
          // return external action classes, e.g.:
          return array(
          'action1'=>'path.to.ActionClass',
          'action2'=>array(
          'class'=>'path.to.AnotherActionClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }
         */
        public function actionPhotoRequest($data) {
                $recevier_details = UserDetails::model()->findByAttributes(array('user_id' => $data));
                $check = PhotoRequests::model()->findByAttributes(array('sender_id' => Yii::app()->session['user']['id'], 'receiver_id' => $recevier_details->id));
                if (!empty($recevier_details)) {
                        if (empty($check)) {
                                $model = new PhotoRequests;
                                $model->sender_id = Yii::app()->session['user']['id'];
                                $model->receiver_id = $recevier_details->id;
                                $model->status = 1;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Your request is submitted");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        } else {
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                }
        }

        public function actionSendInterest($userid) {
                if (isset(Yii::app()->session['user'])) {
                        if ($userid != '') {
                                $partner_details = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                                if (!empty($partner_details)) {
                                        $plan_details = UserPlans::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                        if ($plan_details->Interest == 1) {

                                                /* check user send request to this partner */
                                                $check = Requests::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'partner_id' => $userid));
                                                /* add data to request table if invitation send */
                                                if (empty($check)) {

                                                        $model = new Requests();
                                                        $model->user_id = Yii::app()->session['user']['id'];
                                                        $model->partner_id = $userid;
                                                        $model->status = 1;
                                                        $model->date = date('Y-m-d');
                                                        if ($model->save()) {
                                                                $this->MailToPartner($model->partner_id);
                                                                $this->redirect(Yii::app()->request->urlReferrer);
                                                        }
                                                } else {
                                                        $this->redirect(Yii::app()->request->urlReferrer);
                                                }
                                        } else {
                                                Yii::app()->user->setFlash('error', "sorry");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        }
                                }
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function MailToPartner($partner_id) {
                $partner_details = UserDetails::model()->findByAttributes(array('user_id' => $partner_id));
                $model = UserDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']));
                if (!empty($partner_details)) {
                        $to = $partner_details->email;

                        $subject = 'info_NewGen';
                        $message = $this->renderPartial(_user_mail, array('model' => $model));
// Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                        $headers .= 'From: <no-reply@newgen.com>' . "\r\n";
                        //$headers .= 'Cc: reply@foldingbooks.com' . "\r\n";
                        //                        echo $message;
                        //                        exit();
                        //mail($to, $subject, $message, $headers);
                }
        }

        public function actionBlockedMembers($id) {
                $block_details = BlockedMembers::model()->findByAttributes(array('block_id' => $id));
                if (empty($block_details)) {
                        $model = new BlockedMembers;
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->block_id = $id;
                        $model->status = 1;
                        $model->doc = date('Y-m-d');
                        $model->cb = Yii::app()->session['user']['id'];
                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                } else {
                        $block_details->ub = Yii::app()->session['user']['id'];
                        $block_details->status = 1;
                        $block_details->dou = date('Y-m-d');
                        if ($block_details->save()) {
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                }
        }

        public function actionUnBlockedMembers($id) {
                $model = BlockedMembers::model()->findByPk($id);
                $model->status = 0;
                $model->dou = Yii::app()->session['user']['id'];
                $model->dou = date('Y-m-d');
                if ($model->save()) {
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function loadModel($id) {
//                $model = Favorites::model()->findByPk($id);
                $user_details = UserDetails::model()->findByAttributes(array('user_id' => $id));
                $model = Favorites::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'partner_id' => $user_details->id));

                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionReportMisuse($id) {
                $model = new ReportMisuse;
                $model->attributes = $_POST['report_misuse'];
                $model->user_id = Yii::app()->session['user']['id'];
                $model->report_id = $id;
                $model->status = 1;
                $model->report_reason = $_POST['misuse_reason'];
                $model->description = $_POST['misuse_description'];
                $model->cb = Yii::app()->session['user']['id'];
                $model->doc = date('Y-m-d');

                if ($model->save(false)) {
//                        $this->SuccessMail($model);
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function SuccessMail($model) {
                $user_details = UserDetails::model()->findByAttributes(array('id' => $model->user_id));
                $report_details = UserDetails::model()->findByAttributes(array('id' => $model->report_id));
                $admin = 'shahana@intersmart.in';
                $admin_subject = $user_details->first_name . ' reported a misuse with NEWGEN.com';
                $admin_message = $this->renderPartial('_report_admin_mail', array('model' => $model, 'user_details' => $user_details, 'report_details' => $report_details), true);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
                $headers .= 'From: <no-reply@intersmarthosting.in>' . "\r\n";
                mail($admin, $admin_subject, $admin_message, $headers);
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/beta';
        }

        public function actionContact() {
                if (isset($_POST['partner'])) {
                        $user = Yii::app()->session['user']['id'];
                        $partner = $_POST['partner'];
                        $contacts = UserPlans::model()->findByAttributes(array('user_id' => $user));
                        $contact_left = $contacts->view_contact_left;
                        $check_contact = ContactedPartner::model()->findByAttributes(array('user_id' => $user, 'partner_id' => $partner));
                        if (empty($check_contact)) {
                                $model1 = new ContactedPartner();
                                $model1->user_plan_id = $contacts->id;
                                $model1->user_id = $user;
                                $model1->partner_id = $partner;
                                $model1->doc = date('Y-m-d');
                                $contact_left = $contact_left - 1;
                                if ($model1->save()) {

                                }
                        }
                        $model = $this->loadModels($user);
                        $model->view_contact_left = $contact_left;
                        if ($model->save()) {

                        }
                        echo $contact_left;
                        exit;
                }
        }

        public function loadModels($id) {
                $model = UserPlans::model()->findByAttributes(array('user_id' => $id));
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

}
