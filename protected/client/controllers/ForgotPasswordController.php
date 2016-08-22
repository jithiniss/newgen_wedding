<?php

class ForgotPasswordController extends Controller {

        public function actionIndex() {
                if (isset($_POST['btn_submit'])) {
                        $email = $_POST['email'];
                        $user = UserDetails::model()->findByAttributes(array('email' => $email));
                        if ($user != '') {
                                $details = UserDetails::model()->findByPk($user->id);
                                $forgot = new ForgotPassword;
                                $forgot->user_id = $details->id;
                                $forgot->code = rand(10000, 1000000);
                                $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                                $forgot->status = 1;
                                $forgot->doc = date('Y-m-d');
                                if ($forgot->save(FALSE)) {
                                        $this->SuccessMail($forgot, $token, $details);
                                        Yii::app()->user->setFlash('success1', ' We’ve sent you a link to change your password');
                                        Yii::app()->user->setFlash('success2', ' We’ve sent you an email that will allow you to reset your password quickly and easily.');
//                                        $this->render('mail', array('token' => $token));
                                } else {
                                        Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                        }
                }
                $this->render('index');
        }

        public function SuccessMail($forgot, $token, $details) {
                $message = new YiiMailMessage;
                $message->view = "_forgot_password_mail_user";  // view file name
                $params = array('token' => $token, 'details' => $details); // parameters
                $message->subject = 'Please Reset Your Password';
                $message->setBody($params, 'text/html');
                $message->addTo($details->email);
                $message->from = 'newgenwedding@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionChangepassword($token) {
                $var = base64_decode($token);
                $arr = explode(':', $var);

                $id = $arr[0];
                $token2 = $arr[1];
                $token_test = ForgotPassword::model()->findByAttributes(array('code' => $token2, 'user_id' => $id));
                $pass1 = UserDetails::model()->findByPk($id);
                if ($token_test != '') {
                        Yii::app()->session['frgt_usrid'] = $id;
                        $token_test->delete();
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('index'));
                }
        }

        public function actionNewpassword() {
                if (isset($_POST['btn_submit'])) {

                        if (isset(Yii::app()->session['frgt_usrid'])) {

                                $id = Yii::app()->session['frgt_usrid'];
                                $pass1 = UserDetails::model()->findByPk($id);
                                $newpass = $_POST['password1'];
                                $pass1->password = $newpass;
                                $pass1->update(array('password'));
                                if ($pass1->save()) {
                                        Yii::app()->user->setFlash('success', "Your password changed successfully. Please login");
                                        $this->redirect(array('site/login'));
                                } else {
                                        Yii::app()->user->setFlash('error', "Inavlid user,..");
                                }
                                Yii::app()->session['frgt_usrid'] = '';
                                $_SESSION['frgt_usrid'] = '';
                        }
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('ForgotPassword'));
                }
//                $this->render('changepassword');
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/beta';
        }

}
