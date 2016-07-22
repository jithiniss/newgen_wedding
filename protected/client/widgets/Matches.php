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
class Matches extends CWidget {

        public $id = '';

        public function run() {
                $block_details = BlockedMembers::model()->findByAttributes(array('user_id' => $this->id));
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
                $condition2 = 'gender = ' . $gender
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
                        . ' AND status = 1';
                $condition3 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND status = 1';
                $condition4 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND status = 1';
                $condition5 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND status = 1';
                $condition6 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND status = 1';
                $condition7 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND status = 1';
                $condition8 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND status = 1';
                $condition9 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND status = 1';
                $condition10 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND status = 1';


                $condition11 = 'gender = ' . $gender
                        . ' AND status = 1';


                $dataProvider1 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition1
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider2 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition2
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider3 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition3
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider4 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition4
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider5 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition5
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider6 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition6
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider7 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition7
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider8 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition8
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider9 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition9
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider10 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition10
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                $dataProvider11 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition11
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));




                if ($dataProvider1->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider1,
                        ));
                } else if ($dataProvider2->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider2,
                        ));
                } else if ($dataProvider3->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider3,
                        ));
                } else if ($dataProvider4->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider4,
                        ));
                } else if ($dataProvider5->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider5,
                        ));
                } else if ($dataProvider6->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider6,
                        ));
                } else if ($dataProvider7->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider7,
                        ));
                } else if ($dataProvider8->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider8,
                        ));
                } else if ($dataProvider9->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider9,
                        ));
                } else if ($dataProvider10->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider10,
                        ));
                } else if ($dataProvider11->getTotalItemCount() >= 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider11,
                        ));
                }
        }

}
