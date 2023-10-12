<?php
class FileUpload
{
	private $_errors;
	public function doUpload($files,$types,$maxSize,$minSize,$path)
	{
		if(in_array($files['type'],$types))
		{
			if($files['size']<$minSize*1024)
			{
				$this->_errors="<p>File too Small</p>";
				return false;
			}
			if($files['size']>$maxSize*1024)
			{
				$this->_errors="<p>File Too Big</p>";
				return false;
			}
			$ext=strrchr($files['name'],".");
			do
			{
				$orgname=md5(rand(0,999999999)).$ext;
				
			}while(file_exists("$path/$orgname"));
			if(move_uploaded_file($files['tmp_name'],"$path/$orgname"))
			{
				return $orgname;
			}
			else
			{
				$this->_errors="Cannot move uploaded file";
				return false;
			}
			
			
		}
		else
		{
			$this->_errors="<p>Invalid File format</p>";
			return false;
		}
	}
	public function doUploadCustom($files,$types,$maxSize,$minSize,$path,$name)
	{
		if(in_array($files['type'],$types))
		{
			if($files['size']<$minSize*1024)
			{
				$this->_errors="<p>File too Small</p>";
				return false;
			}
			if($files['size']>$maxSize*1024)
			{
				$this->_errors="<p>File Too Big</p>";
				return false;
			}
			$ext=strrchr($files['name'],".");
			
			$orgname=$name.$ext;
				
			if(!file_exists("$path/$orgname"))
			{
				if(move_uploaded_file($files['tmp_name'],"$path/$orgname"))
				{
					return $orgname;
				}
				else
				{
					$this->_errors="Cannot move uploaded file";
					return false;
				}
			}
			else
			{
				$this->_errors="File Already Exists";
				return false;
			}
			
		}
		else
		{
			$this->_errors="<p>Invalid File format</p>";
			return false;
		}
	}
	public function doUploadRandom($files,$types,$maxSize,$minSize,$path)
	{
		$ext=strrchr($files['name'],".");
		if(in_array($ext,$types))
		{
			if($files['size']<$minSize*1024)
			{
				$this->_errors="<p>File too Small</p>";
				return false;
			}
			if($files['size']>$maxSize*1024)
			{
				$this->_errors="<p>File Too Big</p>";
				return false;
			}
			
			do{
				$orgname=md5(rand())."_".substr(md5(rand()),rand(1,10),rand(10,20)).$ext;
				
			}while(file_exists("$path/$orgname"));
			
				
			if(!file_exists("$path/$orgname"))
			{
				if(move_uploaded_file($files['tmp_name'],"$path/$orgname"))
				{
					return $orgname;
				}
				else
				{
					$this->_errors="Cannot move uploaded file";
					return false;
				}
			}
			else
			{
				$this->_errors="File Already Exists";
				return false;
			}
			
		}
		else
		{
			$this->_errors="<p>Invalid File format</p>";
			return false;
		}
	}
	public function errors()
	{
		return $this->_errors;
	}
	
}



?>
