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
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select partner_id from requests where user_id="' . Yii::app()->session['user']['id'] . '" AND status = 1)',
                            ),
                            'pagination' => array(
                                'pageSize' => 6,
                            ),
                                )
                        );
                        $this->render('pending', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
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
                $this->render('sentpending', array('dataProvider' => $dataProvider));
        }

        public function actionPending() {
                if (Yii::app()->session['user'] != "") {
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select partner_id from requests where user_id=' . Yii::app()->session['user']['id'] . ' AND status = 3)',
                            ),
                            'pagination' => array(
                                'pageSize' => 6,
                            ),
                                )
                        );
                        $this->render('pending', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionAccept($id) {
                if (isset(Yii::app()->session['user'])) {
                        $request = Requests::model()->findByAttributes(array('partner_id' => $id));
                        if (!empty($request) && $request->status == 1) {
                                $request->status = 2;
                                $request->save();
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionReject($id) {
                if (isset(Yii::app()->session['user'])) {
                        $reject = Requests::model()->findByAttributes(array('partner_id' => $id));
                        if (!empty($reject) && $reject->status == 1) {
                                $reject->status = 4;
                                $reject->save();
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionAccepted() {
                $dataProvider = new CActiveDataProvider('UserDetails', array(
                    'criteria' => array(
                        'condition' => 'user_id in (select partner_id from requests where user_id=' . Yii::app()->session['user']['id'] . ' AND status = 2)',
                    ),
                    'pagination' => array(
                        'pageSize' => 6,
                    ),
                        )
                );
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
                $dataProvider = new CActiveDataProvider('UserDetails', array(
                    'criteria' => array(
                        'condition' => 'user_id in (select partner_id from requests where user_id=' . Yii::app()->session['user']['id'] . ' AND status = 4)',
                    ),
                    'pagination' => array(
                        'pageSize' => 6,
                    ),
                        )
                );
                $this->render('rejected', array('dataProvider' => $dataProvider));
        }

        public function actionSentRejected() {
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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select user_id from profile_visitors where visited_id="' . $user->user_id . '" AND status = 1)',
                                'order' => $sort,
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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }

                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select visited_id from profile_visitors where user_id="' . $user->user_id . '" AND status = 1)',
                                'order' => $sort,
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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select partner_id from requests where user_id="' . Yii::app()->session['user']['id'] . '" AND (status = 1 or status =2))',
                                'order' => $sort,
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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'id in (select block_id from blocked_members where user_id="' . Yii::app()->session['user']['id'] . '"AND status = 1)',
                                'order' => $sort,
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
        }

        public function actionBlockedMembersList() {
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
                        $this->render('blocked_members_list', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
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
                $message = new YiiMailMessage;
                $message->view = "_user_shared_email";  // view file name
                $params = array('model' => $model); // parameters
                $message->subject = 'Newgen Wedding Matrimony:Your friend shared';
                $message->setBody($params, 'text/html');
                $message->addTo($model->email);
                $message->from = 'newgenwedding@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/beta/';
        }

        public function actionListOfShortlist() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select partner_id from requests where user_id="' . Yii::app()->session['user']['id'] . '" AND (status = 1 or status =2))',
                                'order' => $sort,
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('list_of_shortlist', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionListProfileVisitors() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select user_id from profile_visitors where visited_id="' . $user->user_id . '" AND status = 1)',
                                'order' => $sort,
                            ),
                            'pagination' => array(
                                'pageSize' => 5,
                            ),
                                )
                        );
                        $this->render('list_profile_visitors', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

        public function actionListProfileVisited() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                if (isset(Yii::app()->session['user'])) {
                        $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $dataProvider = new CActiveDataProvider('UserDetails', array(
                            'criteria' => array(
                                'condition' => 'user_id in (select visited_id from profile_visitors where user_id="' . $user->user_id . '" AND status = 1)',
                                'order' => $sort,
                            ),
                            'pagination' => array(
                                'pageSize' => 8,
                            ),
                                )
                        );
                        $this->render('list_profile_visited', array('dataProvider' => $dataProvider));
                } else {
                        $this->redirect(array('site/login'));
                }
        }

}
