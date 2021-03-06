<?php

class MasterServicesController extends Controller {

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
                $model = new MasterServices;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['MasterServices'])) {
                        $model->attributes = $_POST['MasterServices'];
                        $image = CUploadedFile::getInstance($model, 'field');
                        if($model->save()) {
                                if(!$this->uploadFiles($model->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
                                }
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

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if(isset($_POST['MasterServices'])) {
                        $model->attributes = $_POST['MasterServices'];
                        $image = CUploadedFile::getInstance($model, 'field');
                        if($model->save()) {
                                if(!$this->uploadFiles($model->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
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
                        if(!is_dir(Yii::app()->basePath . '/../uploads/services/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/services/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/services/', 0777);
                        if(!is_dir(Yii::app()->basePath . '/../uploads/services/' . $id . '/')) {
                                mkdir(Yii::app()->basePath . '/../uploads/services/' . $id . '/');
                        }
                        chmod(Yii::app()->basePath . '/../uploads/services/' . $id . '/', 0777);
                        $files = glob(Yii::app()->basePath . '/../uploads/services/' . $id . '/*'); // get all file names
                        foreach($files as $file) { // iterate files
                                if(is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'services', $id);

                        $dimension[0] = array('width' => '271', 'height' => '263', 'name' => 'main');

//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if(Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = MasterServices::model()->findByPk($id);
                                $model->field = $filename . '.' . $image->extensionName;
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
                $dataProvider = new CActiveDataProvider('MasterServices');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new MasterServices('search');
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['MasterServices']))
                        $model->attributes = $_GET['MasterServices'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return MasterServices the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = MasterServices::model()->findByPk($id);
                if($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param MasterServices $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === 'master-services-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
