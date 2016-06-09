<!DOCTYPE html>
<html dir="ltr" lang="fr" class="no-js fr">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adspirelabs B2B</title>
     
    <!-- Bootstrap -->

    <!-- Bootstrap -->
      
    <!-- custom 
    <link href="<?php //echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">-->
      <link href="<?php echo Yii::app()->request->baseUrl; ?>/fonts/open/stylesheet.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
   
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fs.selecter.css" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->request->baseUrl; ?>/css/minified.main.gzc20a.css" />
 <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_1.css" rel="stylesheet" >
    <!-- custom -->
    <script>
            var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
            var basepath = "<?php print Yii::app()->basePath; ?>";
        </script>
  </head>
  <body>
   
      <!-- header -->
      <div class="header-top">
      <div class="container">
        <div class="col-xs-12">    
          <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"  class="logo"></a>
          <div class="header-top-btn">
            <ul>
               <?php if(isset(Yii::app()->session['b2b']['id'])!='') { ?> 
                <li class="header-top-btn">
                   <?php echo CHtml::link('Log out',array('site/out'));?></li>
                <li class="header-top-btn">
                   <?php echo CHtml::link('DashBoard',array('b2bHome/index'));?></li>
                <li class="header-top-btn">
                    <a style="background:none;"> <span style="color: #9e9fa4;">Welcome</span> <span style="color: #29b8f6;"><?php echo Yii::app()->session['b2b']['contact_name']; ?></span></a></li>
                
                   <?php }else{ ?>
            <li class="header-top-btn"><a href="#" data-toggle="modal" data-target="#myModal5">login</a></li>
            <li class="header-top-btn"><a href="#" data-toggle="modal" data-target="#myModal4" id="reg_click">register</a></li>
               <?php } ?>
           </ul>
          </div>  
          
        </div>
          
      </div>
      </div>
      <!-- header -->
      
      <!-- menu-categories -->
     <div class="container">
        <div class="menu-categories">
         <nav class="menu-categories_box">
        <ul class="list-unstyled main-menu">
          
          <!--Include your navigation here-->
          <li class="text-right"><a href="#" id="nav-close">X</a></li>
          <li><a href="#">Electronics<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="0" style="display: none;">
                <li class="sub-nav"><a href="#">Mobiles <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">iPads &amp; Tablets <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Laptops &amp; Computers <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Home Appliances <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Entertainment <span class="icon"></span></a></li>
            </ul>
          </li>
        <li><a href="#">Health &amp; Beauty<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="1" style="display: none;">
                <li class="sub-nav"><a href="#">Salons &amp; Spas <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Hospitals &amp; Clinics <span class="icon"></span></a></li>
            </ul>
          </li>
            <li><a href="#">Eat &amp; Drink<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="2" style="display: none;">
                <li class="sub-nav"><a href="#">Restaurants <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Fast Food<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Cafes<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Art &amp; Handicrafts <span class="icon"></span></a></li>
          <li><a href="#">Hotels &amp; Apartments<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="3" style="display: none;">
                <li class="sub-nav"><a href="#">Hotels &amp; Resorts <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Apartments<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Holiday &amp; Travel<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="4" style="display: none;">
                <li class="sub-nav"><a href="#">Travel Tickets<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Activities &amp; Weekend ...<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Holiday Packages<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Fashion &amp; Accessories<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="5" style="display: none;">
                <li class="sub-nav"><a href="#">Abaya &amp; Hijab<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Mens &amp; Ladies Wear<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Kids Wear<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Gold &amp; Diamonds<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Perfumes &amp; Fragrances<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Footwear &amp; Bags<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Eyewear<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Watches<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Department Stores<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="6" style="display: none;">
                <li class="sub-nav"><a href="#">Electronics Store <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Hypermarkets &amp; Superm...<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Learning &amp; Games<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="7" style="display: none;">
                <li class="sub-nav"><a href="#">Catch the Bullet <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Snoopydoo<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Events &amp; Celebrations <span class="icon"></span></a></li>
          <li><a href="#">Car Rentals<span class="icon"></span></a></li>
          <li><a href="#">Vehicles<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="8" style="display: none;">
                <li class="sub-nav"><a href="#">New Cars<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Services<span class="icon"></span></a></li>
          <li><a href="#">Banking &amp; Finance<span class="icon"></span></a></li>
          <li><a href="#">Learning &amp; Games<span class="caret"></span></a>
            <ul class="list-unstyled" data-index="9" style="display: none;">
                <li class="sub-nav"><a href="#">Catch the Bullet<span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Snoopydoo<span class="icon"></span></a></li>
            </ul>
          </li>
          <li><a href="#">Telecom<span class="icon"></span></a></li>
          <li><a href="#">Trading<span class="icon"></span></a></li>
        </ul>
      </nav>
          
    <div class="navbar-inverse ">      
        
        <!--Include your brand here-->
        
        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed menu-categories_box">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/categories-menu.png">
          </a>
        </div>
    </div>   
            
        </div> 
        </div>   
      <!-- menu-categories -->

	<?php echo $content; ?>
      
      
      <div class="footer">
        <div class="container">
        <div class="col-lg-4 col-md-4 col-sm-4 footer-menu-links border-right-footer">
            <ul class="footer-menu-links">
            <li><a href="#" data-toggle="modal" data-target="#myModal">About</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal2">Privacy</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal3">Terms & Conditions</a></li>
            </ul>    
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 footer-address border-right-footer"><strong>Adspire Labs </strong> <br>
      1st Floor Raiban Shopping Complex<br>
    Near General Hospital Jn<br>
    Alappuzha 688001<br>
    Kerala,India<br>
    
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/phone_icon_footer.jpg"> +973 1758 2235 | <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fax_icon_footer.jpg"> +973 1758 2236 <br>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mail_icon_footer.jpg"> info@adspirelabs.com </div>
            
        <div class="col-lg-4 col-md-4 col-sm-4 footer-follow-us"><strong>follow us</strong><br>
         <div class="footer-social-icon">
           
            <a href="#" class="footer-social-icon fb"></a>
            <a href="#" class="footer-social-icon twt"></a>
            <a href="#" class="footer-social-icon googleplus"></a>
            <a href="#" class="footer-social-icon instagram"></a>
            <a href="#" class="footer-social-icon p"></a>
            
            </div>   
        </div>
        </div>
    </div>  
    <!-- footer -->  
    
      
    <!--pop-up -->
      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">About</h4>
        <p><h3>Greetings!</h3>

