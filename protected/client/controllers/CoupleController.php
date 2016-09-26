<?php

class CoupleController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionCoupleLogin() {
                if (isset(Yii::app()->session['couple'])) {
                        $this->redirect(array('home'));
                } else {
                        $model = new CoupleDetails();
                        if (isset($_POST['CoupleDetails'])) {
                                $login = CoupleDetails::model()->findByAttributes(array('bride_id' => $_POST['CoupleDetails']['bride_id'], 'groom_id' => $_POST['CoupleDetails']['groom_id'], 'couple_password' => $_POST['CoupleDetails']['couple_password']));
                                if (!empty($login)) {
                                        Yii::app()->session['couple'] = $login;
                                        if ($login->status == 0) {
                                                Yii::app()->user->setFlash('login_list', "Access Denied.Contact Newgen Wedding");
                                        } else {
                                                Yii::app()->session['couple'] = $login;
                                                Yii::app()->user->setFlash('emailverify', null);
                                                $this->redirect(array('Home'));
                                        }
                                } else {
                                        Yii::app()->user->setFlash('login_error', "Newgen wedding userid  or password invalid.Try again");
                                        $this->redirect(array('CoupleLogin'));
                                }
                                $this->redirect(array('Home'));
                        }
                }
                $this->render('login', array('model' => $model));
        }

        public function actionRegister() {
                $model = new CoupleDetails;
                if (isset($_POST['CoupleDetails'])) {
                        $model->attributes = $_POST['CoupleDetails'];
                        $model->status = 1;
                        $model->doc = date('Y-m-d');
                        $bride = UserDetails::model()->find(['condition' => '( user_id = "' . $model->bride_id . '") and password = "' . $model->bride_password . '" ']);
                        $groom = UserDetails::model()->find(['condition' => '( user_id = "' . $model->groom_id . '") and password = "' . $model->bride_password . '" ']);
                        if ($bride == '' || $bride == NULL || $groom == '' || $groom == NULL) {
                                Yii::app()->user->setFlash('register_error1', "Invalid Bride Details or Groom Details. Try again later..");
                                $this->redirect(array('register'));
                        } else {
                                if ($model->validate()) {
                                        if ($model->save()) {
//                                                $this->SuccessMail($model, $bride, $groom);
//                                                $this->SuccessMailAdmin($model, $bride, $groom, 1);
                                                Yii::app()->user->setFlash('success', " You are registered successfully!!! ");
                                                $this->redirect(array('CoupleLogin'));
                                        }
                                } else {
                                        Yii::app()->user->setFlash('error', " Error Occured!!! ");
                                }
                        }
                }
                $this->render('register', array('model' => $model));
        }

