<?php
$curPage='user';
$curSubPage='add_user'; 
include("includes/header.php");
include("global.php");



$pageHead = 'View Case';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable(TBL_CLIENT_CASE,'id',$_GET['editid']);
	$pageHead = 'View Case';
	
	$datauser2  = mysql_query("select * from stamp_case_no where client_id = ".$_GET['editid']."");
	
	
	
}

if(isset($_GET['case_file_no']) && $_GET['case_file_no']!='')
{
	
	extract($_GET);  
	
	$sql = mysql_query("SELECT * FROM `client_records`  as cr left join stamp_case_no scn on scn.client_id=cr.id where cr.parties_name = '".$parties_name."' AND (cr.file_no = '".$case_file_no."' AND  cr.file_no_yr ='".$year."') OR (scn.case_no = '".$case_file_no."' AND  scn.case_no_yr ='".$year."') OR (scn.stamp = '".$case_file_no."' AND  scn.stamp_yr ='".$year."') AND cr.court = '".$court."' AND cr.calender= '".$calender."'");
	
	$datauser  = mysql_fetch_assoc($sql); 
	$pageHead = 'Search  Case Result';
	
	  
   
   if($datauser['stamp']=='')
   {
     header("Location: manage-page.php?status=false&parties_name=".$parties_name."&reference_by=".$reference_by."&case_file_no=".$case_file_no."&year=".$year."&court=".$court."&calender=".$calender);
	 exit();
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
                  <form name="addEditForm" id="addEditForm" method="post" action="" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top">Name of Parties:</th>
                        <td><input type="text" name="parties_name" readonly="readonly" id="parties_name" class="inp-form1 required" value="<?php echo $_POST['parties_name']=='' ? $datauser['parties_name'] : $_POST['parties_name'];?>"/></td>
                        <td><div id="parties_nameError" class="errormessage"></div></td>
                      </tr>
					   <tr>
                        <th valign="top">Appellant:</th> 
                        <td><input type="text" name="appellant" id="appellant" readonly="readonly" class="inp-form1 required" value="<?php echo $_POST['appellant']=='' ? $datauser['appellant'] : $_POST['appellant'];?>"/></td>
                        <td><div id="appellantError" class="errormessage"></div></td>
                      </tr>
					  <tr>
                        <th valign="top">Respondent:</th> 
                        <td><input type="text" name="respondent" id="respondent"  readonly="readonly" class="inp-form1 " value="<?php echo $_POST['respondent']=='' ? $datauser['respondent'] : $_POST['respondent'];?>"/></td>
                        <td><div id="respondentError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Address:</th>
                        <td> 
						
						<textarea rows="" cols="" name="notes" id="address" class="form-textarea1 "   style="width:197px; border:1px solid #fff;" readonly="readonly"><?php echo $_POST['address']=='' ? $datauser['address'] : $_POST['address'];?></textarea>
						</td>
                        <td><div id="addressError" class="errormessage"></div></td>
                      </tr>
					  
					  <?php $phone2 =  explode(',',$datauser['phone']);
					  
					  if(count($phone2)>1)
					  {
					  
					  for($i=0; $i<count($phone2); $i++)
					  {
					   ?>
					   <tr id="phn_mul">
					  <th valign="top"><?php 
					  
					  if($i==0)
					  echo "Primary Phone Number:" ; else echo "Secondary Phone Number:";  ?></th>
                        <td><input type="text" class="inp-form1 phone required" maxlength="10"  readonly="readonly" mlength="10" name="phone[]" id="phone" value="<?php echo $_POST['phone']=='' ? $phone2[$i] : $_POST['phone'];?>" style="float:left"  placeholder="Enter phone number" />  
						</td>
                        <td><div id="phoneError" class="errormessage"></div></td>
                      </tr>
					  <?php } } else { ?>
					  
					   <tr id="phn_mul">
					  <th valign="top">Phone:</th>
                        <td><input type="text" class="inp-form1 phone required" maxlength="10" readonly="readonly" mlength="10" name="phone[]" id="phone" value="<?php echo $_POST['phone']=='' ? $phone2[$i] : $_POST['phone'];?>" style="float:left"  placeholder="Enter phone number" />  
						</td>
                        <td><div id="phoneError" class="errormessage"></div></td>
                      </tr>
					  
					  <?php } ?> 
					  <!----- phn append----------->
					  
					  
					  <?php $emailid =  explode(',',$datauser['email']);
					  
					  if(count($emailid)>0)
					  {
					  
					  for($i=0; $i<count($emailid); $i++)
					  {
					   ?>
					   <tr id="email_mul">
					  <th valign="top"><?php 
					  
					  if($i==0)
					  echo "Email Address:" ; else echo "Secondary Email Address:";  ?></th>
                        <td><input type="text" class="inp-form1  email required" readonly="readonly" name="email[]" id="email" value="<?php echo $_POST['email']=='' ? $emailid[$i] : $_POST['email'];?>" style="float:left"  placeholder="Enter email ID" />  </td>
                        <td><div id="emailError" class="errormessage"></div></td>
						
                      </tr>
					   <?php } } ?> 
					  <!-----------------Email------------->
					   
					   
					  <!-------------end----------------->
					  
                        <tr>
                        <th valign="top">Reference:</th>
                        <td><input type="text" class="inp-form1 " name="reference_by" readonly="readonly" id="reference_by" value="<?php echo $_POST['reference_by']=='' ? $datauser['reference_by'] : $_POST['reference_by'];?>"/></td>
                        <td><div id="reference_byceError" class="errormessage"></div></td>
                      </tr>
                        <tr>
                        <th valign="top">Court:</th>
                        <td><input type="text" class="inp-form1 required" name="court" readonly="readonly" id="court" value="<?php echo $_POST['court']=='' ? $datauser['court'] : $_POST['court'];?>"/></td>
                        <td><div id="courtError" class="errormessage"></div></td>
                      </tr>
					  
					  
					  <tr>
                        <th valign="top">Filled on:</th>
                        <td><input type="text" class="inp-form1  required" name="file_on" readonly="readonly" id="file_on" value="<?php echo $_POST['file_on']=='' ? $datauser['file_on'] : $_POST['file_on'];?>"/> 
						 <input type="text" class="inp-form1 " name="filled_on_date" id="filled_on_date" readonly="readonly" value="<?php echo $_POST['filled_on_date']=='' ? $datauser['filled_on_date'] : $_POST['filled_on_date'];?>"  placeholder="Enter Date"/></td>
                        <td><div id="filled_on_dateError" class="errormessage"></div></td>
                      </tr> 
					  
					  <tr>
                        <th valign="top">File Number:</th>
                        <td><input type="text" class="inp-form1  required" name="file_no" id="file_no"  readonly="readonly" value="<?php echo $_POST['file_no']=='' ? $datauser['file_no'] : $_POST['file_no'];?>"/>
						<input type="text" class="inp-form1   required" name="file_no_yr" id="file_no_yr" readonly="readonly" value="<?php echo $_POST['file_no_yr']=='' ? $datauser['file_no_yr'] : $_POST['file_no_yr'];?>"  placeholder="Enter Year"/>
						</td>
                        <td><div id="file_noError" class="errormessage"></div></td>
                      </tr>
					  </table>
					  <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; width:60%">
					  
					  
					   <tr>
                        <th valign="top" style="float: left; margin-left: 15px;">Stamp:</th>
						 <th valign="top">Case Number:</th>
						 </tr>
						 <tr id="stamp_case" class="stamp_case"> 
                        <td style="float: left; margin-left: 15px;"><input type="text" readonly="readonly" class="inp-form1 required" name="stamp[]"  value="<?php echo $datauser['stamp']; ?>" /> <br /><br />
						<input type="text" class="inp-form1 " name="stamp_yr[]" id="stamp_yr" readonly="readonly"   value="<?php echo $datauser['stamp_yr']; ?>" />
						</td> 
                        
                        <td><input type="text" class="inp-form1 required" name="case_no[]" id="case_no"   readonly="readonly" value="<?php echo $datauser['case_no']; ?>"/> <br /><br />
						<input type="text" class="inp-form1 " name="case_no_yr[]" id="case_no_yr"  readonly="readonly"  value="<?php echo $datauser['case_no_yr']; ?>" style="float:left" /> 
						
						</td>                        
                      </tr>
					  
					  <!------------------stamp sace------------------>
					   
					  <!-----------end----------------------------->
					  
					    
					  </table>
					   <table border="0" cellpadding="0" cellspacing="0"  id="id-form" >
					  <tr>
                        <th valign="top">Case Category :</th>
                        <td>
						<select name="case_cat" id="case_cat"  class="styledselect_form_1 required " readonly="readonly">
                            <option value="">select</option>
                            <option value="Civil" <?php if(!empty($datauser['case_cat']) && $datauser['case_cat']=='Civil') echo "selected"; ?>>Civil </option>
                            <option value="Criminal" <?php if(!empty($datauser['case_cat']) && $datauser['case_cat']=='Criminal') echo "selected"; ?>>Criminal </option>
                            <option value="Others" <?php if(!empty($datauser['Others']) && $datauser['Others']=='Others') echo "selected"; ?>>Others </option>
                            
                          </select></td>
                        <td><div id="case_catError" class="errormessage"></div></td>
                      </tr>
					  </table>
					  
					    <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
					    <tr><td><b title="Payment" style="font-size:18px; color:#990066">Payment : - </b> </td></tr>
						<tr>
						<td> 
					  <tr>
                        <th valign="top">Fee agreed:</th>
                        <td><input type="text" class="inp-form1  number required"  readonly="readonly" name="fee_agreed" id="fee_agreed" value="<?php echo $_POST['fee_agreed']=='0' ? $datauser['fee_agreed'] : $_POST['fee_agreed'];?>"/>
						<input type="text" class="inp-form1 required" name="fee_agreed_date" readonly="readonly"  id="fee_agreed_date" value="<?php echo $_POST['fee_agreed_date']=='' ? $datauser['fee_agreed_date'] : $_POST['fee_agreed_date'];?>" placeholder="Enter Date"/>
						</td>
                        <td><div id="fee_agreedError" class="errormessage"></div></td>
                      </tr>
					   <tr>
                        <th valign="top">Fee paid:</th>
                        <td><input type="text" class="inp-form1  number required" name="fee_paid" readonly="readonly" id="fee_paid" value="<?php echo $_POST['fee_paid']=='' ? $datauser['fee_paid'] : $_POST['fee_paid'];?>"/>
						<input type="text" class="inp-form1  required " name="fee_paid_date" readonly="readonly" id="fee_paid_date" value="<?php echo $_POST['fee_paid_date']=='' ? $datauser['fee_paid_date'] : $_POST['fee_paid_date'];?>" placeholder="Enter Date"/>
						</td>
                        <td><div id="fee_paidError" class="errormessage"></div></td>
                      </tr>
					  
					  <tr>
                        <th valign="top">Expenses:</th>
                        <td><input type="text" class="inp-form1  number required" name="expense" readonly="readonly" id="expense" value="<?php echo $_POST['expense']=='' ? $datauser['expense'] : $_POST['expense'];?>"/>
						<input type="text" class="inp-form1   required" name="expense_date" readonly="readonly" id="expense_date" value="<?php echo $_POST['expense_date']=='' ? $datauser['expense_date'] : $_POST['expense_date'];?>" placeholder="Enter Date"/>
						</td>
                        <td><div id="expense_dateError" class="errormessage"></div></td>
                      </tr>
					  
					  <tr>
                        <th valign="top">Blance:</th>
                        <td><input type="text" class="inp-form1  number  required"  readonly="readonly" onclick="balance();" name="blance" id="blance" value="<?php echo $_POST['blance']=='' ? $datauser['blance'] : $_POST['blance'];?>"/></td>
                        <td><div id="blanceError" class="errormessage"></div></td>
                      </tr>
					  </td>
					  </tr>
					  </table>
					    </div>
					   <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
					
					  					  <tr>
                        <th valign="top"> Notes of Argument:</th>
                        <td> 
						<textarea rows="" cols="" name="case_petition_arg" id="case_petition_arg" class="form-textarea1 " style="width:197px; border:1px solid #fff;" readonly="readonly"><?php echo $_POST['case_petition_arg']=='' ? $datauser['case_petition_arg'] : $_POST['case_petition_arg'];?></textarea>
						</td>
                        <td><div id="case_petition_argError" class="errormessage"></div></td>
                      </tr>
					  
					  <!---------------stage step------------->
					  
					   <?php $stage =  explode(',',$datauser['stage_step']);
					  
					  if(count($stage)>0)
					  {
					  
					  for($i=0; $i<count($stage); $i++)
					  {
					   ?>
					  <tr id="stage_step_mul" class="stage_step_mul">
                        <th valign="top">Stage/Step to be taken:</th>
                        <td><input type="text" class="inp-form1   required" readonly="readonly" name="stage_step[]" id="stage_step" value="<?php echo $_POST['stage_step']=='' ? $stage[$i] : $_POST['stage_step'];?>"  style="float:left" placeholder="Enter Stage/Step" /> </td>
                        <td><div id="stage_stepError" class="errormessage"></div></td>
                      </tr>
					  <?php } } ?>
					  
					  
					   <tr>
                        <th valign="top">Inward and Out-ward Register:</th>
                        <td><input type="text" class="inp-form1   required"  readonly="readonly" name="inward_outward_reg" id="inward_outward_reg" value="<?php echo $_POST['inward_outward_reg']=='' ? $datauser['inward_outward_reg'] : $_POST['inward_outward_reg'];?>"/>
						
						<input type="text" class="inp-form1   " name="case_reg_date" readonly="readonly" id="case_reg_date" value="<?php echo $_POST['case_reg_date']=='' ? $datauser['case_reg_date'] : $_POST['case_reg_date'];?>"  placeholder="Enter Date" />
						
						</td>
                        <td><div id="inward_outward_regError" class="errormessage"></div></td>
                      </tr>
					 
					   <tr>
                        <th valign="top">Remark/ Judgments:</th>
                        <td><input type="text" class="inp-form1   " name="remark" readonly="readonly" id="remark" value="<?php echo $_POST['remark']=='' ? $datauser['remark'] : $_POST['remark'];?>"/></td>
                        <td><div id="remarkError" class="errormessage"></div></td>
                      </tr>
					  
					  
					  <tr>
                        <th valign="top">Result:</th>
                        <td><input type="text" class="inp-form1   " readonly="readonly"  name="result" id="results" value="<?php echo $_POST['result']=='' ? $datauser['result'] : $_POST['result'];?>"/></td>
                        <td><div id="resultsError" class="errormessage"></div></td>
                      </tr>
					   
					  <tr>
                        <th valign="top">Date(DD/MM/YYYY):</th>
                        <td><input type="text" class="inp-form1  required " readonly="readonly" name="calender" id="date-pick" value="<?php echo $_POST['calender']=='' ? $datauser['calender'] : $_POST['calender'];?>"/></td>
                        <td><div id="date-pickError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top"> Notes:</th>
                        <td><textarea rows="" cols="" name="notes" id="notes" class="form-textarea1 " style="width:197px; border:1px solid #fff;" readonly="readonly"><?php echo $_POST['notes']=='' ? $datauser['notes'] : $_POST['notes'];?></textarea></td>
                        <td><div id="notesError" class="errormessage"></div></td>
                      </tr>
                      <?php
                      if(isset($_GET['editid']) && $_GET['editid']!='')
    				  {
						  $Image = '';
					  ?>
                      <tr>
                        <th>File upload: </th>
                        <td><a href="https://docs.google.com/viewer?url=infowayindia.in%2Fadvocate%2Fimages%2FuploadUserImages%2F<?php echo $datauser['file_upload'];?>" target="_blank" >View uploaded file</a></td>
                        <td>&nbsp;</td>
                      </tr>
                      <?php
					  }
					  else
					  {
						  $Image = 'required';
					  }
					  ?>
                       
                      <tr>
                        
                        
                      
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

 <script type="text/javascript">
 $(function(){
  
   $('input[type="text"]').attr('readonly','readonly');
 
 });
 
 </script>
<style >
img{ cursor:pointer;}
.inp-form1 {
  background-color: #ccc !important;
  border: 1px solid #fff;
  color: #393939;
  height: 25px;
  padding: 6px 6px 0;
  width: 186px;
}
.form-textarea1{
background-color: #ccc !important;

}
</style>