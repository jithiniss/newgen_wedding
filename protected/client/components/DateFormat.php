<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateFormat
 *
 * @author admin
 */
class DateFormat extends CApplicationComponent
{

        /*
         * default Upload image function
         */

        public function UserFormat($date) {
                if($date!=0000-00-00)
                    return date("d-M-y", strtotime($date));
                else
                    return 'Date Not avilable';

        }
        
        public function DbFormat($date) {

                return date("Y-m-d", strtotime($date));;

        }
 
   
}
