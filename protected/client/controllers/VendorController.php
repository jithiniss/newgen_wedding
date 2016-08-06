<?php

class VendorController extends Controller {

        public function actionIndex() {

                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->redirect(array('home'));
                } else {
                        $login = new VendorDetails();

                        if (isset($_REQUEST['VendorDetails'])) {

                                $vendor_login = VendorDetails::model()->find(['condition' => '(email = "' . $_REQUEST['VendorDetails']['email'] . '" or user_name = "' . $_REQUEST['VendorDetails']['email'] . '") and  password = "' . $_REQUEST['VendorDetails']['password'] . '" ']);

                                if (!empty($vendor_login)) {
                                        if ($vendor_login->approval_status == 0) {
                                                Yii::app()->user->setFlash('vendor_login_error', "<h3>Approval Pending</h3>.Please wait for Admin Approval");
                                        } else {
                                                if ($vendor_login->status == 0) {
                                                        Yii::app()->user->setFlash('vendor_login_error', "<h3>Access Denied</h3>.Please contact customer care");
                                                } else {
                                                        Yii::app()->session['vendor'] = $vendor_login;

                                                        $this->redirect(array('home'));
                                                }
                                        }
                                } else {
                                        $login->addError('email', '');
                                        $login->addError('password', '');
                                        Yii::app()->user->setFlash('vendor_login_error', "Username or password invalid.Try again");
                                }
                        }



                        $this->render('index', array('login' => $login));
                }
        }

        public function actionRegister() {

                if (!isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] == NULL && Yii::app()->session['vendor'] == '') {
                        $model = new VendorDetails;
                        $this->performAjaxValidation($model, 'register-vendor-form');
                        if (isset($_POST['VendorDetails'])) {

                                $model->attributes = $_POST['VendorDetails'];
                                $model->dob = date('Y-m-d', strtotime($_POST['VendorDetails']['dob']));
                                $model->company_address = $_POST['VendorDetails']['company_address'];
                                $model->gender = $_POST['VendorDetails']['gender'];
                                $model->status = 1;
                                $model->approval_status = 0;
                                $model->doc = date('Y-m-d');

                                if ($model->save()) {
                                        Yii::app()->session['vendor'] = $model;
                                        $this->redirect(array('home'));
                                }
                        }
                        $this->render('register', array('model' => $model));
                } else {
                        $this->redirect(array('home'));
                }
        }

        public function actionHome() {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $services = VendorServices::model()->findAll(array('order' => 'id desc'));
                        $this->render('home', array('model' => $model, 'services' => $services));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionAddNewService() {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $service = new VendorServices;
                        $this->performAjaxValidation($service, 'service-form');
                        if (isset($_POST['VendorServices'])) {

                                $service->attributes = $_POST['VendorServices'];
                                $service->vendor_id = $model->id;
                                $service->status = 0;
                                $service->doc = date('Y-m-d');
                                $image = CUploadedFile::getInstance($service, 'image');
                                if ($service->save()) {
                                        $this->uploadFiles($service->id, $service->vendor_id, $image);

                                        $this->redirect(array('home'));
                                }
                        }
                        $this->render('services', array('model' => $model, 'service' => $service));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionUpdateService($id) {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $service = VendorServices::model()->findByAttributes(array('vendor_id' => $model->id, 'id' => $id));
                        if (!empty($service)) {
                                $photo = $service->image;
                                $this->performAjaxValidation($service, 'service-form');
                                if (isset($_POST['VendorServices'])) {

                                        $service->attributes = $_POST['VendorServices'];
                                        $service->vendor_id = $model->id;
                                        $service->status = 0;
                                        $service->doc = date('Y-m-d');
                                        $image = CUploadedFile::getInstance($service, 'image');
                                        if (!isset($image)) {
                                                $service->image = $photo;
                                        }
                                        if ($service->save()) {
                                                $this->uploadFiles($service->id, $service->vendor_id, $image);

                                                $this->redirect(array('home'));
                                        }
                                }
                                $this->render('services', array('model' => $model, 'service' => $service));
                        } else {
                                $this->redirect(array('home'));
                        }
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionMyProfile() {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);


                        $photo = $model->photo;
                        $this->performAjaxValidation($model, 'vendor-edit-form');
                        if (isset($_POST['VendorDetails'])) {
                                $model->attributes = $_POST['VendorDetails'];
                                $model->dob = date('Y-m-d', strtotime($_POST['VendorDetails']['dob']));
                                $model->company_address = $_POST['VendorDetails']['company_address'];
                                $model->ub = Yii::app()->session['user']['id'];
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
                                        $this->redirect(array('vendor/myProfile'));
                                }
                        }
                        $this->render('profile', array('model' => $model));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionEnquiry() {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {
                        $criteria = new CDbCriteria;
                        $criteria->condition = 'vendor_id =' . Yii::app()->session['vendor']['id'] . ' order by id desc';
                        $total = WeddingPlannerEnquiry::model()->count(array('condition' => 'vendor_id =' . Yii::app()->session['vendor']['id'] . ' order by id desc'));
                        if (!empty($total)) {
                                $pages = new CPagination($total);
                                $pages->pageSize = 4;
                                $pages->applyLimit($criteria);

                                $enquiry = WeddingPlannerEnquiry::model()->findAll($criteria);
                        }

                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $this->render('enquiry', array('enquiry' => $enquiry, 'model' => $model, 'pages' => $pages,));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionChangePassword() {
                if (isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $old_password = $model->password;
                        $model->setScenario('changePwd');
                        $this->performAjaxValidation($model, 'vendor-change-password-form');
                        if (isset($_POST['VendorDetails'])) {

                                $model->attributes = $_POST['VendorDetails'];

                                $model->password = $_POST['VendorDetails']['repeat_password'];

                                // $model->ub = Yii::app()->session['user']['id'];
                                if ($_POST['VendorDetails']['old_password'] == $old_password) {
                                        if ($model->validate()) {
                                                $model->save(false);
                                                $model->repeat_password = '';
                                                $model->new_password = '';
                                                $model->old_password = '';
                                                Yii::app()->user->setFlash('vendor_change_success', 'Password Changed Successfully.');
                                        }
                                } else {
                                        $model->addError('old_password', 'Incorrect Current Password');
                                }
                        }

                        $this->render('change_password', array('model' => $model));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionForgotPassword() {
                if (isset($_POST['btn_submit'])) {
                        $email = $_POST['email'];
                        $user = VendorDetails::model()->findByAttributes(array('email' => $email));
                        if ($user != '') {

                                $forgot = new ForgotPassword;
                                $forgot->user_id = $user->id;
                                $forgot->code = rand(10000, 1000000);
                                $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                                $forgot->status = 1;
                                $forgot->doc = date('Y-m-d');
                                if ($forgot->save(FALSE)) {
                                        $this->SuccessMail($token, $user);
                                        Yii::app()->user->setFlash('success1', ' We’ve sent you a link to change your password');
                                        Yii::app()->user->setFlash('success2', ' We’ve sent you an email that will allow you to reset your password quickly and easily.');

//                                        $this->render('mail', array('token' => $token));
                                } else {
                                        Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                        }
                }
                $this->render('forgot_password');
        }

        public function SuccessMail($token, $vendor) {

                $user = $vendor->email;
                //$user = 'shahana@intersmart.in';
                $user_subject = 'Please Reset Your Password';
                $user_message = $this->renderPartial('mail/_forgot_password_mail_user', array('token' => $token, 'vendor' => $vendor), true);


                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // More headers
                $headers .= 'From: <no-reply@newgen.com/>' . "\r\n";
                mail($user, $user_subject, $user_message, $headers);
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
                                $pass1 = VendorDetails::model()->findByPk($id);
                                $newpass = $_POST['password1'];
                                $pass1->password = $newpass;
                                $pass1->update(array('password'));
                                if ($pass1->save()) {
                                        Yii::app()->user->setFlash('success', "Your password changed successfully. Please login");
                                        $this->redirect(array('vendor/index'));
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

        public function uploadMyPic($id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $id . '/profile/*'); // get all file names
                        foreach ($files as $file) { // iterate files
                                if (is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'vendor', $folder, $id, 'profile');

                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
//                        $dimension[1] = array('width' => '100', 'height' => '130', 'name' => 'thumb');
//                        $dimension[2] = array('width' => '72', 'height' => '79', 'name' => 'similarprofile');
//                        $dimension[3] = array('width' => '163', 'height' => '212', 'name' => 'profile');
//                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = VendorDetails::model()->findByPk($id);
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

        public function uploadFiles($id, $vendor_id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        if (!is_dir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/', 0777);
                        if (!is_dir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/', 0777);
                        $files = glob(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/*'); // get all file names
                        foreach ($files as $file) { // iterate files
                                if (is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'vendor', $folder, $vendor_id, 'services', $id);

                        $dimension[0] = array('width' => '246', 'height' => '172', 'name' => 'thumb');
                        $dimension[1] = array('width' => '809', 'height' => '342', 'name' => 'main');
                        $dimension[2] = array('width' => '194', 'height' => '136', 'name' => 'thumb2');
                        $dimension[3] = array('width' => '271', 'height' => '263', 'name' => 'similar');
//                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = VendorServices::model()->findByPk($id);
                                $model->image = $filename . '.' . $image->extensionName;
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

        public function actionLogout() {
                unset(Yii::app()->session['vendor']);
                Yii::app()->session['vendor'] = NULL;
                $_SESSION['vendor'] = NULL;
                $this->redirect(array('vendor/index'));
        }

        protected function performAjaxValidation($model, $model_id) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
