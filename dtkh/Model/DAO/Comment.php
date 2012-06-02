<?php 
class Model_DAO_Comment
{
    public function commentRoom($idRoom,$comment_title,$comment_email,$comment_name,$comment_text)
    {
        global $dbconfig,$config;
        $status = false;
        try
        {
            $comment = CreateObject("Model_Entity_Comment");
            $comment->init(0,$idRoom,$comment_title,$comment_text,$comment_name,$comment_email,$config->statusComment);
            $comment->updated = date("now");
            $status = $this->create($comment);
           
            return $status;
        }   
        catch(MyException $ex)
        {
            $ex->__toString();
            return $status;
        } 
    }
    
	public function listsCommentByRoom($idRoom,$start,$length)
    {
        global $dbconfig;
        $listcomment = array();
        try
        {
            $sql = "select * from ".table_prefix("comment")." where idroom = '".$dbconfig->sqlQuote($idRoom)."' order by id ASC limit {$start},{$length}";
           
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $comment = CreateObject("Model_Entity_Comment");
                    $comment->id = $arr["id"];
                    $comment->idroom = $arr["idroom"];
                    $comment->title = $arr["title"];
                    $comment->content = $arr["content"];
                    $comment->name = $arr["name"];
                    $comment->email = $arr["email"];
                    $comment->updated = $arr["updated"]; 
                    $comment->status = $arr["status"];       
                    
                    $listcomment[] = $comment;
                }   
            }
            else
            {
                $listcomment = NULL;
            }
            $dbconfig->close();
            return $listcomment;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listcomment;
        }
    }
	
    public function lists($start,$length)
    {
        global $dbconfig;
        $listcomment = array();
        try
        {
            $sql = "select * from ".table_prefix("comment")." order by id ASC limit {$start},{$length}";
           
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $comment = CreateObject("Model_Entity_Comment");
                    $comment->id = $arr["id"];
                    $comment->idroom = $arr["idroom"];
                    $comment->title = $arr["title"];
                    $comment->content = $arr["content"];
                    $comment->name = $arr["name"];
                    $comment->email = $arr["email"];
                    $comment->updated = $arr["updated"]; 
                    $comment->status = $arr["status"];       
                    
                    $listcomment[] = $comment;
                }   
            }
            else
            {
                $listcomment = NULL;
            }
            $dbconfig->close();
            return $listcomment;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listcomment;
        }
    }
	
	public function listsXML()
    {
        global $dbconfig;
        $listcomment = array();
        try
        {
            $sql = "select * from ".table_prefix("comment");
           
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $comment = CreateObject("Model_Entity_Comment");
                    $comment->id = $arr["id"];
                    $comment->idroom = $arr["idroom"];
                    $comment->title = $arr["title"];
                    $comment->content = $arr["content"];
                    $comment->name = $arr["name"];
                    $comment->email = $arr["email"];
                    $comment->updated = $arr["updated"]; 
                    $comment->status = $arr["status"];       
                    
                    $listcomment[] = $comment;
                }   
            }
            else
            {
                $listcomment = NULL;
            }
            $dbconfig->close();
            return $listcomment;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listcomment;
        }
    }
    
    public function get($id)
    {
        global $dbconfig;
        $comment = NULL;
        try
        {
            $sql = "select * from ".table_prefix("comment")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $comment = CreateObject("Model_Entity_Comment");
                 $comment->id = $arr["id"];
                 $comment->idroom = $arr["idroom"];
                    $comment->title = $arr["title"];
                    $comment->content = $arr["content"];
                    $comment->name = $arr["name"];
                    $comment->email = $arr["email"];
                    $comment->updated = $arr["updated"]; 
                    $comment->status = $arr["status"]; 
                
            }
            else
            {
                $comment = NULL;
            }
            $dbconfig->close();
            return $comment;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $comment;
        }
    }
    
    public function create($comment)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("comment")."(idroom,title,content,name,email,updated,status) values ('".$dbconfig->sqlQuote($comment->idroom)."','".$dbconfig->sqlQuote($comment->title)."','".$dbconfig->sqlQuote($comment->content)."','".$dbconfig->sqlQuote($comment->name)."','".$dbconfig->sqlQuote($comment->email)."','".$dbconfig->sqlQuote($comment->updated)."','".$dbconfig->sqlQuote($comment->status)."');";
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
            $sql = "delete from ".table_prefix("comment")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($comment)
    {
        
        global $dbconfig;
        $status = false;
        $comment->updated = date("now");
        var_dump($comment);
        try
        {
            $sql = "update ".table_prefix("comment")." set title='".$dbconfig->sqlQuote($comment->title)."', idroom='".$dbconfig->sqlQuote($comment->idroom)."',content = '".$dbconfig->sqlQuote($comment->content)."', name = '".$dbconfig->sqlQuote($comment->name)."', email = '".$dbconfig->sqlQuote($comment->email)."', updated = '".$dbconfig->sqlQuote($comment->updated)."' where id ='".$dbconfig->sqlQuote($comment->id)."';";
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