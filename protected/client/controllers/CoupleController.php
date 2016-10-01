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
                        $groom = UserDetails::model()->find(['condition' => '( user_id = "' . $model->groom_id . '") and password = "' . $model->groom_password . '" ']);
                        if ($bride == '' || $bride == NULL || $groom == '' || $groom == NULL) {
                                Yii::app()->user->setFlash('register_error1', "Invalid Bride Details or Groom Details. Try again later..");
                                $this->redirect(array('register'));
                        } else {
                                if ($model->validate()) {
                                        if ($model->save()) {
                                                $this->SuccessMailRegister($model);
                                                $this->SuccessMailAdmin($model, 1);
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

        public function SuccessMailRegister($model) {
                Yii::import('client.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_couple_register_user_mail";
                $params = array('model' => $model);
                $message->subject = 'Welcome To Newgen Wedding';
                $message->setBody($params, 'text/html');
                $message->addTo($model->email);
                $message->from = 'newgenwedding.com';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function SuccessMailAdmin($model, $id) {
                $email = AdminUsers::model()->findByAttributes(array('status' => 1), array('limit' => 1));
                Yii::import('client.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_couple_register_admin_mail";
                $params = array('model' => $model, 'id' => $id);
                $message->subject = 'Newgen wedding';
                $message->setBody($params, 'text/html');
                $message->addTo($email->email);
                $message->from = 'newgenwedding.com';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

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
                        $model = CoupleDetails::model()->findByPk(Yii::app()->session['couple']['id']);
                        $adduploads = CoupleUploads::model()->findAllByAttributes(array('status' => 1), array('condition' => 'cb = ' . Yii::app()->session['couple']['id'] . ' or to_friend = ' . Yii::app()->session['couple']['id'] . '', 'order' => 'id DESC'));
                        $this->render('myaccount', array('model' => $model, 'adduploads' => $adduploads));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionAddNewPost() {
                if (isset(Yii::app()->session['couple']) && Yii::app()->session['couple'] != '') {
                        $addedpost = new CoupleUploads;
                        if (isset($_POST['title'])) {
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
                                if (isset($_POST['to_friend']) != '') {
                                        $addedpost->to_friend = $_POST['to_friend'];
                                        $addedpost->to_public = 0;
                                }
                                $addedpost->to_public = 1;
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
                $dislike = CoupleUploadReport::model()->findByAttributes(array('dislike_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $_POST['couple_upload_id']));
                if (empty($like)) {
                        $model->couple_id = $_POST['couple_id'];
                        $model->couple_upload_id = $_POST['couple_upload_id'];
                        $model->like_id = $_POST['like_id'];
                        $model->like = 1;
                        $model->doc = date('Y-m-d H-i-s');
                        $model->save();
                        $dislike->delete();
                        $like_count = CoupleUploadReport::model()->findAllByAttributes(array('like' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $dislike_count = CoupleUploadReport::model()->findAllByAttributes(array('dislike' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $array = array('like_count' => count($like_count), 'dislike_count' => count($dislike_count), 'post_id' => $_POST['couple_upload_id'], 'status' => 1, 'like_tooltip' => 'You liked this', 'dislike_tooltip' => 'Disliked');
                        $json = CJSON::encode($array);
                        echo $json;
                } else {
                        $like_count = CoupleUploadReport::model()->findAllByAttributes(array('like' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $dislike_count = CoupleUploadReport::model()->findAllByAttributes(array('dislike' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $array = array('like_count' => count($like_count), 'dislike_count' => count($dislike_count), 'status' => 2, 'post_id' => $_POST['couple_upload_id'], 'like_tooltip' => 'You liked this', 'dislike_tooltip' => 'Disliked');
                        $json = CJSON::encode($array);
                        echo $json;
                        //  echo 2;
                }
        }

        public function actionDislike() {
                $model = new CoupleUploadReport;
                $dislike = CoupleUploadReport::model()->findByAttributes(array('dislike_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $_POST['couple_upload_id']));
                $like = CoupleUploadReport::model()->findByAttributes(array('like_id' => Yii::app()->session['couple']['id'], 'couple_upload_id' => $_POST['couple_upload_id']));
                if (empty($dislike)) {
                        $model->couple_id = $_POST['couple_id'];
                        $model->couple_upload_id = $_POST['couple_upload_id'];
                        $model->dislike_id = $_POST['dislike_id'];
                        $model->dislike = 1;
                        $model->doc = date('Y-m-d H-i-s');
                        $model->save();
                        $like->delete();
                        $like_count = CoupleUploadReport::model()->findAllByAttributes(array('like' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $dislike_count = CoupleUploadReport::model()->findAllByAttributes(array('dislike' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $array = array('like_count' => count($like_count), 'dislike_count' => count($dislike_count), 'status' => 1, 'post_id' => $_POST['couple_upload_id'], 'like_tooltip' => 'Like', 'dislike_tooltip' => 'You Disliked this');
                        $json = CJSON::encode($array);
                        echo $json;
                } else {
                        $like_count = CoupleUploadReport::model()->findAllByAttributes(array('like' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $dislike_count = CoupleUploadReport::model()->findAllByAttributes(array('dislike' => 1, 'couple_upload_id' => $_POST['couple_upload_id']));
                        $array = array('like_count' => count($like_count), 'dislike_count' => count($dislike_count), 'status' => 2, 'post_id' => $_POST['couple_upload_id'], 'like_tooltip' => 'Like', 'dislike_tooltip' => 'You Disliked this');
                        $json = CJSON::encode($array);
                        echo $json;
                }
        }

        public function actionComment() {
                $model = new CoupleUploadReport;
                $model->couple_id = $_POST['couple_id'];
                $model->couple_upload_id = $_POST['couple_upload_id'];
                $model->comment_id = Yii::app()->session['couple']['id'];
                $model->comment = 1;
                $model->comments = $_POST['comment'];
                $model->doc = date('Y-m-d H-i-s');
                $comments = CoupleUploadReport::model()->findAllByAttributes(array('couple_upload_id' => $_POST['couple_upload_id']), array('limit' => 3, 'order' => 'id desc'));
                if ($model->save()) {

                }
                $this->renderPartial('_coment_content', array('comments' => $comments));
        }

        public function actionForgotPassword() {
                if (isset($_POST['btn_submit'])) {
                        $email = $_POST['email'];
                        $user = CoupleDetails::model()->findByAttributes(array('email' => $email));
                        if ($user != '') {

                                $forgot = new ForgotPassword;
                                $forgot->user_id = $user->id;
                                $forgot->code = rand(10000, 1000000);
                                $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                                $forgot->status = 1;
                                $forgot->doc = date('Y-m-d');
                                if ($forgot->save(FALSE)) {
                                        $this->SuccessMail($token, $user);
                                        Yii::app()->user->setFlash('success1', ' Weâ€™ve sent you a link to change your password');
                                        Yii::app()->user->setFlash('success2', ' Weâ€™ve sent you an email that will allow you to reset your password quickly and easily.');
                                } else {
                                        Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                        }
                }
                $this->render('forgot_password');
        }

        public function SuccessMail($token, $couple) {
                $message = new YiiMailMessage;
                $message->view = "_forgot_password_mail_couple";  // view file name
                $params = array('token' => $token, 'couple' => $couple); // parameters
                $message->subject = 'Please Reset Your Password';
                $message->setBody($params, 'text/html');
                $message->addTo($couple->email);
                $message->from = 'newgenwedding@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionChangeOldPassword($token) {
                $var = base64_decode($token);
                $arr = explode(':', $var);

                $id = $arr[0];
                $token2 = $arr[1];
                $token_test = ForgotPassword::model()->findByAttributes(array('code' => $token2, 'user_id' => $id));

                if ($token_test != '') {
                        Yii::app()->session['frgt_venderid'] = $id;
                        $token_test->delete();
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('ForgotPassword'));
                }
        }

        public function actionNewpassword() {
                if (isset(Yii::app()->session['frgt_venderid']) && Yii::app()->session['frgt_venderid'] != '') {
                        if (isset($_POST['btn_submit'])) {
                                $id = Yii::app()->session['frgt_venderid'];
                                $pass1 = CoupleDetails::model()->findByPk($id);
                                $newpass = $_POST['password1'];
                                $pass1->couple_password = $newpass;
                                $pass1->update(array('couple_password'));
                                if ($pass1->save()) {
                                        Yii::app()->user->setFlash('success', "Your password changed successfully. Please login");
                                        $this->redirect(array('couple/couplelogin'));
                                } else {

                                        Yii::app()->user->setFlash('error', "Inavlid user,..");
                                }
                                Yii::app()->session['frgt_venderid'] = '';
                                $_SESSION['frgt_venderid'] = '';
                        }
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('ForgotPassword'));
                }
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/beta';
        }

}
