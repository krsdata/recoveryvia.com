<?php $curPage='';
$curSubPage=''; 
include("includes/header.php");

$datauser = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_SESSION['admin_id']);

if(isset($_POST['submit']) && $_POST['submit']!='')
{
	$MESSAGE_RED[] = $obj->requiredField($_POST['oldpass'],'old password','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['newpass'],'new password','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['conpass'],'confirm password','');

	if($_POST['newpass']!=$_POST['conpass'])
	{
		$MESSAGE_RED[] = 'New password and confirm password should be same';
	}
	
	$checkOldPass = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_SESSION['admin_id']);
	if($checkOldPass['password']!=$_POST['oldpass'] && $obj->isEmptyError($MESSAGE_RED))
	{
		$MESSAGE_RED[] = 'Old password does not match';
	}
	
	if($obj->isEmptyError($MESSAGE_RED))
	{

		if($_POST['submit']=='changepass')
		{
			
			$sql = "UPDATE ".TBL_ADMIN." SET password='".$obj->escape($_POST['newpass'])."'  WHERE id='".$_SESSION['admin_id']."'";
			$query = $obj->executeQry($sql,$link);
			$obj->setMessageForNextPage('Password updated successfully','MESSAGE_GREEN');
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
      <h1>Change Password</h1>
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
                        <th valign="top">Old password:</th>
                        <td><input type="password" name="oldpass" id="oldpass" class="inp-form required" value=""/></td>
                        <td><div id="oldpassError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">New password:</th>
                        <td><input type="password" class="inp-form required" name="newpass" id="newpass" value=""/></td>
                        <td><div id="newpassError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Confirm password:</th>
                        <td><input type="password" class="inp-form required" name="conpass" id="conpass" value=""/></td>
                        <td><div id="conpassError" class="errormessage"></div></td>
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
	$("#adduser").validate({
		rules: {
			conpass: {
				equalTo: "#newpass",
			}
		}
	});
});
</script>
<?php include("includes/footer.php");?>
