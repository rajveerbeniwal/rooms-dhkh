<?php 
class Model_DAO_Room
{
    public function danhGia($idRoom,$name,$email,$vote)
    {
        global $dbconfig;
        try
        {
            $sql = "INSERT INTO ".table_prefix("like_room")."(`name`, `mark`, `id_room`, `email`) VALUES ('".$dbconfig->sqlQuote($name)."','".$dbconfig->sqlQuote($vote)."','".$dbconfig->sqlQuote($idRoom)."','".$dbconfig->sqlQuote($email)."');";
            $dbconfig->open();
            $dbconfig->query($sql);
            $count = $dbconfig->num_affected();
            $dbconfig->close();
            if($count)
                return "true";
            else
                return "false";
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return "false";
        }
    }
    
    
    public function getListThongTinSai($idRoom = 0 ,$ip = "")
    {
        global $dbconfig;
        try
        {
            $sql = "select * from ".table_prefix("baothongtinsai");
            $where = "";
            if($idRoom != 0)
            {
                $where .= " idRoom = '".$idRoom."' ";
            }
            if($ip != "")
            {
                if(strlen($where) != 0)
                {
                    $where .= " and ";
                }
                $where .= " ip = '".$ip."' ";
            }
            $sql .= $where;
            $dbconfig->open();
            $dbconfig->query($sql);
            $arrs = $dbconfig->fetch_array();
            $dbconfig->close();
            return $arrs;
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return NULL;
        }  
    }
    
    public function setView($id)
    {
        try
        {
            global $dbconfig;
        
            if(isset($_SESSION["views"]))
            {
                $views = $_SESSION["views"];
                if(in_array($id,$views))
                {
                    return;
                }
                $sql = "update ".table_prefix("room")." set `view` = `view`+1 where id='".$dbconfig->sqlQuote($id)."';";
                $dbconfig->open();
                $dbconfig->query($sql);
                $count = $dbconfig->num_affected();
                $dbconfig->close();
                if($count)
                {
                    $views[] = $id;
                    $_SESSION["views"] = $views;
                }
            }       
        }
        catch(MyExecption $ex)
        {
            $ex->__toString();
        }
    }
    
    public function statusthongtinsai($id,$status)
    {
        global $dbconfig;
        try
        {
            $sql = "update ".table_prefix("baothongtinsai")." set status = '".$status."' where id = '".$id."';";
            $dbconfig->open();
            $dbconfig->query($sql);
            $count = $dbconfig->num_affected();
            $dbconfig->close();
            if($count)
                return true;
            else
                return false;
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return false;
        } 
    }
    
