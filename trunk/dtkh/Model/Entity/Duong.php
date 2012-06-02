<?php 
class Model_Entity_Duong
{
    public $id;
    public $name;
    public $order;
    public $updated;
    public $status;
    
    public function init($id,$name,$order,$status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->order = $order;
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