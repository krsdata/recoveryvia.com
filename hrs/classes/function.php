<?php
require_once(ABS_ROOT_PATH."classes/validation.php");

class myFunction extends myValidation{

	function isEmptyError($messageArray)
	{
		if (isset($messageArray) && $messageArray != "")
		{
			foreach ($messageArray as $key => $err)
			{
				if (isset($err) && $err != "")
				{
					return false;
				}
			}
		}
		return true;
	}

	function isAnyError($messageArray)
	{
		if (isset($messageArray) && $messageArray != "")
		{
			foreach ($messageArray as $key => $err)
			{
				if (isset($err) && $err != "")
				{
					return true;
				}
			}
		}
		return false;
	}

	function setMessageForNextPage($message,$messageType)
	{
		$_SESSION[$messageType.'_SET'] = $message;
	}

	function getRowFromAnyTable($tableName,$fieldName,$val)
	{
		$sql="SELECT * FROM `".$tableName."` WHERE `".$fieldName."` ='".$val."'";
		$query = $this->executeQry($sql,$link);
		if($this->getRow($query) > 0)
		{
			$data=$this->fetchRow($query);
		}
		else
		{
			$data = '';
		}
		return $data;
	}

	function selectAllRowFromAnyTable($tableName,$where='1')
	{
        if($where=='') $where = '1';
		$sql = 'SELECT * FROM  '.$tableName.' WHERE '.$where;
		$query = $this->executeQry($sql,$link);
		return $query;
	}
// deleteRowFromAnyTable(TBL_MYCAREER,'id',$_GET['delid']);
	function deleteRowFromAnyTable($tableName,$fieldName,$val)
	{
		$where = $fieldName."=".$val;
		$val = "status=2";
		$sql="UPDATE `".$tableName."` SET  ".$val." WHERE  ".$where."";
		$query = $this->executeQry($sql,$link);
		
		/*$sql="DELETE FROM `".$tableName."` WHERE `".$fieldName."` ='".$val."'";
		$query = $this->executeQry($sql,$link);*/
	}	

	function updateRowFromAnyTable($tableName,$val,$where)
	{
		$sql="UPDATE `".$tableName."` SET  ".$val." WHERE  ".$where."";
		$query = $this->executeQry($sql,$link);
	}	
	
	function uploadeFile($fileArray,$fieldName,$path)
	{
		if(is_uploaded_file($fileArray[$fieldName]['tmp_name']))
		 {
			$filename = basename($fileArray[$fieldName]["name"]);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			$time=time();
			$filename=$time.".".$ext;
			move_uploaded_file($fileArray[$fieldName]["tmp_name"],$path.$filename);
		 	return $filename;
		 }    
	}
	
	function checkUniqueValue($tableName,$fieldName,$val,$msgFieldName,$where='1',$msg)
	{
		if($where=='')$where='1';
		$sql="SELECT * FROM `".$tableName."` WHERE `".$fieldName."` ='".$val."' AND $where";
		$query = $this->executeQry($sql,$link);
		if($this->getRow($query) > 0)
		{
				return  $mess == '' ? $msgFieldName.' already exist' : $mess;
		}
		else
		{
			return '';
		}
		return $data;
	}


}
?>