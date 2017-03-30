//var $ = jQuery.noConflict();
$(function(){ 
    $(window).load(function(){  
       $('.loading').hide();
     });
       setTimeout(function(){  $('.modal-footer').html('<center style="font-size: 20px; color:rgb(165,1,41)">Stock * Commodity * Forex</center>'); },10);
        $('.custom_pay').click(function(){customPayment();});  // custom payment
        $('.inline').click(function(){clicktrial();});  

        

         if ($('#onloadtrial2').length){ 
            bootbox.dialog({
                title: "<div><u><h3><center>START FREE TRIAL</center></3></u></div>",
                message: '<div class="row">  ' +
                    '<div class="col-md-12  "> ' + 
                        '<div class="col-md-12  ">'+
                        '<div class="col-md-4 trialImg"> '+
                        '<img src="'+base_url+'assets/images/logo-dark.png">'+
                         
                        '</div>' +
                        '<div class="col-md-8 freetrial-popup">'+

                        '<form   id="free_trial_form" onsubmit="return false;">'+
                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> Name<span class="error">*</span>  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" required name="name" id="name" placeholder=" Name">'+
                        '</div> '+
                        '</div>'+

                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> Email<span class="error">*</span>  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="email" required name="email" id="email" placeholder=" info@hrs.com">'+
                        '</div> '+
                        '</div>'+

                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> Phone<span class="error">*</span> </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" name="phone" required id="phone" placeholder=" 8103xxxx76">'+
                        '</div> '+
                        '</div>'+


                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> City </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" name="city" id="city" placeholder="Indore">'+

                        '</div> '+
                        '</div>'+


                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3">  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="submit" onclick="freeTrial();" name="submit" id="submit"  value="START NOW" class="btn btn-primary">'+
                       
                         '</div> '+
                        '</div>'+
                        '</form> '+
                        '</div>'+

                        '</div> </div>  </div>',
                         buttons: {
                    success: {
                        label: "close",
                        className: "btn-danger",
                        callback: function () {
                            
                        }
                    }
                }
                
            }
        );
    } 

});


function freeTrial()
{
     
        var formData =  $('#free_trial_form').serialize();
         
        var name =  $('#name').val().replace(/ +?/g, '');
        var email =  $('#email').val().replace(/ +?/g, '');
        var phone = $('#phone').val().replace(/ +?/g, '');
  

        if(name=='' || email=='' || phone == '' )
        {
            alert("Please fill required field");
            return false;
        }

        
       /* console.log(name.trim());
         return false;*/

   $.ajax({
            url: base_url+'startTrial',
            data: formData,
            cache: false, 
            type: 'post',
            success: function(result) {
                  $('.bootbox-close-button').click()  ;
               bootbox.alert('Thank you for registration. '+result);
              
            }
        });
}

function unserial(serializedString)
{
     
        var str = decodeURI(serializedString);
        var pairs = str.split('&');
        var obj = {}, p, idx, val;
        for (var i=0, n=pairs.length; i < n; i++) {
            p = pairs[i].split('=');
            idx = p[0];

            if (idx.indexOf("[]") == (idx.length - 2)) {
                // Eh um vetor
                var ind = idx.substring(0, idx.length-2)
                if (obj[ind] === undefined) {
                    obj[ind] = [];
                }
                obj[ind].push(p[1]);
            }
            else {
                obj[idx] = p[1];
            }
        }
        return obj;
     
}

function clicktrial()
{
    bootbox.dialog({
                title: "<div><u><h3><center>START FREE TRIAL</center></3></u></div>",
                message: '<div class="row">  ' +
                    '<div class="col-md-12 trial-box"> ' + 
                        '<div class="col-md-12 trial-box">'+
                        '<div class="col-md-4 trialImg"> '+
                        '<img src="'+base_url+'assets/images/logo-dark.png">'+
                         
                        '</div>' +
                        '<div class="col-md-8 freetrial-popup">'+

                        '<form   id="free_trial_form" onsubmit="return false;">'+
                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> Name<span class="error">*</span>  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" required name="name" id="name" placeholder="Name">'+
                        '</div> '+
                        '</div>'+

                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> Email<span class="error">*</span>  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="email" required name="email" id="email" placeholder=" info@xxx.com">'+
                        '</div> '+
                        '</div>'+

                        '<div class="col-md-12trial-box "> '+
                        '<div class="col-md-3"> Phone<span class="error">*</span> </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" name="phone" required id="phone" placeholder=" xxxxxx">'+
                        '</div> '+
                        '</div>'+


                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3"> City </div>'+
                        '<div class="col-md-9">'+
                        '<input type="text" name="city" id="city" placeholder="Indore">'+

                        '</div> '+
                        '</div>'+


                        '<div class="col-md-12 trial-box "> '+
                        '<div class="col-md-3">  </div>'+
                        '<div class="col-md-9">'+
                        '<input type="submit" onclick="freeTrial();" name="submit" id="submit"  value="START NOW" class="btn btn-primary">'+
                       
                         '</div> '+
                        '</div>'+
                        '</form> '+
                        '</div>'+

                        '</div> </div>  </div>',
                         buttons: {
                    success: {
                        label: "close",
                        className: "btn-danger",
                        callback: function () {
                            
                        }
                    }
                }
                
            }
        );
}

function customPayment()
{
    bootbox.dialog({
                title: "<div><u><h3><center>Make custom payment</center></3></u></div>",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' + 
                        '<div class="col-md-12">'+
                        '<div class="col-md-4 trialImg"> '+
                        '<img src="'+base_url+'assets/images/logo.png">'+
                        '<center>  <h5> Research Via</h5> </center>'+
                        '</div>' +
                        '<div class="col-md-8 freetrial-popup">'+

                        '<form   id="custom_payment"  action="https://secure.ebs.in/pg/ma/billing/cart/action/add/" method="post">'+
                        '<div class="col-md-12"> '+
                        '<div class="col-md-12"> Service Name<span class="error">*</span>  </div>'+
                        '<div class="col-md-12">'+
                        '<input type="text" required name="prodName" id="name" placeholder="Enter services name (Stock/Commodity/forex)">'+
                        '</div> '+
                        '</div>'+ 

                         '<input type="hidden" name="accountId" value="f251445dc76c1c35bac5aa963d0ce292MTg0MTc=">'+
                         
                        '<input type="hidden" name="prodQty" value="1">'+
                        '<input type="hidden" name="shopURL" value="aHR0cDovL2hlYXZlbnJlc2VhcmNoc2VjdXJpdHkuY29t">'+
                        '<input type="hidden" name="shippingUnits" value="1">'+

                        '<div class="col-md-12"> '+
                        '<div class="col-md-12"> Amount </div>'+
                        '<div class="col-md-12">'+
                        '<input type="number" required name="prodPrice" id="amount" placeholder="Enter amount">'+

                        '</div> '+
                        '</div>'+


                        '<div class="col-md-12"> '+
                        '<div class="col-md-3">  </div>'+
                        '<div class="col-md-6">'+
                        '<input type="submit" name="customPayment" id="customPayment"  value="Pay Now" class="btn btn-primary">'+
                       
                         '</div> '+
                        '</div>'+
                        '</form> '+
                        '</div>'+

                        '</div> </div>  </div>',
                buttons: {
                    success: {
                        label: "close",
                        className: "btn-danger",
                        callback: function () {
                            
                        }
                    }
                }
            }
        );
}