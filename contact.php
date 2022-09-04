<?php
get_header(); ?>
<!--slider section-->
<section id="home" class="slider">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="container">
<!--slider1-->
<div class="carousel-inner">
 <div class="carousel-item active">
<div class="row">
<div class="col-md-12 col-lg-7 os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<img class="icon-sl" src="<?php echo get_field_value( 'sl1-img' ); ?>" alt="" />
</div>
<div class="col-md-12 col-lg-5  os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<h2><?php echo get_field_value( 'sl1-h4' ); ?></h2>
<p><?php echo get_field_value( 'sl1-p' ); ?></p>
<button><a href="<?php echo get_field_value( 'sl1-link' ); ?>">LEARN MORE </a></button>
</div>
</div>
</div>
<!--slider2-->
<div class="carousel-item">
<div class="row">
<div class="col-md-12 col-lg-7 os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<img class="icon-sl" src="<?php echo get_field_value( 'sl2-img' ); ?>" alt="" />
</div>
<div class="col-md-12 col-lg-5  os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<h2><?php echo get_field_value( 'sl2-h4' ); ?></h2>
<p><?php echo get_field_value( 'sl2-p' ); ?></p>
<button><a href="<?php echo get_field_value( 'sl2-link' ); ?>">LEARN MORE </a></button>
</div>
</div>
</div>
<!--slider3-->
<div class="carousel-item">
<div class="row">
<div class="col-md-12 col-lg-7 os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<img class="icon-sl" src="<?php echo get_field_value( 'sl3-img' ); ?>" alt="" />
</div>
<div class="col-md-12 col-lg-5  os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<h2><?php echo get_field_value( 'sl3-h4' ); ?></h2>
<p><?php echo get_field_value( 'sl3-p' ); ?></p>
<button><a href="<?php echo get_field_value( 'sl2-link' ); ?>">LEARN MORE </a></button>
</div>
</div>
</div>
  </div>
</div>
<!-- Carousel controls -->
<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
<span class="carousel-control-prev-icon"></span></a>
<a class="carousel-control-next" href="#myCarousel" data-slide="next">
<span class="carousel-control-next-icon"></span></a>
</div>
</section>
<!--about us-->
<section id="about" class="about">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6  os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<h2><?php echo get_field_value( 'home-aboutus-h4' ); ?></h2>
<p><?php echo get_field_value( 'home-aboutus-p' ); ?></p>
<a href="<?php echo get_field_value( 'home-aboutus-link' ); ?>">About Us &gt;</a>
</div>
<div class="col-md-12 col-lg-6 os-animation" data-os-animation="zoomInLeft" data-os-animation-delay="0.3s">
<img class="about-img" src="<?php echo get_field_value( 'home-aboutus-img' ); ?>" alt="" /></div>
</div>
</div>
</section>
<!--Our Products-->
<section id="Products" class="Products">
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Our Products</h2>
<p>We specialise in intelligent & effective Search and believes in the power of partnerships to grow business.</p>
<span class="span1"></span>
</div>
<?php
$query_Products = new WP_Query(
	array(
		'post_type' => 'Products',
		'posts_per_page' => '8',
	)
);
?>
<?php if ( $query_Products->have_posts() ) { ?>
<div class="col-md-12">
<div id="owl-demo"> 
<?php while($query_Products->have_posts()) : $query_Products->the_post(); ?>    
<div class="item box-Products">
<div><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
<h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a</h4>
<p><?php the_content_limit(200,''); ?></p> <a href="<?php the_permalink(); ?>">READ MORE &gt;</a>
</div>
<?php $Productsnumber++; ?>
<?php endwhile; ?>
</div>
</div>
<?php
	}
	wp_reset_postdata();
?>
</div>
</div>
</div>
</div>
</section>
<!--Offer-->
<section id="Offer" class="BeNatural">
<div class="container">
<div class="row">
<div class="col-md-5">
<img src="<?php echo get_field_value( 'home-Offer-img' ); ?>" alt="">
</div>
<div class="col-md-7 BeNatural-r">
<h2><i class="fa fa-bookmark"></i> <?php echo get_field_value( 'home-Offer-h2' ); ?></h2>
<div>
<h4><?php echo get_field_value( 'home-Offer1-h4' ); ?></h4>
<p><?php echo get_field_value( 'home-Offer1-p' ); ?></p>
</div>
<div>
<h4><?php echo get_field_value( 'home-Offer2-h4' ); ?></h4>
<p><?php echo get_field_value( 'home-Offer2-p' ); ?></p></div>
<h4><a href="<?php echo get_field_value( 'home-Offer-More' ); ?>">More &gt; &gt;</a></h4>
</div>
</div>
</div>
</section>
<!--contact-->
<section class="contact" id="contact">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6">
<div class="h2-contact os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s"><h2><i class="fa fa-envelope-o "></i>  CONTACT US</h2></div>
<span></span>
<div id="contact-form" class="contact-form os-animation" data-os-animation="bounceIn" data-os-animation-delay="0.3s"><?php echo do_shortcode( '[contact-form-7 id="51" title="Contact form 1"]' ); ?></div>
</div>
<div class="col-md-6">
<iframe src="<?php echo get_field_value( 'googlemapaddress' ); ?>" id="map"></iframe>
</div>
</section>

<?php get_footer(); ?>
