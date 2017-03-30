<?php $curPage='';
$curSubPage='';
$accessUserFile='admin';
include("includes/header.php");

/* ******** start delete record ************** */
if ((isset($_GET['delid']) && $_GET['delid'] != ""))
{	
	$dataDel = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_GET['delid']);
	if(($dataDel['user_type']!='0' || $_SESSION['admin_id']=='1') && $_GET['delid']!='1')
	{
		$obj->deleteRowFromAnyTable(TBL_ADMIN,'id',$_GET['delid']);
		$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
		header('location:'.REQUEST_URL);
	}
	else
	{
		$MESSAGE_BLUE[] = 'Admin can not be delete';
	}
} 
/* ******** end delete record ************** */

/* ******** start multi delete record ************** */
if ((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "delete"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataDel = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_POST['checkbox'][$di]);
		if($dataDel['user_type']!='0' || $_SESSION['admin_id']=='1')
		{
			$obj->deleteRowFromAnyTable(TBL_ADMIN,'id',$_POST['checkbox'][$di]);
		}
		else
		{
			$MESSAGE_BLUE[] = 'Admin can not be delete';
		}
	}
	$obj->setMessageForNextPage('Record deleted successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
} 
/* ******** end multi delete record ************** */

/* ******** start change status ************** */
if ((isset($_GET['statusid']) && $_GET['statusid'] != "") && (isset($_GET['status']) && $_GET['status'] != ""))
{	
	$dataStatus = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_GET['statusid']);
	if(($dataStatus['user_type']!='0' || $_SESSION['admin_id']=='1')  && $_GET['statusid']!='1')
	{
		$update= ($_GET['status'] == 0) ? 1 : 0;
		$obj->updateRowFromAnyTable(TBL_ADMIN,'status="'.$update.'"','id="'.$_GET['statusid'].'"');
		$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
		header('location:'.REQUEST_URL);
	}
	else
	{
		$MESSAGE_BLUE[] = 'Status of admin can not be change';
	}
}
/* ******** end change status ************** */ 

/* ******** start multi change status ************** */
if((isset($_POST['sub_multiform']) && $_POST['sub_multiform'] != "" && $_POST['sub_multiform'] == "status"))
{
	for($di=0;$di<count($_POST['checkbox']);$di++)
	{
		$dataStatus = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_POST['checkbox'][$di]);
		if($dataStatus['user_type']!='0' || $_SESSION['admin_id']=='1')
		{
			$dataStatus = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_POST['checkbox'][$di]);
			$update= ($dataStatus['status'] == 0) ? 1 : 0;
			$obj->updateRowFromAnyTable(TBL_ADMIN,'status="'.$update.'"','id="'.$_POST['checkbox'][$di].'"');
		}
		else
		{
			$MESSAGE_BLUE[] = 'Status of admin can not be change';
		}
	}
	$obj->setMessageForNextPage('Status changed successfully','MESSAGE_GREEN');
	header('location:'.REQUEST_URL);
}
/* ******** end multi change status************** */

$where = '1';
if($_SESSION['user_type']=='0' && $_SESSION['admin_id']!='1')
{
	$where = ' user_type=1';
}


$recordPerPage = 5;
if(isset($_GET['search']) && $_GET['search']!='' && $_GET['search']!='Search')
{
	$sql="SELECT * FROM ".TBL_ADMIN." WHERE (profile_name LIKE '%".$_GET['search']."%' OR name LIKE '%".$_GET['search']."%') AND id!=1 AND $where order by id ASC";
}
else
{
	$sql="SELECT * FROM ".TBL_ADMIN."  WHERE  id!=1 AND $where order by id ASC";
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
      <h1>Manage admin user</h1>
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
                    <th class="table-header-repeat line-left"><a onclick="SortTable(1);" href="javascript:;">Profile Name</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(2);" href="javascript:;">User Name</a></th>
                    <th class="table-header-repeat line-left minwidth-1"><a onclick="SortTable(3);" href="javascript:;">Email address</a></th>
                    <th class="table-header-repeat line-left"><a onclick="SortTable(4);" href="javascript:;">User Type</a></th>
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
                    <td><?php echo $data['profile_name'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['user_type'] == '0' ? 'Admin' : 'Moderator';?></td>
                    <td class="options-width"><a href="add-edit-admin-user.php?editid=<?php echo $data['id'];?>" title="Edit" class="icon-1 info-tooltip"></a> <a href="javascript:confirmDelete('<?php echo DEF_QRY_STR;?>&delid=<?=$data['id'];?>')" title="Delete" class="icon-4 info-tooltip"></a>
                      <?php
                        if($data['status']=='1')
						{
						?>
                      <a href="<?php echo REQUEST_URL;?>&statusid=<?=$data['id'];?>&status=<?=$data['status'];?>" title="Status" class="icon-2 info-tooltip"></a>
                      <?php
						}
						else
						{
						?>
                      <a href="<?php echo REQUEST_URL;?>&statusid=<?=$data['id'];?>&status=<?=$data['status'];?>" title="Status" class="icon-5 info-tooltip"></a></td>
                    <?php
						}
						?>
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
            <table border="0" cellpadding="0" cellspacing="0" id="paging-table" width="100%">
              <tr>
                <td align="left"><div id="actions-box"> <a href="javascript:void(0);" class="action-slider"></a>
                    <div id="actions-box-slider"><a onClick="javascript:return check_all('status');" href="javascript:void(0);" class="action-edit">Status</a> <a onClick="javascript:return check_all('delete');" href="javascript:void(0);" class="action-delete">Delete</a> </div>
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
