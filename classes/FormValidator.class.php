<?php

class FormValidator
{
	public $rules,$data,$labels;
	private $_errors,$_flag,$_dao;
	
	public function __construct($rulesArr,$labels=array())
	{
		require_once("DataAccess.class.php");
		$this->_dao = new DataAccess();
		if(!is_array($rulesArr))
		{
			die("Rules should be an array");
		}
		if(!is_array($labels))
		{
			die("labels should be an array");
		}
		
		$this->labels=$labels;
		$this->rules=$rulesArr;
		$this->_flag=true;
		$this->_errors=array();
		
	}
	public function validate($dataArr)
	{
		
		if(!is_array($dataArr))
		{
			die("data should be an array");
		}
		$this->data = $dataArr;
		foreach($this->rules as $field=>$rules)
		{
			if(!is_array($rules))
			{
				die("rules for $field should be an array");
			}
			foreach($rules as $ruleName=>$ruleValue)
			{
				if($ruleName=="required")
				{
					if(isset($this->data[$field]))
					{
						if($this->data[$field]==NULL)
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field]=$this->labels[$field]." Required";
							}
							else
							{
								$this->_errors[$field]=" $field Required";
							}
							break;
						}
					}
					else
					{
						$this->_flag=false;
						if(isset($this->labels[$field]))
							{
								$this->_errors[$field]=$this->labels[$field]." Required";
							}
							else
							{
								$this->_errors[$field]=" $field Required";
							}
						break;
					}
				}
				else if($ruleName == "minlength")
				{
					//echo gettype($ruleValue);
					if(gettype($ruleValue)=="integer")
					{
						if(strlen($this->data[$field])<$ruleValue)
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field]="minimum $ruleValue characters for ".$this->labels[$field];
							}
							else
							{
								$this->_errors[$field]=$this->_errors[$field]="minimum $ruleValue characters for ".$field;
							}
							break;
						}
					}
					else
					{
						die("rule value for minlenth($field) should be integer");
					}
				}
			
			else if($ruleName == "maxlength")
			{
				//echo gettype($ruleValue);
				if(gettype($ruleValue)=="integer")
				{
					if(strlen($this->data[$field])>$ruleValue)
					{
						$this->_flag=false;
						if(isset($this->labels[$field]))
						{
							$this->_errors[$field]="Maximum $ruleValue characters allowed for ".$this->labels[$field];
						}
						else
						{
							$this->_errors[$field]=$this->_errors[$field]="maximum $ruleValue characters for ".$field;
						}
						break;
					}
				}
				else
				{
					die("rule value for maxlenth($field) should be integer");
				}
			}
			else if($ruleName == "nospecchars")
			{
				if(preg_match('/[\'^£$%&!;:*()}{@#~?><>,.|=_+¬-]/',$this->data[$field]))
				{
					$this->_flag=false;
					if(isset($this->labels[$field]))
					{
						$this->_errors[$field]="No special characters allowed in ".$this->labels[$field];
					}
					else
					{
						$this->_errors[$field]="No special characters allowed in ".$field;
					}
					break;
					
				}
			}
			else if($ruleName == "email")
			{
				if($this->data[$field]!="")
				{
					if(!filter_var($this->data[$field],FILTER_VALIDATE_EMAIL))
					{
						$this->_flag=false;
						if(isset($this->labels[$field]))
						{
							$this->_errors[$field]="Invalid email Format for ".$this->labels[$field];
						}
						else
						{
							$this->_errors[$field]="Invalid email Format for ".$field;
						}
						break;
						
					}
				}
				
			}
			else if($ruleName == "integeronly")
			{
				//echo gettype($this->data[$field]);
				if(!is_numeric($this->data[$field]))
				{
					$this->_flag=false;
					$this->_errors[$field]=$field." should be Integer(Number)";
					break;
				}
				
			}
			else if($ruleName == "alphaonly")
			{
				if(ctype_alpha($this->data[$field])==false)
				{
					$this->_flag=false;
					$this->_errors[$field]=$field." should contain alphabets only";
					break;
				}
				
			}
			else if($ruleName == "alphaspaceonly")
			{
				if(ctype_alpha(str_replace(' ','',$this->data[$field]))==false)
				{
					$this->_flag=false;
					$this->_errors[$field]=$field." should contain alphabets or space only";
					break;
				}
				
			}
			else if($ruleName == "range")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue['min']) && isset($ruleValue['max']))
					{
						if(!(is_nan($ruleValue['min']) || is_nan($ruleValue['max'])))
						{
							if($ruleValue['min']<$ruleValue['max'])
							{
								if($this->data[$field] < $ruleValue['min'])
								{
									$this->_flag=false;
									if(isset($this->labels[$field]))
									{
										$this->_errors[$field]=$this->labels[$field]." shouldn't be less than ".$ruleValue['min'];
									}
									else
									{
										$this->_errors[$field]=$field." shouldn't be less than ".$ruleValue['min'];;
									}
									break;
								}
								else if($this->data[$field] > $ruleValue['max'])
								{
									$this->_flag=false;
									if(isset($this->labels[$field]))
									{
										$this->_errors[$field]=$this->labels[$field]." shouldn't exceed ".$ruleValue['max'];
									}
									else
									{
										$this->_errors[$field]=$field." shouldn't exceed ".$ruleValue['max'];;
									}
									break;
								}
							}
							else
							{
								die("minimum value should be less than  max value for 'Range' rule [$field]");
							}
						}
						else
						{
							die("min and max values for 'Range' rule [$field] should be Numbers");
						}
					}
					else
					{
						die("min and max should be set for 'Range' rule [$field]");
					}
				}
				else if($ruleName == "regexp")
				{
					if(gettype($ruleValue)=="string")
					{
						if(preg_match($ruleValue,$this->data[$field]))
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field]="Invalid Syntax for ".$this->labels[$field];
							}
							else
							{
								$this->_errors[$field]="Invalid Syntax for ".$field;
							}
							break;
							
						}
					}
					else
					{
						die("rule value should be a string for 'RegExp' rule [$field]");
					}
				}
				else
				{
					die("rule value should be an array for 'Range' rule [$field]");
				}
			}
			else if($ruleName == "exist")
			{
				if(is_array($ruleValue))
				{
					if(!in_array($this->data[$field],$ruleValue))
					{
						$this->_flag=false;
						if(isset($this->labels[$field]))
						{
							$this->_errors[$field]=$this->data[$field]." is not allowed in ".$this->labels[$field];
						}
						else
						{
							$this->_errors[$field]=$this->data[$field]." is not allowed in ".$field;
						}
						break;
					}
				}
				else
				{
					die("rule value should be an array for 'Exist' rule [$field]");
				}
			}
			else if($ruleName == "dbexist")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue["field"]) && isset($ruleValue["table"]))
					{
						if(!$this->_dao->checkExist($ruleValue["field"],$this->data[$field],$ruleValue["table"]))
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field] = $this->data[$field]." is not valid for ".$this->labels[$field];
							}
							else
							{
								$this->_errors[$field] = $this->data[$field]." is not valid for $field";
							}
							break;
						}
						
						
					}
					else
					{
						die("Please set  \"field\" and \"table\" in rule value of \"dbexist\" rule [$field] ");
					}
				}
				else
				{
					die("rule value should be an array for 'Dbexist' rule [$field]");
				}
			}
			else if($ruleName == "unique")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue["field"]) && isset($ruleValue["table"]))
					{
						if($this->_dao->checkExist($ruleValue["field"],$this->data[$field],$ruleValue["table"]))
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field] = $this->data[$field]." already exist in ".$this->labels[$field];
							}
							else
							{
								$this->_errors[$field] = $this->data[$field]."  already exist in $field";
							}
							break;
						}
						
						
					}
					else
					{
						die("Please set  \"field\" and \"table\" in rule value of \"dbexist\" rule [$field] ");
					}
				}
				else
				{
					die("rule value should be an array for 'Dbexist' rule [$field]");
				}
			}
			else if($ruleName == "compare")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue["comparewith"]) && isset($ruleValue["operator"]))
					{
						if(isset($this->rules[$ruleValue["comparewith"]]))
						{
							if(isset($this->data[$ruleValue["comparewith"]]))
							{
								if($ruleValue["operator"] == "=")
								{
									if($this->data[$ruleValue["comparewith"]] != $this->data[$field])
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$ruleValue["comparewith"]]." do not match with ".$this->labels[$field];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$ruleValue["comparewith"]." do not match with ".$this->labels[$field];
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$ruleValue["comparewith"]]." do not match with ".$field;
										}
										else
										{
											$this->_errors[$field]=$ruleValue["comparewith"]." do not match with ".$field;
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == ">=")
								{
									if($this->data[$field] < $this->data[$ruleValue["comparewith"]] )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be greater than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be greater than or equal to ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. "should be greater than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . "should be greater than or equal to ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								
								else if($ruleValue["operator"] == "<=")
								{
									if($this->data[$field] > $this->data[$ruleValue["comparewith"]] )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be less than or equal to".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be less than or equal to".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. "should be less than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . "should be less than or equal to".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == "<")
								{
									if($this->data[$field] >= $this->data[$ruleValue["comparewith"]] )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be less than".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be less than".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. "should be less than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . "should be less than ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == ">")
								{
									if($this->data[$field] <= $this->data[$ruleValue["comparewith"]] )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be greater than".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be greater than".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. "should be greater than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . "should be greater than ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == "!=")
								{
									if($this->data[$field] == $this->data[$ruleValue["comparewith"]] )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should not be equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should not be equal to ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. "should not be equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . "should not be equal to ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else
								{
									die("Invalid operator ".$ruleValue["operator"]." for 'Compare' rule [$field]");
								}
							}
	
							else
							{
								$this->_flag=false;
								if(isset($this->labels[$field]))
								{
									$this->_errors[$field]=$ruleValue["comparewith"]." is required to compare with ".$this->labels[$field];
								}
								else
								{
									$this->_errors[$field]=$ruleValue["comparewith"]." is required to compare with ".$field;
								}
								break;
							}
							
						}
						else
						{
							die($ruleValue["comparewith"]." is not present in rules for \"compare\" rule [$field] ");
						}
					}
					else
					{
						die("Please set  \"comparewith\" and \"operator\" in rule value of \"compare\" rule [$field] ");
					}
				}
				else
				{
					die("rule value should be an array for 'Compare' rule [$field]");
				}
			}
			else if($ruleName=="filerequired")
			{
				if(isset($_FILES[$field]))
				{
					if($_FILES[$field]['name']==NULL)
					{
						$this->_flag=false;
						if(isset($this->labels[$field]))
						{
							$this->_errors[$field]=$this->labels[$field]." Required";
						}
						else
						{
							$this->_errors[$field]=" $field Required";
						}
						break;
					}
				}
				else
				{
					$this->_flag=false;
					if(isset($this->labels[$field]))
						{
							$this->_errors[$field]=$this->labels[$field]." Required";
						}
						else
						{
							$this->_errors[$field]=" $field Required";
						}
					break;
				}
			}
			else if($ruleName == "date")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue['from']) && isset($ruleValue['to']))
					{
						$from=strtotime(date('Y-m-d',strtotime($ruleValue['from'])));
						$to=strtotime($ruleValue['to']);
						$d=strtotime($this->data[$field]);
						
						if($d < $from)
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field]=$this->labels[$field]." shouldn't be less than ".date('m-d-Y',$from);
							}
							else
							{
								$this->_errors[$field]=$field." shouldn't be less than ".date('m-d-Y',$from);
							}
							break;
						}
						else if($d > $to)
						{
							$this->_flag=false;
							if(isset($this->labels[$field]))
							{
								$this->_errors[$field]=$this->labels[$field]." shouldn't greater than ".date('m-d-Y',$to);
							}
							else
							{
								$this->_errors[$field]=$field." shouldn't greater than ".date('m-d-Y',$to);
							}
							break;
						}
						
						
						
					}
					else
					{
						die("from and to should be set for 'Date' rule [$field]");
					}
				}
			}
			else if($ruleName == "datecompare")
			{
				if(is_array($ruleValue))
				{
					if(isset($ruleValue["comparewith"]) && isset($ruleValue["operator"]))
					{
						if(isset($this->rules[$ruleValue["comparewith"]]))
						{
							if(isset($this->data[$ruleValue["comparewith"]]))
							{
								$cwith=strtotime($this->data[$ruleValue["comparewith"]]);
								$org=strtotime($this->data[$field]);
								
								if($ruleValue["operator"] == "=")
								{
									if($cwith != $org)
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$ruleValue["comparewith"]]." do not match with ".$this->labels[$field];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$ruleValue["comparewith"]." do not match with ".$this->labels[$field];
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$ruleValue["comparewith"]]." do not match with ".$field;
										}
										else
										{
											$this->_errors[$field]=$ruleValue["comparewith"]." do not match with ".$field;
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == ">=")
								{
									if($org < $cwith )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be greater than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be greater than or equal to ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. " should be greater than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . " should be greater than or equal to ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								
								else if($ruleValue["operator"] == "<=")
								{
									if($org > $cwith )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be less than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be less than or equal to ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. " should be less than or equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . " should be less than or equal to ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == "<")
								{
									if($org >= $cwith )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be less than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be less than ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. " should be less than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . " should be less than ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == ">")
								{
									if($org <= $cwith )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . "should be greater than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should be greater than ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. " should be greater than ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . " should be greater than ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else if($ruleValue["operator"] == "!=")
								{
									if($org == $cwith )
									{
										$this->_flag=false;
										if(isset($this->labels[$field]) && isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should not be equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else if(isset($this->labels[$field]))
										{
											$this->_errors[$field]=$this->labels[$field] . " should not be equal to ".$ruleValue["comparewith"];	
										}
										else if(isset($this->labels[$ruleValue["comparewith"]]))
										{
											$this->_errors[$field]=$field. " should not be equal to ".$this->labels[$ruleValue["comparewith"]];	
										}
										else
										{
											$this->_errors[$field]=$field . " should not be equal to ".$ruleValue["comparewith"];	
										}
										
										break;
									}
									
								}
								else
								{
									die("Invalid operator ".$ruleValue["operator"]." for 'Compare' rule [$field]");
								}
							}
	
							else
							{
								$this->_flag=false;
								if(isset($this->labels[$field]))
								{
									$this->_errors[$field]=$ruleValue["comparewith"]." is required to compare with ".$this->labels[$field];
								}
								else
								{
									$this->_errors[$field]=$ruleValue["comparewith"]." is required to compare with ".$field;
								}
								break;
							}
							
						}
						else
						{
							die($ruleValue["comparewith"]." is not present in rules for \"compare\" rule [$field] ");
						}
					}
					else
					{
						die("Please set  \"comparewith\" and \"operator\" in rule value of \"compare\" rule [$field] ");
					}
				}
				else
				{
					die("rule value should be an array for 'Compare' rule [$field]");
				}
			}
			else
			{
				die("<b>$ruleName</b> is not a rule[$field]");
			}
		}
			
			
		}
		
		return $this->_flag;
	}
	
	public function error($fieldName)
	{
		if(isset($this->rules[$fieldName]))
		{
			if(isset($this->_errors[$fieldName]))
			{
				return $this->_errors[$fieldName];
			}
		}
		else
		{
			return "no rules set for $fieldName";
		}
		return "";
		
	}

	
	
	
}

?>
