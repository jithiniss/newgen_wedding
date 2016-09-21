<?php

require_once('vendor/autoload.php');

use Zend\Config\Factory;
use Zend\Http\PhpEnvironment\Request;
use Firebase\JWT\JWT;

class ApiClientsController extends Controller {

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
                        /* array('allow', // allow all users to perform 'index' and 'view' actions
                          'actions' => array('index', 'view'),
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
                          ), */
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
                $model = new ApiClients;
                if (isset($_POST['ApiClients'])) {
                        $model->attributes = $_POST['ApiClients'];
                        $model->client_id = $this->NewGuid();
                        $model->client_secret = $this->NewGuid();
                        $model->created_by = 1;
                        if ($model->save())
                                $this->redirect(array('view', 'id' => $model->id));
                }
                $this->render('create', array(
                    'model' => $model,
                ));
        }

        public function actionOauthToken() {
                $this->layout = null;
                header('Content-type:application/json');
                if (isset($_REQUEST['clientid']) && isset($_REQUEST['clientsecret'])) {
                        $model = ApiClients::model()->findByAttributes(array('client_id' => $_REQUEST['clientid'], 'client_secret' => $_REQUEST['clientsecret']));
                        if ($model->access_token == "") {
                                $authToken = $this->GenerateToken($model);
                                echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $authToken));
                                yii::app()->end();
                        } elseif ($model->access_token !== '') {
                                if ($this->validateToken($model->access_token)) {
                                        $authToken = $model->access_token;
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $authToken));
                                        yii::app()->end();
                                } else {
                                        $authToken = $this->GenerateToken($model);
                                        echo CJSON::encode(array('response' => 'success', 'code' => '200', 'result' => $authToken));
                                        yii::app()->end();
                                }
                        } else {
                                echo CJSON::encode(array('response' => 'error', 'code' => '401', 'result' => 'Unauthorized'));
                                yii::app()->end();
                        }
                } else {
                        echo CJSON::encode(array('response' => 'error', 'code' => '406', 'result' => 'Not Acceptable'));
                        yii::app()->end();
                }
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

                if (isset($_POST['ApiClients'])) {
                        $model->attributes = $_POST['ApiClients'];
                        if ($model->save())
                                $this->redirect(array('view', 'id' => $model->id));
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
                $dataProvider = new CActiveDataProvider('ApiClients');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new ApiClients('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ApiClients']))
                        $model->attributes = $_GET['ApiClients'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return ApiClients the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = ApiClients::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param ApiClients $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'api-clients-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

        public function NewGuid() {
                $s = strtoupper(md5(uniqid(rand(), true)));
                $guidText = substr($s, 0, 8) . '-' .
                        substr($s, 8, 4) . '-' .
                        substr($s, 12, 4) . '-' .
                        substr($s, 16, 4) . '-' .
                        substr($s, 20);
                return $guidText;
        }

        public function GenerateToken($model = array()) {
                if (!empty($model)) {
                        try {
                                $config = Factory::fromFile('authConfig/config.php', true);
                                $data = [
                                    'clientid' => $model->client_id,
                                ];
                                $secretKey = base64_decode($config->get('jwt')->get('key'));
                                $algorithm = $config->get('jwt')->get('algorithm');
                                $jwt = JWT::encode(
                                                $data, //Data to be encoded in the JWT
                                                $secretKey, // The signing key
                                                $algorithm  // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
                                );
                                $model->access_token = $jwt;
                                if ($model->save()) {
                                        return $jwt;
                                } else {
                                        return NULL;
                                }
                        } catch (Exception $ex) {
                                return NULL;
                        }
                } else {
                        return NULL;
                }
        }

        public function validateToken($token) {  // token validate, return type bool
                error_reporting(E_ALL);
                $model = ApiClients::model()->findByAttributes(array('access_token' => $token));

                if (count($model) > 0) {
                        try {
                                $config = Factory::fromFile('authConfig/config.php', true);
                                $secretKey = base64_decode($config->get('jwt')->get('key'));
                                $token = JWT::decode($token, $secretKey, array($config->get('jwt')->get('algorithm')));
                                if ($model->client_id == $token->clientid)
                                        return true;
                                else {
                                        return false;
                                }
                        } catch (Exception $ex) {
                                return false;
                        }
                } else {
                        return false;
                }
        }

}
