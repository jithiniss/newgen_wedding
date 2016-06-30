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

                        if(isset($_FILES['UserDetails'])) {

                                $image = CUploadedFile::getInstance($myProfile, 'photo');

                                if(!$this->uploadFiles($myProfile->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
                                } else {
                                        $myProfile->refresh();
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $myProfile->id);
                                        $userPic = explode('.', $myProfile->photo);

                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $myProfile->id . '/profile/' . $userPic[0] . '_163_212.' . $userPic[1] . '" />';
                                        exit;
                                }
                        }
                        $this->render('my_profile', array('myProfile' => $myProfile, 'partnerDetails' => $partnerDetails));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionEditProfile() {
                $editProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if(!empty($editProfile)) {
                        $editProfile->scenario = 'myProfile';

                        if(isset($_POST['UserDetails'])) {
                                $editProfile->attributes = $_POST['UserDetails'];
                                $editProfile->about_me = $_POST['UserDetails']['about_me'];
                                $editProfile->ub = $editProfile->id;
                                $editProfile->dob = $editProfile->dob_year . '-' . $editProfile->dob_month . '-' . $editProfile->dob_day;
                                if($editProfile->validate()) {
                                        $editProfile->save(FALSE);
                                        Yii::app()->session['user'] = $editProfile;
                                        Yii::app()->user->setFlash('edit_profile', "Profile Changed Successfully");
                                }
                        }
                        $this->render('edit_profile', array('editProfile' => $editProfile));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionPartnerPreference() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $partnerDetails = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if(!empty($partnerDetails)) {
                        if(isset($_POST['PartnerDetails'])) {
                                $partnerDetails->attributes = $_POST['PartnerDetails'];
                                if(!empty($_POST['PartnerDetails']['profile_created_by'])) {
                                        $partnerDetails->profile_created_by = implode(',', $_POST['PartnerDetails']['profile_created_by']);
                                } else {
                                        $partnerDetails->profile_created_by = '';
                                }
                                if(!empty($_POST['PartnerDetails']['diet'])) {
                                        $partnerDetails->diet = implode(',', $_POST['PartnerDetails']['diet']);
                                } else {
                                        $partnerDetails->diet = '';
                                }
                                if(!empty($_POST['PartnerDetails']['body_type'])) {
                                        $partnerDetails->body_type = implode(',', $_POST['PartnerDetails']['body_type']);
                                } else {
                                        $partnerDetails->body_type = '';
                                }
                                if(!empty($_POST['PartnerDetails']['skin_tone'])) {
                                        $partnerDetails->skin_tone = implode(',', $_POST['PartnerDetails']['skin_tone']);
                                } else {
                                        $partnerDetails->skin_tone = '';
                                }
                                if($partnerDetails->validate()) {
                                        $partnerDetails->ub = $user->id;
                                        if($partnerDetails->save())
                                                Yii::app()->user->setFlash('partner_fet', "Partner Preference Changed Successfully");
                                }
                        }
                        $this->render('partner_preference', array('partnerDetails' => $partnerDetails, 'user' => $user));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function uploadFiles($id, $image) {
                if($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/user/' . $folder . '/' . $id . '/profile/*'); // get all file names
                        foreach($files as $file) { // iterate files
                                if(is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }

                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'user', $folder, $id, 'profile');
                        $dimension[0] = array('width' => '163', 'height' => '212', 'name' => 'profile');
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
