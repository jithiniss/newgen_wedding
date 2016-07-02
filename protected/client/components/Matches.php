<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadFile
 *
 * @author admin
 */
class Matches extends CApplicationComponent {

        public function MyMatches() {
                $user = UserDetails::model()->findByPk(array('id' => Yii::app()->session['user']['id']));
                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                if ($user->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 2;
                }
                $condition1 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
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
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET("' . $partner->working_with . '",working_with)'
                        . ' AND FIND_IN_SET("' . $partner->profession_area . '",working_as)';
                $condition3 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET("' . $partner->working_with . '",working_with)';
                $condition4 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)'
                        . ' AND city = ' . $user->city;
                $condition5 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)'
                        . ' AND FIND_IN_SET("' . $partner->country_grew_up . '",grow_up_in)';
                $condition6 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)'
                        . ' AND FIND_IN_SET("' . $partner->residency_status . '",state)';
                $condition7 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)'
                        . ' AND FIND_IN_SET("' . $partner->country_living_in . '",country)';
                $condition8 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to
                        . ' AND  FIND_IN_SET("' . $partner->religion . '",religion)'
                        . ' AND FIND_IN_SET("' . $partner->caste . '",caste)';
                $condition9 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from
                        . ' AND dob_year >= ' . $partner->age_to;

                $condition10 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $partner->age_from;

                $condition11 = 'gender = ' . $gender;

                $matchprofile1 = UserDetails::model()->findAll(array('condition' => $condition1));
                $matchprofile2 = UserDetails::model()->findAll(array('condition' => $condition2));
                $matchprofile3 = UserDetails::model()->findAll(array('condition' => $condition3));
                $matchprofile4 = UserDetails::model()->findAll(array('condition' => $condition4));
                $matchprofile5 = UserDetails::model()->findAll(array('condition' => $condition5));
                $matchprofile6 = UserDetails::model()->findAll(array('condition' => $condition6));
                $matchprofile7 = UserDetails::model()->findAll(array('condition' => $condition7));
                $matchprofile8 = UserDetails::model()->findAll(array('condition' => $condition8));
                $matchprofile9 = UserDetails::model()->findAll(array('condition' => $condition9));
                $matchprofile10 = UserDetails::model()->findAll(array('condition' => $condition10));
                $matchprofile11 = UserDetails::model()->findAll(array('condition' => $condition11));


                if (!empty($matchprofile1)) {
                        return $matchprofile1;
                } else if (!empty($matchprofile2)) {
                        return $matchprofile2;
                } else if (!empty($matchprofile3)) {
                        return $matchprofile3;
                } else if (!empty($matchprofile4)) {
                        return $matchprofile4;
                } else if (!empty($matchprofile5)) {
                        return $matchprofile5;
                } else if (!empty($matchprofile6)) {
                        return $matchprofile6;
                } else if (!empty($matchprofile7)) {
                        return $matchprofile7;
                } else if (!empty($matchprofile8)) {
                        return $matchprofile8;
                } else if (!empty($matchprofile9)) {
                        return $matchprofile9;
                } else if (!empty($matchprofile10)) {
                        return $matchprofile10;
                } else if (!empty($matchprofile11)) {
                        return $matchprofile11;
                } else {
                        return NULL;
                }
        }

}
