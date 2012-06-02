<?php
class Include_FunctionsLib
{ 
   // cut chuoi function 
    public function cstr($text, $start=0, $limit=12)
    {
    	if (function_exists('mb_substr')) {
    		$more = (mb_strlen($text) > $limit) ? TRUE : FALSE;
    		$text = mb_substr($text, 0, $limit, 'UTF-8');
    		return array($text, $more);
    		} elseif (function_exists('iconv_substr')) {
    		$more = (iconv_strlen($text) > $limit) ? TRUE : FALSE;
    		$text = iconv_substr($text, 0, $limit, 'UTF-8');
    		return array($text, $more);
    	} else {
    		preg_match_all("/[x01-x7f]|[xc2-xdf][x80-xbf]|xe0[xa0-xbf]
    		[x80-xbf]|[xe1-xef][x80-xbf][x80-xbf]|xf0[x90-xbf][x80-xbf][x80-xbf]
    		|[xf1-xf7][x80-xbf][x80-xbf][x80-xbf]/", $text, $ar);
    	if(func_num_args() >= 3) {
    	if (count($ar[0])>$limit) {
    		$more = TRUE;
    		$text = join("",array_slice($ar[0],0,$limit));
    		}
    		$more = TRUE;
    		$text = join("",array_slice($ar[0],0,$limit));
    		} else {
    		$more = FALSE;
    		$text = join("",array_slice($ar[0],0));
    	}
    	return array($text, $more);
    	}
    }
    
    public function cut_title($text, $limit=25)
    	{
    	$val = cstr($text, 0, $limit);
    	return $val[1] ? $val[0] : $val[0];
    }
    
    public function substrCustom($str,$start,$length)
    		{
    			$len = strlen($str);
    			if($start + $length >= $len)
    			{
    				return $str;
    			}
    
    			$temp = 0;
    			for($i = $start + $length;$i>=0;$i--)
    			{
    				if($str[$i] == " " && $str[$i-1] != " ")
    				{
    					$temp = $i;
    					break;
    				}
    			}
    			if(($start + $length) - $temp >=10)
    				return substr ($str, $start, $length);
    			$lengtemp = $temp - $start;
    			return substr($str, $start, $lengtemp);
    		}
            
    public function GetDomain($url)
    {
        $nowww = ereg_replace('www\.','',$url);
        $domain = parse_url($nowww);
        if(!empty($domain["host"]))
        {
            return $domain["host"];
         } else
         {
         return $domain["path"];
         }
     
    }
    public function curPageURL() {
         $pageURL = 'http';
         if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
         $pageURL .= "://";
         if ($_SERVER["SERVER_PORT"] != "80") {
          $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
         } else {
          $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
         }
         return $pageURL;
    }		 
}

?>