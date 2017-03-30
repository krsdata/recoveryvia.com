<?php $curPage='trial';
$curSubPage='manage-trial'; 
include("includes/header.php");

/* ******** start delete record ************** */
if ((isset($_GET['delid']) && $_GET['delid'] != ""))
{	
	$dataDel = $obj->getRowFromAnyTable('free_trial','id',$_GET['delid']);
	@unlink('images/uploadUserImages/'.$dataDel['image']);
	$obj->deleteRowFromAnyTable('free_trial','id',$_GET['delid']);
	 
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end delete record ************** */

/* ******** start multi delete record ************** */
if ((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "delete"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataDel = $obj->getRowFromAnyTable('free_trial','id',$_POST['checkbox'][$di]);
		@unlink('images/uploadUserImages/'.$dataDel['image']);
		$obj->deleteRowFromAnyTable('free_trial','id',$_POST['checkbox'][$di]);
		$obj->deleteRowFromAnyTable('free_trial','id',$_POST['checkbox'][$di]);
	}
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end multi delete record ************** */

/* ******** start change status ************** */
if ((isset($_GET['statusid']) && $_GET['statusid'] != "") && (isset($_GET['status']) && $_GET['status'] != ""))
{	
	$update= ($_GET['status'] == 1) ? 2 : 1;
	$obj->updateRowFromAnyTable("free_trial",'status="'.$update.'"','id="'.$_GET['statusid'].'"');
	 
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end change status ************** */ 

/* ******** start multi change status ************** */
if((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "status"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataStatus = $obj->getRowFromAnyTable('free_trial','id',$_POST['checkbox'][$di]);
		$update= ($dataStatus['status'] == 1) ? 2 : 1;
		$obj->updateRowFromAnyTable('free_trial','status="'.$update.'"','id="'.$_POST['checkbox'][$di].'"');
		$dataStatusUser = $obj->getRowFromAnyTable('free_trial','id',$_POST['checkbox'][$di]);
		$update= ($dataStatusUser['status'] == 1) ? 2 : 1;
	 
	}
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end multi change status************** */




$recordPerPage = 5;
if(isset($_GET['search']) && $_GET['search']!='' && $_GET['search']!='Search')
{
 	$sql="SELECT  * from free_trial  WHERE status=1 and name LIKE '%".$_GET['search']."%'";
 
} 
else
{
	$sql="SELECT  * from free_trial where status=1  order by id DESC";
}
include('includes/pagination.php');// FOR PAGINATION $sql SHOULD BE SAME AS $sql
$query = $obj->executeQry($sql,$link);
$numRows=$obj->getRow($query);
?>
<!-- start content-outer ........................................................................................................................START -->

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Manage free trial  </h1>
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
                     
                      <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(2);" href="javascript:;"> Name</a></th>
                      <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(3);" href="javascript:;">Email</a></th> 
                      <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(3);" href="javascript:;">Phone</a></th> 
                     <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(3);" href="javascript:;">Date</a></th>
                      
                      <th class="table-header-repeat line-left">Action</th>
                    </tr>
                  </thead>
                  <?php
				  $i = 1;
                  while($data = $obj->fetchRow($query))
				  {
				  ?>
                  <tr <?php if($i%2==0){echo 'class="alternate-row"';}?>>
                    
                    <td><input name="checkbox[]" id="checkbox<?php echo $i;?>" value="<?php echo $data['id'];?>"  type="checkbox"/></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['phone'];?></td>

                       <td><?php echo date('d-M-Y',$data['date']);?></td>


                    <td class="options-width">
                   </a>  <a href="javascript:confirmDelete('<?php echo REQUEST_URL;?>&delid=<?php echo $data['id'];?>')" title="Delete" class="icon-4 info-tooltip"></a>
                      
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
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->
<?php include("includes/footer.php");?>
