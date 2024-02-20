<?php 

include '../../header_module.php';
include '../../menu_module.php';
include '../../control.php';

// MODULE PROMO PRODUK \\
$module   = @$_GET['promo'];

if ($module == "add"){
    $pict_promo           = @$_FILES['pict_promo']['name'];
    $location             = @$_FILES['pict_promo']['tmp_name'];
    $title_promo          = @$_POST['title_promo'];
    $description_promo    = @$_POST['description_promo'];
    $promo                = @$_POST['promo'];
    $harga                = @$_POST['harga'];
    $lang_promo           = @$_POST['lang_promo'];      

    $tambah     = "INSERT INTO tbl_promo (pict_promo, title_promo, description_promo, promo, harga, lang_promo)
                  VALUES ('$pict_promo', '$title_promo', '$description_promo','$promo', '$harga', '$lang_promo')";
    
    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-check\"> ]</i> Tambah Data Tabel Promo Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_promo/aksi.php?promo=add\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          
                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\"> 
                          <input type=\"file\" class=\"\" name=\"pict_promo\" oninvalid=\"alert('Gambar belum di upload !');\"required><p></p>
                          </div>
                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_promo\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_promo\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Promo </label>
                          <div class=\"col-sm-10\">
                               <input type=\"text\" class=\"form-control\" name=\"promo\" oninvalid=\"alert('promo harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Harga </label>
                          <div class=\"col-sm-10\">
                               <input type=\"text\" class=\"form-control\" name=\"harga\" oninvalid=\"alert('harga harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_promo/aksi.php?promo=add#\"><button type=\"submit\" name=\"submit\" class=\"btn btn-success\">Simpan</button></a>
                          <a href=\"../../module/mod_promo/promo.php?tbl=promo\"><button type=\"back\" name=\"reset\" class=\"btn btn-warning\">Batal</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
           if (isset($_POST['submit'])) {             
               if (mysqli_query($link,$tambah)) {
                if ($lang_promo=="in"){
                       $lang_promo = "in";
                   }elseif ($lang_promo=="en"){
                       $lang_promo ="en";
                   }else{
                       $lang_promo ="in";                      
                   }
                move_uploaded_file($location, '../../../img/'. $pict_promo);
                echo "<script language=\"javascript\">
                         alert (\"Data Berhasil Direkam !!\")
                         document.location=\"promo.php?tbl=promo\";
                       </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Input Data\")
                         document.location=\"aksi.php?promo=add\";
                      </script>";
               }
           }
           mysqli_close($link);
}


if ($module == "edit"){
    $id_promo          = @$_GET['id_promo'];

    $edit         = mysqli_query($link, "SELECT * FROM tbl_promo WHERE id_promo='$id_promo'");
    $showpromo = mysqli_fetch_array($edit);

    echo " <section id=\"main-content\">
            <section class=\"wrapper\">
             <div class=\"row mt\">
              <div class=\"col-md-12\">
               <div class=\"form-panel\">
                <table class=\"table table-striped table-advance table-hover\">
                 <h4>[ <i class=\"fa fa-edit\"> ]</i> Edit Data Tabel Promo Produk</h4>
                  <hr>
                    <form class=\"form-horizontal style-form\" action=\"../../module/mod_promo/aksi.php?promo=update&id_promo=$showpromo[id_promo]\" method=\"POST\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">          

                          <input type=\"hidden\" class=\"form-control\" name=\"id_promo\" value=\"$showpromo[id_promo]\">

                          <label class=\"col-sm-2 col-sm-2 control-label\">Upload Gambar</label>
                          <div class=\"col-sm-10\">
                          <div class=\"project\">
                          <div class=\"photo-wrapper\">
                              <div class=\"photo\"> 
                                <a class=\"fancybox\" href=\"../../../img/$showpromo[pict_promo]\">
                                <img id=\"output_image\" class=\"img-responsive\" src=\"../../../img/$showpromo[pict_promo]\" alt=\"../../../img/$showpromo[pict_promo]\"></a>
                              </div>
                            </div>
                          </div>

                          <input type=\"file\" accept=\"image/*\" onchange=\"preview_image(this,'preview')\" class=\"\" name=\"pict_promo\" value=\"$showpromo[pict_promo]\" oninvalid=\"alert('Gambar belum di upload !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Judul</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"title_promo\" value=\"$showpromo[title_promo]\" oninvalid=\"alert('Judul harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Informasi</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"description_promo\" value=\"$showpromo[description_promo]\" oninvalid=\"alert('Informasi harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Promo</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"promo\" value=\"$showpromo[promo]\" oninvalid=\"alert('Promo harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">harga</label>
                          <div class=\"col-sm-10\">
                              <input type=\"text\" class=\"form-control\" name=\"harga\" value=\"$showpromo[harga]\" oninvalid=\"alert('harga harus di isi !');\"required>
                          </div>

                          <label class=\"col-sm-2 col-sm-2 control-label\">Bahasa</label>
                          <div class=\"radio col-sm-10\">
                              <label>";
                              ?>
                              <?php
                              $language_promo = @$showpromo[$lang_promo];
                              if ($language_promo == "en"){
                                echo"
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios2\" value=\"en\" checked>
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios1\" value=\"in\">
                                Indonesia
                              </label>";
                              }else{
                                echo"
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios2\" value=\"en\">
                                English
                              </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                              <label>
                                <input type=\"radio\" name=\"lang_promo\" id=\"optionsRadios1\" value=\"in\" checked>
                                Indonesia
                              </label>";
                              }
                              ?>
                              <?php
                              echo"
                          </div>
                      </div>
                </table>      
                  <hr>
                      <div class=\"btn-group1\">
                          <a href=\"../../module/mod_promo/aksi.php?promo=edit&id_promo=$showpromo[id_promo]#\"><button type=\"submit\" name=\"update\" class=\"btn btn-success\">Update</button></a>
                          <a href=\"#\"><button type=\"reset\" name=\"reset\" class=\"btn btn-warning\">Reset</button></a>
                      </div>
                    </form>
               </div><!-- /form-panel -->
              </div><!-- /col-md-12 -->
             </div><!-- /row mt-->
            </section>
           </section>";
}

if ($module == "update"){
    $id_promo             = @$_GET['id_promo'];
    $pict_promo           = @$_FILES['pict_promo']['name'];
    $location             = @$_FILES['pict_promo']['tmp_name'];
    $title_promo          = @$_POST['title_promo'];
    $description_promo    = @$_POST['description_promo'];
    $promo                = @$_POST['promo'];
    $harga                = @$_POST['harga'];
    $lang_promo           = @$_POST['lang_promo'];

    $update       = "UPDATE tbl_promo SET pict_promo='$pict_promo', title_promo='$title_promo', description_promo='$description_promo', promo='$promo', harga='$harga', lang_promo='$lang_promo' where id_promo='$id_promo'";

    if (isset($_POST['update'])) {             
               if (mysqli_query($link,$update)) {
                if ($lang_promo=="in"){
                       $lang_promo = "in";
                   }elseif ($lang_promo=="en"){
                       $lang_promo ="en";
                   }else{
                       $lang_promo ="in";                      
                   }
                  move_uploaded_file($location, '../../../img/'. $pict_promo);
                  echo "<script language=\"javascript\">
                           alert (\"Data Berhasil Diupdate !!\")
                           document.location=\"promo.php?tbl=promo\";
                         </script>";               
               }else{
                  echo "<script language=\"javascript\">
                         alert (\"Gagal Update Data\")
                         document.location=\"../../module/mod_promo/aksi.php?promo=edit&id_promo=$showpromo[id_promo]\";
                      </script>";
               }
           }
           mysqli_close($link);
}

if ($module=='hapus'){

    $id_promo   = @$_GET['id_promo'];
    $tampil        = mysqli_query($link, "SELECT * FROM tbl_promo WHERE id_promo='$id_promo'");
    $showpromo  = mysqli_fetch_array($tampil);
    
    $hapus = "DELETE FROM tbl_promo WHERE id_promo='$id_promo'";
    if (mysqli_query ($link, $hapus)) {
        unlink("../../../img/$showpromo[pict_promo]"); 
        echo "<script language=\"javascript\">
               alert (\"Data Berhasil Dihapus !!\")
               document.location=\"promo.php?tbl=promo\";
              </script>";               
    }else{
        echo "<script language=\"javascript\">
               alert (\"Gagal Hapus Data\")
               document.location=\"../../module/mod_promo/aksi.php?promo=edit&id_promo=$data_promo[id_promo]\";
              </script>";
    }
     mysqli_close($link);
}

include '../../footer_module.php';
?>


