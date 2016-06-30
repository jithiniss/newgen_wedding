<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserInterest
 *
 * @author admin
 */
class UserInterest extends CWidget {

        //public $category_id = '';
        public $interest_id = '';

        public function run() {

                $this->render('interest', array('id' => $this->interest_id));
        }

}
