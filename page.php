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
<div class="postthumb col-md-8">
<?php if ( has_post_thumbnail() ) { echo '<div align="center" style="margin-bottom:20px;">'; the_post_thumbnail( 'postthumb' ); echo '</div>'; } ?>
<?php the_content(); ?>
</div>
<?php endwhile; ?>
</div>	
</div>
</div>
</div>
</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>