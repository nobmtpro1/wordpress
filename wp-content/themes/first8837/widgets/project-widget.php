<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor project Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_project_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'project';
    }
    public function get_title()
    {
        return esc_html__('project', 'elementor-project-widget');
    }
    public function get_keywords()
    {
        return ['project'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-project-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'elementor-project-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>


        <div class="first-widget parallax" id="portfolioId">
            <div class="parallax-overlay">
                <div class="container pageTitle">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="page-title">Project Image</h2>
                        </div> <!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-6 text-right">
                            <span class="page-location">Home / Project Image</span>
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.parallax-overlay -->
        </div> <!-- /.pageTitle -->

        <div class="container">
            <?php the_content() ?>
        </div> <!-- /.container -->

        <div class="static-info-project">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <p class="larger-text">Interested to hire us? Go ahead and talk with us on the <a
                                href="contact.html">contact page</a>. We'll be pleased to answer you within a few hours.</p>
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.static-info-project -->

        <div class="related-projects">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-header">
                            <h2 class="section-title">Related Projects</h2>
                            <p class="section-desc">These are some projects that you may be interested to see.</p>
                        </div> <!-- /.section-header -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <div class="container">
                <div class="row">
                    <div class="portfolio-holder">
                        <div class="portfolio-post col-sm-6 col-md-4">
                            <div class="thumb-post">
                                <div class="overlay">
                                    <div class="overlay-inner">
                                        <div class="portfolio-infos">
                                            <span class="meta-category">Branding / Identity</span>
                                            <h3 class="portfolio-title"><a href="project-slideshow.html">Gloss Template</a></h3>
                                        </div>
                                        <div class="portfolio-expand">
                                            <a class="fancybox" href="images/includes/project7.jpg" title="Gloss Template">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/green/images/includes/project7.jpg"
                                    alt="Gloss Template">
                            </div>
                        </div> <!-- /.col-md-4 -->

                        <div class="portfolio-post col-sm-6 col-md-4">
                            <div class="thumb-post">
                                <div class="overlay">
                                    <div class="overlay-inner">
                                        <div class="portfolio-infos">
                                            <span class="meta-category">Identity / Illustration</span>
                                            <h3 class="portfolio-title"><a href="project-slideshow.html">Ion Template</a></h3>
                                        </div>
                                        <div class="portfolio-expand">
                                            <a class="fancybox" href="images/includes/project8.jpg" title="Ion Template">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/green/images/includes/project8.jpg"
                                    alt="Ion Template">
                            </div>
                        </div> <!-- /.col-md-4 -->

                        <div class="portfolio-post col-sm-6 col-md-4">
                            <div class="thumb-post">
                                <div class="overlay">
                                    <div class="overlay-inner">
                                        <div class="portfolio-infos">
                                            <span class="meta-category">Branding</span>
                                            <h3 class="portfolio-title"><a href="project-slideshow.html">Freshness</a></h3>
                                        </div>
                                        <div class="portfolio-expand">
                                            <a class="fancybox" href="images/includes/project9.jpg" title="Freshness">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/green/images/includes/project9.jpg"
                                    alt="Freshness">
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div> <!-- /.portfolio-holder -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.related-projects -->


        <?php
    }
}