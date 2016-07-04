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
class PhotoVisibility extends CWidget {

        public $id = '';

        public function run() {

                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                $partner = UserDetails::model()->findByPk($this->id);
                $intrest_send = Requests::model()->findByAttributes(array('partner_id' => $partner->user_id, 'user_id' => Yii::app()->session['user']['id'], 'status' => 1));
                $intrest_accept = Requests::model()->findByAttributes(array('partner_id' => Yii::app()->session['user']['id'], 'user_id' => $partner->user_id, 'status' => 2));
                $this->render('photovisibility', array('user' => $user, 'partner' => $partner, 'intrest_send' => $intrest_send, 'intrest_accept' => $intrest_accept));
        }

}
