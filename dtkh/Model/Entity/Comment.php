<?php 
class Model_Entity_Comment
{
    public $id;
    public $idroom;
    public $title;
    public $content;
    public $name;
    public $email;
    public $updated;
    public $status;
    
    public function init($id,$idroom,$title,$content,$name,$email,$status)
    {
        $this->id = $id;
        $this->idroom = $idroom;
        $this->title = $title;
        $this->content = $content;
        $this->name = $name;
        $this->email = $email;
        $status = $status;
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