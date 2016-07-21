<?php

class AjaxController extends Controller {

        public function init() {
                if (!Yii::app()->request->isAjaxRequest) {
                        echo "You are not permitted to access this page";
                        exit;
                }
        }

        public function actionSelectCaste() {
                $religion = MasterReligion::model()->findByPk($_POST['religion'])->religion;
                $model = MasterCaste::model()->findAllByAttributes(array('religion_id' => (int) $_POST['religion']));
                if (!empty($model)) {
                        $options .= "<option value='' style='font-weight:bold;'>" . $religion . " Community</option>";
                        foreach ($model as $caste) {
                                $options .= '<option value="' . $caste->id . '">' . $caste->caste . '</option>';
                        }
                } else {
                        $options .= '<option value="">' . $religion . ' Community</option><option value="0">Other</option>';
                }
                echo $options;
        }

        public function actionSelectSubCaste() {
                $caste = MasterCaste::model()->findByPk($_POST['caste'])->caste;
                $model = MasterSubCaste::model()->findAllByAttributes(array('caste_id' => (int) $_POST['caste']));
                if (!empty($model)) {
                        $options = "<option value=''>Select " . $caste . " Sub-Community</option>";
                        foreach ($model as $subcaste) {
                                $options .= '<option value="' . $subcaste->id . '">' . $subcaste->sub_caste . '</option>';
                        }
                } else {
                        $options = '<option value="">Select  ' . $caste . ' Sub-Community</option><option value="0">Other</option>';
                }
                echo $options;
        }

        public function actionSelectState() {
                //$_POST['country'] = 99;
                $country = MasterCountry::model()->findByPk($_POST['country'])->country;
                $model = MasterState::model()->findAllByAttributes(array('country_id' => (int) $_POST['country']));
                if (!empty($model)) {
                        $options = "<option value=''>Select " . $country . " States</option>";
                        foreach ($model as $state) {
                                $options .= '<option value="' . $state->id . '">' . $state->state . '</option>';
                        }
                } else {
                        $options = '<option value="">Select ' . $country . ' </option><option value="0">Other</option>';
                }
                echo $options;
        }

        public function actionSelectCity() {
                $state = MasterState::model()->findByPk($_POST['state'])->state;
                $model = MasterCity::model()->findAllByAttributes(array('state_id' => $_POST['state']));
                if (!empty($model)) {
                        $options = "<option value=''>Select " . $state . " City</option>";
                        foreach ($model as $city) {
                                $options .= '<option value="' . $city->id . '">' . $city->city . '</option>';
                        }
                } else {
                        $options = '<option value="">Select ' . $state . ' City</option><option value="0">Other</option>';
                }
                echo $options;
        }

        public function actionSelectPartnerState() {
                $count = implode(',', $_POST['living_country']);
                //$country = MasterCountry::model()->findByPk($_POST['living_country'])->country;
                $model = MasterState::model()->findAll(array('condition' => 'country_id in (' . $count . ')'));
                if (!empty($model)) {
                        //  $options = "<option value=''>Select States</option>";
                        foreach ($model as $state) {
                                $options .= '<option value="' . $state->id . '">' . $state->state . '</option>';
                        }
                } else {
                        $options = '<option value="">Select States</option><option value="-1">Doesnt Matter</option><option value="0">Other</option>';
                }
                echo $options;
        }

        public function actionselectPartnerCaste() {
                $religion = implode(',', $_POST['caste']);
                //$country = MasterCountry::model()->findByPk($_POST['living_country'])->country;
                $model = MasterCaste::model()->findAll(array('condition' => 'religion_id in (' . $religion . ')'));
                if (!empty($model)) {
                        // $options = "<option value=''>Select Community</option>";
                        foreach ($model as $caste) {
                                $options .= '<option value="' . $caste->id . '">' . $caste->caste . '</option>';
                        }
                } else {
                        $options = '<option value="">Select Community</option><option value="-1">Doesnt Matter</option><option value="0">Other</option>';
                }
                echo $options;
        }

}
