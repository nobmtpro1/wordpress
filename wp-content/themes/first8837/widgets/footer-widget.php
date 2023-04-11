<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor footer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_footer_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'footer';
    }
    public function get_title()
    {
        return esc_html__('footer', 'elementor-footer-widget');
    }
    public function get_keywords()
    {
        return ['footer'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-footer-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'elementor-footer-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="footer-nav clearfix">
                            <ul class="footer-menu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="blog.html">Blog Posts</a></li>
                                <li><a href="archives.html">Shortcodes</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul> <!-- /.footer-menu -->
                        </nav> <!-- /.footer-nav -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <p class="copyright-text">Copyright &copy; 2084 Company Name
                            | Design: templatemo</p>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </footer> <!-- /.site-footer -->

        <?php
    }
}