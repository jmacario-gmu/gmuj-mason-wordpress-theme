<div id="utility-links-bar">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'utility',
            'container' => false,
            'menu_id' => 'utility-links',
            'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
        )
    );
    ?>            
</div>