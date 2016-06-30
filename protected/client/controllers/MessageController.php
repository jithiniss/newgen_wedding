<?php

class MessageController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex($id) {
                $plan_detailes = UserPlans::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if ($plan_detailes->send_message_left > 0) {
                        /* $id is the receiver's user_id */
                        $receiver = UserDetails::model()->findByAttributes(array('user_id' => $id));

                        $model = new Message;
                        $sender = Yii::app()->session['user']['id'];
                        if (isset($_POST['Message'])) {
                                $model->attributes = $_POST['Message'];
                                $model->sender_id = $sender;
                                if (!empty($receiver))
                                        $model->receiver_id = $receiver->id;
                                $model->viewed = 1;
                                $model->status = 1;
                                $model->DOC = date('Y-m-d H:i:s');
                                if ($model->validate()) {
                                        $model->save();
                                }
                        }
                        $model->unsetAttributes();
                        $message = Message::model()->findAllByAttributes(array(), array('condition' => '(sender_id = "' . $sender . '" OR receiver_id = "' . $receiver->id . '" OR sender_id = "' . $receiver->id . '" OR receiver_id = "' . $sender . '" )'));
                        $this->render('message', array('model' => $model, 'messages' => $message, 'receiver' => $receiver->id));
                } else {
                        Yii::app()->user->setFlash('error', "  You hacve no provision to send message please upgrade your plan");
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

}
