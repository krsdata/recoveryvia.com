<? //$MESSAGE_YELLOW  = 'MESSAGE-YELLOW';$MESSAGE_RED = $MESSAGE_RED;$MESSAGE_GREEN = 'MESSAGE-GREEN';$MESSAGE_BLUE = 'MESSAGE-BLUE';?>
<!--  start message-yellow -->
              <div id="message-yellow">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <?php
					if($obj->isAnyError($MESSAGE_YELLOW))
					{
						foreach ($MESSAGE_YELLOW as $key => $err){
							if (isset($err) && $err != "")
							{
							?>
                              <tr>
                                <td class="yellow-left"><?php echo $err;?></td>
                                <td class="yellow-right"><a class="close-yellow"><img src="images/table/icon_close_yellow.gif"   alt="" /></a></td>
                              </tr>
                            
                            <?php	
							}
						}
					}
				  ?>
                </table>
              </div>
              <!--  end message-yellow -->
              <!--  start message-red -->
              <div id="message-red">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <?php
					if($obj->isAnyError($MESSAGE_RED))
					{
						foreach ($MESSAGE_RED as $key => $err){
							if (isset($err) && $err != "")
							{
							?>
                              <tr>
                                <td class="red-left"><?php echo $err;?></td>
                                <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
                              </tr>
                            
                            <?php	
							}
						}
					}

				  ?>
                </table>
              </div>
              <!--  end message-red -->
              <!--  start message-blue -->
              <div id="message-blue">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <?php
					if($obj->isAnyError($MESSAGE_BLUE))
					{
						foreach ($MESSAGE_BLUE as $key => $err){
							if (isset($err) && $err != "")
							{
							?>
                              <tr>
                                <td class="blue-left"><?php echo $err;?></td>
                                <td class="blue-right"><a class="close-blue"><img src="images/table/icon_close_blue.gif"   alt="" /></a></td>
                              </tr>
                            
                            <?php	
							}
						}
					}
				  ?>
                </table>
              </div>
              <!--  end message-blue -->
              <!--  start message-green -->
              <div id="message-green">
                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                  <?php
					if($obj->isAnyError($MESSAGE_GREEN))
					{
						foreach ($MESSAGE_GREEN as $key => $err){
							if (isset($err) && $err != "")
							{
							?>
                              <tr>
                                <td class="green-left"><?php echo $err;?></td>
                                <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
                              </tr>
                            
                            <?php	
							}
						}
					}
				  ?>
                </table>
              </div>
              <!--  end message-green -->
<?php 
if($obj->isAnyError($MESSAGE_YELLOW))
{
?>
	<script type="text/javascript">$('#message-yellow').fadeIn(3000);//setTimeout("$('#message-yellow').slideUp(1000);",5000);</script>
<?php
}
if($obj->isAnyError($MESSAGE_RED))
{
?>
	<script type="text/javascript">$('#message-red').fadeIn(3000);setTimeout("$('#message-red').slideUp(1000);",5000);</script>
<?php
}
if($obj->isAnyError($MESSAGE_GREEN))
{
?>
	<script type="text/javascript">$('#message-green').fadeIn(3000);setTimeout("$('#message-green').slideUp(1000);",5000);</script>
<?php
}
if($obj->isAnyError($MESSAGE_BLUE))
{
?>
	<script type="text/javascript">$('#message-blue').fadeIn(3000);setTimeout("$('#message-blue').slideUp(1000);",5000);</script>
<?php
}
?>
              