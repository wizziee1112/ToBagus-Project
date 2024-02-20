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
                    foreach ($mysqli->get_show_services() as $showservices) {
                    echo "
                    <div class=\"col-md-3 col-sm-6 col-xs-12\">
                        <div class=\"service-item\">
                            <div class=\"icon\">
                                <img src=\"img/$showservices[pict_services]\" alt=\"p info\">
                            </div>                         
                            <h4>$showservices[title_services]</h4>
                            <div class=\"line-dec\"></div>
                            <p>$showservices[description_services]</p>
                            <p>$showservices[harga].</p>";
                            
                            ?>
                    
                    </div>
                </div>
                <?php                 
                    }
                ?>
            </div>
        </div>
    </section>