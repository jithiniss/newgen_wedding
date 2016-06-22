<?php

class UserDetailsController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['admin'])) {
                        //Yii::app()->user->setFlash('session_expired', "Session expired please login again !");
                        //$this->redirect(Yii::app()->baseUrl . '/admin.php/site/index');
                }
        }

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
                $model = new UserDetails('admin_create');
                // $this->performAjaxValidation($model);
                if (isset($_POST['UserDetails'])) {
                        $model = $this->setValues($model, $_POST['UserDetails']);
                        $image = CUploadedFile::getInstance($model, 'photo');
                        if ($model->validate()) {
                                $transaction = Yii::app()->db->beginTransaction();
                                try {
                                        $model->save();
                                        $this->userId($model->id)->save();
                                        if (!$this->uploadFiles($model->id, $image)) {
                                                throw new CHttpException(403, 'Forbidden');
                                        }
                                        $this->partnerDetails($model->id)->save(false);
                                        $this->userPlan($model->id)->save(false);
                                        $transaction->commit();
                                        $this->redirect('admin');
                                } catch (Exception $e) {
                                        $transaction->rollback();
                                        Yii::app()->user->setFlash('error', $e->getMessage());
                                }
                        }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        public function uploadFiles($id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'user', $folder, $id, 'profile');
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
//                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = UserDetails::model()->findByPk($id);
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

        public function userId($id) {
                $model = UserDetails::model()->findByPk($id);
                $model->user_id = 'NG' . $model->id;
                return $model;
        }

        public function partnerDetails($id) {
                $user_details = UserDetails::model()->findByPk($id);
                if (!empty($user_details)) {
                        $age = date('Y') - date('Y', strtotime($user_details->dob));
                }
                $model = new PartnerDetails;
                $model->user_id = $id;
                if ($user_details->gender == 1) {
                        $model->age_from = 18;
                        $model->age_to = $age;
                } else if ($user_details->gender == 2) {
                        $model->age_from = $age;
                }
                $model->religion = $user_details->religion;
                return $model;
        }

        public function userPlan($id) {
                $user_details = UserDetails::model()->findByPk($id);
                $plan_details = Plans::model()->findByPk($user_details->plan_id);
                $model = new UserPlans;
                $model->attributes = $plan_details->attributes;
                $model->view_contact_left = $plan_details->view_contact;
                $model->send_message_left = $plan_details->send_message;
                $model->number_of_days_left = $plan_details->number_of_days;
                $model->user_id = $id;
                return $model;
        }

        public function setValues($model, $post) {
                $model->attributes = $post;
                $model->setAttribute('about_me', $post['about_me']);
                $model->dob = $model->dob_year . '-' . $model->dob_month . '-' . $model->dob_day;
                $model->mob_num_verification = 0;
                $model->register_step = 5;
                $model->last_login = date('Y-m-d H:i:s');
                $model->created_by = 1;
                $model->profile_approval = 1;
                $model->image_approval = 1;
                // $model->user_id = rand(100, 100000);
                $model->cb = Yii::app()->session['admin']['id'];
                $model->ub = Yii::app()->session['admin']['id'];
                $model->doc = date('Y-m-d');
                return $model;
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
                $photo = $model->photo;
                if (isset($_POST['UserDetails'])) {
                        $model = $this->setValues($model, $_POST['UserDetails']);
                        $image = CUploadedFile::getInstance($model, 'photo');
                        if (!isset($image)) {
                                $model->photo = $photo;
                                $model->save();
                        } else {
                                if (!$this->uploadFiles($model->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
                                }
                        }
                        $this->redirect(array('admin'));
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

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('UserDetails');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new UserDetails('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['UserDetails']))
                        $model->attributes = $_GET['UserDetails'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return UserDetails the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = UserDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param UserDetails $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-details-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
