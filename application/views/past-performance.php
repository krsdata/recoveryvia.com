<!-- #header end -->
<!-- Slider start -->
<section id="slider" class=" clearfix slider-height " >
<div class="swiper-container swiper-parent">
    <div class="swiper-wrapper">
        
         <div class="swiper-slide dark past-perform" >
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

            <div class="pricing-box">
                <div class="pricing-title">
                    <h2>Our past performance</h2>
                </div>
                
                <div class="pricing-features "> 
                     <div class="col-md-12">
                        <?php foreach ($data as $key => $value) { 
                            ?> 
                        <div class="col-md-3 tracksheet">
                          
                                <img src="<?php echo base_url();?>assets/images/excel.png" width="50px">
                               <a target="_blank" href="<?php echo base_url('hrs/images/uploadServiceImages').'/'.$value->file_name; ?>">
                                <?php echo $value->service_name; ?>
                           </a> 
                        </div> 
                            <?php 
                        }?> 
                     </div> 
                </div>
            </div>
        </div>
    </div>  
</div> 
</div>
                    <!-- end-->

 <style type="text/css">
.tracksheet {
  background: whitesmoke none repeat scroll 0 0;
  height: 120px;
  line-height: -moz-block-height;
border: 2px solid #fff;
margin-bottom: 10px;
}
 </style>



         