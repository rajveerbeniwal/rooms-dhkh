<?php 
class Model_DAO_Truong
{
    public function lists($start = 0,$length = 0)
    {
        global $dbconfig;
        $listtruong = array();
        try
        {
            if($start == 0 && $length == 0)
            {
                $sql = "select * from ".table_prefix("truong")." order by `order` ASC";    
            }
            else
                $sql = "select * from ".table_prefix("truong")." order by `order` ASC limit {$start},{$length}";
            
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $truong = CreateObject("Model_Entity_Truong");
                    $truong->id = $arr["id"];
                    $truong->name = $arr["name"];
                    $truong->order = $arr["order"];
                    $truong->updated = $arr["updated"]; 
                    $truong->status = $arr["status"];       
                    
                    $listtruong[] = $truong;
                }   
            }
            else
            {
                $listtruong = NULL;
            }
            $dbconfig->close();
            return $listtruong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listtruong;
        }
    }
	
	 public function listsXML()
    {
        global $dbconfig;
        $listtruong = array();
        try
        {                      
			$sql = "select * from ".table_prefix("truong");
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $truong = CreateObject("Model_Entity_Truong");
                    $truong->id = $arr["id"];
                    $truong->name = $arr["name"];
                    $truong->order = $arr["order"];
                    $truong->updated = $arr["updated"]; 
                    $truong->status = $arr["status"];       
                    
                    $listtruong[] = $truong;
                }   
            }
            else
            {
                $listtruong = NULL;
            }
            $dbconfig->close();
            return $listtruong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listtruong;
        }
    }
    
    public function get($id)
    {
        global $dbconfig;
        $truong = NULL;
        try
        {
            $sql = "select * from ".table_prefix("truong")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $truong = CreateObject("Model_Entity_Truong");
                $truong->id = $arr["id"];
                $truong->name = $arr["name"];
                $truong->order = $arr["order"];
                $truong->updated = $arr["updated"]; 
                $truong->status = $arr["status"];    
                
            }
            else
            {
                $truong = NULL;
            }
            $dbconfig->close();
            return $truong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $truong;
        }
    }
    
    public function create($truong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("truong")."(`name`,`order`,updated,status) values ('".$dbconfig->sqlQuote($truong->name)."','".$dbconfig->sqlQuote($truong->order)."','".$dbconfig->sqlQuote($truong->updated)."','".$dbconfig->sqlQuote($truong->status)."');";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_affected() != 0)
            {
                $status = true;
            }
            $dbconfig->close();
            return $status;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $status;
        }
    }
    
    public function delete($id)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "delete from ".table_prefix("truong")." where id = '".$dbconfig->sqlQuote($id)."';";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_affected() != 0)
            {
                $status = true;
            }
            $dbconfig->close();
            return $status;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $status;
        }
    }
    
    public function update($truong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("truong")." set `name`='".$dbconfig->sqlQuote($truong->name)."', `order`='".$dbconfig->sqlQuote($truong->order)."',status = '".$dbconfig->sqlQuote($truong->status)."', updated = '".$dbconfig->sqlQuote($truong->updated)."' where id ='".$dbconfig->sqlQuote($truong->id)."';";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_affected() != 0)
            {
                $status = true;
            }
            $dbconfig->close();
            return $status;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $status;
        }
    }
}
?>