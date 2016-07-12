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
class SearchById extends CWidget {

        public $id = '';
        public $sort = '';
        public $view = '';

        public function run() {

                //$search_details = SavedSearch::model()->findByPk($this->id);
//                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $this->id));
                if ($this->id != '') {
                        $condition = 'user_id = "' . $this->id . '"';
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
