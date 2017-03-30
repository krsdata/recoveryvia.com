<?php $curPage='';
$curSubPage=''; 
include("includes/header.php");

$datauser = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_SESSION['admin_id']);

if(isset($_POST['submit']) && $_POST['submit']!='')
{
	$MESSAGE_RED[] = $obj->requiredField($_POST['profile_name'],'profile name','');
	$MESSAGE_RED[] = $obj->validEmailRequired($_POST['email'],'email address','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['name'],'user name','');

	if($_POST['name']!='')  $MESSAGE_RED[] = $obj->checkUniqueValue(TBL_ADMIN,'name',$_POST['name'],'user name','id!="'.$_SESSION['admin_id'].'"','');
	if($_POST['email']!='') $MESSAGE_RED[] = $obj->checkUniqueValue(TBL_ADMIN,'email',$_POST['email'],'email address','id!="'.$_SESSION['admin_id'].'"','');

	if($obj->isEmptyError($MESSAGE_RED))
	{

		if($_POST['submit']=='changepass')
		{
			
			$sql = "UPDATE ".TBL_ADMIN." SET profile_name='".$obj->escape($_POST['profile_name'])."',email='".$obj->escape($_POST['email'])."',name='".$obj->escape($_POST['name'])."'  WHERE id='".$_SESSION['admin_id']."'";
			$query = $obj->executeQry($sql,$link);
			$obj->setMessageForNextPage('Details updated successfully','MESSAGE_GREEN');
			header('location:index.php');
			
		}
	}
}
?>
<!-- start content-outer ........................................................................................................................START -->

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <!--  start page-heading -->
    <div id="page-heading">
      <h1>Change Personal Detail</h1>
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
          <div id="content-table-inner">
            <?php include('includes/message.php');?>
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr valign="top">
                <td><!-- start id-form -->
                  <form name="adduser" id="adduser" method="post" action="" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top">Profile name:</th>
                        <td><input type="text" name="profile_name" id="profile_name" class="inp-form required" value="<?php echo $_POST['profile_name']=='' ? $datauser['profile_name'] : $_POST['profile_name'];?>"/></td>
                        <td><div id="profile_nameError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Email address:</th>
                        <td><input type="text" name="email" id="email" class="inp-form required email" value="<?php echo $_POST['email']=='' ? $datauser['email'] : $_POST['email'];?>"/></td>
                        <td><div id="emailError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">User name:</th>
                        <td><input type="text" name="name" id="name" class="inp-form required" value="<?php echo $_POST['name']=='' ? $datauser['name'] : $_POST['name'];?>"/></td>
                        <td><div id="nameError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th>&nbsp;</th>
                        <input type="hidden" name="submit" value="changepass" />
                        <td valign="top"><input type="submit" value="" class="form-submit" />
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
	$("#adduser").validate();
});
</script>
<?php include("includes/footer.php");?>
