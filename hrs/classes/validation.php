<?php
require_once(ABS_ROOT_PATH."classes/dbClass.php");

class myValidation extends DbClass{

	function requiredField($val,$fieldName,$mess)
	{
		if(trim($val)=='')
		{
			return  $mess == '' ? 'Please enter '.$fieldName : $mess;
		}
		else
		{
			return '';
		}
	}

	function validNumber($val,$fieldName,$mess)
	{
		if(trim($val)!='')
		{
			if(is_numeric(trim($val)))
			{
				return '';
			}	
			else
			{
				return  $mess == '' ? 'Please enter valid '.$fieldName : $mess;
			}
		}
	}
	function validNumberRequired($val,$fieldName,$mess)
	{
		$isEmpty = $this->requiredField($val,$fieldName,$mess);
		if($isEmpty=='')
		{
			if(is_numeric(trim($val)))
			{
				return '';
			}	
			else
			{
				return  $mess == '' ? 'Please enter valid '.$fieldName : $mess;
			}
		}
		else
		{
			return $isEmpty;
		}
	}

	function validEmail($val,$fieldName,$mess)
	{
		if(trim($val)!='')
		{
			if (preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $val))
			{
				return '';
			}	
			else
			{
				return  $mess == '' ? 'Please enter valid email address' : $mess;
			}
		}
	}
	
	function validEmailRequired($val,$fieldName,$mess)
	{
		$isEmpty = $this->requiredField($val,$fieldName,$mess);
		if($isEmpty=='')
		{
			if (preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $val))
			{
				return '';
			}	
			else
			{
				return  $mess == '' ? 'Please enter valid email address' : $mess;
			}
		}
		else
		{
			return $isEmpty;
		}
	}
	function validImage($val,$fieldName,$mess)
	{
		if(trim($val)!='')
		{
			$uploadName = end(explode('.',$val));
			if($uploadName=='jpg' || $uploadName=='png' || $uploadName=='gif' || $uploadName=='jpeg')
			{
				return '';
			}
			else
			{
					return  $mess == '' ? 'Please upload valid file format for '.$fieldName : $mess;
			}
		}
	}
	
	function validImageRequired($val,$fieldName,$mess)
	{
		$isEmpty = $this->requiredField($val,$fieldName,$mess);
		if($isEmpty=='')
		{
			$uploadName = end(explode('.',$val));
			if($uploadName=='jpg' || $uploadName=='png' || $uploadName=='gif' || $uploadName=='jpeg')
			{
				return '';
			}
			else
			{
					return  $mess == '' ? 'Please upload valid file format for '.$fieldName : $mess;
			}
		}
		else
		{
			return $isEmpty;
		}
	}
	function validDocRequired($val,$fieldName,$mess)
	{
		$isEmpty = $this->requiredField($val,$fieldName,$mess);
		if($isEmpty=='')
		{
		//$uploadName=='jpg' || $uploadName=='png' || $uploadName=='gif' || $uploadName=='jpeg' || 
			$uploadName = end(explode('.',$val));
			if($uploadName=='pdf' || $uploadName=='doc' || $uploadName=='docx' || $uploadName=='dot' || $uploadName=='xls' || $uploadName=='xlsx')
			{
				return '';
			}
			else
			{
					return  $mess == '' ? 'Please upload valid file format for '.$fieldName : $mess;
			}
		}
		else
		{
			return $isEmpty;
		}
	}
	function validImgRequired($val,$fieldName,$mess)
	{
		$isEmpty = $this->requiredField($val,$fieldName,$mess);
		if($isEmpty=='')
		{
		//$uploadName=='jpg' || $uploadName=='png' || $uploadName=='gif' || $uploadName=='jpeg' || 
			$uploadName = end(explode('.',$val));
			if($uploadName=='jpg' || $uploadName=='png' || $uploadName=='gif' || $uploadName=='jpeg')
			{
				return '';
			}
			else
			{
					return  $mess == '' ? 'Please upload valid file format for '.$fieldName : $mess;
			}
		}
		else
		{
			return $isEmpty;
		}
	}
	

}
?>