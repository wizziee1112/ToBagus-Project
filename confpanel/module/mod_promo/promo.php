<?php 
require ('../../start.php');
    if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
        echo "<script>alert('Akses ditolak !!! Silahkan sign ini terlebih dahulu, Terimakasih.'); window.location = '../../index.php'</script>";
    }else{
include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PROMO PRODUK \\
	echo " <section id=\"main-content\">
         	<section class=\"wrapper\">
           <div class=\"row mt\">
            <div class=\"col-md-12\">
             <div class=\"content-panel\">
              <table class=\"table table-striped table-advance table-hover\">
                <h4>[ <i class=\"fa fa-info\"> ]</i> Tabel Promo Produk</h4>
                <hr>
                <a href=\"../../module/mod_promo/aksi.php?promo=add\"><button class=\"btn btn-success btn-xs\"><i class=\"fa fa-plus\"></i> Tambah</button></a>
                  <thead>
                  <tr>
                    <th><i class=\"\"></i> No</th>
                    <th><i class=\"\"></i> Gambar</th>
                    <th><i class=\"\"></i> Judul</th>
                    <th><i class=\"\"></i> Informasi</th>
                    <th><i class=\"\"></i> Promo</th>
                    <th><i class=\"\"></i> Harga </th>
                    <th><i class=\"\"></i> Bahasa</th>
                    <th><i class=\"fa fa-edit\"></i> Aksi</th>
                  </tr>
                  </thead>
                  <tbody>";


$show_promo = mysqli_query ($link, "SELECT * FROM tbl_promo ORDER BY id_promo DESC");
while ($data_promo = mysqli_fetch_assoc($tampil_promo)) {
$kalimat_promo  = $data_promo['harga'];  
echo"
                  <tr>
                    <td>$id_promo</td>
                    <td><a class=\"fancybox\" href=\"../../../img/$data_promo[pict_promo]\">$data_promo[pict_promo]</a></td>
                    <td>$data_promo[title_promo]</td>
                    <td>$data_promo[description_promo]</td>
                    <td>$data_promo[promo]</td>
                    <td>$data_promo[harga]</td>
                    <td>";
                    ?>
                    <?php
                      $language_promo = $data_promo['lang_promo'];
                      if ($language_promo=='en'){
                         echo "<span class=\"label label-info label-mini\">";
                       }else{
                         echo "<span class=\"label label-warning label-mini\">";
                       }
                       echo "$data_promo[lang_promo]</span>
                    </td>
                    <td>
                      <a href=\"../../module/mod_promo/aksi.php?promo=edit&id_promo=$data_promo[id_promo]\"><button class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button></a>
                      <a href=\"../../module/mod_promo/aksi.php?promo=hapus&id_promo=$data_promo[id_promo]\"><button class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i></button></a>
                    </td>
                  </tr>";
                  $id_promo++;
}
                  echo"
                  </tbody>
                </table>      
                <hr>";
                 echo"<div class=\"btn-group1\">";
                    for ($i=1; $i<=$pages_promo; $i++){
                    echo"
                      <a href=\"promo.php?page=$i\"><button type=\"button\" class=\"btn btn-default\">$i</button></a>";
                  }
                  echo"  
                </div>";
        mysqli_close($link);                
               
               echo"
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->
    </section>
    </section>";    

include '../../footer_module.php';
}
?>

 
