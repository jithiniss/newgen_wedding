<?php

class MyaccountController extends Controller {

        public function actionIndex() {

                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $matches = Yii::app()->Matches->MyMatches();
                        $twowaymatches = Yii::app()->Matches->MyTwoWayMatches($user->id);
                        $profile_visitors = ProfileVisitors::model()->findAllByAttributes(array('visited_id' => $user->user_id), array('order' => 'date DESC', 'group' => 'user_id', 'distinct' => TRUE));
                        $this->render('index', array('user' => $user, 'matches' => $matches, 'twowaymatches' => $twowaymatches, 'profile_visitors' => $profile_visitors));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionInvitations() {
                $requests = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 1)'));
                if (!empty($requests))
                        $this->redirect(array('Pending'));
                else {
                        $this->redirect(array('Accepted'));
                }
        }

        public function actionSentInvitations() {
                $requests = Requests::model()->findAllByAttributes(array(), array('condition' => '(user_id = "' . Yii::app()->session['user']['id'] . '" AND status = 1)'));
                if (!empty($requests))
                        $this->redirect(array('Sent'));
                else {
                        $this->redirect(array('SentAccepted'));
                }
        }

        public function actionSent() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 1',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentpending', array('dataProvider' => $dataProvider));
        }

        public function actionPending() {
                if (Yii::app()->session['user'] != "") {
//                        echo 'hii';
//                        exit;
                        $dataProvider = new CActiveDataProvider('Requests', array(
                            'criteria' => array(
                                'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 1',
                                'order' => 'date desc',
                            ),
                            'pagination' => array(
                                'pageSize' => 4,
                            ),
                                )
                        );
                        // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                        $this->render('pending', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionAccept($id) {
                $request = Requests::model()->findByPk($id);
                if (!empty($request) && $request->status == 1) {
                        $request->status = 2;
                        $request->save();
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionReject($id) {
                $reject = Requests::model()->findByPk($id);
                if (!empty($reject) && $reject->status == 1) {
                        $reject->status = 4;
                        $reject->save();
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionAccepted() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 2',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('accepted', array('dataProvider' => $dataProvider));
        }

        public function actionSentAccepted() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 2',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentaccepted', array('dataProvider' => $dataProvider));
        }

        public function actionRejected() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 4',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('rejected', array('dataProvider' => $dataProvider));
        }

        public function actionSentRejected() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 4',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentrejected', array('dataProvider' => $dataProvider));
        }

        public function actionMessage() {
                $message = Message::model()->findAllByAttributes(array('receiver_id' => Yii::app()->session['user']['id']), array('order' => 'DOC DESC', 'group' => 'sender_id', 'distinct' => TRUE));
                $this->render('message', array('message' => $message));
        }

        public function actionPhotoRequests() {
                $requests = PhotoRequests::model()->findAllByAttributes(array('receiver_id' => Yii::app()->session['user']['id']));
                $this->render('photo_requests', array('requests' => $requests));
        }

        public function actionProfileVisitors() {
                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('ProfileVisitors', array(
                            'criteria' => array(
                                'condition' => 'visited_id="' . $user->user_id . '" AND status = 1',
                                'order' => 'date desc',
                                'group' => 'user_id',
                                'distinct' => TRUE
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('profile_visitors', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionProfileVisited() {
                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('ProfileVisitors', array(
                            'criteria' => array(
                                'condition' => 'user_id="' . $user->user_id . '" AND status = 1',
                                'order' => 'date desc',
                                'group' => 'visited_id',
                                'distinct' => TRUE,
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('profile_visited', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionShortList() {
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('Requests', array(
                            'criteria' => array(
                                'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 1',
                                'condition' => 'status = 2',
                                'order' => 'date desc',
                                'group' => 'user_id',
                                'distinct' => TRUE,
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('short_list', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionListBlockedMembers() {
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('BlockedMembers', array(
                            'criteria' => array(
                                'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '"AND status = 1',
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('blocked_members', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
//                $blocked_details = BlockedMembers::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
        }

        public function actionMembershipdetails() {
                $detail = UserPlans::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));

                $this->render('membership', array('detail' => $detail));
        }

        public function actionShareNewgen() {
                if (isset(Yii::app()->session['user'])) {
                        $model = new SocialMediaShare;
                        $model->attributes = $_POST['social_share'];
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->email = $_POST['email'];
                        $model->status = 1;
                        $model->cb = Yii::app()->session['user']['id'];
                        $model->doc = date('Y-m-d');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->ShareMail($model);
                                        Yii::app()->user->setFlash('success', "Successfully shared.");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                } else {
                                        Yii::app()->user->setFlash('error', "Invalid Email id");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        } else {
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function ShareMail($model) {
//                $user = 'shahana@intersmart.in';
                $user = $model->email;
                $user_subject = 'Newgen Wedding Matrimony:Your friend shared';
                $user_message = $this->renderPartial('mail/_user_shared_email', array('model' => $model), true);
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From:Newgen Wedding Matrimony <no-reply@newgenwedding.com>' . "\r\n";

                mail($user, $user_subject, $user_message, $headers);
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/beta/';
        }

}
