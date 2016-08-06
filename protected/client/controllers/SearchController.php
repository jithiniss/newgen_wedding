<?php

class SearchController extends Controller {

        public function actionIndex() {
                $model = new SavedSearch();
                if (isset(Yii::app()->session['user'])) {
                        if (isset($_POST['SavedSearch'])) {
                                $model->attributes = $_POST['SavedSearch'];
                                $model->user_id = Yii::app()->session['user']['id'];
                                if ($_POST['SavedSearch']['gender'] == 2) {
                                        $model->gender = 1;
                                } else {
                                        $model->gender = 2;
                                }
                                if ($model->validate()) {
                                        if ($model->save()) {

                                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/Search/Result/id/' . $this->encrypt_decrypt('encrypt', $model->id));
                                        }
                                }
                        }
                }

                $this->render('basic', array('model' => $model));
        }

        public function actionAdvanced() {
                $model = new SavedSearch();
                if (isset($_POST['SavedSearch'])) {
                        $model->attributes = $_POST['SavedSearch'];
                        $model->user_id = Yii::app()->session['user']['id'];
                        if ($_POST['SavedSearch']['gender'] == 2) {
                                $model->gender = 1;
                        } else {
                                $model->gender = 2;
                        }
                        if ($model->validate()) {
                                if ($model->save()) {

                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Search/AdvanceResult/id/' . $this->encrypt_decrypt('encrypt', $model->id));
                                }
                        }
                }
                $this->render('advanced', array('model' => $model));
        }

        public function actionSearchById() {
                if (isset($_REQUEST['user_id'])) {
                        $user_details = UserDetails::model()->findByAttributes(array('user_id' => $_REQUEST['user_id']));
                        if (!empty($user_details)) {
                                $this->redirect(array('/Partner/Partnerdetails', 'userid' => $_REQUEST['user_id']));
                        } else {
                                $this->redirect(array('site/error'));
                        }
                } else {
                        $this->redirect(array('Search/index'));
                }
        }

        public function actionResult($id) {

                if (isset($_POST['photo'])) {
                        $ph = $_POST['photo'];
                        if (count($ph) > 1) {
                                if (($key1 = array_search(0, $ph)) !== false) {
                                        unset($ph[$key1]);
                                }
                        }
                        $photo = implode(',', $ph);
                }
                if (isset($_POST['joined'])) {
                        $joined = $_POST['joined'];
                } else {
                        $joined = 0;
                }
                if (isset($_POST['active_member'])) {
                        $active_mem = $_POST['active_member'];
                } else {
                        $active_mem = 0;
                }
                if (isset($_POST['marital_status'])) {
                        $ms = $_POST['marital_status'];
                        if (count($ms) > 1) {
                                if (($key = array_search(0, $ms)) !== false) {
                                        unset($ms[$key]);
                                }
                        }
                        $marital_stat = implode(',', $ms);
                }
                if (isset($_POST['profile_created_by'])) {
                        $pcb = $_POST['profile_created_by'];
                        if (count($pcb) > 1) {
                                if (($key2 = array_search(0, $pcb)) !== false) {
                                        unset($pcb[$key2]);
                                }
                        }
                        $profile_crea = implode(',', $pcb);
                }
                if (isset($_POST['smoke'])) {
                        $smk = $_POST['smoke'];
                        if (count($smk) > 1) {
                                if (($key3 = array_search(0, $smk)) !== false) {
                                        unset($smk[$key3]);
                                }
                        }
                        $smoking = implode(',', $smk);
                }
                if (isset($_POST['drink'])) {
                        $drk = $_POST['drink'];
                        if (count($drk) > 1) {
                                if (($key4 = array_search(0, $drk)) !== false) {
                                        unset($drk[$key4]);
                                }
                        }
                        $drinking = implode(',', $drk);
                }
                if (isset($_POST['diet'])) {
                        $dit = $_POST['diet'];
                        if (count($dit) > 1) {
                                if (($key5 = array_search(0, $dit)) !== false) {
                                        unset($dit[$key5]);
                                }
                        }
                        $diets = implode(',', $dit);
                }
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);

