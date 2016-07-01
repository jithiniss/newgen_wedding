<?php

class StaticPageController extends Controller {

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
                $model = new StaticPage;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['StaticPage'])) {
                        $model->attributes = $_POST['StaticPage'];
                        $model->canonical_name = str_replace(' ', '-', $model->canonical_name);
                        $model->small_content = $_POST['StaticPage']['small_content'];
                        $model->big_content = $_POST['StaticPage']['big_content'];
                        $model->cb = Yii::app()->session['admin']['id'];
                        $model->ub = Yii::app()->session['admin']['id'];
                        $model->doc = date('Y-m-d');

                        $banner = CUploadedFile::getInstance($model, 'banner');
                        $big = CUploadedFile::getInstance($model, 'big_image');
                        $small = CUploadedFile::getInstance($model, 'small_image');

                        if (isset($banner)) {
                                $model->banner = $banner->extensionName;
                        }

                        if (isset($big)) {
                                $model->big_image = $big->extensionName;
                        }

                        if (isset($small)) {
                                $model->small_image = $small->extensionName;
                        }
                        if ($model->save()) {
                                if ($model->banner != "") {
                                        $this->ImageUpload($banner, 'static_pages', $model->id, 'banner');
                                }
                                if ($model->big_image != "") {
                                        $this->ImageUpload($big, 'static_pages', $model->id, 'big');
                                }
                                if ($model->small_image != "") {
                                        $this->ImageUpload($small, 'static_pages', $model->id, 'small');
                                }
                                if ($model->parent == '') {
                                        $update = StaticPage::model()->findByPk($model->id);
                                        $update->parent = $model->id;
                                        $update->save(false);
                                }

                                $this->redirect(array('admin'));
                        }
                }

                $this->render('create', array
                    (
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

                $bannerImage = $model->banner;
                $smallImage = $model->small_image;
                $bigImage = $model->big_image;
                if (isset($_POST['StaticPage'])) {
                        $model->attributes = $_POST['StaticPage'];
                        $model->canonical_name = str_replace(' ', '-', $model->canonical_name);
                        $model->small_content = $_POST['StaticPage']['small_content'];
                        $model->big_content = $_POST['StaticPage']['big_content'];
                        $model->ub = Yii::app()->session['admin']['id'];
                        $banner = CUploadedFile::getInstance($model, 'banner');
                        $big = CUploadedFile::getInstance($model, 'big_image');
                        $small = CUploadedFile::getInstance($model, 'small_image');

                        if (isset($banner)) {
                                $model->banner = $banner->extensionName;
                        } else {
                                $model->banner = $bannerImage;
                        }

                        if (isset($big)) {
                                $model->big_image = $big->extensionName;
                        } else {
                                $model->big_image = $bigImage;
                        }

                        if (isset($small)) {

                                $model->small_image = $small->extensionName;
                        } else {
                                $model->small_image = $smallImage;
                        }
                        if ($model->save()) {
                                if ($model->banner != "") {
                                        $this->ImageUpload($banner, 'static_pages', $model->id, 'banner');
                                }
                                if ($model->big_image != "") {
                                        $this->ImageUpload($big, 'static_pages', $model->id, 'big');
                                }
                                if ($model->small_image != "") {
                                        $this->ImageUpload($small, 'static_pages', $model->id, 'small');
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
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

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
                        $this->redirect(Yii::app()->baseUrl . '/admin.php/static/staticPage/update/id/' . $model->id);
                }
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('StaticPage');
                $this->render('index', array
                    (
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new StaticPage('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET[
                                'StaticPage']))
                        $model->attributes = $_GET

                                ['StaticPage'];

                $this->render('admin', array(
                    'model' => $model,
                ));
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

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return StaticPage the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = StaticPage::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param StaticPage $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'static-page-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
