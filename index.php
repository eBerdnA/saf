<?php get_header(); ?>
  <?php get_sidebar(); ?>
  <div id="content">

    <?php if (have_posts()) : ?>
      
      <?php while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">
          <div class="posttitle">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
          </div>
          <div class="postentry">
            <?php the_content(__('Continue reading'). " &#8216;" . the_title('', '', false) . "&#8217; &raquo;"); ?>
          </div>

          <div class="postmetadata">
            <div class="time">
              <?php the_time(get_option('date_format').', '.get_option('time_format')) ?>
            </div>
            <div class="comment">    
              <?php if('open' == $post->comment_status) : ?>
                <?php comments_number('0 comments', '1 comment', '% comments' );?>
              <?php else : // comments are closed ?>
                &nbsp;
              <?php endif; ?>
            </div>
            <div class="clear"></div>
            <?php if (is_single()) : ?>
              <div class="catchphrases">
                <?php if( function_exists('the_tags') ) 
                  the_tags(__('Tags: '), ', ', '<br />'); 
                ?>
              </div>
            <?php endif; ?>            
            <div class="edit">
              <?php edit_post_link(__('Edit'), '', ''); ?>
            </div>
            <div class="clear"></div>
          </div>
        </div>        
        
        <?php if (is_single() or is_page()) : ?>
          <div id="backtoall">
            <a href="<?php echo get_settings('home'); ?>"><?php _e('← Back to all entries') ?></a>
          </div>
          <?php comments_template(); ?>
        <?php endif; ?>

      <?php endwhile; ?>
      <?php wp_pagenavi(); ?>
      
      <?php else : ?>
      <div class="post">
        <h2 class="posttitle"><?php _e('Not Found') ?></h2>
        <div class="postentry"><p><?php _e('Sorry, no posts matched your criteria.'); ?></p></div>
      </div>

    <?php endif; ?>    
    </div>
  <?php get_footer(); ?>

