<?php

class ProfileController extends Controller {

        public function init() {


                if (!isset(Yii::app()->session['user'])) {

                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionMyProfile() {

                $myProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if (!empty($myProfile)) {
                        $partnerDetails = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $userInterest = UserInterests::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        if (isset($_FILES['UserDetails'])) {

                                $image = CUploadedFile::getInstance($myProfile, 'photo');

                                if (!$this->uploadFiles($myProfile->id, $image)) {
                                        throw new CHttpException(403, 'Forbidden');
                                } else {
                                        $myProfile->refresh();
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $myProfile->id);
                                        $userPic = explode('.', $myProfile->photo);

                                        echo '<img class="img-responsive" src="' . Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $myProfile->id . '/profile/' . $userPic[0] . '_163_212.' . $userPic[1] . '" />';
                                        exit;
                                }
                        }
                        $this->render('my_profile', array('myProfile' => $myProfile, 'partnerDetails' => $partnerDetails, 'userInterest' => $userInterest));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionEditProfile() {
                $editProfile = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if (!empty($editProfile)) {
                        $editProfile->scenario = 'myProfile';

                        if (isset($_POST['UserDetails'])) {
                                $editProfile->attributes = $_POST['UserDetails'];
                                $editProfile->about_me = $_POST['UserDetails']['about_me'];
                                $editProfile->ub = $editProfile->id;
                                $editProfile->dob = $editProfile->dob_year . '-' . $editProfile->dob_month . '-' . $editProfile->dob_day;
                                if ($editProfile->validate()) {
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
                if (!empty($partnerDetails)) {
                        if (isset($_POST['PartnerDetails'])) {
                                $partnerDetails->attributes = $_POST['PartnerDetails'];
                                if (!empty($_POST['PartnerDetails']['marital_status'])) {
                                        $marital_status = $_POST['PartnerDetails']['marital_status'];

                                        if (sizeof($marital_status) > 1) {
                                                if (in_array('-1', $marital_status) == 1) {

                                                        unset($marital_status[array_search('-1', $marital_status)]);
                                                } else {

                                                        $marital_status = $marital_status;
                                                }
                                        } else {
                                                $marital_status = $_POST['PartnerDetails']['marital_status'];
                                        }
                                        $partnerDetails->marital_status = implode(',', $marital_status);
                                } else {
                                        $partnerDetails->marital_status = '';
                                }
                                if (!empty($_POST['PartnerDetails']['religion'])) {
                                        $religion = $_POST['PartnerDetails']['religion'];

                                        if (sizeof($religion) > 1) {
                                                if (in_array('-1', $religion) == 1) {

                                                        unset($religion[array_search('-1', $religion)]);
                                                } else {

                                                        $religion = $religion;
                                                }
                                        } else {
                                                $religion = $_POST['PartnerDetails']['religion'];
                                        }

                                        $partnerDetails->religion = implode(',', $religion);
                                } else {
                                        $partnerDetails->religion = '';
                                }
                                if (!empty($_POST['PartnerDetails']['mothertongue'])) {
                                        $mothertongue = $_POST['PartnerDetails']['mothertongue'];

                                        if (sizeof($mothertongue) > 1) {
                                                if (in_array('-1', $mothertongue) == 1) {

                                                        unset($mothertongue[array_search('-1', $mothertongue)]);
                                                } else {

                                                        $mothertongue = $mothertongue;
                                                }
                                        } else {
                                                $mothertongue = $_POST['PartnerDetails']['mothertongue'];
                                        }

                                        $partnerDetails->mothertongue = implode(',', $mothertongue);
                                } else {
                                        $partnerDetails->mothertongue = '';
                                }

                                if (!empty($_POST['PartnerDetails']['caste'])) {
                                        $caste = $_POST['PartnerDetails']['caste'];

                                        if (sizeof($caste) > 1) {
                                                if (in_array('-1', $caste) == 1) {

                                                        unset($caste[array_search('-1', $caste)]);
                                                } else {

                                                        $caste = $caste;
                                                }
                                        } else {
                                                $caste = $_POST['PartnerDetails']['caste'];
                                        }

                                        $partnerDetails->caste = implode(',', $caste);
                                } else {
                                        $partnerDetails->caste = '';
                                }
                                if (!empty($_POST['PartnerDetails']['profile_created_by'])) {
                                        $profile_created_by = $_POST['PartnerDetails']['profile_created_by'];

                                        if (sizeof($profile_created_by) > 1) {
                                                if (in_array('-1', $profile_created_by) == 1) {

                                                        unset($profile_created_by[array_search('-1', $profile_created_by)]);
                                                } else {

                                                        $profile_created_by = $profile_created_by;
                                                }
                                        } else {
                                                $profile_created_by = $_POST['PartnerDetails']['profile_created_by'];
                                        }

                                        $partnerDetails->profile_created_by = implode(',', $profile_created_by);
                                } else {
                                        $partnerDetails->profile_created_by = '';
                                }

                                if (!empty($_POST['PartnerDetails']['country_living_in'])) {
                                        $country_living_in = $_POST['PartnerDetails']['country_living_in'];

                                        if (sizeof($country_living_in) > 1) {
                                                if (in_array('-1', $country_living_in) == 1) {

                                                        unset($country_living_in[array_search('-1', $country_living_in)]);
                                                } else {

                                                        $country_living_in = $country_living_in;
                                                }
                                        } else {
                                                $country_living_in = $_POST['PartnerDetails']['country_living_in'];
                                        }

                                        $partnerDetails->country_living_in = implode(',', $country_living_in);
                                } else {
                                        $partnerDetails->country_living_in = '';
                                }
                                if (!empty($_POST['PartnerDetails']['country_grew_up'])) {
                                        $country_grew_up = $_POST['PartnerDetails']['country_grew_up'];

                                        if (sizeof($country_grew_up) > 1) {
                                                if (in_array('-1', $country_grew_up) == 1) {

                                                        unset($country_grew_up[array_search('-1', $country_grew_up)]);
                                                } else {

                                                        $country_grew_up = $country_grew_up;
                                                }
                                        } else {
                                                $country_grew_up = $_POST['PartnerDetails']['country_grew_up'];
                                        }

                                        $partnerDetails->country_grew_up = implode(',', $country_grew_up);
                                } else {
                                        $partnerDetails->country_grew_up = '';
                                }
                                if (!empty($_POST['PartnerDetails']['residency_status'])) {
                                        $residency_status = $_POST['PartnerDetails']['residency_status'];

                                        if (sizeof($residency_status) > 1) {
                                                if (in_array('-1', $residency_status) == 1) {

                                                        unset($residency_status[array_search('-1', $residency_status)]);
                                                } else {

                                                        $residency_status = $residency_status;
                                                }
                                        } else {
                                                $residency_status = $_POST['PartnerDetails']['residency_status'];
                                        }

                                        $partnerDetails->residency_status = implode(',', $residency_status);
                                } else {
                                        $partnerDetails->residency_status = '';
                                }
                                if (!empty($_POST['PartnerDetails']['education'])) {
                                        $education = $_POST['PartnerDetails']['education'];

                                        if (sizeof($education) > 1) {
                                                if (in_array('-1', $education) == 1) {

                                                        unset($education[array_search('-1', $education)]);
                                                } else {

                                                        $education = $education;
                                                }
                                        } else {
                                                $education = $_POST['PartnerDetails']['education'];
                                        }

                                        $partnerDetails->education = implode(',', $education);
                                } else {
                                        $partnerDetails->education = '';
                                }
                                if (!empty($_POST['PartnerDetails']['working_with'])) {
                                        $working_with = $_POST['PartnerDetails']['working_with'];

                                        if (sizeof($working_with) > 1) {
                                                if (in_array('-1', $working_with) == 1) {

                                                        unset($working_with[array_search('-1', $working_with)]);
                                                } else {

                                                        $working_with = $working_with;
                                                }
                                        } else {
                                                $working_with = $_POST['PartnerDetails']['working_with'];
                                        }

                                        $partnerDetails->working_with = implode(',', $working_with);
                                } else {
                                        $partnerDetails->working_with = '';
                                }
                                if (!empty($_POST['PartnerDetails']['profession_area'])) {
                                        $profession_area = $_POST['PartnerDetails']['profession_area'];

                                        if (sizeof($profession_area) > 1) {
                                                if (in_array('-1', $profession_area) == 1) {

                                                        unset($profession_area[array_search('-1', $profession_area)]);
                                                } else {

                                                        $profession_area = $profession_area;
                                                }
                                        } else {
                                                $profession_area = $_POST['PartnerDetails']['profession_area'];
                                        }

                                        $partnerDetails->profession_area = implode(',', $profession_area);
                                } else {
                                        $partnerDetails->profession_area = '';
                                }
                                if (!empty($_POST['PartnerDetails']['annual_income_from'])) {
                                        $annual_income_from = $_POST['PartnerDetails']['annual_income_from'];

                                        if (sizeof($annual_income_from) > 1) {
                                                if (in_array('-1', $annual_income_from) == 1) {

                                                        unset($annual_income_from[array_search('-1', $annual_income_from)]);
                                                } else {

                                                        $annual_income_from = $annual_income_from;
                                                }
                                        } else {
                                                $annual_income_from = $_POST['PartnerDetails']['annual_income_from'];
                                        }

                                        $partnerDetails->annual_income_from = implode(',', $annual_income_from);
                                } else {
                                        $partnerDetails->annual_income_from = '';
                                }
                                if (!empty($_POST['PartnerDetails']['diet'])) {
                                        $diet = $_POST['PartnerDetails']['diet'];

                                        if (sizeof($diet) > 1) {
                                                if (in_array('-1', $diet) == 1) {

                                                        unset($diet[array_search('-1', $diet)]);
                                                } else {

                                                        $diet = $diet;
                                                }
                                        } else {
                                                $diet = $_POST['PartnerDetails']['diet'];
                                        }

                                        $partnerDetails->diet = implode(',', $diet);
                                } else {
                                        $partnerDetails->diet = '';
                                }
                                if (!empty($_POST['PartnerDetails']['body_type'])) {
                                        $body_type = $_POST['PartnerDetails']['body_type'];

                                        if (sizeof($body_type) > 1) {
                                                if (in_array('-1', $body_type) == 1) {

                                                        unset($body_type[array_search('-1', $body_type)]);
                                                } else {

                                                        $body_type = $body_type;
                                                }
                                        } else {
                                                $body_type = $_POST['PartnerDetails']['body_type'];
                                        }

                                        $partnerDetails->body_type = implode(',', $body_type);
                                } else {
                                        $partnerDetails->body_type = '';
                                }
                                if (!empty($_POST['PartnerDetails']['skin_tone'])) {
                                        $skin_tone = $_POST['PartnerDetails']['skin_tone'];

                                        if (sizeof($skin_tone) > 1) {
                                                if (in_array('-1', $skin_tone) == 1) {

                                                        unset($skin_tone[array_search('-1', $skin_tone)]);
                                                } else {

                                                        $skin_tone = $skin_tone;
                                                }
                                        } else {
                                                $skin_tone = $_POST['PartnerDetails']['skin_tone'];
                                        }

                                        $partnerDetails->skin_tone = implode(',', $skin_tone);
                                } else {
                                        $partnerDetails->skin_tone = '';
                                }
                                if ($partnerDetails->validate()) {
                                        $partnerDetails->ub = $user->id;
                                        if ($partnerDetails->save())
                                                Yii::app()->user->setFlash('partner_fet', "Partner Preference Changed Successfully");
                                }
                        }
                        $this->render('partner_preference', array('partnerDetails' => $partnerDetails, 'user' => $user));
                } else {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                }
        }

        public function actionHobbiesInterest() {
                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $userInterest = UserInterests::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if (empty($userInterest)) {
                        $userInterest = new UserInterests;
                        $userInterest->attributes = $_POST['UserInterests'];
                        $userInterest->user_id = Yii::app()->session['user']['id'];
                        if ($userInterest->validate()) {
                                $userInterest->cb = $user->id;
                                $userInterest->status = 1;
                                if ($userInterest->save(false))
                                        Yii::app()->user->setFlash('my_interests', "Interests Changed Successfully");
                        }
                }
                if (isset($_POST['UserInterests'])) {
                        $userInterest->attributes = $_POST['UserInterests'];

                        if (!empty($_POST['UserInterests']['hobbies'])) {

                                $userInterest->hobbies = implode(',', $_POST['UserInterests']['hobbies']);
                        } else {
                                $userInterest->hobbies = '';
                        }

                        if (!empty($_POST['UserInterests']['music'])) {

                                $userInterest->music = implode(',', $_POST['UserInterests']['music']);
                        } else {
                                $userInterest->music = '';
                        }
                        if (!empty($_POST['UserInterests']['movies'])) {

                                $userInterest->movies = implode(',', $_POST['UserInterests']['movies']);
                        } else {
                                $userInterest->movies = '';
                        }
                        if (!empty($_POST['UserInterests']['sports'])) {

                                $userInterest->sports = implode(',', $_POST['UserInterests']['sports']);
                        } else {
                                $userInterest->sports = '';
                        }
                        if ($userInterest->validate()) {
                                $userInterest->ub = $user->id;
                                $userInterest->status = 1;
                                if ($userInterest->save(false))
                                        Yii::app()->user->setFlash('my_interests', "Interests Changed Successfully");
                        }
                }
                $this->render('user_interest', array('userInterest' => $userInterest, 'user' => $user));
        }

        public function uploadFiles($id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/user/' . $folder . '/' . $id . '/profile/*'); // get all file names
                        foreach ($files as $file) { // iterate files
                                if (is_file($file)) {
                                        unlink($file); // delete file
                                }
                        }

                        $filename = $id . '_' . rand(100001, 999999);
                        $path = array('uploads', 'user', $folder, $id, 'profile');
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
                        $dimension[1] = array('width' => '100', 'height' => '130', 'name' => 'thumb');
                        $dimension[2] = array('width' => '72', 'height' => '79', 'name' => 'similarprofile');
                        $dimension[3] = array('width' => '163', 'height' => '212', 'name' => 'profile');
                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
                        $dimension[5] = array('width' => '180', 'height' => '238', 'name' => '180_238');
                        $dimension[6] = array('width' => '149', 'height' => '178', 'name' => '149_178');
                        $dimension[7] = array('width' => '337', 'height' => '270', 'name' => '337_270');

//                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = UserDetails::model()->findByPk($id);
                                $model->photo = $filename . '.' . $image->extensionName;

                                if ($model->save()) {
                                        return true;
                                } else {
                                        return FALSE;
                                }
                        } else {
                                return FALSE;
                        }
                }
        }

        public function actionMyPhotos() {
                $model = UserPhotos::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                $this->render('my_photos', array('model' => $model));
        }

        public function actionMyPhotosUpload() {
                $model = new UserPhotos;
                if (isset($_FILES['UserPhotos'])) {
                        $image = CUploadedFile::getInstance($model, 'photo_name');
                }
                if (!$this->uploadFilesAlbum(Yii::app()->session['user']['id'], $image)) {

                        throw new CHttpException(403, 'Forbidden');
                } else {

                        $this->redirect('MyPhotos');
                }
        }

        public function uploadFilesAlbum($id, $image) {
                if ($image != "") {
                        $folder = Yii::app()->Upload->folderName(0, 1000, $id);
                        $files = glob(Yii::app()->basePath . '/../uploads/user/' . $folder . '/' . $id . '/album/*'); // get all file names
                        $filename = $id . '_' . rand(100001, 999999) . '_album';
                        $path = array('uploads', 'user', $folder, $id, 'album');
                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'main');
                        $dimension[1] = array('width' => '100', 'height' => '130', 'name' => 'thumb');
                        $dimension[2] = array('width' => '72', 'height' => '79', 'name' => 'similarprofile');
                        $dimension[3] = array('width' => '163', 'height' => '212', 'name' => 'profile');
                        $dimension[4] = array('width' => '396', 'height' => '317', 'name' => 'featured');
// $dimension[1] = array('width' => '100', 'height' => '130', 'name' => 'thumb');
//                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
//                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');

                        if (Yii::app()->Upload->uploadImage($image, $dimension, $path, $filename)) {
                                $model = new UserPhotos;
                                $model->photo_name = $filename . '.' . $image->extensionName;
                                $model->status = 1;
                                $model->approval = 0;
                                $model->cb = Yii::app()->session['user']['id'];
                                $model->doc = date('Y-m-d');
                                $model->user_id = Yii::app()->session['user']['id'];
                                if ($model->save(FALSE)) {
                                        return true;
                                } else {
                                        return FALSE;
                                }
                        } else {
                                return FALSE;
                        }
                }
        }

        public function actionDeleteItem() {
                if (isset($_POST['id'])) {
                        $model = UserPhotos::model()->findByPk($_POST['id']);
                        if ($model->delete()) {
                                $this->redirect(Yii::app()->request->urlReferrer);
                        }
                }
        }

        public function actionPhotoSettings() {
                $model = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                if (isset($_POST['photo_visibility'])) {
                        $model->photo_visibility = $_POST['photo_visibility'];
                        if ($model->photo_visibility == 3) {
                                $model->photo_password = $this->randomPassword();
                        } else {
                                $model->photo_password = 0;
                        }
                        $model->save();
                }
                $this->render('settings', array('model' => $model));
        }

        public function randomPassword() {
                $alphabet = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pass = array(); //remember to declare $pass as an array
                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                for ($i = 0; $i < 9; $i++) {
                        $n = rand(0, $alphaLength);
                        $pass[] = $alphabet[$n];
                }
                return implode($pass); //turn the array into a string
        }

}
