<?php
	require ('koneksi.php');

// Menampilkan Data Tabel Services
$perpage_services  = 5;
$page_services     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_services    = ($page_services > 1) ? ($page_services * $perpage_services) - $perpage_services :0;     
$result_services   = mysqli_query ($link, "SELECT * FROM tbl_services");
$total_services    = mysqli_num_rows($result_services);
$pages_services    = ceil($total_services/$perpage_services);
$articles_services = "SELECT * FROM tbl_services ORDER BY id_services DESC LIMIT $start_services, $perpage_services";
$tampil_services   = mysqli_query($link,$articles_services);
$id_services	   = $start_services + 1;

// Menampilkan Data Tabel Gallery
// $perpage_gallery  = 6;
// $page_gallery     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $start_gallery    = ($page_gallery > 1) ? ($page_gallery * $perpage_gallery) - $perpage_gallery :0;     
// $result_gallery   = mysqli_query ($link, "SELECT * FROM tbl_gallery");
// $total_gallery    = mysqli_num_rows($result_gallery);
// $pages_gallery    = ceil($total_gallery/$perpage_gallery);
// $articles_gallery = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC LIMIT $start_gallery, $perpage_gallery";
// $tampil_gallery   = mysqli_query($link,$articles_gallery);
// $id_gallery		  = $start_gallery + 1;

// Menampilkan Data Tabel Promo
$perpage_promo  = 5;
$page_promo     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_promo    = ($page_promo > 1) ? ($page_promo * $perpage_promo) - $perpage_promo :0;     
$result_promo   = mysqli_query ($link, "SELECT * FROM tbl_promo");
$total_promo    = mysqli_num_rows($result_promo);
$pages_promo    = ceil($total_promo/$perpage_promo);
$articles_promo = "SELECT * FROM tbl_promo ORDER BY id_promo DESC LIMIT $start_promo, $perpage_promo";
$tampil_promo   = mysqli_query($link,$articles_promo);
$id_promo		= $start_promo + 1;

// Menampilkan Data Tabel Inbox
$perpage_inbox  = 5;
$page_inbox     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_inbox    = ($page_inbox > 1) ? ($page_inbox * $perpage_inbox) - $perpage_inbox :0;     
$result_inbox   = mysqli_query ($link, "SELECT * FROM tbl_inbox");
$total_inbox    = mysqli_num_rows($result_inbox);
$pages_inbox    = ceil($total_inbox/$perpage_inbox);
$articles_inbox = "SELECT * FROM tbl_inbox ORDER BY date_receive_inbox DESC LIMIT $start_inbox, $perpage_inbox";
$tampil_inbox   = mysqli_query($link,$articles_inbox);
$id_inbox		  = $start_inbox + 1;

// Menampilkan Pesan Terbaru
$perpage_pesanterbaru  = 3;
$page_pesanterbaru     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_pesanterbaru    = ($page_pesanterbaru > 1) ? ($page_pesanterbaru * $perpage_pesanterbaru) - $perpage_pesanterbaru :0;     
$result_pesanterbaru   = mysqli_query ($link, "SELECT * FROM tbl_inbox");
$total_pesanterbaru    = mysqli_num_rows($result_pesanterbaru);
$pages_pesanterbaru    = ceil($total_pesanterbaru/$perpage_pesanterbaru);
$articles_pesanterbaru = "SELECT * FROM tbl_inbox ORDER BY date_receive_inbox DESC LIMIT $start_pesanterbaru, $perpage_pesanterbaru";
$tampil_pesanterbaru   = mysqli_query($link,$articles_pesanterbaru);
$id__pesanterbaru		  = $start_pesanterbaru + 1;

// Menampilkan Data Tabel Profile
$perpage_profile  = 5;
$page_profile     = isset($_GET['pageconf']) ? (int)$_GET['pageconf'] : 1;
$start_profile    = ($page_profile > 1) ? ($page_profile * $perpage_profile) - $perpage_profile :0;     
$result_profile   = mysqli_query ($link, "SELECT * FROM tbl_profile");
$total_profile    = mysqli_num_rows($result_profile);
$pages_profile    = ceil($total_profile/$perpage_profile);
$articles_profile = "SELECT * FROM tbl_profile ORDER BY id_profile DESC LIMIT $start_profile, $perpage_profile";
$tampil_profile   = mysqli_query($link,$articles_profile);
$id_profile		  = $start_profile + 1;

// Menampilkan Data Tabel User
$perpage_user  = 5;
$page_user     = isset($_GET['pageconf']) ? (int)$_GET['pageconf'] : 1;
$start_user    = ($page_user > 1) ? ($page_user * $perpage_user) - $perpage_user :0;     
$result_user   = mysqli_query ($link, "SELECT * FROM tbl_user");
$total_user    = mysqli_num_rows($result_user);
$pages_user    = ceil($total_user/$perpage_user);
$articles_user = "SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT $start_user, $perpage_user";
$tampil_user   = mysqli_query($link,$articles_user);
$id_user	   = $start_user + 1;

// Menampilkan Data Tabel Contact US
$perpage_contactus  = 5;
$page_contactus     = isset($_GET['pageconf']) ? (int)$_GET['pageconf'] : 1;
$start_contactus    = ($page_contactus > 1) ? ($page_contactus * $perpage_contactus) - $perpage_contactus :0;     
$result_contactus   = mysqli_query ($link, "SELECT * FROM tbl_contactus");
$total_contactus    = mysqli_num_rows($result_contactus);
$pages_contactus    = ceil($total_contactus/$perpage_contactus);
$articles_contactus = "SELECT * FROM tbl_contactus ORDER BY id_contactus DESC LIMIT $start_contactus, $perpage_contactus";
$tampil_contactus   = mysqli_query($link,$articles_contactus);
$id_contactus	   = $start_contactus + 1;




?>