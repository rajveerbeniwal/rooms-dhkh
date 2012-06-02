<?php
class indexController Extends baseController {

    public function index() 
    {
        try
        {
            $order = 1;
            if(isset($_REQUEST["order"]))
            {
                $order = intval($_REQUEST["order"]);
            }
            $roomDAO = CreateObject("Model_DAO_Room");
            $tempOrder = $this->getTempOrder($order);
            
            //dieu kien where
            $where = "";
            $where = $roomDAO->getWhere();
            //echo $where;
            if(strlen($where) != 0)
                $where = " where ".$where;
            
            
            $this->getObjectSearch();
            
            // end dieu kien where
            $sql = "select * from ".table_prefix("room")." ".$where." ".$tempOrder;
            //echo $sql;
            
            $page = 1;
            if(isset($_REQUEST["p"]))
            {
                $page = intval($_REQUEST["p"]);
            }
            $row_total = getRow($sql);
            $page_size = 6;
            $pagegroup_size =5;
            if(isset($_REQUEST["order"]))
            {
                $url="index.php?rt=inex/index&order={$order}";        
            }
            else
            {
                $url="index.php?rt=inex/index";
            }

            
            $rooms = $roomDAO->lists($order,$page*$page_size-$page_size,$page_size);
            $this->registry->template->page = $page;
            $this->registry->template->row_total = $row_total;
            $this->registry->template->page_size = $page_size;
            $this->registry->template->pagegroup_size = $pagegroup_size;
            $this->registry->template->url = $url;
            $this->registry->template->rooms = $rooms;
            $this->registry->template->roomDAO = $roomDAO;
            if(isset($_SESSION["listSoSanh"]))
            {
                $arrs = $_SESSION["listSoSanh"];
                $roomSoSanhs = array();
                foreach($arrs as $item)
                {   
                    $obj = $roomDAO->get($item);
                    $roomSoSanhs[] = $obj;
                }
                $this->registry->template->roomSoSanhs = $roomSoSanhs;
                $this->registry->template->order = $order;
            }
            $searchObj = $_SESSION["searchObj"];
            $this->registry->template->searchObj = $searchObj;
            $this->registry->template->show('index_index');   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
        }
    }
    public function restartWhere()
    {
        if(isset($_SESSION["searchObj"]))
            {   
                $searchObj = array(
                            'diadiem'=>"",
                            'gia_phong_min'=>"",
                            'gia_phong_max'=>"",
                            'gia_dien_min'=>"",
                            'gia_dien_max'=>"",
                            'gia_nuoc_min'=>"",
                            'gia_nuoc_max'=>"",
                            'phong_khep_kin'=>"2",
                            'gioi_tinh_thue'=>"2",
                            'anh_dai_dien'=>"2",
                            'internet'=>"2",
                            'gan_duong'=>"2",
                            'gan_cho'=>"2",
                            'dien_thoai'=>"2"
                        );
                $_SESSION["searchObj"] = $searchObj;
            }  
           header("Location: index.php?rt=index/index");   
    }
    
    private function getTempOrder($order)
    {
            $tempOrder = " order by create_date DESC ";
        
            if($order == 2)
            {
                $tempOrder = " order by `view` DESC ";    
            }
            else if($order == 3)
            {
                $tempOrder = " order by gia_phong_max DESC ";
            }
            else if($order == 4)
            {
                $tempOrder = " order by sophongcontrong DESC ";
            }
            else if($order == 5)
            {
                $tempOrder = " order by create_date ASC ";
            }
            else if($order == 6)
            {
                $tempOrder = " order by `view` ASC ";
            }
            else if($order == 7)
            {
                $tempOrder = " order by gia_phong_max ASC ";
            }
            else if($order == 8)
            {
                $tempOrder = " order by sophongcontrong ASC ";
            }
            return $tempOrder;
    }
    
