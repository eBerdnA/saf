<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<div id="comments">

  <h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>
    <?php foreach ($comments as $comment) : ?>      
        <?php $comment_type = get_comment_type(); ?>
        <?php if($comment_type == 'comment') { ?>                  
          <div class="singlecomment">
            <div class="commentcontent">
                <div class="commentauthor">
                  <?php comment_author_link() ?>
                </div>
                <div class="commenttext">
                  <?php comment_text() ?>
                </div>
            </div>
            <div class="commentmeta">
                <div class="commentmetacontent">
                    <a href="<?php comment_link() ?>">Link</a>
                </div>
            </div>
          </div>
        <?php } ?> 
    <?php endforeach; ?>
  
  <h3><?php echo get_trackback_count(); ?> Trackbacks</h3>
    <?php foreach ($comments as $comment) : ?>
        <?php $comment_type = get_comment_type(); ?>
        <?php if($comment_type != 'comment') { ?>
          <div class="singletrackback">            
              <?php comment_author_link() ?>
              <?php comment_text() ?>              
          </div>
        <?php } ?> 
    <?php endforeach; ?>
  </ul>  



<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Angemeldet als <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Abmelden">Abmelden &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(ben&ouml;tigt)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (wird nicht ver&ouml;ffentlicht) <?php if ($req) echo "(ben&ouml;tigt)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>

