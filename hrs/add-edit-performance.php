<?php
	$curPage='performance';
	$curSubPage='add_performance'; 
	include("includes/header.php");
	include("global.php");

	$pageHead = 'Add past performance ';
	
	if(isset($_GET['editid']) && $_GET['editid']!='')
	{
		$datauser = $obj->getRowFromAnyTable('past_performance','id',$_GET['editid']); 
		$pageHead = 'View past performance'; 
		$datauser2  = mysql_query("select * from past_performance where id = ".$_GET['editid'].""); 
		$editData = mysql_fetch_object($datauser2);
	}
	if ((isset($_GET['delid']) && $_GET['delid'] != ""))
	{	
		$dataDel = $obj->getRowFromAnyTable('past_performance','id',$_GET['delid']);
		$obj->deleteRowFromAnyTable('past_performance','id',$_GET['delid']);
		 
		$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
		header('location:'.REQUEST_URL);
	}
	$query = mysql_query("SELECT * FROM past_performance where status=1 ORDER BY id DESC");
	$numRows = mysql_num_rows($query);

	if(isset($_POST['submit']) && $_POST['submit']!='')
  {
    $MESSAGE_RED[] = $obj->requiredField($_POST['service_name'],'service name','');
    extract($_POST);  
    $arr['service_name']      = $service_name; 
    if($_POST['submit']=='add')
    {
      $MESSAGE_RED[] = $obj->validDocRequired($_FILES['file_upload']['name'],'upload file','');

      print_r($MESSAGE_RED);

      if($obj->isEmptyError($MESSAGE_RED))
      {  
          $uploadedFileName = $obj->uploadeFile($_FILES,'file_upload','images/uploadServiceImages/');         
          $arr['file_name'] = $uploadedFileName;   
          $rs =   insertQuery("past_performance", $arr); 
          if($rs){
          $obj->setMessageForNextPage('New  Service details successfully added','MESSAGE_GREEN');
          header('location:manage-performance.php'.DEF_QRY_STR);
          } 
      }
    }
    elseif($_POST['submit']=='edit')
    {
      if($_FILES['file_upload']['name']!='')
      {
        $arr['file_name'] = $_FILES['file_upload']['name'];
        $MESSAGE_RED[] = $obj->validDocRequired($_FILES['file_upload']['name'],'upload file','');

        if($obj->isEmptyError($MESSAGE_RED))
        {
          $uploadedFileName = $obj->uploadeFile($_FILES,'file_upload','images/uploadServiceImages/');
          $arr['file_name'] = $uploadedFileName;    
          
          @unlink('images/uploadServiceImages/'.$datauser['file_name']);
        }
      }
      else
      {
         $uploadedFileName = $datauser['file_name'];  
         $arr['file_name'] = $uploadedFileName;
      }
      
      if($obj->isEmptyError($MESSAGE_RED))
      {   
          $condition = " Where id=".$_REQUEST['editid']."";
          updateQuery('past_performance', $arr, $condition);
          $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
          if(!empty($_REQUEST['pagename']))
          {
            $location = 'location:manage-performance.php'; 
          }
          else
          {
              $location = 'location:manage-performance.php'; 
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
                  <form name="addEditForm" id="addEditForm" method="post" action="" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      
                      <tr>
                        <th valign="top">Service Name :</th>
                              <td>
      							<select name="service_name" id="service_name" class="required">
      								<option value="">---Select----</option>
      								<option value="STOCK CASH" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='STOCK CASH') echo "selected"; ?>>STOCK CASH</option>
      							 
      								 <option value="STOCK FUTURE" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='STOCK FUTURE') echo "selected"; ?>>STOCK FUTURE</option>
      							 <option value="OPTION" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='OPTION') echo "selected"; ?>>OPTION</option>
      							  <option value="COMMODITY" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='COMMODITY') echo "selected"; ?>>COMMODITY</option>
      							  <option value="COMEX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='COMEX') echo "selected"; ?>>COMEX</option>
      								<option value="NCDEX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NCDEX NORMAL') echo "selected"; ?>>NCDEX</option>
      						 	 <option value="FOREX" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='FOREX') echo "selected"; ?>>FOREX</option>
      							 <option value="NIFTY" <?php if(!empty($datauser['service_name']) && $datauser['service_name']=='NIFTY') echo "selected"; ?>>NIFTY</option>
      							</select>	
      						</td>
                              <td><div id="service_nameError" class="errormessage"></div></td>
                            </tr> 
                      	
                        <?php
                      if(isset($_GET['editid']) && $_GET['editid']!='')
              				  {
          						  $Image = '';
          					  ?>
                      <tr>
                        <th> </th>
                       <td><a href="images/uploadServiceImages/<?php echo $datauser['service_image'];?>" target="_blank" >View uploaded file</a></td>
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
                        <th> Upload File:</th>
                        <td><input type="file" name="file_upload" id="file_upload" class="fileup <?php echo $Image;?>" /></td>
                         
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

 