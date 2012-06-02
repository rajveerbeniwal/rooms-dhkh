<?php 
class Model_DAO_Phuong
{
    public function lists($start = 0,$length = 0,$search="")
    {
        global $dbconfig;
        $listphuong = array();
        try
        {
            $where = "";
            if(strlen($search) != 0)
            {
                $where = " where name like '%{$search}%' ";
            }
            if($start == 0 && $length == 0)
            {
                $sql = "select * from ".table_prefix("phuong").$where;
            }
            else
            {
                $sql = "select * from ".table_prefix("phuong").$where." order by `order` ASC limit {$start},{$length}";
            }
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $phuong = CreateObject("Model_Entity_Phuong");
                    $phuong->id = $arr["id"];
                    $phuong->name = $arr["name"];
                    $phuong->order = $arr["order"];
                    $phuong->updated = $arr["updated"]; 
                    $phuong->status = $arr["status"];       
                    
                    $listphuong[] = $phuong;
                }   
            }
            else
            {
                $listphuong = NULL;
            }
            $dbconfig->close();
            return $listphuong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listphuong;
        }
    }
	
	public function listsXML()
    {
        global $dbconfig;
        $listphuong = array();
        try
        {
			$sql = "select * from ".table_prefix("phuong");
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $phuong = CreateObject("Model_Entity_Phuong");
                    $phuong->id = $arr["id"];
                    $phuong->name = $arr["name"];
                    $phuong->order = $arr["order"];
                    $phuong->updated = $arr["updated"]; 
                    $phuong->status = $arr["status"];       
                    
                    $listphuong[] = $phuong;
                }   
            }
            else
            {
                $listphuong = NULL;
            }
            $dbconfig->close();
            return $listphuong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listphuong;
        }
    }
    
    public function get($id)
    {
        global $dbconfig;
        $phuong = NULL;
        try
        {
            $sql = "select * from ".table_prefix("phuong")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $phuong = CreateObject("Model_Entity_Phuong");
                $phuong->id = $arr["id"];
                $phuong->name = $arr["name"];
                $phuong->order = $arr["order"];
                $phuong->updated = $arr["updated"]; 
                $phuong->status = $arr["status"];    
                
            }
            else
            {
                $phuong = NULL;
            }
            $dbconfig->close();
            return $phuong;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $phuong;
        }
    }
    
    public function create($phuong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("phuong")."(`name`,`order` ,updated,status) values ('".$dbconfig->sqlQuote($phuong->name)."','".$dbconfig->sqlQuote($phuong->order)."','".$dbconfig->sqlQuote($phuong->updated)."','".$dbconfig->sqlQuote($phuong->status)."');";
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
            $sql = "delete from ".table_prefix("phuong")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($phuong)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("phuong")." set `name`='".$dbconfig->sqlQuote($phuong->name)."', `order` = '".$dbconfig->sqlQuote($phuong->order)."', updated = '".$dbconfig->sqlQuote($phuong->updated)."', status = '".$dbconfig->sqlQuote($phuong->status)."' where id ='".$dbconfig->sqlQuote($phuong->id)."';";
            echo $sql;
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