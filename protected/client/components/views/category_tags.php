       

        <input type="text" id="category_tag_select" class="form-control" autocomplete="off" placeholder = "Category Tags">
        
        <div class="col-sm-12 category_tagss">
            
        </div>
         <div class="col-sm-10 category_reciverr">
                                               
        </div>
        <style>
                .category_need_add{
                    width: auto;
                    height: 30px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    padding-left: 10px;
                    cursor: pointer;
                }
                .category_need_add:hover{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
                .category_closee{
                    margin-left: 10px;
                    cursor: pointer;
                }
                .category_tagedd{
                    width: 90px;
                    height: 32px;
                    border-radius: 4px;
                    border:1px solid #d2d2d2;
                    padding: 5px;
                    float: left;
                    margin-left: 10px;
                    background-color: white;
                }
                .category_reciverr{
                    height: 100px;
                     background-color: rgb(244, 244, 244);
                    border: 1px solid #d2d2d2;
                    margin-bottom: 10px;
                    padding: 10px;
                    margin-top: 12px;
                }
                .category_tagss{
                    position: absolute;
                    z-index: 1000;
                    background-color: white;
                    border: 1px solid #d2d2d2;
                    padding: 7px;
                    display: none;
                }
                .category_tag-sub{
                    width: auto;
                    height: 30px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    padding-left: 10px;
                    border-bottom: 1px solid #d2d2d2;
                    cursor: pointer;
                }
                .category_tag-sub:hover{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
                .category_activee{
                    background-color: rgb(200, 234, 247);
                    color: rgb(155, 131, 131);
                    border-radius: 3px;
                }
        </style>
        
        <script type="text/javascript">
            $(document).ready(function(){
         $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
         $('.category_need_add').live('click',function(e){
            
           alert('To do');
             
        });
        
       /* $('#category_tag_select').live('click',function(){
            var cat= $('#<?php //echo $this->category_id; ?>').val();
            if(cat==''){
             alert('Select a Category first.');   
             $('#<?php //echo $this->category_id; ?>').focus();
            }
             
        });*/
              
              
        $('#category_tag_select').live('keyup',function(event){
            if(event.which==17 || event.which==18 || event.which==37 || event.which==39){
                
            }else if(event.which==40){
                    if($( ".category_tag-sub" ).hasClass( "category_activee" )){
                       
                            $( ".category_activee + .category_tag-sub" ).addClass( "category_next" );
                            $( ".category_activee" ).removeClass( "category_activee" );
                            $( ".category_next" ).addClass( "category_activee" );
                            $( ".category_activee" ).removeClass( "category_next" );
                      
                    }else{
                       
                            $( ".category_tagss .category_tag-sub" ).first().addClass( "category_activee" );
                   }
                }
                /*
                 * If enter event
                 */
                else if(event.which==13){
                   
                        if($(this).val()!=''){
                        
                        $('.category_reciverr').append('<div class="category_tagedd">'+$('.category_activee').html()+'<i class="fa fa-close category_closee"></i></div>')
                        $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val()+$('.category_activee').html()+', ');
                        $('#category_tag_select').val('');
                        $( ".category_tagss" ).html('');
                        $( ".category_tagss" ).hide();
                        }
                   
                }
                /*
                 * If key up event
                 */
               else if(event.which==38){
                    
                        if($( ".category_tag-sub" ).hasClass( "category_activee" )){
                            
                                $( ".category_activee" ).prev().addClass( "category_next" );
                                $( ".category_activee" ).removeClass( "category_activee" );
                                $( ".category_next" ).addClass( "category_activee" );
                                $( ".category_activee" ).removeClass( "category_next" );
                           
                       }else{

                                $( ".category_tagss .category_tag-sub" ).last().addClass( "category_activee" );
                           
                       }
                }
            else if($(this).val()!=''){
              categorySelectTag($(this).val());
            }else{
               $('.category_tagss').hide(); 
            }
           
                
        });
        
        $( ".category_tag-sub" ).live('click',function(){
           $('.category_reciverr').append('<div class="category_tagedd">'+$(this).html()+'<i class="fa fa-close category_closee"></i></div>')
           $('#<?php echo $this->category_tag_id; ?>').val($('#<?php echo $this->category_tag_id; ?>').val()+$(this).html()+', ');
                        $('#category_tag_select').val('');
                        $( ".category_tagss" ).html('');
                        $( ".category_tagss" ).hide();
        });
        
        
         $( ".category_closee" ).live('click',function(){
             var parent= $(this).parent().html();
             var parent_res = parent.replace('<i class="fa fa-close category_closee"></i>', "");
            var str = $('#<?php echo $this->category_tag_id; ?>').val();
            var res = str.replace(parent_res+", ", "");
             $('#<?php echo $this->category_tag_id; ?>').val(res);
           $(this).parent().remove();
        });
        
        
     
   
});

/*
 * For selecting the specific tag from the database as per the user input.
 * 
 */
function categorySelectTag(val){
        
        var cat= $('#<?php echo $this->category_tag_id; ?>').val();
        
        $.ajax({
        'url': baseurl + 'rfpRfq/selectTag',
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'html',
        'data':{tag : val,type : '<?php echo $this->type; ?>',taged:cat},
                success: function(result) {
                        if(result!=''){
                        $('.category_tagss').html(result);
                        $('.category_tagss').show();
                        }else{
                            $('.category_tagss').html('<div class="category_need_add">This tag is not in our database. Click to add " '+val+' " to Category Tags ?</div>');
                            $('.category_tagss').show();
                        }
                }
      
        });
}
        </script>