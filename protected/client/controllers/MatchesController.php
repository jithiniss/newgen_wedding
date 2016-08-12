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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('mymatches', array('sort' => $sort));
        }

        public function actionMyMatchesList() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('mymatches_list', array('sort' => $sort));
        }

        public function actionLookingMe() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('lookingme', array('sort' => $sort));
        }

        public function actionLookingMeList() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('lookingmeList', array('sort' => $sort));
        }

        public function actionTwoWayMatches() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('twowaymatches', array('sort' => $sort));
        }

        public function actionTwoWayMatchesList() {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $this->render('twowaymatches_list', array('sort' => $sort));
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
