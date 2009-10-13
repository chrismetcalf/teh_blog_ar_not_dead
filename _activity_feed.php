    <!-- Blog Items -->
    <?php if(( strpos($_SERVER["REQUEST_URI"], "/page/1") != false OR strpos($_SERVER["REQUEST_URI"], "/page/") == false) AND (!$query AND !$tag AND !$site)) : ?>
      <?php $my_blog_posts = $this->sweetcron->query_items('site', 'chrismetcalf.net', 3) ?>
      <div id="blog-items">
        <!-- The latest blog item -->
        <div id="latest">
          <?php if ($my_blog_posts): $i = 1; foreach ($my_blog_posts as $item): ?>
            <div id="<?= $i ?>">
            <h2><a href="<?= $item->get_original_permalink() ?>"><?= $item->get_title() ?></a></h2>
            <small><?= $item->get_human_date() ?> | <a href="<?= $item->get_original_permalink() ?>#comments">Comments</a></small>
            <p><?= word_limiter(strip_tags($item->get_content()), 50) ?></p>
            <p class="readmore"><a href="<?= $item->get_permalink() ?>">Read More</a></p>
            </div>

            <?php if ( $i == 3 ) break; ?>
          <?php $i++; endforeach; endif; ?>
        </div>

        <!-- Last 3 blog items -->
        <div id="recent">
          <h2><a href="<?= $this->config->item('base_url')."items/site/".$blog_domain; ?>">From the blog</a></h2>
          <ul>
            <?php if ($my_blog_posts): $i = 1; foreach ($my_blog_posts as $item): ?>

              <li>
                <h3><a href="#<?= $i; ?>" class="selected"><?= $item->get_title()?></a></h3>
                <small><?= date('F j, Y g:i a', $item->get_date()); ?></small>
              </li>

              <?php if ( $i == 3 ) break; ?>
            <?php $i++; endforeach; endif; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

    <!-- The bread crumb -->
    <?php if ( $query OR $tag OR $site ) : ?>
      <p class="home"><a href="<?= $this->config->item('base_url')?>">Home</a> &rsaquo; 
        <?php if ( $query ) : ?>
          Search Results: <?= $query; ?>
        <?php elseif ( $tag ) : ?>
          Tag: <?= $tag; ?>
        <?php elseif ( $site ) : ?>
          Site: <?= $site; ?>
        <?php endif; ?>
      </p>
    <?php endif; ?>

    <!-- All Items -->
    <ul id="items">
      <?php if ($items): $i = 1; foreach ($items as $item): ?>

        <!-- 4 items per row (probably best not to touch this) -->
        <?php 
        if ( $i % 4 == 1 )
          $isfirst = " first";
        else
          $isfirst = "";
        ?>

        <li class="item<?= $isfirst; ?>">

          <p class="meta" style="background: url('<?= $item->get_feed_icon()?>') no-repeat;"><a href="<?= $this->config->item('base_url')."items/site/".$item->get_feed_domain(); ?>"><?= $item->get_feed_domain(); ?></a> <?= $item->get_human_date() ?></p>

          <!-- If item is a blog item -->
          <?php if ($item->get_feed_domain() == str_replace("/","",str_replace("http://","",$this->config->item('base_url')))): ?>
            <div class="box blog">
              <p class="title"><a href="<?= $item->get_permalink()?>"><?= $item->get_title()?></a></p>
              <p class="content"><?= word_limiter(strip_tags($item->get_content()), 40)?></p>
            </div>

          <!-- If item comes from twitter.com -->
          <?php elseif ($item->get_feed_domain() == 'twitter.com'): ?>
            <div class="box twitter">
              <!-- 48x48 Twitter Profile Pic -->
              <img src="http://www.gravatar.com/avatar/7fc536d7ba50e1fc2deebaed2f1eab59?s=48" alt="Twitter" class="profile-pic" />
              <p class="content"><a href="<?= $item->get_original_permalink()?>"><?= $item->get_title()?></a></p>
            </div>

          <!-- If item comes from google.com (Google Reader shared items), digg.com, stumbleupon.com -->
          <?php elseif ($item->get_feed_domain() == 'google.com' OR $item->get_feed_domain() == 'digg.com' OR $item->get_feed_domain() == 'stumbleupon.com'): ?>
            <div class="box gen">
              <p class="title"><a href="<?= $item->get_original_permalink()?>"><?= $item->get_title()?></a></p>
              <p class="content"><?= word_limiter(strip_tags($item->get_content()), 40)?></p>
            </div>

          <!-- If item has a video -->
          <?php elseif ($item->has_video()): ?>
            <div class="box video">
              <?= $item->get_video()?>
              <p class="content"><a href="<?= $item->get_original_permalink()?>"><?= word_limiter(strip_tags($item->get_content()), 5)?></a></p>
            </div>

          <!-- If item has a photo -->
          <?php elseif ($item->has_image() && !$item->has_video()): ?>
            <?php if ( $item->get_feed_domain() == 'flickr.com' ) : ?>
              <div class="box photo" style="background: url('<?= $item->item_data['flickr_com']['image']['m']?>') center center no-repeat;">
            <?php else : ?>
              <div class="box photo" style="background: url('<?= $item->get_image(); ?>') center center no-repeat;">
            <?php endif; ?>
              <p class="content"><strong><a href="<?= $item->get_original_permalink()?>"><?= $item->get_title()?></a></strong><br /><?= word_limiter(strip_tags($item->get_content()), 20)?></p>
            </div>

          <!-- If item doesn't fall into any of the above groups -->
          <?php else: ?>
            <div class="box gen">
              <p class="title"><a href="<?= $item->get_original_permalink()?>"><?= $item->get_title()?></a></p>
              <p class="content"><?= word_limiter(strip_tags($item->get_content()), 40)?></p>
            </div>
          <?php endif; ?>
        </li>
      <?php $i++; endforeach; endif; ?>

    </ul>

    <p id="pagination">Pages: <?= $pages?></p>
