<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of featured
 *
 * @author user
 */
class featured extends CWidget {

        public $id = '';
        public $width = '';
        public $height = '';

        public function run() {

                $featured = UserPlans::model()->findAllByAttributes(array('featured' => 1));
                $this->render('featured_profile', array('featured' => $featured, 'width' => $this->width, 'height' => $this->height));
        }

}
