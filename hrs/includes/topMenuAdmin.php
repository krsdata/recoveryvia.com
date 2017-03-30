<div class="nav">
  <div class="table">
   
    <div class="nav-divider">&nbsp;</div>
    
        <ul <?php if($curPage=='price' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
            <li><a href="manage-price.php"><b>Manage Price</b></a>
                <div class="select_sub show">
                  <ul class="sub">
                    <li <?php if($curSubPage=='view_price'){ echo 'class="sub_show"';}?>><a href="manage-price.php">View Price</a></li>
                    <li <?php if($curSubPage=='add_price'){ echo 'class="sub_show"';}?>><a href="add-edit-price.php">Add add price</a></li>
                   </ul>
                </div>
            </li>
        </ul>

         <ul <?php if($curPage=='service' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
            <li><a href="manage-service.php"><b>Manage Service page</b></a>
                <div class="select_sub show">
                  <ul class="sub">
                    <li <?php if($curSubPage=='add_service_details'){ echo 'class="sub_show"';}?>><a href="add-edit-service-details.php">Add Services Details</a></li>
                    <li <?php if($curSubPage=='add_service_name'){ echo 'class="sub_show"';}?>><a href="add-edit-service-name.php">Add Service Name</a></li>
                  
                  </ul>
                </div>
            </li> 
        </ul> 

        <ul <?php if($curPage=='performance' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
            <li><a href="manage-performance.php"><b>Past Performance</b></a>
                <div class="select_sub show">
                  <ul class="sub">
                    <li <?php if($curSubPage=='add_performance'){ echo 'class="sub_show"';}?>><a href="add-edit-performance.php">Add Services Details</a></li>
                    
                  </ul>
                </div>
            </li> 
        </ul> 

        <ul <?php if($curPage=='trial' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
            <li><a href="free_trial.php"><b>Trial</b></a>
                
            </li> 
        </ul>
         

      <!--    <ul <?php if($curPage=='homepag' || $curPage=='page'){ echo 'class="current"';}else{ echo 'class="select"';}?>>
            <li><a href="manage-homepage.php"><b>Manage Home page</b></a>
                <div class="select_sub show">
                  <ul class="sub">
                    <li <?php if($curSubPage=='view_homepage'){ echo 'class="sub_show"';}?>><a href="manage-homepage.php">View Home page</a></li>
                    <li <?php if($curSubPage=='add_logo'){ echo 'class="sub_show"';}?>><a href="update_logo.php">Update logo</a></li>
                    <li <?php if($curSubPage=='add_slider'){ echo 'class="sub_show"';}?>><a href="add-edit-slider.php">Add Slider image</a></li>

                    <li <?php if($curSubPage=='add_slider'){ echo 'class="sub_show"';}?>><a href="add-edit-address.php">Update Mailing Address</a></li>
                    <li <?php if($curSubPage=='view_page'){ echo 'class="sub_show"';}?>><a href="manage-page.php">Search Case</a></li>
                  </ul>
                </div>
            </li> 
        </ul>  -->
     
   
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>a
