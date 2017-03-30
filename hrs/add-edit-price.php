<?php
	$curPage='price';
	$curSubPage='add_price'; 
	include("includes/header.php");
	include("global.php");

	$pageHead = 'Add services price';
	
	if(isset($_GET['editid']) && $_GET['editid']!='')
	{
		$datauser = $obj->getRowFromAnyTable('services_price','id',$_GET['editid']);


		$pageHead = 'View services price';
	
		$datauser2  = mysql_query("select * from services_price where id = ".$_GET['editid']."");

		$editData = mysql_fetch_object($datauser2);
	}
	if ((isset($_GET['delid']) && $_GET['delid'] != ""))
	{	
		$dataDel = $obj->getRowFromAnyTable('services_price','id',$_GET['delid']);
		$obj->deleteRowFromAnyTable('services_price','id',$_GET['delid']);
		 
		$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
		header('location:'.REQUEST_URL);
	}
	$query = mysql_query("SELECT * FROM services_price where status=1 ORDER BY id DESC");
	$numRows = mysql_num_rows($query);

	if($_POST)
	{		
 		extract($_POST);  
	   	$arr['service_name'] 	= $service_name;
	   	$arr['service_price'] 	= $service_price;
	   	$arr['service_duration'] 	= $service_duration;  
 

		if($_POST['submit']=='add')
		{
		    insertQuery("services_price", $arr);
			$obj->setMessageForNextPage('New  services  successfully added','MESSAGE_GREEN');
			header('location:add-edit-price.php'.DEF_QRY_STR);
	
		}
		
		elseif($_POST['submit']=='edit')
		{ 
			if($obj->isEmptyError($MESSAGE_RED))
			{ 	  
			   		$condition = " Where id=".$_REQUEST['editid']."";
			  
			    	updateQuery('services_price', $arr, $condition); 
					  
				    $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
					
					if(!empty($_REQUEST['pagename']))
					{
					  $location = 'location:manage-price.php'; 
					}
					else
					{
					    $location = 'location:manage-price.ph'; 
					}
					
					header($location.DEF_QRY_STR);
			}
		 
		}
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
      <h1><?php echo $pageHead;?></h1>
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
                  <form name="addEditForm" id="addEditForm" method="post" action="" >
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      
                      <tr>
                        <th valign="top">Service Name :</th>
                        <td>
							<select name="service_name" id="service_name" class="required">
								<option value="">---Select----</option>
								<option value="NORMAL CASH" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NORMAL CASH') echo "selected"; ?>>NORMAL CASH</option>
								<option value="CASH HNI" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='CASH HNI') echo "selected"; ?>>CASH HNI</option>
								<option value="HRS POWER" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='HRS POWER') echo "selected"; ?>>HRS POWER</option>
								<option value="NORMAL FUTURE" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NORMAL FUTURE') echo "selected"; ?>>NORMAL FUTURE</option>
							
								 <option value="FUTURE HNI" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='FUTURE HNI') echo "selected"; ?>>FUTURE HNI</option>
								<option value="FUTURE POWER" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='FUTURE POWER') echo "selected"; ?>>FUTURE POWER</option>
								<option value="NORMAL OPTION" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NORMAL OPTION') echo "selected"; ?>>NORMAL OPTION</option>
							

								 <option value="OPTION HNI" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='OPTION HNI') echo "selected"; ?>>OPTION HNI</option>
								<option value="NIFTY OPTION" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NIFTY OPTION') echo "selected"; ?>>NIFTY OPTION</option>
								<option value="NIFTY FUTURE" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NIFTY FUTURE') echo "selected"; ?>>NIFTY FUTURE</option>
							

							 <option value="NIFTY POWER" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NIFTY POWER') echo "selected"; ?>>NIFTY POWER</option>
								<option value="COMMODITY(NORMAL)" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='COMMODITY(NORMAL)') echo "selected"; ?>>COMMODITY (NORMAL)</option>
								<option value="COMMODITY HNI" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='COMMODITY HNI') echo "selected"; ?>>COMMODITY HNI</option>
							

							 <option value="COMEX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='COMEX') echo "selected"; ?>>COMEX</option>
								<option value="NCDEX NORMAL" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NCDEX NORMAL') echo "selected"; ?>>NCDEX NORMAL</option>
								<option value="NCDEX HNI" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NCDEX HNI') echo "selected"; ?>>NCDEX HNI</option>
							<option value="I-FOREX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='I-FOREX') echo "selected"; ?>>I-FOREX </option>
								<option value="D-FOREX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='D-FOREX') echo "selected"; ?>>D-FOREX</option>
							
							</select>	
						</td>
                        <td><div id="service_nameError" class="errormessage"></div></td>
                      </tr> 
                      	
                      <tr>
                        <th valign="top">Service Duration :</th>
                        <td>
							<select name="service_duration" id="service_duration" class="required">
								<option value="">---Select---</option>
								<option value="Monthely" <?php if(!empty($datauser['service_duration']) && $datauser['service_duration']=='Monthely') echo "selected"; ?>>Monthely</option>
								<option value="Quaterly" <?php if(!empty($datauser['service_duration']) && $datauser['service_duration']=='Quaterly') echo "selected"; ?>>Quaterly</option>
								<option value="Halfyearly" <?php if(!empty($datauser['service_duration']) && $datauser['service_duration']=='Halfyearly') echo "selected"; ?> >Halfyearly</option>
								<option value="Yearly" <?php if(!empty($datauser['service_duration']) && $datauser['service_duration']=='Yearly') echo "selected"; ?>>Yearly</option>
							</select>	
						</td>
                        <td><div id="service_durationError" class="errormessage"></div></td>
                      </tr> 
                      <tr>
                        <th valign="top">Service Price :</th>
                        <td>
							<input type="number" value="<?php if(isset($datauser['service_price'])) { echo $datauser['service_price']; }?>"  name="service_price" id="service_price" class="inp-form required">
						</td>
                        <td><div id="service_priceError" class="errormessage"></div></td>
                      </tr> 
					  <tr>
                        <th>&nbsp;</th>
                        <?php
                        if(isset($_GET['editid']) && $_GET['editid']!='')
						{
						?>
                        <input type="hidden" name="submit" value="edit" />
                        <?php
						}
						else
						{
						?>
                        <input type="hidden" name="submit" value="add" />
                        <?php
						}
						?>
                        <td valign="top"><input type="submit" value="" class="form-submit"  id="submit_form" onclick="submitform();" />
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
select {
  height: 35px;
  width: 200px;
}
.fileup { border: 1px solid #ccc;
  height: 30px;
}
</style>

 