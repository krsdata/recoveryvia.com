<?php $curPage='';
$curSubPage=''; 
$accessUserFile='admin';
include("includes/header.php");

$pageHead = 'Add user';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable(TBL_ADMIN,'id',$_GET['editid']);
	$pageHead = 'Edit user';
}



if(isset($_POST['submit']) && $_POST['submit']!='')
{
	$MESSAGE_RED[] = $obj->requiredField($_POST['profile_name'],'profile name','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['name'],'user name','');
	$MESSAGE_RED[] = $obj->validEmailRequired($_POST['email'],'email address','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['password'],'password','');
	$MESSAGE_RED[] = $obj->requiredField($_POST['user_type'],'user type','Please select user type');

	if($_POST['name']!='')  $MESSAGE_RED[] = $obj->checkUniqueValue(TBL_ADMIN,'name',$_POST['name'],'user name','','');
	if($_POST['email']!='') $MESSAGE_RED[] = $obj->checkUniqueValue(TBL_ADMIN,'email',$_POST['email'],'email address','','');
	
	if($obj->isEmptyError($MESSAGE_RED))
	{

		if($_POST['submit']=='add')
		{
				$sql = "INSERT INTO ".TBL_ADMIN." (profile_name,name,email,user_type,password) values ('".$obj->escape($_POST['profile_name'])."','".$obj->escape($_POST['name'])."','".$obj->escape($_POST['email'])."','".$obj->escape($_POST['user_type'])."','".$obj->escape($_POST['password'])."')";
				$query = $obj->executeQry($sql,$link);
				$obj->setMessageForNextPage('User added successfully','MESSAGE_GREEN');
				header('location:manage-admin-user.php'.DEF_QRY_STR);
		}
		elseif($_POST['submit']=='edit')
		{
			echo	$sql = "UPDATE ".TBL_ADMIN." SET profile_name='".$obj->escape($_POST['profile_name'])."',name='".$obj->escape($_POST['name'])."',email='".$obj->escape($_POST['email'])."',user_type='".$obj->escape($_POST['user_type'])."',password='".$obj->escape($_POST['password'])."'  WHERE id='".$_GET['editid']."'";
				$query = $obj->executeQry($sql,$link);
				$obj->setMessageForNextPage('User detail updated successfully','MESSAGE_GREEN');
				header('location:manage-admin-user.php'.DEF_QRY_STR);
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
          <div id="content-table-inner">
            <?php include('includes/message.php');?>
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr valign="top">
                <td><!-- start id-form -->
                  <form name="addEditForm" id="addEditForm" method="post" action="" enctype="multipart/form-data">
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top">Profile Name:</th>
                        <td><input type="text" name="profile_name" id="profile_name" class="inp-form required" value="<?php echo $_POST['profile_name']=='' ? $datauser['profile_name'] : $_POST['profile_name'];?>"/></td>
                        <td><div id="profile_nameError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">User name:</th>
                        <td><input type="text" class="inp-form required" name="name" id="name" value="<?php echo $_POST['name']=='' ? $datauser['name'] : $_POST['name'];?>"/></td>
                        <td><div id="nameError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Email address:</th>
                        <td><input type="text" class="inp-form required email" name="email" id="email" value="<?php echo $_POST['email']=='' ? $datauser['email'] : $_POST['email'];?>"/></td>
                        <td><div id="emailError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Password:</th>
                        <td><input type="password" class="inp-form required" name="password" id="password" value="<?php echo $_POST['password']=='' ? $datauser['password'] : $_POST['password'];?>"/></td>
                        <td><div id="passwordError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">User Type:</th>
                        <td>
                        	<?php
                            if($_SESSION['admin_id']=='1')
							{
							?>
                            <table cellpadding="0" cellspacing="0">
                            	<tr>
                                	<td><input type="radio" class="inp-form required" name="user_type" id="user_type" value="0" <?php if($datauser['user_type']=='0')echo 'checked="checked"'; ?>/></td>
                                    <td>&nbsp;&nbsp;&nbsp;Admin</td>
                                </tr>
                            	<tr>
                                	<td><input type="radio" class="inp-form required" name="user_type" id="user_type" value="1" <?php if($datauser['user_type']=='1')echo 'checked="checked"'; ?>/></td>
                                    <td>&nbsp;&nbsp;&nbsp;Moderator</td>
                                </tr>
                            </table>
                            <?php
							}
							else
							{
							?>
                            	Moderator<input type="hidden" name="user_type" id="user_type" value="1" />
                            <?php	
							}
							?>
                        </td>
                        <td><div id="user_typeError" class="errormessage"></div></td>
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
	$("#addEditForm").validate();
});
</script>
<?php include("includes/footer.php");?>
