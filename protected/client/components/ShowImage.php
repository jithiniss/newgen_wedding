<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShowImage
 *
 * @author admin
 */
class ShowImage extends CWidget {
    
        public $id = '';
        public $type='';
        public $folder='';
        public $show_type='';

        public function run() {

                    $this->folder=Yii::app()->upload->folderName(0, 1000, $this->id);
                    $type='rfprfqimages';
                    $dir = Yii::app()->basePath . '/../'.$this->type.'/'.$this->folder.'/'.$this->id;
                    if(is_dir($dir)){
                    $files = scandir($dir);
                    unset($files[0]);
                    unset($files[1]);
                    if($this->show_type=='simple'){
                        
                        $this->render('show_attach',array('files'=>$files));
                    }else{
                        $this->render('show_image',array('files'=>$files));
                    }
                    
                    }

        }
    
    
}
