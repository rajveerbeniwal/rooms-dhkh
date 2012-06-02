<?php 
class Model_DAO_Role
{
    public function lists($start = 0,$length = 0)
    {
        global $dbconfig;
        $listrole = array();
        try
        {
			if($start == 0 && $length == 0
					$sql = "select * from ".table_prefix("role")." order by `name`";
			else
				$sql = "select * from ".table_prefix("role")." order by `name` ASC limit {$start},{$length}";
			
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $role = CreateObject("Model_Entity_Role");
                    $role->id = $arr["id"];
                    $role->name = $arr["name"];
                    $role->updated = $arr["updated"]; 
                    $role->status = $arr["status"];       
                    
                    $listrole[] = $role;
                }   
            }
            else
            {
                $listrole = NULL;
            }
            $dbconfig->close();
            return $listrole;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listrole;
        }
    }
	
	public function listsXML()
    {
        global $dbconfig;
        $listrole = array();
        try
        {			
			$sql = "select * from ".table_prefix("role");
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $role = CreateObject("Model_Entity_Role");
                    $role->id = $arr["id"];
                    $role->name = $arr["name"];
                    $role->updated = $arr["updated"]; 
                    $role->status = $arr["status"];       
                    
                    $listrole[] = $role;
                }   
            }
            else
            {
                $listrole = NULL;
            }
            $dbconfig->close();
            return $listrole;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listrole;
        }
    }
    
    public function get($id)
    {
        global $dbconfig;
        $role = NULL;
        try
        {
            $sql = "select * from ".table_prefix("role")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $role = CreateObject("Model_Entity_Role");
                $role->id = $arr["id"];
                $role->name = $arr["name"];
                $role->updated = $arr["updated"]; 
                $role->status = $arr["status"];    
                
            }
            else
            {
                $role = NULL;
            }
            $dbconfig->close();
            return $role;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $role;
        }
    }
    
    public function create($role)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("role")."(`name`,`updated`,status) values ('".$dbconfig->sqlQuote($role->name)."','".$dbconfig->sqlQuote($role->updated)."','".$dbconfig->sqlQuote($role->status)."');";
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
            $sql = "delete from ".table_prefix("role")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($role)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("role")." set name='".$dbconfig->sqlQuote($role->name)."',status = '".$dbconfig->sqlQuote($role->status)."', updated = '".$dbconfig->sqlQuote($role->updated)."' where id ='".$dbconfig->sqlQuote($role->id)."';";
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