<?php 
$url = $this->uri->segment(1);
if(!empty($url)){
    if($url == 'city'){
        ?>
        <script>var c_img_url = '<?= C_IMG_URL; ?>';</script>
        <script src="<?=base_url()?>public/dist/js/pages/city.js"></script>
        <?php
    }
    if($url == 'places'){
        ?>
        <script>var p_img_url = '<?= P_IMG_URL; ?>';</script>
        <script src="<?=base_url()?>public/dist/js/select2.min.js"></script>
        <script src="<?=base_url()?>public/dist/js/pages/places.js"></script>
        <?php
    }
    if($url == 'faq'){
        ?>
        <script src="<?=base_url()?>public/dist/js/pages/faq.js"></script>
        <?php
    }
    
    if($url == 'customer'){
        ?>
        <script src="<?=base_url()?>public/dist/js/pages/customer.js"></script>
        <?php
    }
}
?>