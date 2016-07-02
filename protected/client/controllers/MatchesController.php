<?php

class MatchesController extends Controller {

        public function init() {

                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(array('site/login'));
                }
        }

//        public function actionIndex() {
//                $this->render('index');
//        }

        public function actionMyMatches() {

//                $matches = Yii::app()->Matches->MyMatches();
                $this->render('mymatches');
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
