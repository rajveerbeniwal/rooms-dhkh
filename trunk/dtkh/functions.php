<?php
    function getRow($sql)
    {
        try
        {
            global $dbconfig;
            $dbconfig->open();
            $dbconfig->query($sql);
            $row = $dbconfig->num_row();
            $dbconfig->close();
            return $row;    
        }
        catch(MyException $ex)
        {
           return 0;
        }
    } 

function pagenavigator($page, $row_total, $page_size, $pagegroup_size,$url) 
{
    $andpage=(strrpos ($url,"?")===false)?"?p=":"&p=";
    $page_total = floor(($row_total-1)/$page_size)+1;
    if(!$page || $page > $page_total || $page < 1)
    {
        $page = 1;
    }
    
    $group = floor(($page-1)/$pagegroup_size)+1;
    $start_page = (($group-1)*$pagegroup_size)+1;
    $end_page = $start_page+$pagegroup_size-1;
    if ($end_page>$page_total) 
    {
        $end_page = $page_total;
    }
    if ($page_total>1) 
    {
        $str='';
        if ($end_page>$pagegroup_size)
        {
            $start_group = $pagegroup_size;
        }
        else
        {
            $start_group = 0;
        }
        if ($page>2)
        {
            $str.= '<a href="'.$url.'&p=1" > First page </a>';
        }
        if ($group>1)
        {
            $str.= '<a href="'.$url.'&p='.($page-1).'" > <<  </a>';
        }
        if($page!=1&&$page!=$page_total) {$str.= '<a href="'.$url.'&p='.($page-1).'" > << </a>';}
        for ( $i=$start_page ; $i <= $end_page ;$i++)
        {
            $j=$i+$page_size;
            $begin = ($i-1)*$page_size + 1;
            $end = $begin + $page_size - 1; 
            if ($i == $page)
            {
                $str.= "<a class='current'>$i</a>";
            }
            else
            {
                $str.= '<a href="'.$url.'&p='.$i.'"> '.$i.'</a> ';
            }
        }
        if ($page_total-$end_page>$pagegroup_size)
        {
            $end_group = $pagegroup_size;
        }
        else
        {
            $end_group = $page_total-$end_page;
        }
        if ($page<$page_total)
        {
            $str.= '<a href="'.$url.'&p='.($page+1).'" > >> </a>';
        }
        if ($page_total>2&&$page<$page_total)
        {
            $str.= '<a  href="'.$url.'&p='.$page_total.'" > Last page </a>';
        }

        return $str;
    }    
} 
function debug($variable,$option = 0)
{
      if($option == 0)
      {
        echo $variable;
      }
      else if($option == 1)
      {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
      }
}

function CreateObject($object_name)
{
   $parts = explode('_', $object_name);
   $path = "";
   foreach($parts as $val)
   {
        $path .= "/".$val;
   }
   //echo __SITE_PATH.$path.".php";
   include_once __SITE_PATH.$path.".php";
   $obj = new $object_name();
   return $obj;
}

function table_prefix($table_name)
{
    global $config;
    return $config->dbprefix.$table_name; 
}

function include_custom($file_include)
{
    include_once(__SITE_PATH."{$file_include}");
}

function require_custom($file_include)
{
    require_once(__SITE_PATH."{$file_include}");
}

function getLanguage()
{
    $config = new Config();
        $lang = $config->lang;
        $filename .= "/languages-".$lang.".php";
        include_custom($filename);
}

function show($key)
    {
        global $systemlanguage;
        if (array_key_exists($key, $systemlanguage)) {
            return $this->data[$key];
        }
        else
        {
            return $key;
        }
    }
    
function validationEamil($email)
{
    $status = false;
    try
    {
        $status = eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
        return $status;   
    }
    catch(MyException $ex)
    {
        return $status;
    }
}


  function objectToArray($object)
	{
		$array=array();
		foreach($object as $member=>$data)
		{
			$array[$member]= $data;
		}
		return $array;
	}

function array2xml($array, $valueKey,$xml = false){
    if($xml === false){
        $xml = new SimpleXMLElement('<root/>');
    }
    foreach($array as $key => $value){
        if(is_array($value)){
            array2xml($value,$valueKey, $xml->addChild($valueKey));
        }else{
            $xml->addChild($key, $value);
        }
    }
    return $xml->asXML();
}

function array_to_scv($array, $header_row = true, $col_sep = ",", $row_sep = "\n", $qut = '"')
{
	if (!is_array($array) or !is_array($array[0])) return false;
	
	$output = "";
	//Header row.
	if ($header_row)
	{
		foreach ($array[0] as $key => $val)
		{
			//Escaping quotes.
			$key = str_replace($qut, "$qut$qut", $key);
			$output .= "$col_sep$qut$key$qut";
		}
		$output = substr($output, 1)."\n";
	}
	//Data rows.
	foreach ($array as $key => $val)
	{
		$tmp = '';
		foreach ($val as $cell_key => $cell_val)
		{
			//Escaping quotes.
			$cell_val = str_replace($qut, "$qut$qut", $cell_val);
			$tmp .= "$col_sep$qut$cell_val$qut";
		}
		$output .= substr($tmp, 1).$row_sep;
	}
	
	return $output;
}

?>