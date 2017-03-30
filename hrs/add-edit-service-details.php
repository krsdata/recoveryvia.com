<?php
$curPage='service';
$curSubPage='add_service_details'; 
include("includes/header.php");
include("global.php");
?>

<?php

$pageHead = 'Add service details';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable('services','id',$_GET['editid']);
	$pageHead = 'View Service';
	
	$datauser2  = mysql_query("select * from services where id = ".$_GET['editid']."");
}

$sqlQry = mysql_query("select * from services_name where status=1");

	if(isset($_POST['submit']) && $_POST['submit']!='')
	{
		$MESSAGE_RED[] = $obj->requiredField($_POST['service_name'],'service name','');
		$MESSAGE_RED[] = $obj->requiredField($_POST['service_description'],'service description','');
	
	 	extract($_POST);  
	 
		$arr['service_description'] 	= $service_description;
		$arr['service_name'] 			= $service_name; 

		if($_POST['submit']=='add')
		{
			$MESSAGE_RED[] = $obj->validImgRequired($_FILES['file_upload']['name'],'service image','');

			if($obj->isEmptyError($MESSAGE_RED))
			{
					
					$uploadedFileName = $obj->uploadeFile($_FILES,'file_upload','images/uploadServiceImages/');					
					$arr['service_image'] = $uploadedFileName;	 
					$rs = 	insertQuery("services", $arr);
				
		 	 	if($rs){
				$obj->setMessageForNextPage('New  Service details successfully added','MESSAGE_GREEN');
				    header('location:manage-service.php'.DEF_QRY_STR);
				}
	
			}
		}
		elseif($_POST['submit']=='edit')
		{
			
			if($_FILES['file_upload']['name']!='')
			{
				$arr['service_image'] = $_FILES['file_upload']['name'];
				$MESSAGE_RED[] = $obj->validImgRequired($_FILES['file_upload']['name'],'Service image','');

				if($obj->isEmptyError($MESSAGE_RED))
				{
					$uploadedFileName = $obj->uploadeFile($_FILES,'file_upload','images/uploadServiceImages/');
					$arr['service_image'] = $uploadedFileName;	  
					
					@unlink('images/uploadServiceImages/'.$datauser['service_image']);
				}
			}
			else
			{
				 $uploadedFileName = $datauser['service_image'];  
				 $arr['service_image'] = $uploadedFileName;
			}
			
			if($obj->isEmptyError($MESSAGE_RED))
			{
					
					  
				   $condition = " Where id=".$_REQUEST['editid']."";
					  
				    updateQuery('services', $arr, $condition);
						
				    $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
					
					if(!empty($_REQUEST['pagename']))
					{
					  $location = 'location:manage-service.php'; 
					}
					else
					{
					    $location = 'location:manage-service.php'; 
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
                        <th valign="top">Select  Service Name :</th>
                        <td>
						<select name="service_name" id="service_name"  class="required ">
                            <option value="">select</option>

                            <?php while($row = mysql_fetch_array($sqlQry)){ ?> 	

                            <option value="<?php echo $row['service_name']; ?>" <?php if(!empty($datauser['service_name']) && $datauser['service_name']==$row['service_name'] || ($arr['service_name'] == $row['service_name']) ) echo "selected"; ?>> <?php echo $row['service_name']; ?> </option>
                             <?php } ?>
                          </select></td>
                        
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
                        <th> Upload Service Image:</th>
                        <td><input type="file" name="file_upload" id="file_upload" class="fileup <?php echo $Image;?>" /></td>
                         
                      </tr>
                      
                   
					  
                      <tr>
                        <th valign="top">Service Description:</th>
                        <td> 
						<textarea rows="15" cols="" name="service_description" id="service_description" class="form-textarea required"><?php echo $_POST['service_description']=='' ? $datauser['service_description'] : $_POST['service_description'];?></textarea>
						</td>
                       
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


<script src="tinymce/tinymce.min.js" type="text/javascript"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>