//        public function SuccessMail($model, $bride, $groom) {
//                Yii::import('user.extensions.yii-mail.YiiMail');
//                $message = new YiiMailMessage;
//                $message->view = "_couple_register_user_mail";
//                $params = array('model' => $model, 'bride' => $bride, 'groom' => $groom);
//                $message->subject = 'Welcome To Newgen Wedding';
//                $message->setBody($params, 'text/html');
//                $message->addTo($bride->email, $groom->email);
//                $message->from = 'newgenwedding.com';
//                if (Yii::app()->mail->send($message)) {
//
//                } else {
//                        echo 'message not send';
//                        exit;
//                }
//        }
//        public function SuccessMailAdmin($model, $bride, $groom, $id) {
//                $email = AdminUsers::model()->findByAttributes(array('status' => 1), array('limit' => 1));
//                Yii::import('user.extensions.yii-mail.YiiMail');
//                $message = new YiiMailMessage;
//                $message->view = "_couple_register_admin_mail";
//                $params = array('model' => $model, 'bride' => $bride, 'groom' => $groom, 'id' => $id);
//                $message->subject = 'Newgen wedding';
//                $message->setBody($params, 'text/html');
//                $message->addTo($email->email);
//                $message->from = 'newgenwedding.com';
//                if (Yii::app()->mail->send($message)) {
////            echo 'message send';
////            exit;
//                } else {
//                        echo 'message not send';
//                        exit;
//                }
//        }



        public function actionHome() {
                if (isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] != '') {
                        $model = CoupleDetails::model()->findByPk(Yii::app()->session['couple']['id']);
                        $adduploads = CoupleUploads::model()->findAllByAttributes(array(), array('order' => 'id DESC'));
                        $this->render('home', array('model' => $model, 'adduploads' => $adduploads));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionMyProfile() {
                if (isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] != '') {
                        $post = new CoupleUploads;
                        $model = CoupleDetails::model()->findByPk(Yii::app()->session['couple']['id']);
                        $this->render('myaccount', array('model' => $model, 'post' => $post));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionAddNewPost() {
                if (isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] != '') {
                        $addedpost = new CoupleUploads;
                        if (isset($_POST['CoupleUploads'])) {
                                $addedpost->attributes = $_POST['CoupleUploads'];
                                $file = CUploadedFile::getInstanceByName('file');
                                if (isset($file)) {
                                        $addedpost->file = $file->extensionName;
                                }
                                $addedpost->cb = Yii::app()->session['couple']['id'];
                                $addedpost->texts = $_POST['your_text'];
                                $addedpost->file_type = $_POST['file_type'];
                                $addedpost->comment = $_POST['comments'];
                                $addedpost->status = 1;
                                $addedpost->doc = date('Y-m-d H-i-s');
                                $addedpost->title = $_POST['title'];
                                if ($addedpost->save(FALSE)) {
                                        if (!empty($addedpost->file)) {

                                                if (!is_dir(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb)) {
                                                        mkdir(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb);
                                                }
                                                chmod(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb, 0777);
                                                if (!is_dir(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb . "/files")) {
                                                        mkdir(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb . "/files");
                                                }
                                                chmod(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb . "/files", 0777);
                                                $file->saveAs(Yii::app()->basePath . "/../uploads/couple/" . $addedpost->cb . "/files/" . $addedpost->id . "_" . "." . $file->extensionName);
                                        }
                                        Yii::app()->user->setFlash('success', " Your Posts are uploaded successfully!!! ");
                                        $this->redirect(array('Home'));
                                }
                        }
                        $this->render('home', array('model' => $model, 'addedpost' => $addedpost));
                } else {

                }
        }

        public function actionAccountSettings() {
                if (!isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] == '') {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/couple/CoupleLogin');
                } else {
                        $id = Yii::app()->session['couple']['id'];
                        $model = $this->loadModel($id);
                        $photo = $model->photo;
                        if (isset($_POST['CoupleDetails'])) {
                                $model->attributes = $_POST['CoupleDetails'];
                                $model->doc = date('Y-m-d');
                                $model->cb = Yii::app()->session['couple']['id'];
                                $image = CUploadedFile::getInstance($model, 'photo');
                                if (!isset($image)) {
                                        $model->photo = $photo;
                                }

                                if ($model->save()) {
                                        if (isset($image)) {
                                                if (!$this->uploadMyPic($model->id, $image)) {
                                                        throw new CHttpException(403, 'Forbidden');
                                                }
                                        }
                                        $this->redirect(array('couple/home'));
                                }
                        }
                }
                $this->render('accountsettings', array('model' => $model));
        }

        public function actionChangePassword() {
                if (!isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] == '') {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/couple/CoupleLogin');
                } else {
                        $model = CoupleDetails::model()->findByPk(Yii::app()->session['couple']['id']);
                        $model->setScenario('changePwd');
                        if (isset($_POST['CoupleDetail'])) {
                                if ($model->couple_password == $_POST['current_pass']) {
                                        $model->couple_password = $_POST['new_password'];
                                        $model->confirm_password = $_POST['confirm_pass'];
                                        if ($model->save()) {
                                                Yii::app()->user->setFlash('success', "Successfully Updated your password!!!");
                                                $this->redirect('changePassword');
                                        } else {
                                                Yii::app()->user->setFlash('error', "Error Occured..");
                                                $this->redirect('changePassword');
                                        }
                                } else {
                                        Yii::app()->user->setFlash('pass_error', " Current Password Incorrect ");
                                        $this->redirect('changePassword');
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Error Occured..");
                                $this->redirect('changePassword');
                        }
                }
                $this->render('change_password', array('model' => $model));
        }

        public function actionLogout() {
                Yii::app()->user->logout();
                unset(Yii::app()->session['couple']);
                unset($_SESSION);
                $this->redirect(Yii::app()->homeUrl);
        }

        public function loadModel($id) {
                $model = CoupleDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function loadModelPassword($id) {
                $model = CoupleDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function uploadMyPic($id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/couple/' . $folder . '/' . $id . '/profile/*'); // get all file names
                        foreach ($files as $file) { // iterate files
                                if (is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'couple', $folder, $id, 'profile');

                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
                        $dimension[1] = array('width' => '31', 'height' => '49', 'name' => 'thumb');
//                        $dimension[2] = array('width' => '72', 'height' => '79', 'name' => 'similarprofile');
//                        $dimension[3] = array('width' => '163', 'height' => '212', 'name' => 'profile');
//                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = CoupleDetails::model()->findByPk($id);
                                $model->photo = $filename . '.' . $image->extensionName;
                                if ($model->save()) {
                                        return true;
                                } else {
                                        return FALSE;
                                }
                        } else {
                                return FALSE;
                        }
                }
        }

        public function actionLike() {
                $model = new CoupleUploadReport;
                $like = CoupleUploadReport::model()->findByAttributes(array('like_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $_POST['couple_upload_id']));
                if (empty($like)) {
                        $model->couple_id = $_POST['couple_id'];
                        $model->couple_upload_id = $_POST['couple_upload_id'];
                        $model->like_id = $_POST['like_id'];
                        $model->like = 1;
                        $model->doc = date('Y-m-d H-i-s');
                        if ($model->save()) {
                                $this->redirect('home');
                        }
                } else {
                        $like->like = 1;
                        if ($like->save()) {
                                $this->redirect('home');
                        }
                }
        }

        public function actionDislike() {
                $model = new CoupleUploadReport;
                $dislike = CoupleUploadReport::model()->findByAttributes(array('dislike_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $_POST['couple_upload_id']));
                if (empty($dislike)) {
                        $model->couple_id = $_POST['couple_id'];
                        $model->couple_upload_id = $_POST['couple_upload_id'];
                        $model->dislike_id = $_POST['dislike_id'];
                        $model->dislike = 1;
                        $model->doc = date('Y-m-d H-i-s');
                        if ($model->save()) {
                                $this->redirect('home');
                        }
                } else {
                        $dislike->dislike = 1;
                        if ($dislike->save()) {
                                $this->redirect('home');
                        }
                }
        }

        public function actionComment() {
                $model = new CoupleUploadReport;
                $model->comment_id = Yii::app()->session['couple']['id'];
                $model->comment = $_POST['comment_box'];
                $model->doc = date('Y-m-d H-i-s');
                if ($model->save()) {
                        $this->redirect('home');
                }
        }

}
