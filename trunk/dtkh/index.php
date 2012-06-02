<?php 
    session_start();
?>
<?php

 /*** error reporting on ***/
 error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);

 /*** include the init.php file ***/
 include 'Include/application/init.php';
 
 include 'config.php';
 include 'functions.php';

 include 'Include/DBConfig.php';
 
 include 'Include/Language.php';
 
include 'Include/LogFile.php';

include 'Include/MyException.php';

//bien cau hinh
$config = new Config();

$dbconfig = new Include_DBConfig();

if(!isset($_SESSION["views"]))
{
    $views = array();
    $_SESSION["views"] = $views;
}

if(!isset($_SESSION["listSoSanh"]))
{
    $listSoSanh = array();
    $_SESSION["listSoSanh"] = $listSoSanh;  
}

if(isset($_SESSION["loai_hienthi"]))
{
    $registry->loai_hien_thi = $_SESSION["loai_hienthi"];
}
else
{
    $registry->loai_hien_thi = $config->loai_hien_thi;   
}

if(!isset($_SESSION["searchObj"]))
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

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
 $registry->router->loader();

?>