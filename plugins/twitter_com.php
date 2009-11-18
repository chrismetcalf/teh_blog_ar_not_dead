<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Twitter_com {
  // http://github.com/chrismetcalf's hacked version of the twitter plugin

  function pre_db($item, $original) {
    $original_publisher = $original->get_permalink();
    $twitter_username = explode('/', $original_publisher);
    $twitter_username = $twitter_username[3];

    // Remove username from front of posts
    $item->item_title = trim(str_replace($twitter_username.':', '', $item->item_title));

    // Filter out @replies (set as unpublished)
    if (substr($item->item_title, 0, 1) == '@') {
      $item->item_status = 'draft';
    }

    // Turn image links into image attachments
    //if(preg_match("{http://twitpic.com/(\w+)}i", $item->item_title, $matches) {
    //  $item->item_data['image'] = "http://twitpic.com/show/mini/$matches[1]";
    //}

    // Remove item_content as it's just the same as the title anyway
    $item->item_content = '';
    return $item;
  }

  function pre_display($item) {
    // Turn image links into image attachments
    //$matches = new Array();
    //if(preg_match("{http://twitpic.com/(\w+)}i", $item->item_title, $matches) {
    //  $item->item_data['image'] = "http://twitpic.com/show/mini/$matches[1]";
    //}

    // Turn @username links into actual links
    preg_replace("{@(\w+)}", "<a href=\"http://twitter.com/$1\">@$1</a>", $item->item_data['title']);

    return $item;
  }


}
?>
