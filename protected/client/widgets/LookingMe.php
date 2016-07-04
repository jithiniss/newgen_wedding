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
class LookingMe extends CWidget {

        public $id = '';

        public function run() {

                $user = UserDetails::model()->findByAttributes(array('id' => $this->id));
                $lookingmeprofiles = Requests::model()->findAllByAttributes(array('partner_id' => $user->user_id, 'status' => 2));

                if ($user->gender == 1) {
                        $gender = 2;
                } else {
                        $gender = 1;
                }
                foreach ($lookingmeprofiles as $lookingmeprofile) {
                        $ids .= $lookingmeprofile->user_id . ',';
                }
                $ids = rtrim($ids, ',');
                $condition1 = 'gender = ' . $gender
                        . ' AND  id  IN(' . $ids . ')'
                        . ' AND status = 1';
                $dataProvider1 = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition1
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
