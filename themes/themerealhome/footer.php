<?php wp_footer()?>
<footer>
    <div class="bloc-footer-left">
        <div class="logo-realhome-footer">
            <img src="<?php echo bloginfo('template_url');?>/images/logo-2.png" alt="logo">
        </div>
        
        <div class="container-reseaux-footer">
            <?php  wp_nav_menu(array( 'theme_location' => 'menu-footer', 'container' => 'nav')); ?>
        </div>
    </div>
        <div class="container-menu-footer">
            <h2>Menu</h2>
            <?php  wp_nav_menu(array( 'theme_location' => 'menu-principal', 'container' => 'nav')); ?>
        </div>

        <div class="contact-footer">
            <h2>Contact</h2>
            <p>35 rue des Horizons</p>
            <p>75000 PARIS</p>
            <p>Tel : 00 00 00 00 00</p>
            <p>Fax : 00 00 00 00 00</p>
            <a class="email" href="info@realhome.com">info@realhome.com</a>
        </div>
</footer>
</body>
</html>