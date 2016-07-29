<?php

class ChatController extends Controller {

        public function actionIndex() {
                $this->render('index');
        }

        function time_elapsed_string($datetime, $full = false) {
                date_default_timezone_set('Asia/Kolkata');
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);


                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                                unset($string[$k]);
                        }
                }

                if (!$full)
                        $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

        public function actionChatImage() {

                $myProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $chat = new ChatBox;
                $chat->sender = Yii::app()->session['user']['id'];
                $chat->status = 1;
//                $reciever = Yii::app()->params['partnerid'];
                $reciever = $_POST['ChatBox']['reciever'];
                if (!empty($myProfile)) {
                        if (isset($_FILES['ChatBox'])) {
                                $chat->reciever = $reciever;
                                $chat->save();
                                $new_msg = ChatBox::model()->findAllByAttributes(array('id' => $chat->id));
                                $image = CUploadedFile::getInstance($chat, 'feild1');
                                $up_image = $this->uploadFiles($chat->id, $image);

                                $this->renderPartial('_chat_detail', array('chats' => $new_msg, 'partner' => $reciever, 'up_image' => $up_image));
                        }
//                        $this->render('my_profile', array('myProfile' => $myProfile, 'partnerDetails' => $partnerDetails, 'userInterest' => $userInterest));
                }
        }

        public function uploadFiles($id, $image) {
                if ($image != "") {

                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);

                        // $files = Yii::app()->basePath . '/../uploads/chat/' . $folder . '/' . $id . '/chatimage/'; // get all file names
//                        foreach ($files as $file) { // iterate files
//                                if (is_file($file)) {
//                                        unlink($file); // delete file
//                                }
//                        }

                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'chat', $folder, $id, 'chatimage');
                        $dimension[0] = array('width' => '300', 'height' => '200', 'name' => 'chat');

                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = ChatBox::model()->findByPk($id);
                                $model->feild1 = $filename . '.' . $image->extensionName;

                                if ($model->save()) {
                                        return "<img src = '" . Yii::app()->baseUrl . '/uploads/chat/' . $folder . '/' . $id . '/chatimage/' . $filename . '.' . $image->extensionName . "' width = '100px;'/>"; // get all file names
                                        //return true;
                                } else {
                                        return FALSE;
                                }
                        } else {
                                return FALSE;
                        }
                }
        }

        public function actionChating($partnerid) {
                if ($partnerid != "") {
                        $partner = UserDetails::model()->findByAttributes(array('user_id' => $partnerid))->id;
                        $chat = ChatBox::model()->findAll(array('order' => 'date ASC', 'condition' => "(sender = " . Yii::app()->session['user']['id'] . " AND reciever = " . $partner . " AND status = 1 ) OR (sender = " . $partner . " AND reciever = " . Yii::app()->session['user']['id'] . " AND status = 1)"));
                } else {
                        $partner = "";
                        $chat = "";
                }
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

        public function actionNewMessage() {
                $id = $_REQUEST['id'];
                $chat = ChatBox::model()->findAll(array('order' => 'date ASC', 'condition' => "sender = " . $_REQUEST['partner_id'] . " AND reciever = " . Yii::app()->session['user']['id'] . " AND id > " . $id));
                if (count($chat) > 0) {
                        echo $this->renderPartial('_chat_detail_ajax', array('chats' => $chat, 'partner' => $_REQUEST['partner_id']));
                } else {
                        echo 'failed';
                }
        }

}
