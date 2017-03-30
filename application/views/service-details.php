<!-- #header end -->
<!-- Slider start -->

<?php 

 // print_r($data[0]); die;
?>
<section id="slider" class=" clearfix slider-height " >
<div class="swiper-container swiper-parent">
    <div class="swiper-wrapper">
        
         <div class="swiper-slide dark services" >
            <div class="container clearfix">
                
            </div>
        </div> 
    </div>
  
  </div>
 
</section>

<!-- Content
        ============================================= -->
<section id="content">
          <div class="content-wrap">
    <div class="promo promo-dark promo-full landing-promo header-stick ">
              <div class="container clearfix ">
        <p style="color:#008000 ; margin:0 !important;">
                                  </p>
        <div class="vertical" style="display:none;">
                 
                </div>
       <h3 class="" style="margin-top:0px !important;">Call us @ <span>+91-7000150117</span> or Email :<span>info@recoveryvia.com</span>
                  <div class="col_one_fifth col_last nobottommargin pull-right">
            <a class='inline' href="#inline_content"  ><button class="btn btn-lg btn-danger btn-block nomargin " id="toggle-form" value="submit" style="">Start Trial</button></a>
           </div>
                </h3>
      </div>
            </div>
  </div>

<!-- pricing section-->
                <div class="pricing bottommargin clearfix">
                    <div class="container clear-bottommargin clearfix">
                     
                        <div class="col-md-12 " >
                          <div class="col-md-4 services-img" > 
                            <img src="<?php echo base_url()?>hrs/images/uploadServiceImages/<?php echo (isset($data[0]))?$data[0]->service_image:'logo-dark.png'; ?>">
                            <h2 class="trade-title"><?php echo $name; ?></h2>
                          </div>
                          <div class="col-md-8 " >
                           <h2 class="trade-title2" style="background:rgb(2,171,127); Padding:10px; margin-top:3px;"><?php echo $name; ?></h2>
                            
                            <div class="details" style="margin-left:20px;">

                              <?php if(isset($data[0])){

                                echo html_entity_decode($data[0]->service_description);
                              }else{
                                echo "Details not available";
                              } ?>
                                    
                            </div>
                         </div>
                          
                            
                        </div>
 
                    </div> 



                </div>
                
            </div>
                    <!-- end-->


    <script language="javascript">
    document.onmousedown=disableclick;
    status="Right Click Disabled";
    function disableclick(event)
    {
      if(event.button==2)
       {
        //alert(status);
        // return false;    
       }
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
           // alert('not allowed');
           // return false;
        } else {
           // return false;
        }
};
    </script>
<style type="text/css">
.details ul { margin-left: 15px;}
.container.clear-bottommargin.clearfix {
  border: 1px solid #ccc;
  border-radius: 5px;
}
.trade-title2{
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: rgb(2, 171, 127) none repeat scroll 0 0;
  border-bottom: 1px solid #ccc;
  border-image: none;
  border-left: 1px solid #ccc;
  border-radius: 1px;
  border-top: 1px solid #ccc;
  margin-top: 3px;
  padding: 5px;
  margin-left: 10px;
  color: #fff;
}
</style>


         