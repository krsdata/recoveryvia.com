<?php $curPage='page';
$curSubPage='add_page'; 
include("includes/header.php");

$pageHead = 'Add page';
if(isset($_GET['editid']) && $_GET['editid']!='')
{
	$datauser = $obj->getRowFromAnyTable(TBL_PAGE,'id',$_GET['editid']);
	$pageHead = 'Edit page';
}



if(isset($_POST['submit']) && $_POST['submit']!='')
{
	$MESSAGE_RED[] = $obj->requiredField($_POST['page_name'],'page name','');
	
	if($obj->isEmptyError($MESSAGE_RED))
	{

		if($_POST['submit']=='add')
		{
			$sqlmax = "SELECT max(page_order) as max_order FROM ".TBL_PAGES."";
			$rs1max =  $obj->executeQry($sqlmax,$link);
			$row1max = $obj->fetchRow($rs1max);
			$page_order = $row1max['max_order'] + 1;

			
			$sql = "INSERT INTO ".TBL_PAGE." (page_name,page_content,meta_title,meta_key,meta_desc,page_order) values ('".$obj->escape($_POST['page_name'])."','".$obj->escape($_POST['page_content'])."','".$obj->escape($_POST['meta_title'])."','".$obj->escape($_POST['meta_key'])."','".$obj->escape($_POST['meta_desc'])."','".$page_order."')";
			$query = $obj->executeQry($sql,$link);
			$obj->setMessageForNextPage('Page added successfully','MESSAGE_GREEN');
			header('location:manage-page.php'.DEF_QRY_STR);

		}
		elseif($_POST['submit']=='edit')
		{
		
			$sql = "UPDATE ".TBL_PAGE." SET page_name='".$obj->escape($_POST['page_name'])."',page_content='".$obj->escape($_POST['page_content'])."',meta_title='".$obj->escape($_POST['meta_title'])."',meta_key='".$obj->escape($_POST['meta_key'])."',meta_desc='".$obj->escape($_POST['meta_desc'])."' WHERE id='".$_GET['editid']."'";
			$query = $obj->executeQry($sql,$link);
			$obj->setMessageForNextPage('Page detail updated successfully','MESSAGE_GREEN');
			header('location:manage-page.php'.DEF_QRY_STR);
		
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
                  <form name="addEditForm" id="addEditForm" method="post" action=""> 
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <th valign="top">Page name:</th>
                        <td><input type="text" name="page_name" id="page_name" class="inp-form required" value="<?php echo $_POST['page_name']=='' ? $datauser['page_name'] : $_POST['page_name'];?>"/></td>
                        <td><div id="page_nameError" class="errormessage"></div></td>
                      </tr>  
                      <tr>
                        <th valign="top">Page Content:</th>
                        <td>
						<?php 
							$ckeditor = new CKEditor( ) ;
							$ckeditor->basePath    = 'ckeditor/' ;        
							$ckeditor->config['width'] = 850 ;
							$ckeditor->config['height'] = 250 ; 
							
							CKFinder::SetupCKEditor( $ckeditor, 'ckfinder' ) ;        
							
							$ckeditor->editor('page_content', $datauser['page_content']);						
						?>
                        </td>
                        <td><div id="meta_titleError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Title:</th>
                        <td><input type="text" class="inp-form" name="meta_title" id="meta_title" value="<?php echo $_POST['meta_title']=='' ? $datauser['meta_title'] : $_POST['meta_title'];?>"/></td>
                        <td><div id="meta_titleError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Keyword:</th>
                        <td><input type="text" class="inp-form" name="meta_key" id="meta_key" value="<?php echo $_POST['meta_key']=='' ? $datauser['meta_key'] : $_POST['meta_key'];?>"/></td>
                        <td><div id="meta_keyError" class="errormessage"></div></td>
                      </tr>
                      <tr>
                        <th valign="top">Meta Description:</th>
                        <td><textarea rows="" cols="" name="meta_desc" id="meta_desc" class="form-textarea"><?php echo $_POST['meta_desc']=='' ? $datauser['meta_desc'] : $_POST['meta_desc'];?></textarea></td>
                        <td><div id="meta_descError" class="errormessage"></div></td>
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
