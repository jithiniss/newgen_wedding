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
class AdvanceSearch extends CWidget {

        public $id = '';
        public $sort = '';
        public $view = '';
        public $photo = '';
        public $joined = '';
        public $active_mem = '';
        public $marital_stat = '';
        public $profile_crea = '';
        public $smoking = '';
        public $drinking = '';
        public $diets = '';

        public function run() {

                $search_details = SavedSearch::model()->findByPk($this->id);
//                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $this->id));
                if($search_details->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                $date_from = date('Y') - $search_details->age_from;
                $date_to = date('Y') - $search_details->age_to;
                $condition = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to;
                if($search_details->marital_status != '' && $search_details->marital_status != 0 && $search_details->marital_status != -1) {
                        $condition .= ' AND  marital_status = ' . $search_details->marital_status;
                }
                if($search_details->religion != '' && $search_details->religion != 0 && $search_details->religion != -1) {
                        $condition .= ' AND  religion = ' . $search_details->religion;
                }
                if($search_details->caste != '' && $search_details->caste != 0 && $search_details->caste != -1) {
                        $condition .= ' AND caste = ' . $search_details->caste;
                }
                if($search_details->mothertongue != '' && $search_details->mothertongue != 0 && $search_details->mothertongue != -1) {
                        $condition .= ' AND mothertongue = ' . $search_details->mothertongue;
                }
                if($search_details->country_living_in != '' && $search_details->country_living_in != 0 && $search_details->country_living_in != -1) {
                        $condition .= ' AND country = ' . $search_details->country_living_in;
                }
                if($search_details->residency_status != '' && $search_details->residency_status != 0 && $search_details->residency_status != -1) {
                        $condition .= ' AND state = ' . $search_details->residency_status;
                }
                if($search_details->country_grew_up != '' && $search_details->country_grew_up != 0 && $search_details->country_grew_up != -1) {
                        $condition .= ' AND country = ' . $search_details->country_grew_up;
                }
                if($search_details->education != '' && $search_details->education != 0 && $search_details->education != -1) {
                        $condition .= ' AND education_level	 = ' . $search_details->education;
                }
                if($search_details->working_with != '' && $search_details->working_with != 0 && $search_details->working_with != -1) {
                        $condition .= ' AND working_with	 = ' . $search_details->working_with;
                }
                if($search_details->profession_area != '' && $search_details->profession_area != 0 && $search_details->profession_area != -1) {
                        $condition .= ' AND working_as	 = ' . $search_details->profession_area;
                }
                if($search_details->annual_income_from != '' && $search_details->annual_income_from != 0 && $search_details->annual_income_from != -1) {
                        $condition .= ' AND annual_income_from	 <= ' . $search_details->annual_income_from;
                }
                if($search_details->diet != '' && $search_details->diet != 0 && $search_details->diet != -1) {
                        $condition .= ' AND diet = ' . $search_details->diet;
                }
                if($search_details->drink != '' && $search_details->drink != 0 && $search_details->drink != -1) {
                        $condition .= ' AND drink = ' . $search_details->drink;
                }
                if($search_details->smoke != '' && $search_details->smoke != 0 && $search_details->smoke != -1) {
                        $condition .= ' AND smoke = ' . $search_details->smoke;
                }
                if($search_details->body_type != '' && $search_details->body_type != 0 && $search_details->skin_tone != -1) {
                        $condition .= ' AND body_type	 = ' . $search_details->skin_tone;
                }
                if($search_details->skin_tone != '' && $search_details->skin_tone != 0 && $search_details->skin_tone != -1) {
                        $condition .= ' AND skin_tone	 = ' . $search_details->skin_tone;
                }
                if($search_details->disability != '' && $search_details->disability != 0 && $search_details->disability != -1) {
                        $condition .= ' AND disability	 = ' . $search_details->disability;
                }
                if($this->sort != '') {
                        $sort .= $this->sort;
                } else {
                        $sort .= 'id DESC';
                }
                if(!empty($this->photo)) {
                        $condition .= ' AND photo_visibility IN (' . $this->photo . ')';
                }
                if($this->joined != '') {
                        if($this->joined == 1) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -1 days"));
                        } else if($this->joined == 2) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -7 days"));
                        } else if($this->joined == 3) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -30 days"));
                        }
                        if($joined_date != '') {
                                $condition .= ' AND doc >= "' . $joined_date . '"';
                        }
                }
                if($this->active_mem != '') {
                        if($this->active_mem == 1) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -1 days"));
                        } else if($this->active_mem == 2) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -7 days"));
                        } else if($this->active_mem == 3) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -30 days"));
                        }
                        if($active_members != '') {
                                $condition .= ' AND last_login >= "' . $active_members . '"';
                        }
                }

                if(!empty($this->marital_stat)) {
                        $condition .= ' AND marital_status IN (' . $this->marital_stat . ')';
                }
                if(!empty($this->profile_crea)) {
                        $condition .= ' AND profile_for IN (' . $this->profile_crea . ')';
                }
                if(!empty($this->smoking)) {
                        $condition .= ' AND smoke IN (' . $this->smoking . ')';
                }
                if(!empty($this->drinking)) {
                        $condition .= ' AND drink IN (' . $this->drinking . ')';
                }
                if(!empty($this->diets)) {
                        $condition .= ' AND diet IN (' . $this->diets . ')';
                }

                $dataProvider = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                // if($dataProvider->getTotalItemCount() >= 1) {
                if($this->view == 2) {
                        $this->render('mymatches_list', array(
                            'dataProvider' => $dataProvider,
                        ));
                } else {
                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider,
                        ));
                }
                // }
        }

}
