<?php 
class Model_Entity_Role
{
    public $id;
    public $name;
    public $updated;
    public $status;
    
    
    public function init($id,$name,$status)
    {
        $this->id = $id;
        $this->name = $name;
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