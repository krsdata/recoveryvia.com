<div id="repp_val_id">
  <select  name="repp_val" id="repp_val" class="styledselect_pages">
    <option value="">Number of rows</option>
    <option value="10" <?php echo $recordPerPage=='10' ? 'selected' :'';?>>10</option>
    <option value="20" <?php echo $recordPerPage=='20' ? 'selected' :'';?>>20</option>
    <option value="30" <?php echo $recordPerPage=='30' ? 'selected' :'';?>>30</option>
    <option value="40" <?php echo $recordPerPage=='40' ? 'selected' :'';?>>40</option>
  </select>
</div>
<script type="text/javascript">
				  $('#repp_val_id').click(function() {
					  	var repp_val = $('#repp_val').val();
						if(repp_val!='' && repp_val!='<?php echo $recordPerPage;?>')
						{
					  		window.location = "<?php echo $_SERVER['PHP_SELF'].'?repp='?>"+repp_val+"<?php echo '&page=&search='.$_GET['search']?>";
						}
					});
</script>
