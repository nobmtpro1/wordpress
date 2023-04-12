<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor contact Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_contact_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'contact';
    }
    public function get_title()
    {
        return esc_html__('contact', 'elementor-contact-widget');
    }
    public function get_keywords()
    {
        return ['contact'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-contact-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="first-widget parallax" id="contact">
            <div class="parallax-overlay">
                <div class="container pageTitle">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="page-title">Contact</h2>
                        </div> <!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-6 text-right">
                            <span class="page-location">Home / Contact</span>
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.parallax-overlay -->
        </div> <!-- /.pageTitle -->

        <div class="container">
            <div class="row">

                <div class="col-md-8 blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-wrapper">
                                <h3>Get In Touch With Us</h3>
                                <p>Nihil, aperiam, ad molestiae ut enim reprehenderit rem repudiandae ducimus dolorum obcaecati
                                    rerum accusamus provident atque eos cum. Reiciendis, modi, sint, vel, eligendi veniam esse
                                    qui quasi voluptas recusandae eum accusamus error animi expedita amet rem ad quos.</p>
                                <div class="contact-map">
                                    <div class="google-map-canvas" id="map-canvas" style="height: 320px;">
                                    </div>
                                </div>
                            </div> <!-- /.contact-wrapper -->
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-form">
                                <h3>Send a Direct Message</h3>
                                <div class="widget-inner">
                                    <form action="" method="post" id="contact-form">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>
                                                    <label for="name">Your Name:</label>
                                                    <input type="text" name="name" id="name">
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    <label for="email">Email Address:</label>
                                                    <input type="text" name="email" id="email">
                                                </p>
                                            </div>
                                            <div class="col-md-4">
                                                <p>
                                                    <label for="subject">Subject:</label>
                                                    <input type="text" name="subject" id="subject">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label for="message">Your message:</label>
                                                    <textarea name="message" id="message"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="mainBtn" id="submit">Send Message</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="result"></div>
                                            </div> <!-- /.col-md-12 -->
                                        </div> <!-- /.row -->
                                    </form>
                                </div> <!-- /.widget-inner -->
                            </div> <!-- /.contact-form -->
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h5 class="widget-title">Recent Posts</h5>
                            <div class="last-post clearfix">
                                <div class="thumb pull-left">
                                    <a href="#"><img
                                            src="<?php bloginfo('template_directory'); ?>/green/images/includes/blogthumb1.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <span>24 February 2084</span>
                                    <h4><a href="#">Standard Post Formating Medigo</a></h4>
                                </div>
                            </div> <!-- /.last-post -->
                            <div class="last-post clearfix">
                                <div class="thumb pull-left">
                                    <a href="#"><img
                                            src="<?php bloginfo('template_directory'); ?>/green/images/includes/blogthumb2.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <span>24 February 2084</span>
                                    <h4><a href="#">Standard Post Formating Medigo</a></h4>
                                </div>
                            </div> <!-- /.last-post -->
                            <div class="last-post clearfix">
                                <div class="thumb pull-left">
                                    <a href="#"><img
                                            src="<?php bloginfo('template_directory'); ?>/green/images/includes/blogthumb3.jpg"
                                            alt=""></a>
                                </div>
                                <div class="content">
                                    <span>24 February 2084</span>
                                    <h4><a href="#">Standard Post Formating Medigo</a></h4>
                                </div>
                            </div> <!-- /.last-post -->
                        </div> <!-- /.sidebar-widget -->
                        <div class="sidebar-widget">
                            <h5 class="widget-title">Categories</h5>
                            <div class="row categories">
                                <div class="col-md-6">
                                    <ul>
                                        <li><a href="#">Standard</a></li>
                                        <li><a href="#">Audio</a></li>
                                        <li><a href="#">Video</a></li>
                                        <li><a href="#">Branding</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li><a href="#">iOS Design</a></li>
                                        <li><a href="#">Business</a></li>
                                    </ul>
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.sidebar-widget -->
                        <div class="sidebar-widget">
                            <h5 class="widget-title">Flickr Feed</h5>
                            <ul id="flickr-feed" class="thumbs"></ul>
                        </div> <!-- /.sidebar-widget -->
                        <div class="sidebar-widget">
                            <h5 class="widget-title">Text Widget</h5>
                            <p class="light-text">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                                fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis dis parturient…
                            </p>
                        </div> <!-- /.sidebar-widget -->
                    </div> <!-- /.sidebar -->
                </div> <!-- /.col-md-4 -->

            </div> <!-- /.row -->
        </div> <!-- /.container -->

        <?php
    }
}