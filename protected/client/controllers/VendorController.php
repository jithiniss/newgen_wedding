<?php

class VendorController extends Controller {

        public function actionIndex() {
                if(isset(Yii::app()->session['vendor'])) {

                        $this->redirect($this->createUrl('home'));
                } else {
                        $login = new VendorDetails();

                        if(isset($_REQUEST['VendorDetails'])) {

                                $vendor_login = VendorDetails::model()->find(['condition' => '(email = "' . $_REQUEST['VendorDetails']['email'] . '" or user_name = "' . $_REQUEST['VendorDetails']['email'] . '") and  password = "' . $_REQUEST['VendorDetails']['password'] . '" ']);

                                if(!empty($vendor_login)) {
                                        if($vendor_login->approval_status == 0) {
                                                Yii::app()->user->setFlash('vendor_login_error', "<h3>Approval Pending</h3>.Please wait for Admin Approval");
                                        } else {
                                                if($vendor_login->status == 0) {
                                                        Yii::app()->user->setFlash('vendor_login_error', "<h3>Access Denied</h3>.Please contact customer care");
                                                } else {
                                                        Yii::app()->session['vendor'] = $vendor_login;



                                                        $this->redirect(array('//site/Index'));
                                                }
                                        }
                                } else {
                                        $login->addError('email', '');
                                        $login->addError('password', '');
                                        Yii::app()->user->setFlash('vendor_login_error', "Username or password invalid.Try again");
                                }
                        }



                        $this->render('index', array('login' => $login));
                }
        }

        protected function performAjaxValidation($model, $model_id) {
                if(isset($_POST['ajax']) && $_POST['ajax'] === $model_id) {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
