<!-- #header end -->
<!-- Slider start -->
<section id="slider" class=" clearfix slider-height " >
<div class="swiper-container swiper-parent">
    <div class="swiper-wrapper">
        
         <div class="swiper-slide dark kyc" >
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
                                    <h2>KYC FORM</h2>
                                     
                                </div>
                              
                              <div class="pricing-features pastrecord">
                                <div class="cpln">
                                   Delivering the service without individual identification is like “To hit in the dark”. KYC is medium to make transparency between client and company. KYC helps us to identify you, so that we can assist you according to your identification. You must fill your KYC form before taking any services from our company.
                                </div>
                            </div>
                        </div>
                    </div> 
                    <form action="<?php echo base_url()?>kyc" method="post">
                     <div class="col-md-12 " >

                        <div class="col-md-8" >
                           <div class="col-md-4" >SERVICE*</div>
                           <div class="col-md-4" >DATE OF BIRTH *</div>  
                           <div class="col-md-4" >CARD NUMBER *</div>  

                          <div class="col-md-4" > 
                              
                              <select name="service" class="form-control">
                                <option value="PAN Card">PAN Card</option>
                              </select>

                          </div>

                          <div class="col-md-4" > 
                            <input type="text" name="dob" class="form-control" required>
                          </div> 

                          <div class="col-md-4" > 
                            <input type="text" name="card_number" class="form-control" required>
                          </div> 
                         <div class="col-md-12" >
                         Address

                         </div>  

                         <div class="col-md-12" >
                          <textarea class="form-control" rows="6" name="address"></textarea>
                         </div>
                         <div class="col-md-12" >
                            <div class="col-md-3" >

                              <input type="submit" style="background: rgb(0, 174, 125) none repeat scroll 0% 0%; border: 1px solid rgb(255, 255, 255); color: rgb(255, 255, 255);" name="submit" value="SUBMIT" class="form-control success">
                            </div>
                         </div>
                        </div>

                        <div class="col-md-4" >
                            
                        </div>


                     </div>
                   </form>


                </div>
                
            </div>
                    <!-- end-->

<style type="text/css">
.cpln {
  background: buttonface none repeat scroll 0 0;
  border: 1px solid #ccc;
  float: left;
  margin-top: 20px;
  padding: 10px;
  width: 100%;
  font-size: 16px;
  text-align: justify;
}
.form-control{ width: 98% !important;  }
</style>

<?php if($kyc==1) {?>
<script type="text/javascript">
    alert('Thank you form submission');
</script>
<?php } ?>

         