<?php

class VendorDetailsController extends Controller {

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
        public function actionCreate() {
                $model = new VendorDetails;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['VendorDetails'])) {
                        $model->attributes = $_POST['VendorDetails'];
                        $model->dob = date('Y-m-d', strtotime($_POST['VendorDetails']['dob']));
                        $model->company_address = $_POST['VendorDetails']['company_address'];
                        $model->cb = Yii::app()->session['admin']['id'];
                        $model->doc = date('Y-m-d');
                        $image = CUploadedFile::getInstance($model, 'photo');
                        if($model->save()) {
                                $this->uploadFiles($model->id, $image);
                                $this->redirect(array('admin'));
                        }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
                $model = $this->loadModel($id);
                $photo = $model->photo;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

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

                                        if(!$this->uploadFiles($model->id, $image)) {
                                                throw new CHttpException(403, 'Forbidden');
                                        }
                                }

                                $this->redirect(array('update', 'id' => $model->id));
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        public function uploadFiles($id, $image) {
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
                $dataProvider = new CActiveDataProvider('VendorDetails');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new VendorDetails('search');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['VendorDetails']))
                        $model->attributes = $_GET['VendorDetails'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return VendorDetails the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = VendorDetails::model()->findByPk($id);
                if($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param VendorDetails $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'vendor-details-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
