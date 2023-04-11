<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor header Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_header_Widget extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'header';
    }
    public function get_title()
    {
        return esc_html__('header', 'elementor-header-widget');
    }
    public function get_keywords()
    {
        return ['header'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-header-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo',
            [
                'label' => esc_html__('Logo', 'elementor-header-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ],
        );

        $this->end_controls_section();

    }

    public function wp_get_menu_array($current_menu = 'Menu')
    {
        // dd($current_menu . get_locale());
        $term = get_term_by('name', $current_menu, 'nav_menu');
        $menu_id = $term->term_id;
        $menu_array = wp_get_nav_menu_items($menu_id);
        if (!$menu_array) {
            return [];
        }
        // dd($menu_array);
        $menu = array();

        function populate_children($menu_array, $menu_item)
        {
            $children = array();
            if (!empty($menu_array)) {
                foreach ($menu_array as $k => $m) {
                    if ($m->menu_item_parent == $menu_item->ID) {
                        $children[$m->ID] = array();
                        $children[$m->ID]['ID'] = $m->ID;
                        $children[$m->ID]['title'] = $m->title;
                        $children[$m->ID]['url'] = $m->url;
                        unset($menu_array[$k]);
                        $children[$m->ID]['children'] = populate_children($menu_array, $m);
                    }
                }
            }
            ;
            return $children;
        }

        foreach ($menu_array as $m) {
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = $m->ID;
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['children'] = populate_children($menu_array, $m);
            }
        }

        return $menu;

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $menu = $this->wp_get_menu_array();
        global $post;
        // dd(($post));
        ?>
        <div class="responsive_menu">
            <ul class="main_menu">
                <li><a href="<?= home_url() ?>">Home</a></li>
                <li><a href="#">Portfolio</a>
                    <ul>
                        <li><a href="portfolio.html">Portfolio Grid</a></li>
                        <li><a href="project-image.html">Project Image</a></li>
                        <li><a href="project-slideshow.html">Project Slideshow</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a>
                    <ul>
                        <li><a href="blog.html">Blog Standard</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="#">visit templatemo</a></li>
                    </ul>
                </li>
                <li><a href="archives.html">Archives</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul> <!-- /.main_menu -->
        </div> <!-- /.responsive_menu -->

        <header class="site-header clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left logo">
                            <a href="<?= home_url() ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/green/images/logo.png"
                                    alt="Medigo by templatemo">
                            </a>
                        </div> <!-- /.logo -->
                        <div class="main-navigation pull-right">
                            <nav class="main-nav visible-md visible-lg">
                                <ul class="sf-menu">
                                    <?php foreach ($menu as $item1): ?>
                                        <li class="<?php if (is_page($item1['title'])) {
                                            echo 'active';
                                        }
                                        if ($post->post_type == 'post' && $item1['title'] == 'Blogs') {
                                            echo 'active';
                                        }
                                        ?>">
                                            <a href="<?= $item1['url'] ?>">
                                                <?= $item1['title'] ?>
                                            </a>
                                            <?php if (count($item1['children']) > 0): ?>
                                                <ul>
                                                    <?php foreach ($item1['children'] as $item2): ?>
                                                        <li class="">
                                                            <a href="<?= $item2['url'] ?>">
                                                                <?= $item2['title'] ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul> <!-- /.sf-menu -->
                            </nav> <!-- /.main-nav -->
                            <!-- This one in here is responsive menu for tablet and mobiles -->
                            <div class="responsive-navigation visible-sm visible-xs">
                                <a href="#nogo" class="menu-toggle-btn">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /responsive_navigation -->
                        </div> <!-- /.main-navigation -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </header> <!-- /.site-header -->


        <!-- <?php foreach ($menu as $item1): ?>
                        <li class="menu-item">
                            <a href="<?= $item1['url'] ?>"
                                class="menu-link <?php if (count($item1['children']) > 0): ?>arrow<?php endif; ?>">
                                <?= $item1['title'] ?>
                            </a>
                            <?php if (count($item1['children']) > 0): ?>
                                <ul class="menu2">
                                    <?php foreach ($item1['children'] as $item2): ?>
                                        <li class="menu-item2">
                                            <a href="<?= $item1['url'] ?>" class="menu-link2">
                                                <?= $item2['title'] ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?> -->
        <?php
    }
}