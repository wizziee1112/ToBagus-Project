<?php
require ('koneksi.php'); 
require ('control.php'); 
$mysqli = new databases();  
if (@$_GET['lang']!=''){
    language($_GET['lang']);
}else {
    language("in");
}
?>

<section id="about" class="page-section">
        <div class="container">
            <div class="row">
                <?php 
                    foreach ($mysqli->get_show_promo() as $showpromo) {
                    echo "
                    <div class=\"col-md-3 col-sm-6 col-xs-12\">
                        <div class=\"service-item\">
                            <div class=\"icon\">
                                <img src=\"img/$showpromo[pict_promo]\" alt=\"\">
                            </div>                         
                            <h4>$showpromo[title_promo]</h4>
                            <div class=\"line-dec\"></div>
                            <p>$showpromo[description_promo]</p>
                            <p>$showpromo[promo]</p>
                            <p>$showpromo[harga].</p>";
             
                ?>
                    </div>
                </div>
                <?php                 
                    }
                ?>
            </div>
        </div>
    </section>
