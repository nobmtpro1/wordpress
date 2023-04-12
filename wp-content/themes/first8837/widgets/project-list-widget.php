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
class Elementor_project_list_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'project_list';
    }
    public function get_title()
    {
        return esc_html__('project_list', 'elementor-project-list-widget');
    }
    public function get_keywords()
    {
        return ['project list'];
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
            'title',
            [
                'label' => esc_html__('Title', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Our projects'
            ],
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $terms = get_terms([
            'taxonomy' => 'project_category',
            'hide_empty' => false,
        ]);
        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        // dd($term);

        $paged = intval($_GET['page']) ?? 1;
        $posts = new WP_Query([
            'posts_per_page' => 1,
            'post_type' => 'project',
            'paged' => $paged,
            'tax_query' => $term ? array(
                array(
                    'taxonomy' => 'project_category',
                    'field' => 'term_id',
                    'terms' => @$term->term_id,
                )
            ) : []
        ]);

        // dd($posts);
        ?>

        <div class="first-widget parallax" id="portfolio">
            <div class="parallax-overlay">
                <div class="container pageTitle">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h2 class="page-title">
                                <?= @$settings['title'] ?>
                            </h2>
                        </div> <!-- /.col-md-6 -->
                        <div class="col-md-6 col-sm-6 text-right">
                            <span class="page-location">Home / Portfolio</span>
                        </div> <!-- /.col-md-6 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div> <!-- /.parallax-overlay -->
        </div> <!-- /.pageTitle -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="filters" class="mixitup-controls">
                        <li class="filter" data-filter="all"><a href="<?= get_post_type_archive_link('project') ?>">All</a></li>
                        <?php foreach ($terms as $term): ?>
                            <li class="filter" data-filter="branding">
                                <a href="<?= get_term_link($term->term_id) ?>"><?= $term->name ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->


        <div class="container">
            <div class="row">
                <div class="portfolio-holder" id="Grid">


                    <?php
                    while ($posts->have_posts()):
                        $posts->the_post();
                        ?>
                        <div class="portfolio-post col-sm-6 col-md-4 mix illustration">
                            <div class="thumb-post">
                                <div class="overlay">
                                    <div class="overlay-inner">
                                        <div class="portfolio-infos">
                                            <span class="meta-category">
                                                <?= the_title() ?>
                                            </span>
                                            <h3 class="portfolio-title"><a href="project-slideshow.html">Visual Admin</a></h3>
                                        </div>
                                        <div class="portfolio-expand">
                                            <a class="fancybox" href="images/includes/project1.jpg" title="Visual Admin">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/green/images/includes/project1.jpg"
                                    alt="Visual Admin">
                            </div>
                        </div> <!-- /.col-md-4 -->
                        <?php
                    endwhile;
                    ?>
                </div> <!-- /.portfolio-holder -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="pages" style="color:black; display:flex; justify-content:center;">
                        <?php
                        $links = paginate_links([
                            'total' => $posts->max_num_pages,
                            'current' => max(1, intval($_GET['page']) ?? 1),
                            'prev_text' => __('<'),
                            'next_text' => __('>'),
                            'type' => 'array',
                            'format' => '?page=%#%',
                        ]); foreach ($links ?? [] as $link):
                            ?>
                            <li>
                                <?= $link ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

        <?php
    }
}