    <footer>
        <?php
                $args = array(
                    'theme_location'=> 'header-menu',
                    'container' => 'nav',
                    'container_class' => ''
                );
                wp_nav_menu($args);
        ?>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>