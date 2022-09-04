<?php get_header(); ?>
<?php if (have_posts()) : ?>
<section class="post">
<div class="container">
<div class="row">
<div class="col-md-10">
<div class="post-box">
<div class="maintitle">
<ul>
<li class="active"><a href="<?php echo home_url( '/' ); ?>"><i class="fa fa-home"></i></a></li>
<li><a><i class="fa fa-angle-double-right"></i> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
</ul>
</div>
<?php while (have_posts()) : the_post(); ?>
<div class="postthumb col-md-8"><?php if ( has_post_thumbnail() )  { the_post_thumbnail( 'postthumb' ); } ?></div>
<div class="postsingular col-md-10">		
				<?php if(is_singular('gallery')){ ?>
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
						<div class="slides"></div>
						<h3 class="title"></h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
					<?php
					$images = get_post_meta( $post->ID, 'cmb_gallery_gallery', true );
					if ( $images ) {
						echo '<div id="links" class="postthumbnails text-center">';
						foreach ( $images as $attachment_id => $img_full_url ) {
							$small = wp_get_attachment_link($attachment_id, array(100,75));
							$full = wp_get_attachment_link($attachment_id, 'full');
							echo $small;
						}
						echo '</div>';
					}
					?>
					<?php if(is_single()){ ?>
						<script src="<?php bloginfo('template_directory'); ?>/js/blueimp-gallery.min.js"></script>
					<?php } ?>
					<?php if(is_single()){ ?>
					<script>
					document.getElementById('links').onclick = function (event) {
						event = event || window.event;
						var target = event.target || event.srcElement,
						link = target.src ? target.parentNode : target,
						options = {index: link, event: event},
						links = this.getElementsByTagName('a');
						blueimp.Gallery(links, options);
					};
					</script>
					<?php } ?>
				<?php } ?>
				<?php if(is_singular('videos')){ ?>
					<?php if( get_post_meta($post->ID, 'cmb_videos_youtube', true) ) {
						$mqcontent = get_post_meta($post->ID, 'cmb_videos_youtube', true);
						$video_url = @parse_url($mqcontent);
						parse_str( @parse_url( $mqcontent, PHP_URL_QUERY ), $my_array_of_vars );
						$video =  $my_array_of_vars['v'] ;
						echo '<iframe width="100%" height="450" src="http://www.youtube.com/embed/'.$video.'?rel=0" frameborder="0" allowfullscreen></iframe>';
					} ?>
				<?php } ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
</div>	
</div>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>