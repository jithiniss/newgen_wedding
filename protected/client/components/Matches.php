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

        public function MyMatches() {
                $user = UserDetails::model()->findByPk(array('id' => Yii::app()->session['user']['id']));
                $blocked_members = BlockedMembers::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 1));
                foreach ($blocked_members as $blocked) {
                        $optionsid = $blocked->block_id . ',';
                        $opt.=$optionsid;
                }
                $blocked_ids = rtrim($opt, ',');
                if (!empty($blocked_ids)) {
                        $blocked_ids = rtrim($opt, ',');
                } else {
                        $blocked_ids = 0;
                }
//                var_dump($blocked_ids);
//                exit;
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
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
                        . ' AND FIND_IN_SET(education_field,"' . $partner->education . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')   '
                        . ' AND status = 1';
                $condition2 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')   '
                        . ' AND status = 1';
                $condition3 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition4 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND city = ' . $user->city
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition5 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND FIND_IN_SET(grow_up_in,"' . $partner->country_grew_up . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition6 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND FIND_IN_SET(state,"' . $partner->residency_status . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition7 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND FIND_IN_SET(country,"' . $partner->country_living_in . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ')  '
                        . ' AND status = 1';
                $condition8 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND FIND_IN_SET(caste,"' . $partner->caste . '")'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';
                $condition9 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';

                $condition10 = 'gender = ' . $gender
                        . ' AND dob_year <= ' . $date_from
                        . ' AND dob_year >= ' . $date_to
                        . ' AND FIND_IN_SET("' . $partner->religion . '" , religion)'
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';


                $condition11 = 'gender = ' . $gender
                        . ' AND id NOT IN (' . $blocked_ids . ') '
                        . ' AND status = 1';
//                $block_user = 'id NOT IN ("' . $blocked_ids . '")  AND ';
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

//                var_dump($condition10);
//                exit;
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

        public function MyTwoWayMatches($uid) {

                $user = UserDetails::model()->findByPk(array('id' => $uid));
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
//                        . ' AND FIND_IN_SET(working_with,"' . $partner->working_with . '")'
//                        . ' AND FIND_IN_SET(working_as,"' . $partner->profession_area . '")'
//                        . ' AND FIND_IN_SET(education_field,"' . $partner->education . '")'
                        . ' AND status = 1';
                $mymatchestwo = UserDetails::model()->findAll(array('condition' => $condition1));

                if (!empty($mymatchestwo)) {
                        foreach ($mymatchestwo as $mymatche) {
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
                                        return $partner_matches;
                                } else {
                                        return NULL;
                                }
//                                if (!empty($partner_matches)) {
//                                        $selected_ids .= $mymatche->id . ',';
//                                }
                        }
//                        $selected_ids = rtrim($selected_ids, ',');
                }

//                $selectcondition = 'gender = ' . $gender
//                        . ' AND  id  IN(' . $selected_ids . ')'
//                        . ' AND status = 1';
//                $dataProvider1 = new CActiveDataProvider('UserDetails', array('criteria' => array(
//                        'condition' => $selectcondition
//                    ),
//                    'pagination' => array(
//                        'pageSize' => 25,
//                    ),
//                ));
//                if ($dataProvider1->getTotalItemCount() >= 1) {
//
//                        $this->render('mymatches', array(
//                            'dataProvider' => $dataProvider1,
//                        ));
//                }
        }

}
