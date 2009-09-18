<!-- This template has only been optimized for blog items. By default, this theme will link all other kinds of items link directly to the original source. -->

<div id="main_container">

	<p class="breadcrumb"><a href="<?php echo $this->config->item('base_url')?>">Home</a> &rsaquo; <?php echo $item->get_title()?></p>
				
	<div id="single_container">
		<h2><a href="<?php echo $item->get_permalink()?>"><?php echo $item->get_title()?></a></h2>
		<small><?php echo date('F j, Y g:i a', $item->get_date()); ?></small>
		<div><?php echo $item->get_content()?></div>

		<ul class="tag_list">
		<li>Tags: </li>
		<?php foreach ($item->get_tags() as $tag): ?>
			<li><a href="<?php echo $this->config->item('base_url')?>items/tag/<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
		<?php endforeach; ?>
		</ul>
		
		<!-- Insert comment script here -->
	</div>

</div>