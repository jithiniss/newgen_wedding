<?php

class PartnerController extends Controller {

        public function actionIndex() {
                if (isset(Yii::app()->session['user'])) {
                        $this->render('index');
                }
        }

        public function folderName($min, $max, $id) {
                if ($id > $min && $id < $max) {
                        return $max;
                } else {
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                }
        }

        public function actionPartnerdetails($userid) {
                if (isset(Yii::app()->session['user'])) {
                        if ($userid != '') {
                                $user_details = UserDetails::model()->findByAttributes(array('user_id' => $userid));
                                $partner_details = PartnerDetails::model()->findByAttributes(array('user_id' => $user_details->id));
                                $this->render('index', array('user_details' => $user_details, 'partner_details' => $partner_details));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('site/login'));
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
