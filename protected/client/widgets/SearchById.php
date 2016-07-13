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
        public $photo = '';
        public $joined = '';
        public $active_mem = '';
        public $marital_stat = '';
        public $profile_crea = '';
        public $smoking = '';
        public $drinking = '';
        public $diets = '';

        public function run() {

                //$search_details = SavedSearch::model()->findByPk($this->id);
//                $partner = PartnerDetails::model()->findByAttributes(array('user_id' => $this->id));
                if($this->id != '') {
                        $condition = 'user_id = "' . $this->id . '"';
                }


                if($this->sort != '') {
                        $sort .= $this->sort;
                } else {
                        $sort .= 'id DESC';
                }

                if(!empty($this->photo)) {
                        $condition .= ' AND photo_visibility IN (' . $this->photo . ')';
                }
                if($this->joined != '') {
                        if($this->joined == 1) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -1 days"));
                        } else if($this->joined == 2) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -7 days"));
                        } else if($this->joined == 3) {
                                $joined_date = date("Y-m-d", strtotime(date('Y-m-d') . " -30 days"));
                        }
                        if($joined_date != '') {
                                $condition .= ' AND doc >= "' . $joined_date . '"';
                        }
                }
                if($this->active_mem != '') {
                        if($this->active_mem == 1) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -1 days"));
                        } else if($this->active_mem == 2) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -7 days"));
                        } else if($this->active_mem == 3) {
                                $active_members = date("Y-m-d", strtotime(date('Y-m-d') . " -30 days"));
                        }
                        if($active_members != '') {
                                $condition .= ' AND last_login >= "' . $active_members . '"';
                        }
                }

                if(!empty($this->marital_stat)) {
                        $condition .= ' AND marital_status IN (' . $this->marital_stat . ')';
                }
                if(!empty($this->profile_crea)) {
                        $condition .= ' AND profile_for IN (' . $this->profile_crea . ')';
                }
                if(!empty($this->smoking)) {
                        $condition .= ' AND smoke IN (' . $this->smoking . ')';
                }
                if(!empty($this->drinking)) {
                        $condition .= ' AND drink IN (' . $this->drinking . ')';
                }
                if(!empty($this->diets)) {
                        $condition .= ' AND diet IN (' . $this->diets . ')';
                }


                $dataProvider = new CActiveDataProvider('UserDetails', array('criteria' => array(
                        'condition' => $condition,
                        'order' => $sort,
                    ),
                    'pagination' => array(
                        'pageSize' => 25,
                    ),
                ));
                if($dataProvider->getTotalItemCount() >= 1) {
                        if($this->view == 2) {
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
