<?php

Class adminController Extends baseController {

    public function index() 
    {
            $this->registry->template->showAdmin('admin_index');
    }
    
    public function login()
    {
        try
        {
            if(isset($_SESSION["user_login"]))
            {
                $user_login = $_SESSION["user_login"];
                if($user_login != NULL)
                    header("Location: index.php?rt=admin/index");
                else
                    $this->registry->template->showAdmin('admin_login');
            }
            else
                $this->registry->template->showAdmin('admin_login');   
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }
    }
    
    public function post_login()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
                
                $accountDAO = CreateObject("Model_DAO_Account");
                $account = $accountDAO->login($username,$password);
    
                if($account != NULL)
                {
                    if($account->role == 1)
                    {
                        $_SESSION["user_login"] = $account->username;
                        header("Location: index.php?rt=admin/index");  
                    }
                    else
                    {
                        header("Location: index.php?rt=index/index");       
                    }
                }    
                else
                {
                    header("Location: index.php?rt=index/index");
                }
            }
            else
            {
                header("Location: index.php?rt=admin/login");
            }
           
        }catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }
    }
    
    public function logout()
    {
        try
        {
            unset($_SESSION["user_login"]);
            session_unregister("user_login");
            header("Location: index.php?rt=index/index");   
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt=index/index"); 
        }   
    }
	
	
    
	public function export_account()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$accountDAO =CreateObject("Model_DAO_Account");
				$list_account = $accountDAO->listsXML();
				$arr_account = array();
				foreach($list_account as $account)
				{
					$arr_account[] = objectToArray($account);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_account,"account");
			}
			else
			{
				$accountDAO =CreateObject("Model_DAO_Account");
				$list_account = $accountDAO->listsXML();
				$arr_account = array();
				foreach($list_account as $account)
				{
					$arr_account[] = objectToArray($account);
				}
				$csv_data = array_to_scv($arr_account, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
	
    public function list_account()
    {
        try
        {
            $accountDAO = CreateObject("Model_DAO_Account");
              $page = 1;
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            $row_total = getRow("select * from ".table_prefix("account"));
                 
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            if($showResult == 0)
            {
                $page_size = 5;   
            }
            
            $pagegroup_size =5;
            $url="index.php?rt=admin/list_account";
            
            $accounts = $accountDAO->lists($page*$page_size-$page_size,$page_size);
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            $this->registry->template->accounts = $accounts;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->showAdmin('list_account');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }
    }
    
    public function create_account()
    {
        try
        {
            $this->registry->template->showAdmin('create_account');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt= admin/index");   
        }
    }
    
    public function  post_create_account()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $firstname = trim($_POST["firstname"]);
                $lastname =  trim($_POST["lastname"]);
                $birthday =  trim($_POST["birthday"]);
                $address =  trim($_POST["address"]);
                $phone =  trim($_POST["phone"]);
                $avartar =  trim($_POST["avartar"]);
                $email =  trim($_POST["email"]);
                $username =  trim($_POST["username"]);
                $password =  trim($_POST["password"]);
                $role =  trim($_POST["role"]);
                $status =  trim($_POST["status"]);
                
                $account = CreateObject("Model_Entity_Account");
                $account->init($firstname,$lastname,$birthday,$address,$phone,$avartar,$email,$username,$password,$role,$status);
                if($account->validation())
                {
                    $accountDAO = CreateObject("Model_DAO_Account");
                    if($accountDAO->create($account))
                    {
                         header("Location: index.php?rt=admin/list_account");
                    }
                    else
                    {
                        $_SESSION["create_account"] = $account;
                        $_SESSION["error_create_account"] = 1;
                         header("Location: index.php?rt=admin/create_account");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_account");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }
    }
    
    public function  post_edit_account()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $firstname = trim($_POST["firstname"]);
                $lastname = trim($_POST["lastname"]);
                $birthday = trim($_POST["birthday"]);
                $address = trim($_POST["address"]);
                $phone = trim($_POST["phone"]);
                $avartar = trim($_POST["avartar"]);
                $email = trim($_POST["email"]);
                $username = trim($_POST["username"]);
                $password = trim($_POST["password"]);
                $role = trim($_POST["role"]);
                $status = trim($_POST["status"]);
                
                $account = CreateObject("Model_Entity_Account");
                $account->init($id,$firstname,$lastname,$birthday,$address,$phone,$avartar,$email,$username,$password,$role,$status);
                if($account->validation())
                {
                    $accountDAO = CreateObject("Model_DAO_Account");
                    if($accountDAO->update($account))
                    {
                         header("Location: index.php?rt=admin/list_account");
                    }
                    else
                    {
                        $_SESSION["create_account"] = $account;
                        $_SESSION["error_create_account"] = 1;
                         header("Location: index.php?rt=admin/edit_account");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_account");
            }
        }   
        catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }     
    }
    
    public function edit_account()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = $_REQUEST["id"];
                $accountDAO = CreateObject("Model_DAO_Account");
                $account = $accountDAO->get($id);
                $this->registry->template->account = $account;
                $this->registry->template->showAdmin('edit_account');
            }
            else
            {
                header("Location: index.php?rt=admin/list_account");
            }   
        }
        catch(MyException $ex)
        {
            header("Location: index.php?rt=admin/index");
        }
    }
    
    public function details_account()
    {
        if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
        {
            $id = trim($_REQUEST["id"]);
            $accountDAO = CreateObject("Model_DAO_Account");
            $roleDAO = CreateObject("Model_DAO_Role");
            $account = $accountDAO->get($id);
            $this->registry->template->account = $account;
            $this->registry->template->roleDAO = $roleDAO;
            $this->registry->template->showAdmin('details_account');
        }
        else
        {
            header("Location: index.php?rt=admin/list_account");
        }
    }
    
    public function delete_account()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $accountDAO = CreateObject("Model_DAO_Account");
                $status = $accountDAO->delete($id);
                header("Location: index.php?rt=admin/list_account");
            }
            else
            {
                header("Location: index.php?rt=admin/list_account");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
	 public function export_role()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$roleDAO =CreateObject("Model_DAO_Role");
				$list_role = $roleDAO->listsXML();
				$arr_role = array();
				foreach($list_role as $role)
				{
					$arr_role[] = objectToArray($role);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_role,"role");
			}
			else
			{
				$roleDAO =CreateObject("Model_DAO_Role");
				$list_role = $roleDAO->listsXML();
				$arr_role = array();
				foreach($list_role as $role)
				{
					$arr_role[] = objectToArray($role);
				}
				$csv_data = array_to_scv($arr_role, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
	
    public function list_role()
    {
        try
        {
            $start = 0;
            $length = 10;
            $roleDAO = CreateObject("Model_DAO_Role");
            $roles = $roleDAO->lists($start,$length);
            $this->registry->template->roles = $roles;
            $this->registry->template->showAdmin('list_role');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function create_role()
    {
        try{
            $this->registry->template->showAdmin('create_role');    
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
        
    }
    
    public function post_create_role()
    {
        try
        {
                
            if(isset($_POST["submit"]))
            {
                $name = trim($_POST["name"]);
                $status = trim($_POST["status"]);
                $id = 0;
                $role = CreateObject("Model_Entity_Role");
                $role->init($id,$name,$status);
                $role->updated = date("now");
                if($role->validation())
                {
                    $roleDAO = CreateObject("Model_DAO_Role");
                    if($roleDAO->create($role))
                    {
                         header("Location: index.php?rt=admin/list_role");
                    }
                    else
                    {
                        $_SESSION["create_role"] = $role;
                        $_SESSION["error_create_role"] = 1;
                         header("Location: index.php?rt=admin/create_role");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_role");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_edit_role()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $name = trim($_POST["name"]);
                $status = trim($_POST["status"]);
                
                $role = CreateObject("Model_Entity_Role");
                $role->init($id,$name,$status);
                $role->updated = date("now");
                if($role->validation())
                {
                    $roleDAO = CreateObject("Model_DAO_Role");
     
                    if($roleDAO->update($role))
                    {
                         header("Location: index.php?rt=admin/list_role");
                    }
                    else
                    {
                        $_SESSION["edit_role"] = $role;
                        $_SESSION["error_edit_role"] = 1;
                         header("Location: index.php?rt=admin/edit_role");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_role");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_role()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roleDAO = CreateObject("Model_DAO_Role");
                $role = $roleDAO->get($id);
                $this->registry->template->role = $role;
                $this->registry->template->showAdmin('edit_role');
            }
            else
            {
                header("Location: index.php?rt=admin/list_role");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    
    public function details_role()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roleDAO = CreateObject("Model_DAO_Role");
                $role = $roleDAO->get($id);
    
                $this->registry->template->role = $role;
                $this->registry->template->showAdmin('details_role');
            }
            else
            {
                header("Location: index.php?rt=admin/list_role");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_role()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roleDAO = CreateObject("Model_DAO_Role");
                $status = $roleDAO->delete($id);
                header("Location: index.php?rt=admin/list_role");
            }
            else
            {
                header("Location: index.php?rt=admin/list_role");
            }    
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function export_duong()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$duongDAO =CreateObject("Model_DAO_Duong");
				$list_duong = $duongDAO->listsXML();
				$arr_duong = array();
				foreach($list_duong as $duong)
				{
					$arr_duong[] = objectToArray($duong);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_duong,"duong");
			}
			else
			{
				$duongDAO =CreateObject("Model_DAO_Duong");
				$list_duong = $duongDAO->listsXML();
				$arr_duong = array();
				foreach($list_duong as $duong)
				{
					$arr_duong[] = objectToArray($duong);
				}
				$csv_data = array_to_scv($arr_duong, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
	public function list_duong()
    {
        try
        {
            $duongDAO = CreateObject("Model_DAO_Duong");
            $page = 1;
            $search = "";
            if(isset($_REQUEST["search"]))
            {
                $search = $_REQUEST["search"];
            }
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            if(strlen($search) == 0)
                $row_total = getRow("select * from ".table_prefix("duong"));
            else
                $row_total = getRow("select * from ".table_prefix("duong")." where name like '%{$search}%';");
                
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            
            if($showResult == 0)
            {
                $page_size = 5;   
            }
            
            $pagegroup_size =5;
            if(strlen($search) == 0)
                $url="index.php?rt=admin/list_duong";
            else
                $url="index.php?rt=admin/list_duong&search=".$search;
            $duongs = $duongDAO->lists($page*$page_size-$page_size,$page_size,$search);
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            
            $this->registry->template->duongs = $duongs;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->showAdmin('list_duong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    
    public function create_duong()
    {
        try
        {
            $this->registry->template->showAdmin('create_duong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_create_duong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $name = trim($_POST["name"]);
                $status = trim($_POST["status"]);
                $order = 0;
                $id = 0;
                $duong = CreateObject("Model_Entity_Duong");
                $duong->init($id,$name,$order,$status);
                $duong->updated = date("now");
                if($duong->validation())
                {
                    $duongDAO = CreateObject("Model_DAO_Duong");
                    
                    if($duongDAO->create($duong))
                    {
                         header("Location: index.php?rt=admin/list_duong");
                    }
                    else
                    {
                        $_SESSION["create_duong"] = $duong;
                        $_SESSION["error_create_duong"] = 1;
                         header("Location: index.php?rt=admin/create_duong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_duong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_edit_duong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $name = trim($_POST["name"]);
                $order = trim($_POST["order"]);
                $status = trim($_POST["status"]);
                
                $duong = CreateObject("Model_Entity_Duong");
                $duong->init($id,$name,$order,$status);
                $duong->updated = date("now");
                if($duong->validation())
                {
                    $duongDAO = CreateObject("Model_DAO_Duong");
                    
                    if($duongDAO->update($duong))
                    {
                         header("Location: index.php?rt=admin/list_duong");
                    }
                    else
                    {
                        $_SESSION["create_duong"] = $duong;
                        $_SESSION["error_create_duong"] = 1;
                        header("Location: index.php?rt=admin/edit_duong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_duong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_duong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $duongDAO = CreateObject("Model_DAO_Duong");
                $duong = $duongDAO->get($id);
                $this->registry->template->duong = $duong;
                 $this->registry->template->showAdmin('edit_duong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_duong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function details_duong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $duongDAO = CreateObject("Model_DAO_Duong");
                $duong = $duongDAO->get($id);
                $this->registry->template->duong = $duong;
                $this->registry->template->showAdmin('details_duong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_duong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_duong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $duongDAO = CreateObject("Model_DAO_Duong");
                $status = $duongDAO->delete($id);
                header("Location: index.php?rt=admin/list_duong");
            }
            else
            {
                header("Location: index.php?rt=admin/list_duong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_truong()
    {
       try
       {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $duongDAO = CreateObject("Model_DAO_Truong");
                $status = $duongDAO->delete($id);
                header("Location: index.php?rt=admin/list_truong");
            }
            else
            {
                header("Location: index.php?rt=admin/list_truong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function export_phuong()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$phuongDAO =CreateObject("Model_DAO_Phuong");
				$list_phuong = $phuongDAO->listsXML();
				$arr_phuong = array();
				foreach($list_phuong as $phuong)
				{
					$arr_phuong[] = objectToArray($phuong);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_phuong,"phuong");
			}
			else
			{
				$phuongDAO =CreateObject("Model_DAO_Phuong");
				$list_phuong = $phuongDAO->listsXML();
				$arr_phuong = array();
				foreach($list_phuong as $phuong)
				{
					$arr_phuong[] = objectToArray($phuong);
				}
				$csv_data = array_to_scv($arr_phuong, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
	
	public function list_phuong()
    {
        try
        {
            $phuongDAO = CreateObject("Model_DAO_Phuong");
            $page = 1;
            $search = "";
            if(isset($_REQUEST["search"]))
            {
                $search = $_REQUEST["search"];
            }
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            if(strlen($search) == 0)
                $row_total = getRow("select * from ".table_prefix("phuong"));
            else
                $row_total = getRow("select * from ".table_prefix("phuong")." where name like '%{$search}%';");
                
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            if($showResult == 0)
            {
                $page_size = 5;   
            }
            
            $pagegroup_size =5;
             if(strlen($search) == 0)
                $url="index.php?rt=admin/list_phuong";
            else
                $url="index.php?rt=admin/list_phuong&search=".$search;
                
            if(isset($_REQUEST["showResult"]))
                $url .= "&showResult=".$showResult;
            
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            
            if($showResult == -1)
            {
                $phuongs = $phuongDAO->lists(0,0,$search);    
            }
            else
                $phuongs = $phuongDAO->lists($page*$page_size-$page_size,$page_size,$search);
            
            $this->registry->template->search = $search;
            $this->registry->template->phuongs = $phuongs;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->showAdmin('list_phuong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function create_phuong()
    {
        try
        {
            $this->registry->template->showAdmin('create_phuong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_create_phuong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $name = trim($_POST["name"]);
                $status = trim($_POST["status"]);
                $order = 0;
                $id = 0;            
                $phuong = CreateObject("Model_Entity_Phuong");
                $phuong->init($id,$name,$order,$status);
                $phuong->updated = date("now");
                if($phuong->validation())
                {
                    $phuongDAO = CreateObject("Model_DAO_Phuong");
                    if($phuongDAO->create($phuong))
                    {
                         header("Location: index.php?rt=admin/list_phuong");
                    }
                    else
                    {
                        $_SESSION["create_phuong"] = $phuong;
                        $_SESSION["error_create_phuong"] = 1;
                         header("Location: index.php?rt=admin/create_phuong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_phuong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
        
    }
    
    public function  post_edit_phuong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $name = trim($_POST["name"]);
                $order = trim($_POST["order"]);
                $status = trim($_POST["status"]);
                
                $phuong = CreateObject("Model_Entity_Phuong");
                $phuong->init($id,$name,$order,$status);
                $phuong->updated = date("now");
                
                if($phuong->validation())
                {
                    $phuongDAO = CreateObject("Model_DAO_Phuong");
                   
                    if($phuongDAO->update($phuong))
                    {
                         header("Location: index.php?rt=admin/list_phuong");
                    }
                    else
                    {
                        $_SESSION["edit_phuong"] = $phuong;
                        $_SESSION["error_edit_phuong"] = 1;
                         header("Location: index.php?rt=admin/edit_phuong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_phuong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_phuong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $phuong = $phuongDAO->get($id);
                $this->registry->template->phuong = $phuong;
                $this->registry->template->showAdmin('edit_phuong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_phuong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function details_phuong()
    {
        try{
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $phuong = $phuongDAO->get($id);
                $this->registry->template->phuong = $phuong;
                $this->registry->template->showAdmin('details_phuong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_phuong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_phuong()
    {
        try{
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $status = $phuongDAO->delete($id);
                header("Location: index.php?rt=admin/list_phuong");
            }
            else
            {
                header("Location: index.php?rt=admin/list_phuong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
     public function export_truong()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$truongDAO =CreateObject("Model_DAO_Truong");
				$list_truong = $truongDAO->listsXML();
				$arr_truong = array();
				foreach($list_truong as $truong)
				{
					$arr_truong[] = objectToArray($truong);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_truong,"truong");
			}
			else
			{
				$truongDAO =CreateObject("Model_DAO_Truong");
				$list_truong = $truongDAO->listsXML();
				$arr_truong = array();
				foreach($list_truong as $truong)
				{
					$arr_truong[] = objectToArray($truong);
				}
				$csv_data = array_to_scv($arr_truong, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);				
			}
		}
	}
	
	public function list_truong()
    {
        try
        {
            $truongDAO = CreateObject("Model_DAO_Truong");
            $page = 1;
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            $row_total = getRow("select * from ".table_prefix("truong"));
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            else
            {
                $page_size = 5;   
            }
            
            $pagegroup_size =5;
            if(isset($_REQUEST["showResult"]))
                $url="index.php?rt=admin/list_truong&showResult=".$showResult;
            else
                $url="index.php?rt=admin/list_truong";
            
            if($showResult == -1)
            {
                $truongs = $truongDAO->lists();    
            }
            else
                $truongs = $truongDAO->lists($page*$page_size-$page_size,$page_size);
            
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->truongs = $truongs;
            $this->registry->template->showAdmin('list_truong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function create_truong()
    {
        try
        {
            $this->registry->template->showAdmin('create_truong');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_create_truong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $name = trim($_POST["name"]);
                $status = trim($_POST["status"]);
                $order = 0;
                $id = 0;           
                
                $truong = CreateObject("Model_Entity_Truong");
                $truong->init($id,$name,$order,$status);
                $truong->updated = date("now");
                if($truong->validation())
                {
                    $truongDAO = CreateObject("Model_DAO_Truong");
                    if($truongDAO->create($truong))
                    {
                         header("Location: index.php?rt=admin/list_truong");                }
                    else
                    {
                        $_SESSION["create_truong"] = $truong;
                        $_SESSION["error_create_truong"] = 1;
                         header("Location: index.php?rt=admin/create_truong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_truong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
     public function  post_edit_truong()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $name = trim($_POST["name"]);
                $order = trim($_POST["order"]);
                $status = trim($_POST["status"]);
                
                $truong = CreateObject("Model_Entity_Truong");
                $truong->init($id,$name,$order,$status);
                $truong->updated = date("now");
                if($truong->validation())
                {
                    $truongDAO = CreateObject("Model_DAO_Truong");
                    
                    if($truongDAO->update($truong))
                    {
                         header("Location: index.php?rt=admin/list_truong");
                    }
                    else
                    {
                        $_SESSION["edit_truong"] = $truong;
                        $_SESSION["error_edit_truong"] = 1;
                         header("Location: index.php?rt=admin/edit_truong");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_truong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_truong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $truongDAO = CreateObject("Model_DAO_Truong");
                $truong = $truongDAO->get($id);
                $this->registry->template->truong = $truong;
                $this->registry->template->showAdmin('edit_truong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_truong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function details_truong()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $truongDAO = CreateObject("Model_DAO_Truong");
                $truong = $truongDAO->get($id);
                $this->registry->template->truong = $truong;
                $this->registry->template->showAdmin('details_truong');
            }
            else
            {
                header("Location: index.php?rt=admin/list_truong");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
	
	public function export_room()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$roomDAO =CreateObject("Model_DAO_Room");
				$list_room = $roomDAO->listsXML();
				$arr_room = array();
				foreach($list_room as $room)
				{
					$arr_room[] = objectToArray($room);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_room,"room");
			}
			else
			{
				$roomDAO =CreateObject("Model_DAO_Room");
				$list_room = $roomDAO->listsXML();
				$arr_room = array();
				foreach($list_room as $room)
				{
					$arr_room[] = objectToArray($room);
				}
				$csv_data = array_to_scv($arr_room, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
    
    public function list_room()
    {
        try
        {
            $roomDAO = CreateObject("Model_DAO_Room");
            $order = 1;
            $page = 1;
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            $row_total = getRow("select * from ".table_prefix("room"));
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            if($showResult == 0)
            {
                $page_size = 5;   
            }
            $pagegroup_size =5;
            $url="index.php?rt=admin/list_room";
            
            $rooms = $roomDAO->lists($order,$page*$page_size-$page_size,$page_size);
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            $this->registry->template->rooms = $rooms;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->showAdmin('list_room');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function create_room()
    {
        try
        {
            $duongDAO = CreateObject("Model_DAO_Duong");
            $phuongDAO = CreateObject("Model_DAO_Phuong");
            $duongs = $duongDAO->lists();
            $phuongs = $phuongDAO->lists();
            $this->registry->template->duongs = $duongs;
            $this->registry->template->phuongs = $phuongs;
            $this->registry->template->showAdmin('create_room');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_room()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                $duongDAO = CreateObject("Model_DAO_Duong");
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $duongs = $duongDAO->lists();
                $phuongs = $phuongDAO->lists();
                $this->registry->template->duongs = $duongs;
                $this->registry->template->phuongs = $phuongs;
                $room = $roomDAO->get($id);
                $this->registry->template->room = $room;
      
                $this->registry->template->showAdmin('edit_room');
            }
            else
            {
                header("Location: index.php?rt=admin/list_room");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function details_room()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                $room = $roomDAO->get($id);
                $duongDAO = CreateObject("Model_DAO_Duong");
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $this->registry->template->duongDAO = $duongDAO;
                $this->registry->template->phuongDAO = $phuongDAO;
                $this->registry->template->room = $room;
                $this->registry->template->showAdmin('details_room');
            }
            else
            {
                header("Location: index.php?rt=admin/list_room");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_room()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                $status = $roomDAO->delete($id);
                header("Location: index.php?rt=admin/list_room");
            }
            else
            {
                header("Location: index.php?rt=admin/list_room");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_create_room()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $room = CreateObject("Model_Entity_Room");
                $room->title = trim($_POST["title"]);
                $room->shortdescription = trim($_POST["shortdescription"]);
                $room->description = trim($_POST["description"]);
                $room->new = trim($_POST["new"]);
                $room->is_phong_khep_kin = trim($_POST["is_phong_khep_kin"]);
                $room->sonha = trim($_POST["sonha"]);
                $room->kiet = trim($_POST["kiet"]);
                $room->tongsophong = trim($_POST["tongsophong"]);
                $room->sophongcontrong = trim($_POST["sophongcontrong"]);
                $room->tenchunha = trim($_POST["tenchunha"]);
                $room->idduong = trim($_POST["idduong"]);
                $room->idphuong = trim($_POST["idphuong"]);
                $room->dt_nha = trim($_POST["dt_nha"]);
                $room->dt_didong = trim($_POST["dt_didong"]);
                $room->email = trim($_POST["email"]);
                $room->gioi_tinh_thue = trim($_POST["gioi_tinh_thue"]);
                $room->gia_phong_max = trim($_POST["gia_phong_max"]);
                $room->gia_phong_min = trim($_POST["gia_phong_min"]);
                $room->giadien = trim($_POST["giadien"]);
                $room->gia_nuoc = trim($_POST["gia_nuoc"]);
                $room->gan_cho = trim($_POST["gan_cho"]);
                $room->internet = trim($_POST["internet"]);
                $room->isGoogleMap = trim($_POST["isGoogleMap"]);
                $room->longitude = trim($_POST["longitude"]);
                $room->glatitude = trim($_POST["latitude"]);
                $room->contentGoogleMap = trim($_POST["contentGoogleMap"]);
                $room->titleGoogleMap = trim($_POST["titleGoogleMap"]);
                $room->stick = trim($_POST["stick"]);
                $room->status = trim($_POST["status"]);
                $room->view = 0;
                $room->create_by = 1;
                $room->create_date = date("now");
                $room->update_by = 1;
                $room->updated = date("now");
                $room->order = 0;
                $room->id = 0;
                $room->updated = date("now");
      
                $duongDAO = CreateObject("Model_DAO_Duong");
                $duong = $duongDAO->get($_POST["idduong"]);
                $phuongDAO = CreateObject("Model_DAO_Phuong");
                $phuong = $phuongDAO->get($_POST["idphuong"]);
                $address = $room->sonha." ".$room->kiet." ".$duong->name." ".$phuong->name;
                $room->address = $address;
                if($room->validation())
                {
                    $roomDAO = CreateObject("Model_DAO_Room");
                    if($roomDAO->create($room))
                    {
                         header("Location: index.php?rt=admin/list_room");
                    }
                    else
                    {
                        $_SESSION["create_room"] = $room;
                        $_SESSION["error_create_room"] = 1;
                         header("Location: index.php?rt=admin/create_room");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_room");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
	public function export_comment()
	{
		if(isset($_REQUEST["type"]))
		{
			$type = $_REQUEST["type"];
			if($type=="xml")
			{
				$commentDAO =CreateObject("Model_DAO_Comment");
				$list_comment = $commentDAO->listsXML();
				$arr_comment = array();
				foreach($list_comment as $comment)
				{
					$arr_comment[] = objectToArray($comment);
				}
				header('Content-Type: text/xml; charset=utf-8');				
				print array2xml($arr_comment,"comment");
			}
			else
			{
				$commentDAO =CreateObject("Model_DAO_Comment");
				$list_comment = $commentDAO->listsXML();
				$arr_comment = array();
				foreach($list_comment as $comment)
				{
					$arr_comment[] = objectToArray($comment);
				}
				$csv_data = array_to_scv($arr_comment, true);
				header('Content-Type: text/csv; charset=utf-8');
				header('Content-Disposition: attachment; filename="export.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');
				print_r($csv_data);	
			}
		}
	}
	
    public function list_comment()
    {
        try
        {
            $commentDAO = CreateObject("Model_DAO_Comment");
            $page = 1;
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            $row_total = getRow("select * from ".table_prefix("comment"));
            $showResult=0;
            if(isset($_REQUEST["showResult"]))
            {
                $showResult = $_REQUEST["showResult"];
                $page_size = $showResult;
            }
            if($showResult == 0)
            {
                $page_size = 5;   
            }
            $pagegroup_size =5;
            $url="index.php?rt=admin/list_comment";
       
            $comments = $commentDAO->lists($page*$page_size-$page_size,$page_size);
             $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            
            $this->registry->template->comments = $comments;
            $this->registry->template->showResult = $showResult;
            $this->registry->template->showAdmin('list_comment');
       }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function create_comment()
    {
        try
        {
            $this->registry->template->showAdmin('create_comment');
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_create_comment()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $idroom = trim($_POST["idroom"]);
                $title = trim($_POST["title"]);
                $content = trim($_POST["content"]);
                $name = trim($_POST["name"]);
                $created_by = trim($_POST["created_by"]);
                $status = trim($_POST["status"]);
                
                $comment = CreateObject("Model_Entity_Comment");
                $comment->init($idroom,$title,$content,$name,$created_by,$status);
                if($comment->validation())
                {
                    $commentDAO = CreateObject("Model_DAO_Comment");
                    if($commentDAO->create($comment))
                    {
                         header("Location: index.php?rt=admin/list_comment");
                    }
                    else
                    {
                        $_SESSION["create_comment"] = $comment;
                        $_SESSION["error_create_comment"] = 1;
                         header("Location: index.php?rt=admin/create_comment");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_comment");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function  post_edit_comment()
    {
        try
        {
            if(isset($_POST["submit"]))
            {
                $id = trim($_POST["id"]);
                $idroom = trim($_POST["idroom"]);
                $title = trim($_POST["title"]);
                $content = trim($_POST["content"]);
                $name = trim($_POST["name"]);
                $created_by = trim($_POST["created_by"]);
                $status = trim($_POST["status"]);
                
                $comment = CreateObject("Model_Entity_Comment");
                $comment->init($id,$idroom,$title,$content,$name,$created_by,$status);
                if($comment->validation())
                {
                    $commentDAO = CreateObject("Model_DAO_Comment");
                    if($commentDAO->update($comment))
                    {
                         header("Location: index.php?rt=admin/list_comment");
                    }
                    else
                    {
                        $_SESSION["create_comment"] = $comment;
                        $_SESSION["error_create_comment"] = 1;
                         header("Location: index.php?rt=admin/edit_comment");
                    }
                }
            }
            else
            {
                header("Location: index.php?rt=admin/list_comment");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function edit_comment()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $commentDAO = CreateObject("Model_DAO_Comment");
                $comment = $commentDAO->get($id);
                $this->registry->template->room = $comment;
                $this->registry->template->showAdmin('edit_comment');
            }
            else
            {
                header("Location: index.php?rt=admin/list_comment");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function details_comment()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $commentDAO = CreateObject("Model_DAO_Comment");
                $comment = $commentDAO->get($id);
                $this->registry->template->comment = $comment;
                $this->registry->template->showAdmin('details_comment');
            }
            else
            {
                header("Location: index.php?rt=admin/list_comment");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
    
    public function delete_comment()
    {
        try
        {
            if(isset($_REQUEST["id"]) && is_int(intval($_REQUEST["id"])) )
            {
                $id = trim($_REQUEST["id"]);
                $commentDAO = CreateObject("Model_DAO_Comment");
                $status = $commentDAO->delete($id);
                header("Location: index.php?rt=admin/list_comment");
            }
            else
            {
                header("Location: index.php?rt=admin/list_comment");
            }
        }
        catch(MyException $ex)
        {
            header("Location: index.php?admin/index");
        }
    }
}
?>