    private function getObjectSearch()
    {
        if(isset($_POST["diadiem"]))
            {
                 $_SESSION["searchObj"]["diadiem"] = $_POST["diadiem"];
            }
            if(isset($_POST["gia_phong_max"]))
            {
                 $_SESSION["searchObj"]["gia_phong_max"] = $_POST["gia_phong_max"];
            }
            if(isset($_POST["gia_phong_min"]))
            {
                 $_SESSION["searchObj"]["gia_phong_min"] = $_POST["gia_phong_min"];
            }
            if(isset($_POST["gia_dien_min"]))
            {
                 $_SESSION["searchObj"]["gia_dien_min"] = $_POST["gia_dien_min"];
            }
            if(isset($_POST["gia_dien_max"]))
            {
                 $_SESSION["searchObj"]["gia_dien_max"] = $_POST["gia_dien_max"];
            }
            if(isset($_POST["gia_nuoc_min"]))
            {
                $_SESSION["searchObj"]["gia_nuoc_min"] = $_POST["gia_nuoc_min"];
            }
            if(isset($_POST["gia_nuoc_max"]))
            {
                $_SESSION["searchObj"]["gia_nuoc_max"] = $_POST["gia_nuoc_max"];
            }
            if(isset($_POST["phong_khep_kin"]))
            {
                 $_SESSION["searchObj"]["phong_khep_kin"] = $_POST["phong_khep_kin"];
            }
            if(isset($_POST["gioi_tinh_thue"]))
            {
                $_SESSION["searchObj"]["gioi_tinh_thue"] = $_POST["gioi_tinh_thue"];
            }
            if(isset($_POST["anh_dai_dien"]))
            {
                $_SESSION["searchObj"]["anh_dai_dien"] = $_POST["anh_dai_dien"];
            }
            if(isset($_POST["internet"]))
            {
                $_SESSION["searchObj"]["internet"] = $_POST["internet"];
            }
            if(isset($_POST["gan_duong"]))
            {
                 $_SESSION["searchObj"]["gan_duong"] = $_POST["gan_duong"];
            }
            if(isset($_POST["gan_cho"]))
            {
                $_SESSION["searchObj"]["gan_cho"] = $_POST["gan_cho"];
            }
            if(isset($_POST["dien_thoai"]))
            {
               $_SESSION["searchObj"]["dienthoai"] = $_POST["dien_thoai"];
            }
    }
     
