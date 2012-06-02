<?php 
class Model_Entity_Room
{
    public $id;
    public $title;
    public $shortdescription;
    public $description;
    public $anh_dai_dien;
    public $new;
    public $is_phong_khep_kin;
    public $sonha;
    public $kiet;
    public $tongsophong;
    public $sophongcontrong;
    public $tenchunha;
    public $address;
    public $idduong;
    public $idphuong;
    public $dt_nha;
    public $dt_didong;
    public $email;
    public $gioi_tinh_thue;
    public $gia_phong_max;
    public $gia_phong_min;
    public $giadien;
    public $gia_nuoc;
    public $gan_cho;
    public $gan_duong;
    public $internet;
    public $isGoogleMap;
    public $longitude;
    public $latitude;
    public $contentGoogleMap;
    public $titleGoogleMap;
    public $stick;
    public $order;
    public $create_by;
    public $create_date;
    public $updated_by;
    public $updated;
    public $view;
    public $status;
    
     public function init($id,$title,$shortdescription,$description,$new,$is_phong_khep_kin,$sonha,$kiet,$tongsophong,$sophongcontrong,$tenchunha,$address,$idduong,$idphuong,$dt_nha,$dt_didong,$email,$gioi_tinh_thue,$gia_phong_max,$gia_phong_min,$giadien,$gia_nuoc,$gan_cho,$gan_duong,$internet,$isGoogleMap,$longitude,$latitude,$contentGoogleMap,$titleGoogleMap,$stick,$order,$create_by,$view,$status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->shortdescription = $shortdescription;
        $this->description = $description;
        $this->new = $new;
        $this->is_phong_khep_kin =$is_phong_khep_kin;
        $this->sonha = $sonha;
        $this->kiet = $kiet;
        $this->tongsophong = $tongsophong;
        $this->sophongcontrong = $sophongcontrong;
        $this->tenchunha = $tenchunha;
        $this->address = $address;
        $this->idduong = $idduong;
        $this->idphuong;
        $this->dt_nha = $dt_nha;
        $this->dt_didong = $dt_didong;
        $this->email = $email;
        $this->gioi_tinh_thue = $gioi_tinh_thue;
        $this->gia_phong_max = $gia_phong_max;
        $this->gia_phong_min = $gia_phong_min;
        $this->giadien = $giadien;
        $this->gia_nuoc = $gia_nuoc;
        $this->gan_cho = $gan_cho;
        $this->gan_duong  = $gan_duong;
        $this->internet = $internet;
        $this->isGoogleMap = $isGoogleMap;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->contentGoogleMap  = $contentGoogleMap;
        $this->titleGoogleMap = $titleGoogleMap;
        $this->stick = $stick;
        $this->order = $order;
        $this->create_by = $create_by;
        $this->view = $view;
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