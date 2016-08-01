<?php

class TellusStoryController extends Controller {

        public function actionIndex() {
                $user_id = Yii::app()->session['user']['id'];
                if ($user_id) {
                        $story = "";
                        $model = new TellUsStory('create');
                        $account = UserDetails::model()->findByPk($user_id, array('select' => 'first_name, last_name, email'));
                        $story = TellUsStory::model()->findByAttributes(array('user_id' => $user_id, 'status' => '1'));
                        // uncomment the following code to enable ajax-based validation
                        /*
                          if(isset($_POST['ajax']) && $_POST['ajax']==='tell-us-story-tell_us_story-form')
                          {
                          echo CActiveForm::validate($model);
                          Yii::app()->end();
                          }
                         */

                        if (isset($_POST['TellUsStory'])) {
                                $model->attributes = $_POST['TellUsStory'];
                                $model->user_id = $user_id;
                                $model->cb = Yii::app()->session['admin']['id'];
                                $model->doc = date('Y-m-d');
                                if ($model->validate()) {
                                        $image = CUploadedFile::getInstance($model, 'image');
                                        if (isset($image)) {
                                                $model->image = $image->extensionName;
                                        }
                                        if ($model->save()) {
                                                if ($model->image != "") {
                                                        $this->ImageUpload($image, 'wedding', $model->id, 'wedding');
                                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/tellusStory');
                                                }
                                        }
                                }
                        }
                        $this->render('tell_us_story', array('model' => $model, 'account' => $account, 'story' => $story));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
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
                                        $resize->resize(265, 313);
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
