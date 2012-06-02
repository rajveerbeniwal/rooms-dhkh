<?php
class Include_DBConfig
{
    private $server;
    private $username;
    private $password;
    private $dbname;
    private $connection;
    private $result = null;
    private $magic_quotes_active;
    private $real_escape_string_exists;
    
    
    public function __construct()
    {
        $config = new Config();
        $this->server=$config->host;
        $this->username=$config->user;
        $this->password=$config->password;
        $this->dbname=$config->db;
        $this->open();
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists("mysql_read_escape_string");
    }   
    
    //ham mo ket noi csdl
    public function open()
    {
        $this->connection = mysql_connect($this->server,$this-> username,$this->password);
        if(!$this->connection)
        {
           die("Database connection failed: " . mysql_error());  
        }
        
        $db_select  = mysql_select_db($this->dbname,$this-> connection);
        mysql_query('SET NAMES utf8');
        if(!$db_select)
        {
             die("Database selection failed: " . mysql_error()); 
        }
    }   
    
    //ham thuc hien truy van du lieu
    public function query($sql)
    {
        $this->result = mysql_query($sql,$this->connection);
        if(!$this->result)
        {
            $output = "Database query failed: " . mysql_error() . "<br /><br />"; 
            die($output);
        }   
        return $this->result;
    }
    
    public function getIndentity()
    {
        return mysql_insert_id($this->connection);
    }
    
    //ham lay du lieu thanh mang
    public function fetch_array()
    {
        if($this->result)
        {
            $rows = array();
            while($rows1 = mysql_fetch_array($this->result))
            {
                $rows[]  = $rows1;
            }
        }        
        return $rows;
    }
    
    //lay ve so dong bi anh huong boi cau lenh select
    public function num_row()
    {
        if($this->result)
        {
            $num = null;
            $num = mysql_num_rows($this->result);
        }
        return $num;
    }
    
    public function num_affected()
    {
        if($this->result)
        {
            $num = null;
            $num = mysql_affected_rows($this->connection);
        }
        return $num;
    }
    
    //ham quote bien gia tri
    public function sqlQuote($val)
    {
        if($this->real_escape_string_exists)
        {
            if($this->magic_quotes_active)
            {
                $val = stripslashes($val);
            }
            $val = mysql_real_escape_string($val);
        }
        else
        {
            if(!$this->magic_quotes_active)
            {
                $val = addslashes($val);                
            }  
        }
        return $val;
    }
    
    //ham dong ket noi csdl
    public function close()
    {
        if($this->connection)
        {
            mysql_close($this->connection);
            unset($this->connection);
        }
    }
}
?>