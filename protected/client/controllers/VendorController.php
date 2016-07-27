<?php

class VendorController extends Controller {

        public function actionIndex() {

                if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->redirect(array('home'));
                } else {
                        $login = new VendorDetails();

                        if(isset($_REQUEST['VendorDetails'])) {

                                $vendor_login = VendorDetails::model()->find(['condition' => '(email = "' . $_REQUEST['VendorDetails']['email'] . '" or user_name = "' . $_REQUEST['VendorDetails']['email'] . '") and  password = "' . $_REQUEST['VendorDetails']['password'] . '" ']);

                                if(!empty($vendor_login)) {
                                        if($vendor_login->approval_status == 0) {
                                                Yii::app()->user->setFlash('vendor_login_error', "<h3>Approval Pending</h3>.Please wait for Admin Approval");
                                        } else {
                                                if($vendor_login->status == 0) {
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

                if(!isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] == NULL && Yii::app()->session['vendor'] == '') {
                        $model = new VendorDetails;
                        $this->performAjaxValidation($model, 'register-vendor-form');
                        if(isset($_POST['VendorDetails'])) {

                                $model->attributes = $_POST['VendorDetails'];
                                $model->dob = date('Y-m-d', strtotime($_POST['VendorDetails']['dob']));
                                $model->company_address = $_POST['VendorDetails']['company_address'];
                                $model->gender = $_POST['VendorDetails']['gender'];
                                $model->status = 1;
                                $model->approval_status = 0;
                                $model->doc = date('Y-m-d');

                                if($model->save()) {
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
                if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->layout = '//layouts/main_vendor';
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $services = VendorServices::model()->findAll();
                        $this->render('home', array('model' => $model, 'services' => $services));
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function actionAddNewService() {
                if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->layout = '//layouts/main_vendor';
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $service = new VendorServices;
                        $this->performAjaxValidation($service, 'service-form');
                        if(isset($_POST['VendorServices'])) {

                                $service->attributes = $_POST['VendorServices'];
                                $service->vendor_id = $model->id;
                                $service->status = 0;
                                $service->doc = date('Y-m-d');
                                $image = CUploadedFile::getInstance($service, 'image');
                                if($service->save()) {
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
                if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->layout = '//layouts/main_vendor';
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);
                        $service = VendorServices::model()->findByAttributes(array('vendor_id' => $model->id, 'id' => $id));
                        if(!empty($service)) {
                                $photo = $service->image;
                                $this->performAjaxValidation($service, 'service-form');
                                if(isset($_POST['VendorServices'])) {

                                        $service->attributes = $_POST['VendorServices'];
                                        $service->vendor_id = $model->id;
                                        $service->status = 0;
                                        $service->doc = date('Y-m-d');
                                        $image = CUploadedFile::getInstance($service, 'image');
                                        if(!isset($image)) {
                                                $service->image = $photo;
                                        }
                                        if($service->save()) {
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
                if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') {

                        $this->layout = '//layouts/main_vendor';
                        $model = VendorDetails::model()->findByPk(Yii::app()->session['vendor']['id']);

                        if(!empty($model)) {
                                $photo = $model->photo;
                                $this->performAjaxValidation($model, 'vendor-edit-form');
                                if(isset($_POST['VendorDetails'])) {
                                        $model->attributes = $_POST['VendorDetails'];
                                        $model->dob = date('Y-m-d', strtotime($_POST['VendorDetails']['dob']));
                                        $model->company_address = $_POST['VendorDetails']['company_address'];
                                        $model->ub = Yii::app()->session['admin']['id'];
                                        $image = CUploadedFile::getInstance($model, 'photo');
                                        if(!isset($image)) {
                                                $model->photo = $photo;
                                        }
                                        if($model->save()) {
                                                if(isset($image)) {

                                                        if(!$this->uploadMyPic($model->id, $image)) {
                                                                throw new CHttpException(403, 'Forbidden');
                                                        }
                                                }
                                                $this->redirect(array('vendor/myProfile'));
                                        }
                                }
                                $this->render('profile', array('model' => $model));
                        } else {
                                $this->redirect(array('home'));
                        }
                } else {
                        $this->redirect(array('logout'));
                }
        }

        public function uploadMyPic($id, $image) {
                if($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $id . '/profile/*'); // get all file names
                        foreach($files as $file) { // iterate files
                                if(is_file($file)) {
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
                        if(Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = VendorDetails::model()->findByPk($id);
                                $model->photo = $filename . '.' . $image->extensionName;
                                if($model->save()) {
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
                if($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        if(!is_dir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/', 0777);
                        if(!is_dir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/', 0777);
                        $files = glob(Yii::app()->basePath . '/../uploads/vendor/' . $folder . '/' . $vendor_id . '/services/' . $id . '/*'); // get all file names
                        foreach($files as $file) { // iterate files
                                if(is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'vendor', $folder, $vendor_id, 'services', $id);

                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
//                        $dimension[1] = array('width' => '100', 'height' => '130', 'name' => 'thumb');
//                        $dimension[2] = array('width' => '72', 'height' => '79', 'name' => 'similarprofile');
//                        $dimension[3] = array('width' => '163', 'height' => '212', 'name' => 'profile');
//                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if(Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = VendorServices::model()->findByPk($id);
                                $model->image = $filename . '.' . $image->extensionName;
                                if($model->save()) {
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
                if(isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
