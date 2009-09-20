<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="description" content="" />
    <title><?php echo $page_name?> &rsaquo; <?php echo $this->config->item('lifestream_title')?></title>
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url')?>public/css/reset.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $this->config->item('theme_folder')?>style.css" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php echo $this->config->item('base_url')?>feed" />

    <!--[if lt IE 7]>
    <script defer type="text/javascript" src="<?php echo $this->config->item('theme_folder')?>js/pngfix.js"></script>    
    <![endif]-->

    <script type="text/javascript" src="<?php echo $this->config->item('theme_folder')?>js/jquery.js"></script>

    <!-- jQuery for expandable profile section -->
    <script type="text/javascript">
    $(document).ready(function(){

      $(".accordion div#profile:first").hide();
      $(".accordion div#profile:not(:first)").hide();

      $(".accordion div#header").click(function(){

        $(this).next("div#profile").slideToggle("slow")
        .siblings("div#profile:visible").slideUp("slow");
        $(this).toggleClass("active");
        $(this).siblings("div#header").removeClass("active");

      });

    });

    $(document).ready(function(){

      $(".item div").click(function(){
        window.location=$(this).find("a").attr("href"); return false;
      });

    });

    <!-- jQuery for recent blog items -->
    $(function () {
      var tabContainers = $('div#blog-items > div#latest > div');

      $('div#blog-items div#recent ul a').click(function () {
        tabContainers.hide().filter(this.hash).show();

        $('div#blog-items div#recent ul a').removeClass('selected');
        $(this).addClass('selected');

        return false;
      }).filter(':first').click();
    });

    </script>

  </head>

  <body>

<div class="accordion">
  <div id="header-titles">    
    <div class="container">
    <h1 id="site-title" style="background:url('<?php echo $this->config->item('base_url')?>favicon.ico') no-repeat;"><a href="<?php echo $this->config->item('base_url')?>"><?php echo $this->config->item('lifestream_title')?></a></h1>

    <!-- Enter your RSS Feed URL here -->
    <p id="rss-feed">Subscribe by <a href="#RSSFEED">RSS</a> | <a href="#EMAILFEED" target="_blank">Email</a></p>

    </div>
  </div>
  <div id="header">
    <div id="learn" class="container">
    <p id="toggle">&nbsp;</p>
    </div>    
  </div>
  <div id="profile">
    <div class="container">
    <div class="wrap">

    <!-- 120x172 Profile Picture -->
    <img src="<?php echo $this->config->item('theme_folder')?>i/profile_image.jpg" alt="<?php echo $this->config->item('lifestream_title')?>" id="profile-pic" />
    <div id="profile-about">

      <!-- Enter your profile description here -->
      <h2 id="profile-title">About <?php echo $this->config->item('lifestream_title')?></h2>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus in enim sed sapien semper venenatis. Nam tincidunt interdum ligula. Phasellus pretium lacus ut neque. Donec facilisis, dolor ac mattis congue, est pede consectetuer elit, in sodales diam augue in leo. Donec lectus erat, ultricies vitae, pretium sit amet, eleifend quis, sapien. Vestibulum diam. Quisque ullamcorper, metus sit amet pellentesque viverra, eros dui feugiat nunc, eu pretium tellus eros vel odio.</p>

    </div>
    <div id="profile-feeds">
      <h2 id="my-feeds">Contact Me</h2>

      <!-- Enter your contact links here -->
      <p class="twitter"><a href="http://www.twitter.com/chrismetcalf">Follow me on Twitter</a></p>
      <p class="facebook"><a href="http://www.facebook.com/chrismetcalf">Add me on Facebook</a></p>
      <p class="linkedin"><a href="http://www.linkedin.com/in/chrismetcalf">Connect on LinkedIn</a></p>
    </div>
    <div id="profile-tags">
      <ul>
        <li>My tags:</li>
        <?php foreach($popular_tags as $tag): ?>
        <li><a href="<?php echo $this->config->item('base_url')?>items/tag/<?php echo $tag->slug?>"><?php echo strtolower($tag->name)?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <form id="search_form" method="post" action="<?php echo $this->config->item('base_url')?>items/do_search">
    <p>Search</p>
    <p><input type="text" name="query" class="text_input" value="<?php if (isset($query)): echo $query; endif;?>" /><input id="submit" type="submit" value="Search" /></p>
    </form>
    </div>
    </div>
  </div>
</div>

<div class="container">

  <div id="body">
