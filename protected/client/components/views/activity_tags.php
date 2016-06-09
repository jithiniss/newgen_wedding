       

        <input type="text" id="activity_tag_select" class="form-control" autocomplete="off" placeholder = "Activity Tags">
        
        <div class="col-sm-12 activity_tagss">
            
        </div>
         <div class="col-sm-10 activity_reciverr">
                                               
        </div>
        <style>
                .activity_need_add{
                    width: auto;
                    height: 30px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    padding-left: 10px;
                    cursor: pointer;
                }
                .activity_need_add:hover{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
                .activity_closee{
                    margin-left: 10px;
                    cursor: pointer;
                }
                .activity_tagedd{
                    width: 90px;
                    height: 32px;
                    border-radius: 4px;
                    border:1px solid #d2d2d2;
                    padding: 5px;
                    float: left;
                    margin-left: 10px;
                    background-color: white;
                }
                .activity_reciverr{
                    height: 100px;
                     background-color: rgb(244, 244, 244);
                    border: 1px solid #d2d2d2;
                    margin-bottom: 10px;
                    padding: 10px;
                    margin-top: 12px;
                }
                .activity_tagss{
                    position: absolute;
                    z-index: 1000;
                    background-color: white;
                    border: 1px solid #d2d2d2;
                    padding: 7px;
                    display: none;
                }
                .activity_tag-sub{
                    width: auto;
                    height: 30px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    padding-left: 10px;
                    border-bottom: 1px solid #d2d2d2;
                    cursor: pointer;
                }
                .activity_tag-sub:hover{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
                .activity_activee{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
        </style>
        
        <script type="text/javascript">
            $(document).ready(function(){
        
         $('.activity_need_add').live('click',function(){
           alert('To do');
             
        });
        
       /* $('#category_tag_select').live('click',function(){
            var cat= $('#<?php //echo $this->category_id; ?>').val();
            if(cat==''){
             alert('Select a Category first.');   
             $('#<?php //echo $this->category_id; ?>').focus();
            }
             
        });*/
              
              
        $('#activity_tag_select').live('keyup',function(event){
            if(event.which==40 || event.which==38 || event.which==17 || event.which==18 || event.which==37 || event.which==39){
                
            }else if($(this).val()!=''){
              selectTag($(this).val());
            }else{
               $('.activity_tagss').hide(); 
            }
           
                
        });
        
        $( ".activity_tag-sub" ).live('click',function(){
           $('.activity_reciverr').append('<div class="activity_tagedd">'+$(this).html()+'<i class="fa fa-close activity_closee"></i></div>')
           $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val()+$(this).html()+', ');
                        $('#activity_tag_select').val('');
                        $( ".activity_tagss" ).html('');
                        $( ".activity_tagss" ).hide();
        });
        
        
         $( ".activity_closee" ).live('click',function(){
             var parent= $(this).parent().html();
             var parent_res = parent.replace('<i class="fa fa-close activity_closee"></i>', "");
            var str = $('#<?php echo $this->category_tag_id; ?>').val();
            var res = str.replace(parent_res+", ", "");
             $('#<?php echo $this->category_tag_id; ?>').val(res);
           $(this).parent().remove();
        });
        
        
        $( "#activity_tag_select" ).on( "keydown", function( event ) {
            
                /*
                 * If key down event
                 */
                if(event.which==40){
                    if($( ".activity_tag-sub" ).hasClass( "activity_activee" )){
                       
                            $( ".activity_activee + .activity_tag-sub" ).addClass( "activity_next" );
                            $( ".activity_activee" ).removeClass( "activity_activee" );
                            $( ".activity_next" ).addClass( "activity_activee" );
                            $( ".activity_activee" ).removeClass( "activity_next" );
                      
                    }else{
                       
                            $( ".activity_tagss .activity_tag-sub" ).first().addClass( "activity_activee" );
                   }
                }
                /*
                 * If enter event
                 */
                if(event.which==13){
                    
                        $('#<?php echo $this->form_id; ?>').submit(function(e){
                             e.stopPropagation();
                                e.preventDefault();
                               //  alert(e.type);
                               //  alert(event.which);
                               
                        });
                        
                        $('.activity_reciverr').append('<div class="activity_tagedd">'+$('.activity_activee').html()+'<i class="fa fa-close activity_closee"></i></div>')
                        $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val()+$('.activity_activee').html()+', ');
                        $('#activity_tag_select').val('');
                        $( ".activity_tagss" ).html('');
                        $( ".activity_tagss" ).hide();
                        
                   
                }
                /*
                 * If key up event
                 */
                if(event.which==38){
                    
                        if($( ".activity_tag-sub" ).hasClass( "activity_activee" )){
                            
                                $( ".activity_activee" ).prev().addClass( "activity_next" );
                                $( ".activity_activee" ).removeClass( "activity_activee" );
                                $( ".activity_next" ).addClass( "activity_activee" );
                                $( ".activity_activee" ).removeClass( "activity_next" );
                           
                       }else{

                                $( ".activity_tagss .activity_tag-sub" ).last().addClass( "activity_activee" );
                           
                       }
                }
        });
   
});

/*
 * For selecting the specific tag from the database as per the user input.
 * 
 */
function selectTag(val){
        
        var cat= $('#<?php echo $this->category_tag_id; ?>').val();
       
        $.ajax({
        'url': baseurl + 'rfpRfq/selectTag',
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'html',
        'data':{tag : val,type : '<?php echo $this->type; ?>',taged:cat},
                success: function(result) {
                   // alert(result);
                        if(result!=''){
                        $('.activity_tagss').html(result);
                        $('.activity_tagss').show();
                        }else{
                            $('.activity_tagss').html('<div class="activity_need_add">This tag is not in our database. Click to add " '+val+' " to Category Tags ?</div>');
                            $('.activity_tagss').show();
                        }
                }
      
        });
}
        </script>
