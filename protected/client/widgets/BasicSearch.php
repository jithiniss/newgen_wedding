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
        public $sort = '';
        public $view = '';

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


                if ($this->sort != '') {
                        $sort .= $this->sort;
                } else {
                        $sort .= 'id DESC';
                }




                $dataProvider = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition,
                        'order' => $sort,
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                if ($dataProvider->getTotalItemCount() >= 1) {
                        if ($this->view == 2) {
                                $this->render('mymatches_list', array(
                                    'dataProvider' => $dataProvider,
                                ));
                        } else {
                                $this->render('mymatches', array(
                                    'dataProvider' => $dataProvider,
                                ));
                        }
                }
        }

}
