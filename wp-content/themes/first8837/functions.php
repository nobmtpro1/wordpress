<?php
function register_menus()
{
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu'
        )
    );
}
add_action('init', 'register_menus');

add_action('elementor/frontend/after_enqueue_styles', function () {
    wp_register_style('style-1', get_template_directory_uri() . '/green/bootstrap/bootstrap.css');
    wp_register_style('style-2', get_template_directory_uri() . '/green/css/misc.css');
    wp_register_style('style-3', get_template_directory_uri() . '/green/css/green-scheme.css');

    wp_enqueue_style('style-1');
    wp_enqueue_style('style-2');
    wp_enqueue_style('style-3');
});

function my_plugin_frontend_scripts()
{
    wp_register_script('script-1', get_template_directory_uri() . '/green/js/jquery-1.10.2.min.js');
    wp_register_script('script-2', get_template_directory_uri() . '/green/js/jquery-migrate-1.2.1.min.js');
    wp_register_script('script-3', get_template_directory_uri() . '/green/js/min/plugins.min.js');
    wp_register_script('script-4', get_template_directory_uri() . '/green/js/min/medigo-custom.min.js');
    wp_register_script('contact', get_template_directory_uri() . '/green/js/contact.js');

    wp_enqueue_script('script-1', 'script-1', [], '', true);
    wp_enqueue_script('script-2', 'script-2', [], '', true);
    wp_enqueue_script('script-3', 'script-3', [], '', true);
    wp_enqueue_script('script-4', 'script-4', [], '', true);

    if (is_page("contact")) {
        wp_enqueue_script('contact', 'contact', [], '', true);
    }
}
add_action('elementor/frontend/after_register_scripts', 'my_plugin_frontend_scripts');

function register_elementor_widgets($widgets_manager)
{
    require_once(__DIR__ . '/widgets/header-widget.php');
    require_once(__DIR__ . '/widgets/footer-widget.php');
    require_once(__DIR__ . '/widgets/home-widget.php');
    require_once(__DIR__ . '/widgets/contact-widget.php');
    require_once(__DIR__ . '/widgets/project-list-widget.php');

    $widgets_manager->register(new \Elementor_header_Widget());
    $widgets_manager->register(new \Elementor_footer_Widget());
    $widgets_manager->register(new \Elementor_home_Widget());
    $widgets_manager->register(new \Elementor_contact_Widget());
    $widgets_manager->register(new \Elementor_project_list_Widget());
}
add_action('elementor/widgets/register', 'register_elementor_widgets');
add_filter( 'get_pagenum_link', 'wpse_78546_pagenum_link' );

function wpse_78546_pagenum_link( $link )
{
    return preg_replace( '~/page/(\d+)/?~', '?paged=\1', $link );
}