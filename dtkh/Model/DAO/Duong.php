<?php 
class Model_DAO_Duong
{
    public function lists($start = 0,$length = 0,$search = "")
    {
        global $dbconfig;
        $listduong = array();
        try
        {
            $where = "";
            if(strlen($search) != 0)
            {
                $where = " where name like '%{$search}%' ";
            }
            if($start == 0 && $length == 0)
                $sql = "select * from ".table_prefix("duong").$where;
            else
                $sql = "select * from ".table_prefix("duong").$where." order by `order` ASC limit {$start},{$length}";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $duong = CreateObject("Model_Entity_Duong");
                    $duong->id = $arr["id"];
                    $duong->name = $arr["name"];
                    $duong->order = $arr["order"];
                    $duong->updated = $arr["updated"]; 
                    $duong->status = $arr["status"];       
                    
                    $listduong[] = $duong;
                }   
            }
            else
            {
                $listduong = NULL;
            }
            $dbconfig->close();
            return $listduong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listduong;
        }
    }
    
	public function listsXML()
    {
        global $dbconfig;
        $listduong = array();
        try
        {           
			$sql = "select * from ".table_prefix("duong");
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $duong = CreateObject("Model_Entity_Duong");
                    $duong->id = $arr["id"];
                    $duong->name = $arr["name"];
                    $duong->order = $arr["order"];
                    $duong->updated = $arr["updated"]; 
                    $duong->status = $arr["status"];       
                    
                    $listduong[] = $duong;
                }   
            }
            else
            {
                $listduong = NULL;
            }
            $dbconfig->close();
            return $listduong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listduong;
        }
    }
	
    public function get($id)
    {
        global $dbconfig;
        $duong = NULL;
        try
        {
            $sql = "select * from ".table_prefix("duong")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $duong = CreateObject("Model_Entity_Account");
                $duong->id = $arr["id"];
                $duong->name = $arr["name"];
                $duong->order = $arr["order"];
                $duong->updated = $arr["updated"]; 
                $duong->status = $arr["status"];    
                
            }
            else
            {
                $duong = NULL;
            }
            $dbconfig->close();
            return $duong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $duong;
        }
    }
    
    public function create($duong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("duong")."(`name`,`order`,updated,status) values ('".$dbconfig->sqlQuote($duong->name)."','".$dbconfig->sqlQuote($duong->order)."','".$dbconfig->sqlQuote($duong->updated)."','".$dbconfig->sqlQuote($duong->status)."');";
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
            $sql = "delete from ".table_prefix("duong")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($duong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("duong")." set `name`='".$dbconfig->sqlQuote($duong->name)."',`order`='".$dbconfig->sqlQuote($duong->order)."',updated = '".$dbconfig->sqlQuote($duong->updated)."',status = '".$dbconfig->sqlQuote($duong->status)."' where id ='".$dbconfig->sqlQuote($duong->id)."';";
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