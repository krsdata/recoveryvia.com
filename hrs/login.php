<?php include ("config/config.php");

if(isset($_POST['login_sub']) && $_POST['login_sub']!='')
{
	if($_POST['uname']=='')
	{
		$MESSAGE_RED[] = "Please enter username !<br />";
	}
	elseif($_POST['pass']=='')
	{
		$MESSAGE_RED[]= "Please enter password !";
	}
	if($obj->isEmptyError($MESSAGE_RED))
	{
		$UserName=$_POST['uname'];
		$Passwd=$_POST['pass'];
		
		$strSql="select * from tbl_admin where name='".$UserName."' and password='".$Passwd."'";
		$result =mysql_query($strSql) or die(mysql_error());
		$row=mysql_fetch_array($result); 		
		if($row) {
			if($row['status']=='0')
			{
				$_SESSION['admin_name'] = $UserName;
				$_SESSION['admin_id'] = $row['id'];
				$_SESSION['user_type'] = $row['user_type'];
				header("Location: index.php");
			}
			else
			{
				$MESSAGE_BLUE[] = "Your Account has been disabled by administrator";
			}
		} else {
			$MESSAGE_RED[] = "Username and Password don't match !";		
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CMS-New</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg">
<div id="login-holder">
  <div class="loginlogo"  style=""><?php echo SITE_NAME;?><br />
    <span class="siteurl"><a href="<?php echo SITE_URL;?>" target="_blank"><?php echo str_replace('http://','',SITE_URL);?></a></span> </a> </div>
  <div class="clear"></div>
  <div id="loginbox">
    <!--  start login-inner -->
    <div id="login-inner">
      <?php include('includes/message.php');?>
      <form name="login" id="login" action="" method="post">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th>Username</th>
            <td><input type="text" name="uname"  class="login-inp" value="<?php echo $_POST['uname'];?>"/></td>
          </tr>
          <tr>
            <th>Password</th>
            <td><input type="password" name="pass" class="login-inp" /></td>
          </tr>
          <tr>
            <th></th>
            <td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" />
              <label for="login-check">Remember me</label></td>
          </tr>
          <tr>
            <th><input type="hidden" name="login_sub" value="login_sub"></th>
            <td><input type="submit" class="submit-login"  /></td>
          </tr>
        </table>
      </form>
    </div>
    <!--  end login-inner -->
    <div class="clear"></div>
    <a href="forgetpassword.php" class="forgot-pwd">Forgot Password?</a> </div>
</div>
</body>
</html>