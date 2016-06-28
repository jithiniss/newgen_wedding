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
