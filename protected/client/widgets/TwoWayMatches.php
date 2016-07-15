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
class TwoWayMatches extends CWidget {

        public $id = '';

        public function run() {

                $user = UserDetails::model()->findByAttributes(array('id' => $this->id));
                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $this->id));
                if ($user->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                $date_from = date('Y') - $partner->age_from;
                $date_to = date('Y') - $partner->age_to;
                $condition1 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
                        . ' AND FIND_IN_SET(education_field,"' . $partner->education . '")'
                        . ' AND status = 1';
                $mymatches = UserDetails::model()->findAll(array('condition' => $condition1));

                if (!empty($mymatches)) {
                        foreach ($mymatches as $mymatche) {
                                if ($mymatche->gender == 1) {
                                        $partnergender = 2;
                                } else {
                                        $partnergender = 1;
                                }
                                $matches_partner_details = PartnerDetails::model()->findByAttributes(array('user_id' => $mymatche->id));
                                $partner_date_from = date('Y') - $matches_partner_details->age_from;
                                $partner_date_to = date('Y') - $matches_partner_details->age_to;
                                $partnercondition = 'gender = ' . $partnergender
                                        . ' AND dob_year <= ' . $partner_date_from
                                        . ' AND dob_year >= ' . $partner_date_to
                                        . ' AND  FIND_IN_SET(religion,"' . $matches_partner_details->religion . '")'
                                        . ' AND FIND_IN_SET(caste , "' . $matches_partner_details->caste . '")'
                                        . ' AND FIND_IN_SET(country , "' . $matches_partner_details->country_living_in . '")'
                                        . ' AND FIND_IN_SET(state , "' . $matches_partner_details->residency_status . '")'
                                        . ' AND FIND_IN_SET(grow_up_in , "' . $matches_partner_details->country_grew_up . '")'
                                        . ' AND city = ' . $mymatche->city
                                        . ' AND FIND_IN_SET(working_with , "' . $matches_partner_details->working_with . '")'
                                        . ' AND FIND_IN_SET(working_as ,"' . $matches_partner_details->profession_area . '")'
                                        . ' AND FIND_IN_SET(education_field ,"' . $matches_partner_details->education . '")'
                                        . ' AND status = 1'
                                        . ' AND id = ' . $user->id;
                                $partner_matches = UserDetails::model()->findAll(array('condition' => $partnercondition));
                                if (!empty($partner_matches)) {
                                        $selected_ids .= $mymatche->id . ',';
                                }
                        }
                        $selected_ids = rtrim($selected_ids, ',');
                }
                if (!empty($selected_ids)) {
                        $selectcondition = 'gender = ' . $gender
                                . ' AND  id  IN(' . $selected_ids . ')'
                                . ' AND status = 1';
                } else {
                        $selectcondition = 'gender = ' . $gender
                                . ' AND  id  IN(0)'
                                . ' AND status = 1';
                }
                $dataProvider1 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $selectcondition
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                if ($dataProvider1->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider1,
                        ));
                }
        }

}