    public function baothongtinsai($idRoom,$name,$email,$text)
    {
        global $dbconfig;
        try
        {
            $temp = false;
            $updated = date('now');
            $status = 1;
            $sql = "INSERT INTO .".table_prefix("baothongtinsai")."(`idroom`, `name`,`email`,`text`,  `status`, `updated`) VALUES ('".$idRoom."','".$name."','".$email."','".$text."','".$status."','".$updated."')";
            //echo $sql;
            
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_affected())
                $temp = true;
            $dbconfig->close();
            return $temp;
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return false;
        }
    }
     public function getWhere()
    {
        $where = "";
        if(isset($_SESSION["searchObj"]))
        {
            $searchObj = $_SESSION["searchObj"];
            //echo "<pre>";
            //var_dump($searchObj);
           // echo "</pre>";
            if(isset($searchObj["dia_diem"]) && strlen($searchObj["dia_diem"]) != 0)
            {
                
                    
            }
            
            if(isset($searchObj["gia_phong_min"]) && strlen($searchObj["gia_phong_min"]) != 0)
            {
                if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " gia_phong_min >= '".$searchObj["gia_phong_min"]."' ";
            }
            if(isset($searchObj["gia_phong_max"]) && strlen($searchObj["gia_phong_max"]))
            {
               if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " gia_phong_max <= '".$searchObj["gia_phong_max"]."' ";
            }
            if(isset($searchObj["gia_dien_min"]) && strlen($searchObj["gia_dien_min"]) != 0)
            {
                if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " giadien >= '".$searchObj["gia_dien_min"]."' ";
            }
            
            if(isset($searchObj["gia_dien_max"]) && strlen($searchObj["gia_dien_max"]) != 0)
            {
                if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " giadien <= '".$searchObj["gia_dien_max"]."' ";
            }
            
            if(isset($searchObj["gia_nuoc_min"]) && strlen($searchObj["gia_nuoc_min"]) != 0)
            {
                if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " gia_nuoc >= '".$searchObj["gia_nuoc_min"]."' ";
            }
            
            if(isset($searchObj["gia_nuoc_max"]) && strlen($searchObj["gia_nuoc_max"]) != 0)
            {
                if(strlen($where) != 0)
                    $where .= " AND ";
                $where .= " gia_nuoc <= '".$searchObj["gia_nuoc_max"]."' ";    
            }
            
            if(isset($searchObj["phong_khep_kin"]) && strlen($searchObj["phong_khep_kin"]) != 0)
            {
                if($searchObj["phong_khep_kin"] == 0 || $searchObj["phong_khep_kin"] == 1)
                {
                    if(strlen($where) != 0)
                    $where .= " AND ";
                    $where .= " is_phong_khep_kin = '".$searchObj["phong_khep_kin"]."' ";
                }
            }
            
            if(isset($searchObj["gioi_tinh_thue"]) && strlen($searchObj["gioi_tinh_thue"]) != 0)
            {
                if($searchObj["gioi_tinh_thue"] == 0 || $searchObj["gioi_tinh_thue"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    $where .= " gioi_tinh_thue = '".$searchObj["gioi_tinh_thue"]."' ";
                }
            }
            if(isset($searchObj["anh_dai_dien"]) && strlen($searchObj["anh_dai_dien"]) != 0)
            {
                if($searchObj["anh_dai_dien"] == 0 || $searchObj["anh_dai_dien"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    $where .= " anh_dai_dien = '".$searchObj["anh_dai_dien"]."' ";
                }
            }
            
            if(isset($searchObj["internet"]) && strlen($searchObj["internet"]) != 0)
            {
                if($searchObj["internet"] == 0 || $searchObj["internet"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    $where .= " internet = '".$searchObj["internet"]."' ";
                }
            }
            if(isset($searchObj["gan_duong"]) && strlen($searchObj["gan_duong"]) != 0)
            {
                if($searchObj["gan_duong"] == 0 || $searchObj["gan_duong"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    $where .= " gan_duong = '".$searchObj["gan_duong"]."' ";
                }
            }
            
            if(isset($searchObj["gan_cho"]) && strlen($searchObj["gan_cho"]) != 0)
            {
                if($searchObj["gan_cho"] == 0 || $searchObj["gan_cho"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    $where .= " gan_cho = '".$searchObj["gan_cho"]."' ";
                }
            }
            if(isset($searchObj["dien_thoai"]) && strlen($searchObj["dien_thoai"]) != 0)
            {
                if($searchObj["dien_thoai"] == 0 || $searchObj["dien_thoai"] == 1)
                {
                    if(strlen($where) != 0)
                        $where .= " AND ";
                    if($searchObj["dien_thoai"] == 0)
                        $where .= " dt_nha IS NULL AND dt_didong IS NULL ";
                    if($searchObj["dien_thoai"] == 1)
                        $where .= " dt_nha IS NOT NULL OR dt_didong IS NOT NULL ";
                }
            }
            
            return $where;
        }
    }
    
    public function lists($order,$start,$length)
    {
        global $dbconfig;
        $listroom = array();
        try
        {
            $tempOrder = " order by create_date DESC ";
            if($order == 2)
            {
                $tempOrder = " order by view DESC ";    
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
            
            $where = $this->getWhere();
            if(strlen($where) != 0)
                $where = " where ".$where;
            
            $sql = "select * from ".table_prefix("room")." ".$where." ".$tempOrder." limit {$start},{$length}";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $room = CreateObject("Model_Entity_Room");
                    $room->id = $arr["id"];
                    $room->title = $arr["title"];
                    $room->shortdescription = $arr["shortdescription"];
                    $room->description = $arr["description"]; 
                    $room->anh_dai_dien = $arr["anh_dai_dien"];
                    $room->new = $arr["new"];
                    $room->is_phong_khep_kin = $arr["is_phong_khep_kin"];
                    $room->sonha = $arr["sonha"];
                    $room->kiet = $arr["kiet"];
                    $room->tongsophong = $arr["tongsophong"];
                    $room->sophongcontrong = $arr["sophongcontrong"];
                    $room->tenchunha = $arr["tenchunha"];
                    $room->address= $arr["address"];
                    $room->idduong = $arr["idduong"];
                    $room->idphuong= $arr["idphuong"];
                    $room->dt_nha = $arr["dt_nha"];
                    $room->dt_didong = $arr["dt_didong"];
                    $room->email = $arr["email"];
                    $room->gioi_tinh_thue = $arr["gioi_tinh_thue"];
                    $room->gia_phong_max = $arr["gia_phong_max"];
                    $room->gia_phong_min = $arr["gia_phong_min"];
                    $room->giadien = $arr["giadien"];
                    $room->gia_nuoc = $arr["gia_nuoc"];
                    $room->gan_cho = $arr["gan_cho"];
                    $room->gan_duong = $arr["gan_duong"];
                    $room->internet = $arr["internet"];
                    $room->isGoogleMap = $arr["isGoogleMap"];
                    $room->longitude = $arr["longitude"];
                    $room->latitude = $arr["latitude"];
                    $room->contentGoogleMap = $arr["contentGoogleMap"];
                    $room->titleGoogleMap = $arr["titleGoogleMap"];
                    $room->stick = $arr["stick"];
                    $room->order = $arr["order"];
                    $room->create_by = $arr["create_by"];
                    $room->create_date = $arr["create_date"];
                    $room->updated_by = $arr["updated_by"];
                    $room->updated = $arr["updated"];
                    $room->view = $arr["view"];
                    $room->status = $arr["status"];
                           
                    $listroom[] = $room;
                }   
            }
            else
            {
                $listroom = NULL;
            }
            $dbconfig->close();
            return $listroom;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listroom;
        }
    }
    
	
	public function listsXML()
    {
        global $dbconfig;
        $listroom = array();
		try{			
            $sql = "select * from ".table_prefix("room");
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arrs = $dbconfig->fetch_array();
                foreach($arrs as $arr)
                {
                    $room = CreateObject("Model_Entity_Room");
                    $room->id = $arr["id"];
                    $room->title = $arr["title"];
                    $room->shortdescription = $arr["shortdescription"];
                    $room->description = $arr["description"]; 
                    $room->anh_dai_dien = $arr["anh_dai_dien"];
                    $room->new = $arr["new"];
                    $room->is_phong_khep_kin = $arr["is_phong_khep_kin"];
                    $room->sonha = $arr["sonha"];
                    $room->kiet = $arr["kiet"];
                    $room->tongsophong = $arr["tongsophong"];
                    $room->sophongcontrong = $arr["sophongcontrong"];
                    $room->tenchunha = $arr["tenchunha"];
                    $room->address= $arr["address"];
                    $room->idduong = $arr["idduong"];
                    $room->idphuong= $arr["idphuong"];
                    $room->dt_nha = $arr["dt_nha"];
                    $room->dt_didong = $arr["dt_didong"];
                    $room->email = $arr["email"];
                    $room->gioi_tinh_thue = $arr["gioi_tinh_thue"];
                    $room->gia_phong_max = $arr["gia_phong_max"];
                    $room->gia_phong_min = $arr["gia_phong_min"];
                    $room->giadien = $arr["giadien"];
                    $room->gia_nuoc = $arr["gia_nuoc"];
                    $room->gan_cho = $arr["gan_cho"];
                    $room->gan_duong = $arr["gan_duong"];
                    $room->internet = $arr["internet"];
                    $room->isGoogleMap = $arr["isGoogleMap"];
                    $room->longitude = $arr["longitude"];
                    $room->latitude = $arr["latitude"];
                    $room->contentGoogleMap = $arr["contentGoogleMap"];
                    $room->titleGoogleMap = $arr["titleGoogleMap"];
                    $room->stick = $arr["stick"];
                    $room->order = $arr["order"];
                    $room->create_by = $arr["create_by"];
                    $room->create_date = $arr["create_date"];
                    $room->updated_by = $arr["updated_by"];
                    $room->updated = $arr["updated"];
                    $room->view = $arr["view"];
                    $room->status = $arr["status"];
                           
                    $listroom[] = $room;
                }   
            }
            else
            {
                $listroom = NULL;
            }
            $dbconfig->close();
            return $listroom;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $listroom;
        }
    }
	
    public function get($id)
    {
        global $dbconfig;
        $room = NULL;
        try
        {
            $sql = "select * from ".table_prefix("room")." where id='".$dbconfig->sqlQuote($id)."'";
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $room = CreateObject("Model_Entity_Room");
                $room->id = $arr["id"];
                    $room->title = $arr["title"];
                    $room->shortdescription = $arr["shortdescription"];
                    $room->description = $arr["description"]; 
                    $room->anh_dai_dien = $arr["anh_dai_dien"];
                    $room->new = $arr["description"];
                    $room->is_phong_khep_kin = $arr["is_phong_khep_kin"];
                    $room->sonha = $arr["sonha"];
                    $room->kiet = $arr["kiet"];
                    $room->tongsophong = $arr["tongsophong"];
                    $room->sophongcontrong = $arr["sophongcontrong"];
                    $room->tenchunha = $arr["tenchunha"];
                    $room->address= $arr["address"];
                    $room->idduong = $arr["idduong"];
                    $room->idphuong= $arr["idphuong"];
                    $room->dt_nha = $arr["dt_nha"];
                    $room->dt_didong = $arr["dt_didong"];
                    $room->email = $arr["email"];
                    $room->gioi_tinh_thue = $arr["gioi_tinh_thue"];
                    $room->gia_phong_max = $arr["gia_phong_max"];
                    $room->gia_phong_min = $arr["gia_phong_min"];
                    $room->giadien = $arr["giadien"];
                    $room->gia_nuoc = $arr["gia_nuoc"];
                    $room->gan_cho = $arr["gan_cho"];
                    $room->gan_duong = $arr["gan_duong"];
                    $room->internet = $arr["internet"];
                    $room->isGoogleMap = $arr["isGoogleMap"];
                    $room->longitude = $arr["longitude"];
                    $room->latitude = $arr["latitude"];
                    $room->contentGoogleMap = $arr["contentGoogleMap"];
                    $room->titleGoogleMap = $arr["titleGoogleMap"];
                    $room->stick = $arr["stick"];
                    $room->order = $arr["order"];
                    $room->create_by = $arr["create_by"];
                    $room->create_date = $arr["create_date"];
                    $room->updated_by = $arr["updated_by"];
                    $room->updated = $arr["updated"];
                    $room->view = $arr["view"];
                    $room->status = $arr["status"];    
                
            }
            else
            {
                $room = NULL;
            }
            $dbconfig->close();
            return $room;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $room;
        }
    }
    
    public function calcLike($id)
    {
        global $dbconfig;
        $obj = NULL;
        try
        {
            $sql = "select count(*) as count, sum(mark) as total from ".table_prefix("like_room")." where id_room ='".$dbconfig->sqlQuote($id)."'";
            //echo $sql;
            $dbconfig->open();
            $dbconfig->query($sql);
            if($dbconfig->num_row() != 0)
            {
                $arr = $dbconfig->fetch_array();
                $arr = $arr[0];
                $obj = new stdClass();
                $obj->count = $arr["count"];
                $obj->total = $arr["total"];
            }
            else
            {
                $room = NULL;
            }
            $dbconfig->close();
            return $obj;   
        }
        catch(MyException $ex)
        {
            $ex->__toString();
            return $obj;
        }
    }
    
    public function create($room)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "insert into ".table_prefix("room")."(title,shortdescription,description,anh_dai_dien,new,is_phong_khep_kin,sonha,kiet,tongsophong,sophongcontrong,tenchunha,address,idduong,idphuong,dt_nha,dt_didong,email,gioi_tinh_thue,gia_phong_max,gia_phong_min,giadien,gia_nuoc,gan_cho,gan_duong,internet,isGoogleMap,longitude,latitude,contentGoogleMap,titleGoogleMap,stick,`order`,create_by,create_date,updated_by,updated,status) values ('".$dbconfig->sqlQuote($room->title)."','".$dbconfig->sqlQuote($room->shortdescription)."','".$dbconfig->sqlQuote($room->description)."','".$dbconfig->sqlQuote($room->anh_dai_dien)."','".$dbconfig->sqlQuote($room->new)."','".$dbconfig->sqlQuote($room->is_phong_khep_kin)."','".$dbconfig->sqlQuote($room->sonha)."','".$dbconfig->sqlQuote($room->kiet)."','".$dbconfig->sqlQuote($room->tongsophong)."','".$dbconfig->sqlQuote($room->sophongcontrong)."','".$dbconfig->sqlQuote($room->tenchunha)."','".$dbconfig->sqlQuote($room->address)."','".$dbconfig->sqlQuote($room->idduong)."','".$dbconfig->sqlQuote($room->idphuong)."','".$dbconfig->sqlQuote($room->dt_nha)."','".$dbconfig->sqlQuote($room->dt_didong)."','".$dbconfig->sqlQuote($room->email)."','".$dbconfig->sqlQuote($room->gioi_tinh_thue)."','".$dbconfig->sqlQuote($room->gia_phong_max)."','".$dbconfig->sqlQuote($room->gia_phong_min)."','".$dbconfig->sqlQuote($room->giadien)."','".$dbconfig->sqlQuote($room->gia_nuoc)."','".$dbconfig->sqlQuote($room->gan_cho)."','".$dbconfig->sqlQuote($room->gan_duong)."','".$dbconfig->sqlQuote($room->internet)."','".$dbconfig->sqlQuote($room->isGoogleMap)."','".$dbconfig->sqlQuote($room->longitude)."','".$dbconfig->sqlQuote($room->latitude)."','".$dbconfig->sqlQuote($room->contentGoogleMap)."','".$dbconfig->sqlQuote($room->titleGoogleMap)."','".$dbconfig->sqlQuote($room->stick)."','".$dbconfig->sqlQuote($room->order)."','".$dbconfig->sqlQuote($room->create_by)."','".$dbconfig->sqlQuote($room->create_date)."','".$dbconfig->sqlQuote($room->updated_by)."','".$dbconfig->sqlQuote($room->updated)."','".$dbconfig->sqlQuote($room->status)."');";
            
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
            $sql = "delete from ".table_prefix("room")." where id = '".$dbconfig->sqlQuote($id)."';";
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
    
    public function update($room)
    {
        global $dbconfig;
        $status = false;
        try
        {
            $sql = "update ".table_prefix("room")." set title='".$dbconfig->sqlQuote($acount->title)."',shortdescription = '".$dbconfig->sqlQuote($acount->shortdescription)."',description = '".$dbconfig->sqlQuote($room->description)."',anh_dai_dien = '".$dbconfig->sqlQuote($room->anh_dai_dien)."',new = '".$dbconfig->sqlQuote($room->new)."',is_phong_khep_kin = '".$dbconfig->sqlQuote($room->is_phong_khep_kin)."',sonha = '".$dbconfig->sqlQuote($room->sonha)."',kiet = '".$dbconfig->sqlQuote($room->kiet)."',tongsophong = '".$dbconfig->sqlQuote($room->tongsophong)."',sophongcontrong = '".$dbconfig->sqlQuote($room->sophongcontrong)."',tenchunha = '".$dbconfig->sqlQuote($room->tenchunha)."',dt_nha = '".$dbconfig->sqlQuote($room->dt_nha)."',dt_didong = '".$dbconfig->sqlQuote($room->dt_didong)."',email = '".$dbconfig->sqlQuote($room->email)."',gioi_tinh_thue = '".$dbconfig->sqlQuote($room->gioi_tinh_thue)."',gia_phong_max ='".$dbconfig->sqlQuote($room->gia_phong_max)."',gia_phong_min = '".$dbconfig->sqlQuote($room->gia_phong_min)."',giadien ='".$dbconfig->sqlQuote($room->giadien)."',gia_nuoc = '".$dbconfig->sqlQuote($room->gia_nuoc)."',gan_cho = '".$dbconfig->sqlQuote($room->gan_cho)."',gan_duong = '".$dbconfig->sqlQuote($room->gan_duong)."',internet = '".$dbconfig->sqlQuote($room->internet)."',isGoogleMap ='".$dbconfig->sqlQuote($room->isGoogleMap)."',longitude ='".$dbconfig->sqlQuote($room->longitude)."',latitude ='".$dbconfig->sqlQuote($room->latitude)."',contentGoogleMap = '".$dbconfig->sqlQuote($room->contentGoogleMap)."',titleGoogleMap = '".$dbconfig->sqlQuote($room->titleGoogleMap)."',stick = '".$dbconfig->sqlQuote($room->stick)."',order ='".$dbconfig->sqlQuote($room->order)."',create_by ='".$dbconfig->sqlQuote($room->create_by)."',create_date = '".$dbconfig->sqlQuote($room->create_date)."',updated_by = '".$dbconfig->sqlQuote($room->updated_by)."',updated = '".$dbconfig->sqlQuote($room->updated)."', status ='".$dbconfig->sqlQuote($room->status)."';";
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