<?php

class BannerController extends Controller {

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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'ImageDelete'),
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
                $model = new Banner;

                if (isset($_POST['Banner'])) {
                        $model->attributes = $_POST['Banner'];
                        $banner = CUploadedFile::getInstance($model, 'banner');
                        $big = CUploadedFile::getInstance($model, 'big_image');

                        if (isset($banner)) {
                                $model->banner = $banner->extensionName;
                        }


                        if ($model->save()) {
                                if ($model->banner != "") {
                                        $this->ImageUpload($banner, 'banner', $model->id, 'banner');
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

                if (isset($_POST['Banner'])) {
                        $bannerImage = $model->banner;
                        $model->attributes = $_POST['Banner'];
                        $banner = CUploadedFile::getInstance($model, 'banner');

                        if (isset($banner)) {
                                $model->banner = $banner->extensionName;
                        } else {
                                $model->banner = $bannerImage;
                        }


                        if ($model->save()) {
                                if ($model->banner != "") {
                                        $this->ImageUpload($banner, 'banner', $model->id, 'banner');
                                }

                                $this->redirect(array('admin'));
                        }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionImageDelete() {
                if (isset($_GET['id'], $_GET['type'])) {
                        $id = $_GET['id'];

                        $type = $_GET['type'];
                        switch ($type) {
                                case "banner":
                                        $img_type = "banner";
                                        break;
                                case "small":
                                        $img_type = "small_image";
                                        break;
                                case "big":
                                        $img_type = "big_image";
                                        break;
                        }
                        $model = $this->loadModel($id);
                        $image = $model->$img_type;
                        $path = Yii::app()->basePath . '/../uploads/static_pages/' . $model->id . '/' . $type . '.' . $image;
                        unlink($path);
                        $model->$img_type = '';
                        $model->save(false);
                        $this->redirect(Yii::app()->baseUrl . '/admin.php/staticPage/update/id/' . $model->id);
                }
        }

        public function ImageUpload($uploadedFile, $folder, $id, $name) {
                if (isset($uploadedFile)) {

                        if (Yii::app()->basePath . '/../uploads') {
                                chmod(Yii::app()->basePath . '/../uploads', 0777);

                                if (!is_dir(Yii::app()->basePath . '/../uploads/' . $folder . '/'))
                                        mkdir(Yii::app()->basePath . '/../uploads/' . $folder . '/');
                                chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/', 0777);

                                if (!is_dir(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/'))
                                        mkdir(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/');
                                chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/', 0777);
                                if ($uploadedFile->saveAs(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName, 0777);
                                        return true;
                                } else {
                                        return false;
                                }
                        } else {
                                return false;
                        }
                } else {
                        return false;
                }
        }

        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('Banner');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new Banner('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Banner']))
                        $model->attributes = $_GET['Banner'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Banner the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Banner::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Banner $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
