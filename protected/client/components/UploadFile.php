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
class UploadFile extends CApplicationComponent
{
    

        public function folderName($min, $max, $id) {

                if ($id > $min && $id < $max) {
                    
                        return $max;
                        
                } else {
                    
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                        
                }
                
        }


            /*
             * default Upload image function
             */

            public function uploadImage($type,$uploads,$id,$cat="double") {
               

                    $folder=$this->folderName(0, 1000, $id);

                            if (!is_dir(Yii::app()->basePath . '/../'.$type.'/'.$folder )) {

                                    mkdir(Yii::app()->basePath . '/../'.$type.'/'.$folder );
                                    chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder , 0777);

                            }else{

                                    chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder , 0777);
                            }

                            if (!is_dir(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/'. $id)) {

                                    mkdir(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id);
                                    chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id, 0777);

                            }else{
                                
                                    chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id, 0777);

                            }
                            
                            if($cat=='single'){
                                
                                    $pictype = explode('/', $uploads->type);
                                    $picname = rand(123, 1234567) . '.' . $pictype['1'];
                                    
                               if ($uploads->saveAs(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id . '/' . $picname)) {

                                            chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id . '/' . $picname, 0777);

                                    }else{

                                            die('Tchnicalerror please try again');

                                    } 
                                     return '/../'.$type.'/'.$folder .'/' . $id . '/' . $picname;   
                                    
                            }else{
                                
                            foreach ($uploads as $uploads => $pic) {
                              

                                    $pictype = explode('/', $pic->type);
                                    $picname = rand(123, 1234567) . '.' . $pictype['1'];

                                    if ($pic->saveAs(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id . '/' . $picname)) {

                                            chmod(Yii::app()->basePath . '/../'.$type.'/'.$folder .'/' . $id . '/' . $picname, 0777);

                                    }else{

                                            die('Tchnicalerror please try again');

                                    }

                            }
                            
                                    }
                                    
                            
            }
 
   
}