BIP is the latest offering from Adspire Labs, a software development company dedicated to creating web enabled business technologies.
BIP is offered on various digital platforms and is poised to become the hottest destination on the web, mobile and apps scene in Bahrain & GCC.
BIP is the first of its kind in the industry providing a true Digital Advertising Platform. This business solution integrates the yellow pages
search with a unique deals directory and the social network platform. The result being a highly fascinating browsing experience that help consumers/buyers find hot shopping deals, businesses and almost everything else around you. The visitors to our sites are as diverse as our registered customers ranging from regular shoppers to service providers, retailers and wholesalers.
Our entrepreneurial flair is combined with a philanthropic approach to business. Our web pages have advertisement spaces reserved for the same. The proceeds from advertisements that appear here are donated to charity...

<h4>Our Mission Statement:</h4>

Innovative business vision | Solutions you can trust | Aspirations for a better world</p>
      </div>
      <div class="modal-body">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
      

      
      
      
      
      

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Privacy</h4>
          
<h4>This Privacy Statement (ìPrivacy Statementî) clarifies how BIP uses personal information.</h4>

<h5>1. Types of Personal Information We Collect</h5>

Personal Information is information that can be used to identify, locate, or contact an individual for providing you with promotions and search results for you. It also includes other information that may be associated with Personal Information. We collect the following types of Personal Information:
Contact Information that allows us to communicate with you, such as your name, postal addresses, email addresses, social media website user account names, telephone numbers, or other addresses at which you receive communications from or on behalf of BIP.
<h5>2. How BIP Collects Personal Information</h5>

Personal Information is collected when you register, subscribe, create an account, or otherwise interact with the site or various promotions. 
<h5>3. How BIP Uses Personal Information Operate and improve our Sites</h5>
Provide customers with offers for products and services
Perform other analysis and result monitoring techniques
Provide customer support, including to our merchants or business partners
Fulfill requests for services
Communicate and provide additional information that may be of interest to you, such as news, special offers and coupons, announcements, and marketing materials
Send you reminders, technical notices, updates, security alerts and support and administrative messages service bulletins, or marketing
Provide advertisements to you through the Sites, email messages, text messages, applications, or other methods of communication
Administer surveys, sweepstakes, contests, or other promotional activities or events sponsored by us or our partners Allow you to apply for a job, post a video or sign up for special offers from third parties through the Site
v4. BIP gurantee

Your Personal Information shall not be disclosed or shared with third-parties.
<h5>5. Accessing and Correcting Personal Information</h5>

You may correct your information by signing in your account. Or you may also email to info@adspirelabs.com.com. If you want to close your account or have other questions or requests, please contact us here.
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>
      
      
      
      
      
      
      
   <!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>

BIP is a Digital Advertising Platform combined with traditional Yellow Pages Company Listings and featuring promotions & discount deals with popular businesses, on their products. Content delivery via our Website and Mobile Apps provides the users with an exciting and highly productive experience.
Please review the following carefully, by using the site and BIP service you are agreeing to these terms:
<h4>Terms and conditions</h4>

For Users<br>
Provide actual information while creating your user ID.<br>
You are solely responsible for your User ID and the activity that occurs while signed in to or while using BIP using your User ID.<br>
You will not use BIP to collect any personally identifiable information, including account names, email addresses, or other such information, for commercial purposes.<br>
When you register, you will obtain unique log-in credentials (a ìUser IDî). Access to BIP and Services is not authorized by any other person or entity using your User ID and you are responsible for preventing such unauthorized use. Please notify us immediately if you become aware that your User ID is being used without authorization.<br>
Each Promotion/Ad Campaigns may have specific terms associated with the same, which will be presented to you.<br>
All Promotions and Ad Campaigns are at the sole discretion of the 'Advertiser' and BIP shall not be responsible in any way.<br>
We have the right to determine whether any of your Content submissions are appropriate and comply with these Terms of Service, remove any and/or all of your submissions, and terminate your account with or without prior notice if you are found violating teh Terms of Service.
<h4>For Merchants</h4>

To be clear, BIP advertises the Deals and acts an as a platform for advertising the Promotions/Ad- Campaigns on behalf of the Merchants. But the Merchant is the creator of the Promotion/Ad-Campaign. 
          
      </div>
      <div class="modal-body">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
      
    
    <!-- Modal -->

    
    
    
    
    
    
    <!-- Modal -->

    <!--pop-up -->   
      
      
      
    <a href="#" class="back-to-top"></a>
      
      
      
      

      
      
      
   
      
      
      
      
      
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
    <!-- custom Jquery-->  
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/minified.main.gza87f.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fs.selecter.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.navgoco.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
    
    <!-- custom Jquery--> 
  
       <script>
          
          
          document.getElementsByTagName('html')[0].className = document.getElementsByTagName('html')[0].className.replace( 'no-js' , 'has-js'           );
    
    
    
    </script>
   
    <script>
    $(document).ready(function(){												
       
       //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
      	
      	
      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: true,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
  
        	
      });
      </script>
     
  </body>
</html>
