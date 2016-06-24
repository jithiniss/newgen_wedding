<?php

class ProfileController extends Controller {

        public function init() {


                if(!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionMyProfile() {
                $myProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if(!empty($myProfile)) {
                        $partnerDetails = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if(isset($_REQUEST['UserDetails']['photo'])) {
                                echo 'hi';
                                exit;
                                $image = CUploadedFile::getInstance($myProfile, 'photo');
                                var_dump($image);
                                exit;
                                if(!$this->uploadFiles($myProfile->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
                                }
                        }
                        $this->render('my_profile', array('myProfile' => $myProfile, 'partnerDetails' => $partnerDetails));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function uploadFiles($id, $image) {
                if($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'user', $folder, $id, 'profile');
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
//                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if(Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = UserDetails::model()->findByPk($id);
                                $model->photo = $filename . '.' . $image->extensionName;
                                if($model->save()) {
                                        return true;
                                } else {
                                        return FALSE;
                                }
                        } else {
                                return FALSE;
                        }
                }
        }

}
