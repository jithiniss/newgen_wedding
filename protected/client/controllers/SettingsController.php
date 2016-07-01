<?php

class SettingsController extends Controller {

        public function init() {
                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionIndex() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $account = UserDetails::model()->findByPk($user_id, array('select' => 'email,password,contact_number,address,country,city,state,zip_code'));

                        $this->render('index', ['account' => $account]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionEditcontact() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('contactupdate');
                        if (isset($_POST['UserDetails'])) {
                                if ($model->validate()) {
                                        $model->contact_number = $_POST['UserDetails']['contact_number'];
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
                        }
                        $this->render('contact', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionChangepassword() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('changePwd');
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                if ($model->validate()) {
                                        $model->password = $_POST['UserDetails']['repeat_password'];
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
//                                print_r($model->getErrors());
                        }
                        $this->render('password', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionChangeaddress() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $model = $this->loadModel($user_id);
                        $model->setScenario('addressupdate');
                        if (isset($_POST['UserDetails'])) {
                                $model->attributes = $_POST['UserDetails'];
                                if ($model->validate()) {
                                        $model->ub = $user_id;
                                        if ($model->save()) {
                                                $this->redirect(array('index'));
                                        }
                                }
//                                print_r($model->getErrors());
                        }
                        $this->render('address', ['account' => $model]);
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function loadModel($id) {
                $model = UserDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        // Uncomment the following methods and override them if needed
        /*
          public function filters()
          {
          // return the filter configuration for this controller, e.g.:
          return array(
          'inlineFilterName',
          array(
          'class'=>'path.to.FilterClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }

          public function actions()
          {
          // return external action classes, e.g.:
          return array(
          'action1'=>'path.to.ActionClass',
          'action2'=>array(
          'class'=>'path.to.AnotherActionClass',
          'propertyName'=>'propertyValue',
          ),
          );
          }
         */
}
