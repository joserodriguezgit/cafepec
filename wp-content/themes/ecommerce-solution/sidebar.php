<?php
/**
 * The Sidebar containing the main widget areas.
 * @package Ecommerce Solution
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="search" class="widget" role="complementary" aria-label="firstsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'ecommerce-solution' ); ?></h3>
            <?php get_search_form(); ?>
        </aside>
        <aside id="categories-dropdown" class="widget" role="complementary" aria-label="secondsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Dropdown Categories', 'ecommerce-solution' ); ?></h3>
            <ul>
                <?php wp_dropdown_categories('title_li=');  ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="thirdsidebar" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'ecommerce-solution' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="forthsidebar" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'ecommerce-solution' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
        <aside id="tag-cloud" class="widget" role="complementary" aria-label="fifthsidebar">
            <h3 class="widget-title"><?php esc_html_e( 'Tag Cloud', 'ecommerce-solution' ); ?></h3>
            <ul>
                <?php wp_tag_cloud('title_li=');  ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>