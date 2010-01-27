<?php

//drupal_rebuild_theme_registry();



/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}

function albert_theme(){
	return array(
    // The hook or form id in this case.    
    'comment_block' => array(      
      'arguments' => ''
    ),    
    'recent_bookmarks_block' => array(      
      'arguments' => array('items' => array()),
    ),    
  );	
}


/**
 * Returns a formatted list of recent comments to be displayed in the comment block.
 *
 * @return
 *   The comment list HTML.
 * @ingroup themeable
 */
function albert_comment_block() {
  $items = array();
  $output = "<table>";
  foreach (comment_get_recent(15) as $comment) {
  	//print_r($comment);
  	$fullComment = _comment_load($comment->cid);
  	//print_r($fullComment);
  	if($fullComment->uid!="0"){
  		$user = user_load($fullComment->uid);
  		$username = $user->name;
  	}else{
  		$username = $fullComment->name;
  	}
  	$output .= "<tr>";
  	$output .= "<td class='first-row'>";
  	$output .= $username;
  	$output .= "</td>";
  	$output .= "<td class='second-row'>";
    $output .= l($comment->subject, 'node/'. $comment->nid, array('fragment' => 'comment-'. $comment->cid));
    $output .= "</td>";
    $output .= "<td class='third-row'>";
    //$output .= format_date($comment->timestamp, "large");
  	$output .= "</td>";    
    $output .= "</tr>";
  }
  $output .= "</table>";
  return $output;
}

function albert_recent_bookmarks_block($items){
	
	$output = "";
	
	$output .= "<table>";
	foreach ($items as $item){
		$output .= "<tr>";
  	$output .= "<td class='first-row'>";
  	$output .= feedimporter_get_domain($item["url"]);
  	$output .= "</td>";
  	$output .= "<td class='second-row'>";
    $output .= l($item["title"], "node/".$item["nid"], array("absolute" => true));
    $output .= "</td>";
    $output .= "<td class='third-row'>";
    $output .= ""; //format_date($comment->timestamp, "large");
  	$output .= "</td>";    
    $output .= "</tr>";
	}
	$output .= "</table>";
	return $output;
	
}