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

}
