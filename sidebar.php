	<div id="sidebar">
        <div class="header">
            <a href="<?php echo get_settings('home'); ?>"><?php _e('Home') ?></a>
        </div>
        <div class="pages">
            <ul>
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

                    <!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
                    <li><h2><?php _e('Author') ?></h2>
                    <p>A little something about you, the author. Nothing lengthy, just an overview.</p>
                    </li>
                    -->

                    <?php wp_list_pages('title_li=&depth=2&sort_column=menu_order') ?>                    
              
                    <!-- <?php wp_list_pages('title_li=<h2>'.__('Pages').'</h2>' ); ?> -->			

                    <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
                    <!--<?php get_links_list(); ?> -->
                    <?php } ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="rss">
            <a href="<?php bloginfo('rss2_url'); ?>">RSS</a>
        </div>
        <div class="search">
            <?php  include (TEMPLATEPATH . "/searchform.php"); ?>
        </div>
    </div>

