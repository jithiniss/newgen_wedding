<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tournaments
 *
 * @author user
 */
class BasicSearch extends CWidget {

        public $id = '';

        public function run() {

                $search_details = SavedSearch::model()->findByPk($this->id);
//                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $this->id));
                if ($search_details->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                $date_from = date('Y') - $search_details->age_from;
                $date_to = date('Y') - $search_details->age_to;
                $condition = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to;
                if ($search_details->religion == '' && $search_details->religion == 0 && $search_details->religion == -1) {
                        $condition .= ' AND  FIND_IN_SET("' . $search_details->religion . '",religion)';
                }
                if ($search_details->caste == '' && $search_details->caste == 0 && $search_details->caste == -1) {
                        $condition .= ' AND FIND_IN_SET(caste,"' . $search_details->caste . '")';
                }
                $condition .= ' AND FIND_IN_SET(country,"' . $search_details->country_living_in . '")';

                $condition .= ' AND FIND_IN_SET(state,"' . $search_details->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $search_details->country_grew_up . '")'
                        . ' AND FIND_IN_SET(working_with,"' . $search_details->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $search_details->profession_area . '")'
                        . ' AND FIND_IN_SET(education_field,"' . $search_details->education . '")'
                        . ' AND status = 1';
                $dataProvider = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                if ($dataProvider->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider,
                        ));
                }
        }

}
