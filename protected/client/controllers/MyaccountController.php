<?php

class MyaccountController extends Controller {

        public function actionIndex() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $this->render('index', array('user' => $user));
        }

        public function actionUpdatePhoto() {
                if (isset($_FILES['fileToUpload'])) {

                        $errors = array();
                        $file_size = $_FILES['fileToUpload']['size'];
                        $file_name = $_FILES['fileToUpload']['name'];
                        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                        $array = explode('.', $_FILES['fileToUpload']['name']);
                        $extension_name = end($array);
                        $extensions = array("jpeg", "jpg", "png");
                        if (in_array($extension_name, $extensions) === false) {
                                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                        }

                        if ($file_size > 87078) {
                                $errors[] = 'File size must be exactely 2 MB';
                        }
                        $path = Yii::app()->basePath . '/../uploads/user/1000/' . Yii::app()->session['user']['id'] . "/profile/" . $file_name;
                        if (empty($errors) == true) {
                                if (move_uploaded_file($file_tmp, $path)) {
                                        $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                        $model->photo = $file_name;
                                        $model->update();
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        } else {
                                print_r($errors);
                        }
                }
        }

        public function actionInvitations() {
                $requests = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 1)'));
                if (!empty($requests))
                        $this->redirect(array('Pending'));
                else {
                        $this->redirect(array('Accepted'));
                }
        }

        public function actionSentInvitations() {
                $requests = Requests::model()->findAllByAttributes(array(), array('condition' => '(user_id = "' . Yii::app()->session['user']['id'] . '" AND status = 1)'));
                if (!empty($requests))
                        $this->redirect(array('Sent'));
                else {
                        $this->redirect(array('SentAccepted'));
                }
        }

        public function actionSent() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 1',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentpending', array('dataProvider' => $dataProvider));
        }

        public function actionPending() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 1',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('pending', array('dataProvider' => $dataProvider));
        }

        public function actionAccept($id) {
                $request = Requests::model()->findByPk($id);
                if (!empty($request) && $request->status == 1) {
                        $request->status = 2;
                        $request->save();
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionReject($id) {
                $reject = Requests::model()->findByPk($id);
                if (!empty($reject) && $reject->status == 1) {
                        $reject->status = 4;
                        $reject->save();
                        $this->redirect(Yii::app()->request->urlReferrer);
                }
        }

        public function actionAccepted() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 2',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('accepted', array('dataProvider' => $dataProvider));
        }

        public function actionSentAccepted() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 2',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentaccepted', array('dataProvider' => $dataProvider));
        }

        public function actionRejected() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'partner_id="' . Yii::app()->session['user']['user_id'] . '" AND status = 4',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('rejected', array('dataProvider' => $dataProvider));
        }

        public function actionSentRejected() {
                $dataProvider = new CActiveDataProvider('Requests', array(
                    'criteria' => array(
                        'condition' => 'user_id="' . Yii::app()->session['user']['id'] . '" AND status = 4',
                        'order' => 'date desc',
                    ),
                    'pagination' => array(
                        'pageSize' => 4,
                    ),
                        )
                );
                // $accepted = Requests::model()->findAllByAttributes(array(), array('condition' => '(partner_id = "' . Yii::app()->session['user']['user_id'] . '" AND status = 2)'));
                $this->render('sentrejected', array('dataProvider' => $dataProvider));
        }

        public function actionMessage() {
                $message = Message::model()->findAllByAttributes(array('receiver_id' => Yii::app()->session['user']['id']), array('order' => 'DOC DESC', 'group' => 'sender_id', 'distinct' => TRUE));
                $this->render('message', array('message' => $message));
        }

        public function actionPhotoRequests() {
                $requests = PhotoRequests::model()->findAllByAttributes(array('receiver_id' => Yii::app()->session['user']['id']));
                $this->render('photo_requests', array('requests' => $requests));
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