                $this->render('search_result', array('id' => $result_id, 'sort' => $sort, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
        }

        public function actionResultList($id) {
                if (isset($_POST['photo'])) {
                        $ph = $_POST['photo'];
                        if (count($ph) > 1) {
                                if (($key1 = array_search(0, $ph)) !== false) {
                                        unset($ph[$key1]);
                                }
                        }
                        $photo = implode(',', $ph);
                }
                if (isset($_POST['joined'])) {
                        $joined = $_POST['joined'];
                } else {
                        $joined = 0;
                }
                if (isset($_POST['active_member'])) {
                        $active_mem = $_POST['active_member'];
                } else {
                        $active_mem = 0;
                }
                if (isset($_POST['marital_status'])) {
                        $ms = $_POST['marital_status'];
                        if (count($ms) > 1) {
                                if (($key = array_search(0, $ms)) !== false) {
                                        unset($ms[$key]);
                                }
                        }
                        $marital_stat = implode(',', $ms);
                }
                if (isset($_POST['profile_created_by'])) {
                        $pcb = $_POST['profile_created_by'];
                        if (count($pcb) > 1) {
                                if (($key2 = array_search(0, $pcb)) !== false) {
                                        unset($pcb[$key2]);
                                }
                        }
                        $profile_crea = implode(',', $pcb);
                }
                if (isset($_POST['smoke'])) {
                        $smk = $_POST['smoke'];
                        if (count($smk) > 1) {
                                if (($key3 = array_search(0, $smk)) !== false) {
                                        unset($smk[$key3]);
                                }
                        }
                        $smoking = implode(',', $smk);
                }
                if (isset($_POST['drink'])) {
                        $drk = $_POST['drink'];
                        if (count($drk) > 1) {
                                if (($key4 = array_search(0, $drk)) !== false) {
                                        unset($drk[$key4]);
                                }
                        }
                        $drinking = implode(',', $drk);
                }
                if (isset($_POST['diet'])) {
                        $dit = $_POST['diet'];
                        if (count($dit) > 1) {
                                if (($key5 = array_search(0, $dit)) !== false) {
                                        unset($dit[$key5]);
                                }
                        }
                        $diets = implode(',', $dit);
                }
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);

                $this->render('search_result_list', array('id' => $result_id, 'sort' => $sort, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
        }

        public function actionAdvanceResult($id) {
                if (isset($_POST['photo'])) {
                        $ph = $_POST['photo'];
                        if (count($ph) > 1) {
                                if (($key1 = array_search(0, $ph)) !== false) {
                                        unset($ph[$key1]);
                                }
                        }
                        $photo = implode(',', $ph);
                }
                if (isset($_POST['joined'])) {
                        $joined = $_POST['joined'];
                } else {
                        $joined = 0;
                }
                if (isset($_POST['active_member'])) {
                        $active_mem = $_POST['active_member'];
                } else {
                        $active_mem = 0;
                }
                if (isset($_POST['marital_status'])) {
                        $ms = $_POST['marital_status'];
                        if (count($ms) > 1) {
                                if (($key = array_search(0, $ms)) !== false) {
                                        unset($ms[$key]);
                                }
                        }
                        $marital_stat = implode(',', $ms);
                }
                if (isset($_POST['profile_created_by'])) {
                        $pcb = $_POST['profile_created_by'];
                        if (count($pcb) > 1) {
                                if (($key2 = array_search(0, $pcb)) !== false) {
                                        unset($pcb[$key2]);
                                }
                        }
                        $profile_crea = implode(',', $pcb);
                }
                if (isset($_POST['smoke'])) {
                        $smk = $_POST['smoke'];
                        if (count($smk) > 1) {
                                if (($key3 = array_search(0, $smk)) !== false) {
                                        unset($smk[$key3]);
                                }
                        }
                        $smoking = implode(',', $smk);
                }
                if (isset($_POST['drink'])) {
                        $drk = $_POST['drink'];
                        if (count($drk) > 1) {
                                if (($key4 = array_search(0, $drk)) !== false) {
                                        unset($drk[$key4]);
                                }
                        }
                        $drinking = implode(',', $drk);
                }
                if (isset($_POST['diet'])) {
                        $dit = $_POST['diet'];
                        if (count($dit) > 1) {
                                if (($key5 = array_search(0, $dit)) !== false) {
                                        unset($dit[$key5]);
                                }
                        }
                        $diets = implode(',', $dit);
                }
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);
                $this->render('advance_search_result', array('id' => $result_id, 'sort' => $sort, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
        }

        public function actionAdvanceResultList($id) {
                if (isset($_POST['photo'])) {
                        $ph = $_POST['photo'];
                        if (count($ph) > 1) {
                                if (($key1 = array_search(0, $ph)) !== false) {
                                        unset($ph[$key1]);
                                }
                        }
                        $photo = implode(',', $ph);
                }
                if (isset($_POST['joined'])) {
                        $joined = $_POST['joined'];
                } else {
                        $joined = 0;
                }
                if (isset($_POST['active_member'])) {
                        $active_mem = $_POST['active_member'];
                } else {
                        $active_mem = 0;
                }
                if (isset($_POST['marital_status'])) {
                        $ms = $_POST['marital_status'];
                        if (count($ms) > 1) {
                                if (($key = array_search(0, $ms)) !== false) {
                                        unset($ms[$key]);
                                }
                        }
                        $marital_stat = implode(',', $ms);
                }
                if (isset($_POST['profile_created_by'])) {
                        $pcb = $_POST['profile_created_by'];
                        if (count($pcb) > 1) {
                                if (($key2 = array_search(0, $pcb)) !== false) {
                                        unset($pcb[$key2]);
                                }
                        }
                        $profile_crea = implode(',', $pcb);
                }
                if (isset($_POST['smoke'])) {
                        $smk = $_POST['smoke'];
                        if (count($smk) > 1) {
                                if (($key3 = array_search(0, $smk)) !== false) {
                                        unset($smk[$key3]);
                                }
                        }
                        $smoking = implode(',', $smk);
                }
                if (isset($_POST['drink'])) {
                        $drk = $_POST['drink'];
                        if (count($drk) > 1) {
                                if (($key4 = array_search(0, $drk)) !== false) {
                                        unset($drk[$key4]);
                                }
                        }
                        $drinking = implode(',', $drk);
                }
                if (isset($_POST['diet'])) {
                        $dit = $_POST['diet'];
                        if (count($dit) > 1) {
                                if (($key5 = array_search(0, $dit)) !== false) {
                                        unset($dit[$key5]);
                                }
                        }
                        $diets = implode(',', $dit);
                }
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);
                $this->render('advance_search_result_list', array('id' => $result_id, 'sort' => $sort, 'photo' => $photo, 'joined' => $joined, 'active_mem' => $active_mem, 'marital_stat' => $marital_stat, 'profile_crea' => $profile_crea, 'smoking' => $smoking, 'drinking' => $drinking, 'diets' => $diets));
        }

        public function encrypt_decrypt($action, $string) {
                $output = false;

                $encrypt_method = "AES-256-CBC";
                $secret_key = 'This is my secret key';
                $secret_iv = 'This is my secret iv';

// hash
                $key = hash('sha256', $secret_key);

// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
                $iv = substr(hash('sha256', $secret_iv), 0, 16);

                if ($action == 'encrypt') {
                        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                        $output = base64_encode($output);
                } else if ($action == 'decrypt') {
                        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
                }

                return $output;
        }

        public function actionSaveSearch($partnerid) {
                if ($partnerid != '') {
                        $search_name = $_POST['search_name'];
                        $result_id = $this->encrypt_decrypt('decrypt', $partnerid);
                        $model = SavedSearch::model()->findByAttributes(array('id' => $result_id), array('condition' => 'status != 1'));
                        if (!empty($model)) {
                                $model->status = 1;
                                $model->search_name = $search_name;
                                if ($model->save()) {
                                        $saved_search = 1;
                                        Yii::app()->user->setFlash('save_success', "Saved your Search Criteria");
                                }
                        }

                        $this->render('search_result', array('id' => $result_id));
                }
//                $result_id = $this->encrypt_decrypt('decrypt', $id);
//                $this->render('search_result', array('id' => $result_id));
        }

}
