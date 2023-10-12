<?php
class FormAssist
{
	private $_dao,$_fields,$_str,$_errors;
	
	public function __construct($fields,$data)
	{
		if(is_array($fields))
		{
			
			if(empty($data))
			{
				$this->_fields  = $fields;
			}
			else
			{
				foreach($fields as $ind=>$val)
				{
					if(!isset($data[$ind]))
					{
						$data[$ind]="";
					}
				}
				$this->_fields=$data;
				
				
			}
		}
		else
		{
			die("pass array to constructor");
		}
		
		$_errors="";
	}
	
	public function textBox($name,$attributes=array())
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<input type='text' name='$name' ".$this->_attributeString($attributes);
			if($this->_fields[$name]!=null)
			{
				$this->_str .="value='".$this->_fields[$name]."'";
			}
			$this->_str .=" />";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function passwordBox($name,$attributes=array())
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<input type='password' name='$name' ".$this->_attributeString($attributes);
			
			$this->_str .=" />";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function textArea($name,$attributes=array())
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<textarea name='$name' ".$this->_attributeString($attributes)." >";
			if($this->_fields[$name]!=null)
			{
				$this->_str .=$this->_fields[$name];
			}
			$this->_str .="</textarea>";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function fileField($name,$attributes=array())
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<input type='file' name='$name' ".$this->_attributeString($attributes)." />";			
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function dropDownList($name,$attributes=array(),$options,$default="select")
	{
		$this->_str="";
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<select name='$name' ".$this->_attributeString($attributes)." >";
			if(is_array($options))
			{
				
				$this->_str.="<option selected='selected' disabled='disabled'>$default</option>";
				
				foreach($options as $label=>$value)
				{
					if($this->_fields[$name]==$value)
					{
						$this->_str.="<option selected='selected' value='$value'>$label</option>";
					}
					else
					{
						$this->_str.="<option value='$value'>$label</option>";
					}
					
				}
				$this->_str.="</select>";
			}
			else
			{
				$this->_errors.="<p>options provided to $name should be an array</p>";
				return "Error...";
			}
			return $this->_str;
		}
		else
		{
			$this->_errors .= "<p>$name not present in field list</p>";
			return "Error...";
		}
	}
	public function ajaxHelperDropDownList($name,$attributes=array(),$options,$default="select",$num=1)
	{
		$this->_str="";
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<select name='$name' ".$this->_attributeString($attributes)." >";
			if(is_array($options))
			{
				
				$this->_str.="<option selected='selected' disabled='disabled'>$default</option>";
				
				foreach($options as $label=>$value)
				{
					if($this->_fields[$name]==$value)
					{
						$this->_str.="<option selected='selected' value='".$value[0]."' class='c".$value[1]." f".$num."' >$label</option>";
					}
					else
					{
						$this->_str.="<option value='".$value[0]."' class='c".$value[1]." f".$num."' >$label</option>";
					}
					
				}
				$this->_str.="</select>";
			}
			else
			{
				$this->_errors.="<p>options provided to $name should be an array</p>";
				return "Error...";
			}
			return $this->_str;
		}
		else
		{
			$this->_errors .= "<p>$name not present in field list</p>";
			return "Error...";
		}
	}
	public function ajaxDropDownList($list,$start,$end)
	{
		$flag=false;
		$string="";
		$num=1;
		foreach($list as $key=>$val)
		{
			if(!isset($val[2]))
				$val[2]="Select";
			
		$string.=$start;
			$string.=$this->ajaxHelperDropDownList($key,$val[0],$val[1],$val[2],$num);
		$string.=$end;
		$num++;
		}
		
		$string.="<script type='text/javascript'>";
				$string.="cn=document.getElementsByClassName('cn');
					i=0;
					while(i<cn.length){ 
					cn[i].style.display='none';
						i++;
					}";
		
		$num=2;
		foreach($list as $key=>$val)
		{
			
				$string.="
				document.getElementsByName('".$key."')[0].onchange=function(){
					
					hide=document.getElementsByClassName('f".$num."');
					i=0;
					while(i<hide.length){ 
					hide[i].style.display='none';
						i++;
					}
					
					
					class1=document.getElementsByName('".$key."')[0].value;
					c=document.getElementsByClassName('c'+class1); 
					i=0; while(i<c.length){ c[i].style.display='block'; i++; }
				}";
			
			$num++;
		}
		$string.="</script>";
		
		
		
		
		
		return $string;
	}
	
	
	
	public function RadioGroup($name,$attributes=array(),$options,$vertical = false)
	{
		$this->_str="";
		if(isset($this->_fields[$name]))
		{
			
			if(is_array($options))
			{
				$verticalStr="";
				if($vertical)
				{
					$verticalStr="<br />";
				}
				foreach($options as $label=>$value)
				{
					if($this->_fields[$name]==$value)
					{
						$this->_str.="<label><input type='radio' name='$name'".$this->_attributeString($attributes). " value='$value' checked='checked' /> $label  &nbsp;&nbsp;</label>$verticalStr";
					}
					else
					{
						$this->_str.="<label><input type='radio' name='$name'".$this->_attributeString($attributes). " value='$value' /> $label &nbsp;&nbsp;</label>$verticalStr";
					}
					
				}
				
			}
			else
			{
				$this->_errors.="<p>options provided to $name should be an array</p>";
				return "Error...";
			}
			return $this->_str;
		}
		else
		{
			$this->_errors .= "<p>$name not present in field list</p>";
			return "Error...";
		}
	}
	public function CheckBoxList($name,$attributes=array(),$options,$vertical = false)
	{
		$this->_str="";
		if(isset($this->_fields[$name]))
		{
			
			if(is_array($options))
			{
				$verticalStr="";
				if($vertical)
				{
					$verticalStr="<br />";
				}
				foreach($options as $label=>$value)
				{
					if(is_array($this->_fields[$name]))
					{
						if(in_array($value,$this->_fields[$name]))
						{
							$this->_str.="<label><input type='checkBox' name='$name"."[]'".$this->_attributeString($attributes). " value='$value' checked='checked' /> $label  &nbsp;&nbsp;</label>$verticalStr";
						}
						else
						{
							$this->_str.="<label><input type='checkbox' name='$name"."[]'".$this->_attributeString($attributes). " value='$value' /> $label  &nbsp;&nbsp;</label>$verticalStr";
						}
					}
					else
					{
						$this->_str.="<label><input type='checkbox' name='$name"."[]'".$this->_attributeString($attributes). " value='$value' /> $label  &nbsp;&nbsp;</label>$verticalStr";
					}
					
				}
				
			}
			else
			{
				$this->_errors.="<p>options provided to $name should be an array</p>";
				return "Error...";
			}
			return $this->_str;
		}
		else
		{
			$this->_errors .= "<p>$name not present in field list</p>";
			return "Error...";
		}
	}
	public function inputBox($name,$attributes=array(),$fieldType="text")
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<input type='$fieldType' name='$name' ".$this->_attributeString($attributes);
			if($this->_fields[$name]!=null)
			{
				$this->_str .="value='".$this->_fields[$name]."'";
			}
			$this->_str .=" />";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	
	
	
	public function submitButton($name,$attributes=array(),$label="SUBMIT")
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<input type='submit' name='$name' ".$this->_attributeString($attributes);
			
				$this->_str .="value='".$label."'";
			
			$this->_str .=" />";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function button($name,$attributes=array(),$type='button',$label="BUTTON")
	{
		$this->_str="";
		
		if(isset($this->_fields[$name]))
		{
			$this->_str .="<button type='$type' name='$name' ".$this->_attributeString($attributes)." ";
			
				$this->_str .="value='".$label."' >";
			$this->_str .=$label."</button>";
			return $this->_str;
		}
		else
		{
			$this->_errors = "<p>$name not present in field list</p>";
			return "Error...";
		}
		
	}
	public function getErrors()
	{
		return $this->_errors;
	}
	private function _attributeString($attributes)
	{
		if(is_array($attributes))
		{
			$str="";
			foreach($attributes as $name=>$val)
			{
				if($name!='name' && $name!='value' && $name!='type')
				$str.=" $name='$val' ";
			}
			return $str;
		}
		else
		{
			$this->_errors.="<p>atrributes should be an array</p>";
			return "";
		}
	}
}


?>
