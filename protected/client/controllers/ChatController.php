<?php

class ChatController extends Controller {

        public function actionIndex() {
                $this->render('index');
        }

        public function actionChating($partnerid) {
                $partner = UserDetails::model()->findByAttributes(array('user_id' => $partnerid))->id;
                $chat = ChatBox::model()->findAll(array('order' => 'date ASC', 'condition' => "(sender = " . Yii::app()->session['user']['id'] . " AND reciever = " . $partner . "  AND status = 1 ) OR (sender = " . $partner . " AND reciever = " . Yii::app()->session['user']['id'] . "  AND status = 1)"));

                $this->render('chat_detail', array('chats' => $chat, 'partner' => $partner));
        }

        public function actionChatoperation() {
                $model = new ChatBox;
                $model->sender = $_POST['sender'];
                $model->reciever = $_POST['reciever'];
                $model->message = $_POST['message'];
                $model->status = 1;
                if ($model->save()) {
                        $chat = ChatBox::model()->findAllByAttributes(array('id' => $model->id));

                        echo $this->renderPartial('_chat_detail', array('chats' => $chat, 'partner' => $model->reciever));
                }
        }

        public function actionAjaxChat() {

//                $chat = ChatBox::model()->fin

                echo $this->renderPartial('_chat_detail', array('chats' => $chat, 'partner' => $model->reciever));
        }

}
