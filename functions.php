<?php

add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	global $id;
	$comments = get_approved_comments($id);
	$comment_count = 0;
	foreach($comments as $comment){
		if($comment->comment_type == ""){
			$comment_count++;
		}
	}
	return $comment_count;
}

function get_trackback_count() {
  global $id;
	$comments = get_approved_comments($id);
  $trackback_count = 0;
	foreach($comments as $comment){
    if($comment->comment_type != '') {
      $trackback_count++;
    }
  }
  return $trackback_count;
}

?>