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
                                $similar_profile = $this->Similar($userid);
                                $story = TellUsStory::model()->findAllByAttributes(array('admin_approval' => '1', 'status' => '1'));
                                $this->render('index', array('user_details' => $user_details, 'partner_details' => $partner_details, 'current_user' => $current_user, 'similar_profiles' => $similar_profile, 'story' => $story));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
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

}
