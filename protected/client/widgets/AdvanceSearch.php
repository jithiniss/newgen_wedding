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
                if ($search_details->marital_status != '' && $search_details->marital_status != 0 && $search_details->marital_status != -1) {
                        $condition .= ' AND  marital_status = ' . $search_details->marital_status;
                }
                if ($search_details->religion != '' && $search_details->religion != 0 && $search_details->religion != -1) {
                        $condition .= ' AND  religion = ' . $search_details->religion;
                }
                if ($search_details->caste != '' && $search_details->caste != 0 && $search_details->caste != -1) {
                        $condition .= ' AND caste = ' . $search_details->caste;
                }
                if ($search_details->mothertongue != '' && $search_details->mothertongue != 0 && $search_details->mothertongue != -1) {
                        $condition .= ' AND mothertongue = ' . $search_details->mothertongue;
                }
                if ($search_details->country_living_in != '' && $search_details->country_living_in != 0 && $search_details->country_living_in != -1) {
                        $condition .= ' AND country = ' . $search_details->country_living_in;
                }
                if ($search_details->residency_status != '' && $search_details->residency_status != 0 && $search_details->residency_status != -1) {
                        $condition .= ' AND state = ' . $search_details->residency_status;
                }
                if ($search_details->country_grew_up != '' && $search_details->country_grew_up != 0 && $search_details->country_grew_up != -1) {
                        $condition .= ' AND country = ' . $search_details->country_grew_up;
                }
                if ($search_details->education != '' && $search_details->education != 0 && $search_details->education != -1) {
                        $condition .= ' AND education_level	 = ' . $search_details->education;
                }
                if ($search_details->working_with != '' && $search_details->working_with != 0 && $search_details->working_with != -1) {
                        $condition .= ' AND working_with	 = ' . $search_details->working_with;
                }
                if ($search_details->profession_area != '' && $search_details->profession_area != 0 && $search_details->profession_area != -1) {
                        $condition .= ' AND working_as	 = ' . $search_details->profession_area;
                }
                if ($search_details->annual_income_from != '' && $search_details->annual_income_from != 0 && $search_details->annual_income_from != -1) {
                        $condition .= ' AND annual_income_from	 <= ' . $search_details->annual_income_from;
                }
                if ($search_details->diet != '' && $search_details->diet != 0 && $search_details->diet != -1) {
                        $condition .= ' AND diet = ' . $search_details->diet;
                }
                if ($search_details->drink != '' && $search_details->drink != 0 && $search_details->drink != -1) {
                        $condition .= ' AND drink = ' . $search_details->drink;
                }
                if ($search_details->smoke != '' && $search_details->smoke != 0 && $search_details->smoke != -1) {
                        $condition .= ' AND smoke = ' . $search_details->smoke;
                }
                if ($search_details->body_type != '' && $search_details->body_type != 0 && $search_details->skin_tone != -1) {
                        $condition .= ' AND body_type	 = ' . $search_details->skin_tone;
                }
                if ($search_details->skin_tone != '' && $search_details->skin_tone != 0 && $search_details->skin_tone != -1) {
                        $condition .= ' AND skin_tone	 = ' . $search_details->skin_tone;
                }
                if ($search_details->disability != '' && $search_details->disability != 0 && $search_details->disability != -1) {
                        $condition .= ' AND disability	 = ' . $search_details->disability;
                }

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
