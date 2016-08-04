<?php

class FacebookController extends Controller {

        public function actionIndex() {
                $model = Facebook::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if (empty($model)) {
                        $model = new Facebook;
                }
                if (isset($_POST['Facebook'])) {
                        $model->attributes = $_POST['Facebook'];
                        $model->user_id = Yii::app()->session['user']['id'];
                        $model->cb = Yii::app()->session['user']['id'];
                        $model->doc = date('Y-m-d');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->redirect(array('index'));
                                }
                        }
                }
                $this->render('index', ['model' => $model]);
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
