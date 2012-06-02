<?php 
class Model_DAO_Account
{
    public function lists($start,$length)
    {
        global $dbconfig;
        $listaccount = array();
        try
        {
        
        $sql = "select * from ".table_prefix("account")." order by id ASC limit {$start},{$length}";
        
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $account = CreateObject("Model_Entity_Account");
                    $account->id = $arr["id"];
                    $account->firstname = $arr["firstname"];
                    $account->lastname = $arr["lastname"]; 
                    $account->birthday = $arr["birthday"];       
                    $account->address = $arr["address"];
                    $account->phone= $arr["phone"];
                    $account->avartar = $arr["avartar"];
                    $account->email = $arr["email"];
                    $account->username = $arr["username"];
                    $account->password = $arr["password"];
                    $account->registerdate = $arr["registerdate"];
                    $account->updated = $arr["updated"];
                    $account->role = $arr["role"];
                    $account->status = $arr["status"];
                    
                    $listaccount[] = $account;
                }   
            }
            else
            {
                $listaccount = NULL;
            }
            $dbconfig->close();
            return $listaccount;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listaccount;
        }
    }
	
	 public function listsXML()
    {
        global $dbconfig;
        $listaccount = array();
        try
        {
        
			$sql = "select * from ".table_prefix("account");
        
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $account = CreateObject("Model_Entity_Account");
                    $account->id = $arr["id"];
                    $account->firstname = $arr["firstname"];
                    $account->lastname = $arr["lastname"]; 
                    $account->birthday = $arr["birthday"];       
                    $account->address = $arr["address"];
                    $account->phone= $arr["phone"];
                    $account->avartar = $arr["avartar"];
                    $account->email = $arr["email"];
                    $account->username = $arr["username"];
                    $account->password = $arr["password"];
                    $account->registerdate = $arr["registerdate"];
                    $account->updated = $arr["updated"];
                    $account->role = $arr["role"];
                    $account->status = $arr["status"];
                    
                    $listaccount[] = $account;
                }   
            }
            else
            {
                $listaccount = NULL;
            }
            $dbconfig->close();
            return $listaccount;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listaccount;
        }
    }
    
    public function get($id)
    {
        global $dbconfig;
        $account = NULL;
        try
        {
        
        $sql = "select * from ".table_prefix("account")." where id = '".$dbconfig->sqlQuote($id)."';";
        
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                $arr  = $arrs[0];
                    $account = CreateObject("Model_Entity_Account");
                    $account->id = $arr["id"];
                    $account->firstname = $arr["firstname"];
                    $account->lastname = $arr["lastname"]; 
                    $account->birthday = $arr["birthday"];       
                    $account->address = $arr["address"];
                    $account->phone= $arr["phone"];
                    $account->avartar = $arr["avartar"];
                    $account->email = $arr["email"];
                    $account->username = $arr["username"];
                    $account->password = $arr["password"];
                    $account->registerdate = $arr["registerdate"];
                    $account->updated = $arr["updated"];
                    $account->role = $arr["role"];
                    $account->status = $arr["status"];
            }
            else
            {
                $account = NULL;
            }
            $dbconfig->close();
            return $account;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $account;
        }
    }
    
    
    public function createAcccount($username,$password,$email)
    {
        global $dbconfig;
        $account = NULL;
        $status = false;
        try
        {   
            $dbconfig->open();
            $sql = "select * from ".table_prefix("account")." where username = '".$dbconfig->sqlQuote($username)."' or email='".$dbconfig->sqlQuote($email)."'";
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $dbconfig->close();
                return false;    
            }
            
            $sql = "insert into ".table_prefix("account")."(username,password,email) values('".$dbconfig->sqlQuote($username)."','".$dbconfig->sqlQuote($password)."','".$dbconfig->sqlQuote($email)."');";
            
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
    
    public function login($username,$password)
    {
        global $dbconfig;
        $account = NULL;
        try
        {
            $sql = "select * from ".table_prefix("account")." where username='".$dbconfig->sqlQuote($username)."' and password = '".$dbconfig->sqlQuote($password)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $account = CreateObject("Model_Entity_Account");
                $account->id = $arr["id"];
                $account->firstname = $arr["firstname"];
                $account->lastname = $arr["lastname"]; 
                $account->birthday = $arr["birthday"];       
                $account->address = $arr["address"];
                $account->phone= $arr["phone"];
                $account->avartar = $arr["avartar"];
                $account->email = $arr["email"];
                $account->username = $arr["username"];
                $account->password = $arr["password"];
                $account->registerdate = $arr["registerdate"];
                $account->updated = $arr["updated"];
                $account->role = $arr["role"];
                $account->status = $arr["status"];
                
            }
            else
            {
                $account = NULL;
            }
            $dbconfig->close();
            return $account;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $account;
        }
    }
    
    public function create($account)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("account")."(firstname,lastname,birthday,address,phone,avartar,email,username,password,registerdate,updated,role,status) values ('".$dbconfig->sqlQuote($acount->firstname)."','".$dbconfig->sqlQuote($account->lastname)."','".$dbconfig->sqlQuote($account->birthday)."','".$dbconfig->sqlQuote($account->address)."','".$dbconfig->sqlQuote($account->phone)."','".$dbconfig->sqlQuote($account->avartar)."','".$dbconfig->sqlQuote($account->email)."','".$dbconfig->sqlQuote($account->username)."','".$dbconfig->sqlQuote($account->password)."','".$dbconfig->sqlQuote($account->registerdate)."','".$dbconfig->sqlQuote($account->updated)."','".$dbconfig->sqlQuote($account->role)."','".$dbconfig->sqlQuote($account->status)."';";
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
            $sql = "delete from ".table_prefix("account")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($account)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("account")." set firstname='".$dbconfig->sqlQuote($acount->firstname)."', lastname = '".$dbconfig->sqlQuote($account->lastname)."', birthday = '".$dbconfig->sqlQuote($account->birthday)."', address = '".$dbconfig->sqlQuote($account->address)."', phone = '".$dbconfig->sqlQuote($account->phone)."',avartar = '".$dbconfig->sqlQuote($account->avartar)."',email = '".$dbconfig->sqlQuote($account->email)."',username = '".$dbconfig->sqlQuote($account->username)."',password = '".$dbconfig->sqlQuote($account->password)."',registerdate = '".$dbconfig->sqlQuote($account->registerdate)."',updated = '".$dbconfig->sqlQuote($account->updated)."',role = '".$dbconfig->sqlQuote($account->role)."',status ='".$dbconfig->sqlQuote($account->status)."' where id ='".$dbconfig->sqlQuote($account->id)."';";
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
    
    public function changepassword($account)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("account");
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