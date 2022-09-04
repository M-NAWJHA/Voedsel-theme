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
<li><a><i class="fa fa-angle-double-right"></i> <?php single_cat_title('',true); ?> <?php post_type_archive_title(); ?></a></li>
</ul>
</div>
<br>
<br>
			<div class="row ourservices">
				<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="post" style="margin-bottom:20px;">
						<style>h3:after{display:none;}.thumbnail img{max-height:100%;}</style>
						<div class="thumbnail"style="float:right;margin-left:20px;width:250px;height:150px;">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if( get_post_meta($post->ID, 'cmb_videos_youtube', true) ) {
									$mqcontent = get_post_meta($post->ID, 'cmb_videos_youtube', true);
									$video_url = @parse_url($mqcontent);
									parse_str( @parse_url( $mqcontent, PHP_URL_QUERY ), $my_array_of_vars );
									$video =  $my_array_of_vars['v'] ;
									echo '<img src="https://i.ytimg.com/vi_webp/'.$video.'/sddefault.webp" alt="" />';
								}else{
									if ( has_post_thumbnail() ) { the_post_thumbnail( 'clients' ); }else{ get_my_thumbnail_me( get_the_id() ); }
								} ?>
							</a>
						</div>
						<h3 style="text-align:right;"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<p style="text-align:right;"><?php the_content_limit(500,''); ?></p>
						<div class="clearfix"></div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php else: ?>
	<section>
		<div class="container">
			<h1 class="maintitle"><a>لا يوجد محتوى لعملية البحث المطلوبة</a></h1>
			<div class="row">
				<div class="insidecontent">
				<p>نعتذر لك، ولكن لابد ان ما تبحث عنه غير موجود بالموقع..</p>
					<div class="clearfix"></div>
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
						<div>
							<input type="text" class="form-control input-lg" name="s" id="s" value="" placeholder="ادخل ما تريد البحث عنه.." />
							<input type="submit" class="btn btn-lg btn-warning" value="بحث"/>
						</div>
					</form>
				</div>
			</div>


			
</div>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>