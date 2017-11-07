<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php wp_title("", true); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <!-- Body -->
    <body>

        <nav>
            <?php 
            
            $defaults = array(
                'container' => false,
                'theme_location' => 'primary-menu',
                'menu_class' => 'no-bullet'
            );

            wp_nav_menu($defaults);
            
            ?>
        </nav>