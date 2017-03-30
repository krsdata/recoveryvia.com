<?php 
	class DbClass
	{
		var $_sql;
		var $_result;
		var $_numRow;
		var $_record;

		function DbClass()
		{
		
		}
		function executeQry($sql,$link)
		{
			$this->_sql = $sql;
			$this->_result = mysql_query($this->_sql) or die(mysql_error());
			return $this->_result;
		}
		function getRow($query)
		{
			$this->_numRow = mysql_num_rows($query);
			return $this->_numRow;
		}
		function fetchRow($query)
		{
			$this->_record = mysql_fetch_array($query);
			return $this->_record;
		}
		
		function escape($dirty)
		{
		   if (get_magic_quotes_gpc()){
				 $clean = mysql_real_escape_string(stripslashes($dirty));
		   }else{
				 $clean = mysql_real_escape_string($dirty);
		   }
		    $clean = preg_replace("@<script[^>]*>.+</script[^>]*>@i", "", $clean);
	   		return $clean;
		}
		
	}
?>