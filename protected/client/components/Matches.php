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

        public function run() {
                $user = UserDetails::model()->findByPk(array('id' => Yii::app()->session['user']['id']));
                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
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
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET("' . $partner->working_with . '",working_with)'
                        . ' AND FIND_IN_SET("' . $partner->profession_area . '",working_as)'
                        . ' AND FIND_IN_SET("' . $partner->education . '",education_field)';
                $condition2 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET("' . $partner->working_with . '",working_with)'
                        . ' AND FIND_IN_SET("' . $partner->profession_area . '",working_as)';
                $condition3 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET("' . $partner->working_with . '",working_with)';
                $condition4 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city;
                $condition5 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)';
                $condition6 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)';
                $condition7 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)';
                $condition8 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)';
                $condition9 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)';
                $condition10 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to;

                $condition11 = 'gender = ' . $gender;
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





                if ($dataProvider1->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider1,
                        ));
                } else if ($dataProvider2->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider2,
                        ));
                } else if ($dataProvider3->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider3,
                        ));
                } else if ($dataProvider4->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider4,
                        ));
                } else if ($dataProvider5->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider5,
                        ));
                } else if ($dataProvider6->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider6,
                        ));
                } else if ($dataProvider7->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider7,
                        ));
                } else if ($dataProvider8->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider8,
                        ));
                } else if ($dataProvider9->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider9,
                        ));
                } else if ($dataProvider10->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider10,
                        ));
                } else if ($dataProvider11->getTotalItemCount() > 1) {

                        $this->render('mymatches', array(
                            'dataProvider' => $dataProvider11,
                        ));
                }
        }

}
