<input type="text" class="textbox-default-searchbox1" placeholder="Search for Deals/Company Name/Keyword/Category/Brand" id="search_box" name="keyword" autocomplete="off">  

<ul class="ul-style" id='result_box' style=""></ul>

<script>
    $j=jQuery.noConflict();
$j(document).ready(function(){
   
        $j(window).keydown(function(event){
            
                if(event.keyCode == 13) {
                  event.preventDefault();
                  return false;
                }
                
        });
        
        $j("#search_box").live('keyup',function(event) {
            
        var dealers_search = $j('#search_box').val();
        
        if(event.which==17 || event.which==18 || event.which==37 || event.which==39){
                
            }else if(event.which==40){
                
                    if($j( ".li-style" ).hasClass( "activee" )){
                       
                            $j( ".activee + .li-style" ).addClass( "next" );
                            $j( ".activee" ).removeClass( "activee" );
                            $j( ".next" ).addClass( "activee" );
                            $j( ".activee" ).removeClass( "next" );
                      
                    }else{
                       
                            $j( ".ul-style .li-style" ).first().addClass( "activee" );
                   }
                   
                }else if(event.which==38){
                    
                        if($j( ".li-style" ).hasClass( "activee" )){
                            
                                $j( ".activee" ).prev().addClass( "next" );
                                $j( ".activee" ).removeClass( "activee" );
                                $j( ".next" ).addClass( "activee" );
                                $j( ".activee" ).removeClass( "next" );
                           
                        }else{

                                $j( ".ul-style .li-style" ).last().addClass( "activee" );
                           
                        }
                        
                }else if(event.which==13){
                    
                        if($j( ".li-style" ).hasClass( "activee" )){
                                $j('#search_box').val($j('.activee').text());
                                $j('#result_box').hide();
                        }
                   
                }else if (dealers_search != ""){
                
                        $.ajax({
                               type: "POST",
                               url: baseurl + "forBussiness/SearchDealers",
                               data: "SearchValue=" + dealers_search,

                        }).done(function(result) {

                               if(result=='invalid'){ 
                                   $j('#result_box').hide(); 
                               }else{
                                  $j('#result_box').html(result).show();
                               }

                        });
                }else{
            
                        $j('#result_box').hide();
                }       
        
        });
        
});
</script>
