<?php
	$curPage='service';
	$curSubPage='add_service_name'; 
	include("includes/header.php");
	include("global.php");

	$pageHead = 'Add New service';
	
	if(isset($_GET['editid']) && $_GET['editid']!='')
	{
		$datauser = $obj->getRowFromAnyTable('services_name','id',$_GET['editid']);
		$pageHead = 'View Service';
	
		$datauser2  = mysql_query("select * from services_name where id = ".$_GET['editid']."");

		$editData = mysql_fetch_object($datauser2);
	}
	if ((isset($_GET['delid']) && $_GET['delid'] != ""))
	{	
		$dataDel = $obj->getRowFromAnyTable('services_name','id',$_GET['delid']);
		$obj->deleteRowFromAnyTable('services_name','id',$_GET['delid']);
		 
		$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
		header('location:'.REQUEST_URL);
	}
	$query = mysql_query("SELECT * FROM services_name where status=1 ORDER BY id DESC");
	$numRows = mysql_num_rows($query);

	if($_POST)
	{		
 		extract($_POST);  
	   	$arr['service_name'] 	= $service_name;  
 

		if($_POST['submit']=='add')
		{
		    $last_id =  insertQuery("services_name", $arr);
			$obj->setMessageForNextPage('New  services  successfully added','MESSAGE_GREEN');
			header('location:add-edit-service-name.php'.DEF_QRY_STR);
	
		}
		
		elseif($_POST['submit']=='edit')
		{ 
			if($obj->isEmptyError($MESSAGE_RED))
			{ 	  
			   		$condition = " Where id=".$_REQUEST['editid']."";
			  
			    	updateQuery('services_name', $arr, $condition); 
					  
				    $obj->setMessageForNextPage('Record updated successfully','MESSAGE_GREEN');
					
					if(!empty($_REQUEST['pagename']))
					{
					  $location = 'location:add-edit-service-name.php'; 
					}
					else
					{
					    $location = 'location:add-edit-service-name.php'; 
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
							<input type="text" value="<?php if(!empty($editData->service_name)) { echo $editData->service_name; }?>"  name="service_name" id="service_name" class="inp-form required">
						</td>
                        <td><div id="service_nameError" class="errormessage"></div></td>
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

    <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Manage Service Name</h1>
    </div>
    <!-- end page-heading -->
    <!--  start top-search -->
    <div class="search-box">
      <table align="right" width="" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><form id="searchFrm" name="searchFrm" method="get" action="">
              <input type="text" name="search" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" />
            </form></td>
          <td><input type="image" onclick="$('#searchFrm').submit();" src="images/shared/top_search_btn.gif"></td>
        </tr>
      </table>
    </div>
    <!--  end top-search -->
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
          <div id="content-table-inner">
            <?php
           if($numRows > 0)
		   {
           ?>
            <!--  start table-content  -->
            <div id="table-content">
              <?php include('includes/message.php');?>
              <!--  start product-table ..................................................................................... -->
              <form id="mainform" name="mainform" action="" method="post">
                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
                  <thead>
                    <tr>
                      <th class="table-header-check"><a id="toggle-all" ></a> </th>
                     
                      <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(2);" href="javascript:;">Service Name</a></th>
                      
                      <th class="table-header-repeat line-left">Options</th>
                    </tr>
                  </thead>
                  <?php
				  $i = 1;
                  while($data = $obj->fetchRow($query))
				  {
				  ?>
                  <tr <?php if($i%2==0){echo 'class="alternate-row"';}?>>
                    <td><input name="checkbox[]" id="checkbox<?php echo $i;?>" value="<?php echo $data['id'];?>"  type="checkbox"/></td>
                    <td><?php echo $data['service_name'];?></td>
                     
                    <td class="options-width">
                    <a href="add-edit-service-name.php<?php echo DEF_QRY_STR;?>&editid=<?php echo $data['id'];?>&pagename=1" title="Edit" class="icon-1 info-tooltip">
					   <a href="javascript:confirmDelete('<?php echo REQUEST_URL;?>&delid=<?php echo $data['id'];?>')" title="Delete" class="icon-4 info-tooltip"></a>
                        
                  </tr>
                  <?php
				  $i++;}
				  ?>
                </table>
                <!--  end product-table................................... -->
                <input type="hidden" id="multiType" value="" name="sub_multiform">
              </form>
            </div>
            <!--  end content-table  -->
            <!--  start paging..................................................... -->
            <table border="0" cellpadding="0" cellspacing="0" id="paging-table" width="100%" align="center">
              <tr>
                <td align="left"><div id="actions-box"> <a href="javascript:void(0);" class="action-slider"></a>
                    <div id="actions-box-slider">
                 <!----------   <a onClick="javascript:return check_all('status');" href="javascript:void(0);" class="action-edit">Status</a> 
                    --><a onClick="javascript:return check_all('delete');" href="javascript:void(0);" class="action-delete">Delete</a> </div>
                    <div class="clear"></div>
                  </div></td>
                <td align="right" style="float:right;"><?php include('includes/paginationLink.php');?></td>
                <td valign="top" align="right" width="140" ><?php include('includes/recordPerpPage.php');?></td>
              </tr>
            </table>
            <!--  end paging................ -->
            <div class="clear"></div>
            <?php
		   }
		   else
		   {
		   ?>
            <div id="table-content">
              <?php $MESSAGE_YELLOW[] = 'No record found...';include('includes/message.php');?>
            </div>
            <?php
		   }
		   ?>
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


 