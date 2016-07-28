<?php

class VendorServicesController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        /**
         * @return array action filters
         */
        public function filters() {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
                );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
                return array(
                    array('allow', // allow all users to perform 'index' and 'view' actions
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                        'users' => array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update'),
                        'users' => array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('admin', 'delete'),
                        'users' => array('admin'),
                    ),
                    array('deny', // deny all users
                        'users' => array('*'),
                    ),
                );
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */
        public function actionView($id) {
                $this->render('view', array(
                    'model' => $this->loadModel($id),
                ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate($id) {
                $vendor = VendorDetails::model()->findByPk($id);
                if(!empty($vendor)) {
                        $model = new VendorServices;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                        if(isset($_POST['VendorServices'])) {
                                $model->attributes = $_POST['VendorServices'];
                                $model->vendor_id = $id;
                                $model->cb = Yii::app()->session['admin']['id'];
                                $model->doc = date('Y-m-d');
                                $image = CUploadedFile::getInstance($model, 'image');
                                if($model->save()) {
                                        $this->uploadFiles($model->id, $model->vendor_id, $image);

                                        $this->redirect(array('admin', 'id' => $model->vendor_id));
                                }
                        }

                        $this->render('create', array(
                            'model' => $model,
                        ));
                } else {
                        $this->redirect(array('//site/out'));
                }
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
                $model = $this->loadModel($id);
                $photo = $model->image;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['VendorServices'])) {
                        $model->attributes = $_POST['VendorServices'];
                        $model->ub = Yii::app()->session['admin']['id'];
                        $image = CUploadedFile::getInstance($model, 'image');
                        if(!isset($image)) {
                                $model->image = $photo;
                        }
                        if($model->save()) {
                                $this->uploadFiles($model->id, $model->vendor_id, $image);
                                $this->redirect(array('update', 'id' => $model->id));
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
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

                        $dimension[0] = array('width' => '246', 'height' => '172', 'name' => 'thumb');
                        $dimension[1] = array('width' => '809', 'height' => '342', 'name' => 'main');
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

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('VendorServices');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin($id) {
                $vendor = VendorDetails::model()->findByPk($id);
                if(!empty($vendor)) {
                        $model = new VendorServices('search');
                        $model->unsetAttributes();  // clear any default values
                        if(isset($_GET['VendorServices']))
                                $model->attributes = $_GET['VendorServices'];
                        $model->vendor_id = $id;

                        $this->render('admin', array(
                            'model' => $model,
                        ));
                } else {
                        $this->redirect(array('//site/out'));
                }
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return VendorServices the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = VendorServices::model()->findByPk($id);
                if($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param VendorServices $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'vendor-services-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
