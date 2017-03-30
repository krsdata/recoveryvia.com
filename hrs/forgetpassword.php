<?php include ("config/config.php");

if(isset($_POST['forgot_sub']) && $_POST['forgot_sub']!='')
{
	if($_POST['email']=='')
	{
		$MESSAGE_RED[] = "Please enter email address !<br />";
	}

	if($obj->isEmptyError($MESSAGE_RED))
	{
		$sql = "SELECT * FROM tbl_admin WHERE email = '".trim($_POST['email'])."' AND status = 0";
		$rs =  mysql_query($sql);
		$row = mysql_fetch_array($rs);
		$rowNum = mysql_num_rows($rs);
		if ($rowNum > 0){
			
				$to        	= 	$row['site_email'];			
				$subject	= 	"Login Details of MyHairage Administration Control Panel";
				$message = "<br>";
				$message	.= 	"Dear ".strtoupper($row['name']).",<br><br>".
								"Your login details has been updated for you Administration Control Panel are as follows <br><br>";
				$message	.= 	"User Name : ".$row['name'].'<br>';
				$message	.= 	"Password : ".$row['password'].'<br><br>';
				$message	.=	"Regards,<br>MyHairage for you";		
				//$headers .= 'To:$to' . "\r\n";
				$headers  = 'MIME-Version: 1.0'. "\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'. "\n";
				$headers .= 'From: MyHairage<contact@miamiescapes.com>'. "\n";
				//$headers .= "From: contact@kyourcompany.com"."\nContent-Type: text/html; charset=iso-8859-1";
				//echo $message;			    
				@mail($to, $subject, $message, $headers);
				$MESSAGE_GREEN[] = 'Check your email for login details!';	
		}
		else
		{
			$MESSAGE_RED[] = "Invalid email...!";
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
  <div id="forgotbox">
    <div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
    <div id="forgot-inner">
      <?php include('includes/message.php');?>
      <form name="forgot" id="forgot" action="" method="post">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <th>Email address:</th>
            <td><input type="text" name="email"   class="login-inp" /></td>
          </tr>
          <tr>
            <th><input type="hidden" name="forgot_sub" value="forgot_sub"></th>
            <td><input type="submit" class="submit-login"  /></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="clear"></div>
    <a href="login.php" class="back-login">Back to login</a> </div>
</div>
</body>
</html>