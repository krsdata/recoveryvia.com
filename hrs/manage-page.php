<?php
$curPage='user';
$curSubPage='add_user'; 
include("includes/header.php");
include("global.php");



$pageHead = 'Search Case details :';
 


if(isset($_POST['submit']) && $_POST['submit']!='')
{
	  
	 
	 extract($_POST);  
	 
	 
			$arr['parties_name'] 	= $parties_name;
			$arr['appellant'] 	= $appellant;
			$arr['respondent'] 	= $respondent;
			$arr['address'] 		= $address;
			//$arr['email'] 		= $email;
			$arr['reference_by'] 	= $reference_by;
			$arr['court'] 		= $court;
			
			$arr['file_on'] 		= $file_on;
			$arr['filled_on_date'] = $filled_on_date;
		 
			 
   
}
?>
<!-- start content-outer ........................................................................................................................START -->
<style>
#id-form th {
    line-height: 28px;
    min-width: 130px;
    padding: 0 0 10px;
    text-align: left;
    width: 240px;
}
</style>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1><?php echo $pageHead;?>  </h1> <span></span>
    </div>
    <!-- end page-heading -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
      <tr>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
        <th class="topleft"></th>
        <td id="tbl-border-top">&nbsp;</td>
        <th class="topright"></th>
        <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
      </tr>
      <tr>
        <td id="tbl-border-left"></td>
        <td><!--  start content-table-inner ...................................................................... START -->
          <div id="content-table-inner" style="margin-left:180px;">
            <?php include('includes/message.php');?>
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr valign="top">
                <td><!-- start id-form -->
                  <form name="addEditForm" id="addEditForm" method="get" action="search-user.php" > 
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top"> </th>
                        <td style="color:#FF0000; font-size:18px"> <?php if(!empty($_GET['status'])) { echo "Search record not found. Try again"; } ?> </td>
                        <td> </td>
                      </tr>
					  
					  <tr>
                        <th valign="top">Name of Parties:</th>
                        <td><input type="text" name="parties_name" id="parties_name" class="inp-form required" value="<?php echo $_GET['parties_name']=='' ? $datauser['parties_name'] : $_GET['parties_name'];?>" placeholder="Enter Name of Parties"/></td>
                        <td><div id="parties_nameError" class="errormessage"></div></td>
                      </tr>
					  
					 
					  
                        <tr>
                        <th valign="top">Reference:</th>
                        <td><input type="text" class="inp-form " name="reference_by" id="reference_by" value="<?php echo $_GET['reference_by']=='' ? $datauser['reference_by'] : $_GET['reference_by'];?>" placeholder="Enter Reference"/></td>
                        <td><div id="reference_byceError" class="errormessage"></div></td>
                      </tr>
                        <tr>
                        <th valign="top">Court:</th>
                        <td><input type="text" class="inp-form required" name="court" id="court" value="<?php echo $_GET['court']=='' ? $datauser['court'] : $_GET['court'];?>"   placeholder="Enter Court Name" /></td>
                        <td><div id="courtError" class="errormessage"></div></td>
                      </tr>
					  
					  
					  <tr>
                        <th valign="top">Case No/File No/Stamp:</th>
                        <td><input type="text" class="inp-form  required" name="case_file_no" id="case_file_no"   placeholder="Enter Case No/File No/Stamp"   value="<?php if(!empty($_GET['case_file_no'])) { echo $_GET['case_file_no']; } ?>"  /> 
						</td>
                        <td><div id="case_file_noError" class="errormessage"></div></td>
                      </tr> 
					   <tr>
                        <th valign="top">Case No/File No/Stamp Year:</th>
                        <td><input type="text" class="inp-form required number" name="year" id="year" maxlength="4"    placeholder="Enter Year" value="<?php if(!empty($_GET['year'])) { echo $_GET['year']; } ?>"/> Year
						</td>
                        <td><div id="yearError" class="errormessage"></div></td>
                      </tr>  
					  
					   
					  <tr>
                        <th valign="top">Date(DD/MM/YYYY):</th>
                        <td><input type="text" class="inp-form  required " name="calender" id="date-pick" value="<?php echo $_GET['calender']=='' ? $datauser['calender'] : $_GET['calender'];?>"  placeholder="Enter Date"/></td>
                        <td><div id="date-pickError" class="errormessage"></div></td>
                      </tr>
                     
                      
                        <td valign="top"><input type="submit" value="" class="form-submit"  id="submit_form"  />
                          <input type="reset" value="" class="form-reset"  /></td>
                        <td></td>
                      </tr>
                    </table>
                  </form>
                  <!-- end id-form  --></td>
              </tr>
              <tr>
                <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                <td></td>
              </tr>
            </table>
            <div class="clear"></div>
          </div>
          <!--  end content-table-inner ............................................END  --></td>
        <td id="tbl-border-right"></td>
      </tr>
      <tr>
        <th class="sized bottomleft"></th>
        <td id="tbl-border-bottom">&nbsp;</td>
        <th class="sized bottomright"></th>
      </tr>
    </table>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<script type="text/javascript">
$(document).ready(function(){
	$("#addEditForm").validate();
});
</script>
<?php include("includes/footer.php");?>
 
<style >
img{ cursor:pointer;}
</style>