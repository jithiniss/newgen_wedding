<?php

class CronjobController extends Controller {

        public function actionIndex() {
                $pending = Requests::model()->findAllByAttributes(array('status' => '1'));
                foreach ($pending as $rqst) {
                        $now = time();
                        $your_date = strtotime(date('Y-m-d', strtotime($rqst->date)));
                        $datediff = $now - $your_date;
                        $left_day = floor($datediff / (60 * 60 * 24));
                        if ($left_day > 2) {
//                                $details[] = 'Partner - ' . $rqst->partner_id . ' date of request - ' . $rqst->date . ' From - ' . $rqst->user_id . '<br>';
                                $partner_details = UserDetails::model()->findByAttributes(array('user_id' => $rqst->partner_id));
                                $model = UserDetails::model()->findByAttributes(array('id' => $rqst->user_id));
                                if (!empty($partner_details)) {
                                        $to = $partner_details->email;

                                        $subject = 'info_NewGen';
                                        $message = $this->renderPartial(_mail, array('model' => $model));
// Always set content-type when sending HTML email
                                        $headers = "MIME-Version: 1.0" . "\r\n";
                                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
                                        $headers .= 'From: <no-reply@newgen.com>' . "\r\n";
                                }
                        }
                }


//                $this->render('index', ['pending' => $details]);
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
