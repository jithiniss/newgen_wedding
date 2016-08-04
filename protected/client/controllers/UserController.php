<?php

class UserController extends Controller {

        public function actionIndex() {
                $model = Facebook::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if (empty($model)) {
                        $model = new Facebook;
                }
                if (isset($_POST['Facebook'])) {
                        $model->attributes = $_POST['Facebook'];
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->cb = Yii::app()->session['user']['id'];
//                        $model->doc = date('Y-m-d');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->redirect(array('index'));
                                }
                        }
                }
                $this->render('index', ['model' => $model]);
        }

        public function actionDocument() {
                $model = new Documents;
                $details = Documents::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 1));
                if (isset($_POST['Documents'])) {
                        $model->attributes = $_POST['Documents'];
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->cb = Yii::app()->session['user']['id'];
                        $model->name = $_POST['Documents']['name'];
                        $uploadedFile = CUploadedFile::getInstance($model, 'file');
                        $model->file = $uploadedFile->extensionName;
                        if ($model->save()) {

                                if (isset($uploadedFile)) {

                                        if (Yii::app()->basePath . '/../uploads/user/files') {
                                                chmod(Yii::app()->basePath . '/../uploads/user/files', 0777);

                                                if (!is_dir(Yii::app()->basePath . '/../uploads/user/files/' . $model->id)) {
                                                        mkdir(Yii::app()->basePath . '/../uploads/user/files/' . $model->id);
                                                }
                                                chmod(Yii::app()->basePath . '/../uploads/user/files/' . $model->id, 0777);
                                                if ($uploadedFile->saveAs(Yii::app()->basePath . '/../uploads/user/files/' . $model->id . '/' . $model->name . '.' . $uploadedFile->extensionName)) {
                                                        chmod(Yii::app()->basePath . '/../uploads/user/files/' . $model->id . '/' . $model->name . '.' . $uploadedFile->extensionName, 0777);

//                                                        $up_model = FileUploads::model()->findByPk($model->id);
//                                                        $up_model->file = $uploadedFile->extensionName;
//                                                        $up_model->save();
                                                }
                                        }
                                }

                                $this->redirect(array('document'));
                        }
                }
                $this->render('document', ['model' => $model, 'details' => $details]);
        }

        public function actionDelete($id) {
                $model = Documents::model()->findByPk($id);
                $model->delete();
                $this->redirect(array('document'));
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
