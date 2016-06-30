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
                                $this->render('index', array('user_details' => $user_details, 'partner_details' => $partner_details, 'current_user' => $current_user));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

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
