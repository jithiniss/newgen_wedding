<?php

class TellUsStoryController extends Controller {

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
                        'actions' => array('index', 'view', 'create', 'admin', 'delete', 'approve', 'notapprove'),
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
                $model = new TellUsStory('create');

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['TellUsStory'])) {
                        $model->attributes = $_POST['TellUsStory'];
                        if ($model->validate()) {
                                $image = CUploadedFile::getInstance($model, 'image');
                                if (isset($image)) {
                                        $model->image = $image->extensionName;
                                        $model->admin_approval = 1;
                                }
                                if ($model->save()) {
                                        if ($model->image != "") {
                                                $this->ImageUpload($image, 'wedding', $model->id, 'wedding');
                                                $this->redirect(Yii::app()->createUrl("/TellUsStory/admin"));
                                        }
                                }
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
//        public function actionUpdate($id) {
//                $model = $this->loadModel($id);
//
//                // Uncomment the following line if AJAX validation is needed
//                // $this->performAjaxValidation($model);
//
//                if (isset($_POST['TellUsStory'])) {
//                        $model->attributes = $_POST['TellUsStory'];
//                        if ($model->save())
//                                $this->redirect(array('view', 'id' => $model->id));
//                }
//
//                $this->render('update', array(
//                    'model' => $model,
//                ));
//        }

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

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('TellUsStory');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new TellUsStory('search');
//                echo 'oops' . '<pre>';
//                print_r($model);
//                exit;
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['TellUsStory']))
                        $model->attributes = $_GET['TellUsStory'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        public function actionApprove($id) {
                $model = $this->loadModel($id);
                $model->admin_approval = '1';
                if ($model->save()) {
                        $this->redirect(Yii::app()->createUrl("/TellUsStory/admin"));
                }
        }

        public function actionNotapprove($id) {
                $model = $this->loadModel($id);
                $model->admin_approval = '0';
                if ($model->save()) {
                        $this->redirect(Yii::app()->createUrl("/TellUsStory/admin"));
                }
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return TellUsStory the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = TellUsStory::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param TellUsStory $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'tell-us-story-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
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

                                        $resize = new EasyImage(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName);
                                        $resize->resize(246, 172);
                                        $resize->save(Yii::app()->basePath . '/../uploads/' . $folder . '/' . $id . '/' . $name . '.' . $uploadedFile->extensionName);

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

}
