<?php 
class Include_Language
{
    public $lang;
    public $location;
    public $filename = "languages";
    public $data = array();
    
   public function __construct() {
        $config = new Config();
        $lang = $config->lang;
        $filename .= "/languages-".$lang.".php";
        include_custom($filename);
    }
    
    public function show($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        else
        {
            return $key;
        }
    }
}
?>