<?php 
class Model_Entity_Account
{
    public $id;
    public $firstname;
    public $lastname;
    public $birthday;
    public $address;
    public $phone;
    public $avartar;
    public $email;
    public $username;
    public $password;
    public $registerdate;
    public $updated;
    public $role;
    public $status;
    
    public function init($id,$firstname,$lastname,$birthday,$address,$phone,$avartar,$email,$username,$password,$role,$status)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->phone = $phone;
        $this->avartar = $avartar;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }
    
    public function validation()
    {
        return true;
    }
    
    public function __construct()
    {
        
    }
}

?>