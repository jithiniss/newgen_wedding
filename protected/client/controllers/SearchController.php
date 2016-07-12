<?php

class SearchController extends Controller {

        public function actionIndex() {

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

                                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/Search/Result/id/' . $this->encrypt_decrypt('encrypt', $model->id));
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
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $user_id = $_POST['user_id'];
                $this->render('search_by_id_result', array('id' => $user_id, 'sort' => $sort));
        }

        public function actionResult($id) {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);

                $this->render('search_result', array('id' => $result_id, 'sort' => $sort));
        }

        public function actionResultList($id) {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);

                $this->render('search_result_list', array('id' => $result_id, 'sort' => $sort));
        }

        public function actionAdvanceResult($id) {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);
                $this->render('advance_search_result', array('id' => $result_id, 'sort' => $sort));
        }

        public function actionAdvanceResultList($id) {
                if (isset($_POST['sort'])) {
                        $sort = $_POST['sort'];
                } else {
                        $sort = 'id DESC';
                }
                $result_id = $this->encrypt_decrypt('decrypt', $id);
                $this->render('advance_search_result_list', array('id' => $result_id, 'sort' => $sort));
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