    public function view(){
        try
        {
            if(isset($_REQUEST["id"])){
                $id = trim($_REQUEST["id"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                $roomDAO->setView($id);
                $room = $roomDAO->get($id);   
				$commentDAO = CreateObject("Model_DAO_Comment");
				$listComments = $commentDAO->listsCommentByRoom($id,0,10);
                $this->registry->template->room = $room;
				$this->registry->template->listComments = $listComments;
                if(isset($_SESSION["listSoSanh"]))
                {
                    $arrs = $_SESSION["listSoSanh"];
                    $roomSoSanhs = array();
                    foreach($arrs as $item)
                    {   
                        $obj = $roomDAO->get($item);
                        $roomSoSanhs[] = $obj;
                    }
                    $this->registry->template->roomSoSanhs = $roomSoSanhs;
                }
                $this->registry->template->order = 0;
                $this->registry->template->show('index_view');
            }
        }
        catch(MyException $ex)
        {
            $ex->__toString();
        }
    }
    
    public function baothongtinsai()
    {
        try
        {
            if(isset($_POST["idRoom"]))
            {
                $idRoom = trim($_POST["idRoom"]);
                $name = trim($_POST["name"]);
                $email = trim($_POST["email"]);
                $text = trim($_POST["text"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                if(isset($idRoom) && isset($name) && isset($email) && isset($text))
                {
                    $status = $roomDAO->baothongtinsai($idRoom,$name,$email,$text);
                    if($status)
                        echo "true";
                    else
                        echo "false";
                }
                else
                    echo "false";
            }
            else
                echo "false";
        }
        catch(MyException $ex)
        {
            echo "false";
        }
    }
    
    public function like(){
        try
        {
            if(isset($_REQUEST["id"])){
                $id = trim($_REQUEST["id"]);
                $roomDAO = CreateObject("Model_DAO_Room");
                $room = $roomDAO->get($id);   
                $this->registry->template->room = $room;
                $this->registry->template->show('index_view');   
            }
        }
        catch(MyException $ex)
        {
            $ex->__toString();
        }
    }
    
    public function addSoSanh()
    {
        try
        {
            if(isset($_POST["idRoom"]))
            {
                $idRoom = trim($_POST["idRoom"]);
                $listSoSanh = $_SESSION["listSoSanh"];
                if(count($listSoSanh)<3)
                {
                    $status = false;
                    foreach($listSoSanh as $item)
                    {
                        if($item == $idRoom)
                            $status = true;
                    }
                    if($status)
                        echo "-2";
                    else
                    {
                      
                        $roomDAO = CreateObject("Model_DAO_Room");
                        $obj = $roomDAO->get($idRoom);
                        if($obj != NULL)
                        {
                            echo "<li id='item-".$obj->id."'>{$obj->title}<a href='#' id='delete-".$obj->id."'><img src='skin/images/delete.png'></a><li>";
                            $listSoSanh[count($listSoSanh) + 1] = $idRoom;
                            $_SESSION["listSoSanh"] = $listSoSanh;
                        }
                        else
                        {
                            $_SESSION["listSoSanh"] = $listSoSanh;
                            echo "0";   
                        }
                    }    
                }
                else
                    echo "-1";
            }
        }
        catch(MyException $ex)
        {
            $ex->__toString();
        }
    }
    
    public function deleteSoSanh()
    {
        try
        {
            if(isset($_POST["idRoom"]))
            {
                $idRoom = trim($_POST["idRoom"]);
                $listSoSanh = $_SESSION["listSoSanh"];
                if(count($listSoSanh)>0)
                {
                    $temp = array();
                    foreach($listSoSanh as $item)
                    {
                        if($item != $idRoom)
                            $temp[] = $item;
                    }
                    $_SESSION["listSoSanh"] = $temp;  
                    echo "1";
                }
                else
                    echo "0";
            }
        }
        catch(MyException $ex)
        {
            
        }
    }
    
    public function compare()
    {
        try
        {
            if(isset($_SESSION["listSoSanh"]))
            {
                $listSoSanh = $_SESSION["listSoSanh"];
                if(count($listSoSanh)>0)
                {
                    $listObjs =  array();
                    $roomDAO = CreateObject("Model_DAO_Room");
                    
                    foreach($listSoSanh as $item)
                    {
                        $obj = $roomDAO->get($item);
                        $listObjs[] = $obj;
                    }
                    
                    $this->registry->template->listObjs = $listObjs;
                }   
                $this->registry->template->errorCode = "-2";
            }
            else
                $this->registry->template->errorCode = "-1";
            
            $this->registry->template->show("index_compare");
        }
        catch(MyException $ex)
        {
            $ex->__toString();
        }
    }
    public function danhgia()
    {
        try
        {
            if(isset($_POST["idRoom"]))
                $idRoom = trim($_POST["idRoom"]);
            else
                $idRoom = "";
            
            if(isset($_POST["name"]))
                $name = trim($_POST["name"]);
            else
                $name = "";
            
            if(isset($_POST["email"]))
                $email = $_POST["email"];
            else
                $email = "";
            
            if(isset($_POST["vote"]))            
                $vote = trim($_POST["vote"]);
            else
                $vote = "";
            
            if(strlen($idRoom) != 0 && strlen($name) != 0 && strlen($email) != 0 && strlen($vote) != 0)
            {
                $roomDAO = CreateObject("Model_DAO_Room");
                $status = $roomDAO->danhGia($idRoom,$name,$email,$vote);
                if($status == "true")
                    echo "true";
                else
                    echo "false";
            }
            else
                echo "false";
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            echo "false";
        }
    }
    
    public function comment()
    {
        try
        {
            if(isset($_REQUEST["idRoom"]))
            {
                $idRoom = trim($_POST["idRoom"]);
                $comment_email = trim($_POST["comment_email"]);
                $comment_name = trim($_POST["comment_name"]);
                $comment_text = trim($_POST["comment_text"]);
                $comment_title = trim($_POST["comment_title"]);
                $commentDAO = CreateObject("Model_DAO_Comment");
                $status = $commentDAO->commentRoom($idRoom,$comment_title,$comment_text,$comment_name,$comment_email);
                if($status)
                    echo "true";
                else
                    echo "false";
            }
            else
            {
                echo  "false";
            }
        }
        catch(MyException $ex)
        {
            echo "false";  
        }
    }
}
?>