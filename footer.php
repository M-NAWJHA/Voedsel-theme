<?php
/**
 * The template for displaying the footer
 *

 */
?>
</div><!-- .site-content -->
<footer>
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-4"><a href="<?php echo home_url( '/' ); ?>"><img class="logo" alt="<?php bloginfo('name'); ?>" src="<?php if(get_field_value('logo-f-upload')){ echo get_field_value('logo-f-upload');}else{ ?><?php bloginfo('template_directory'); ?>/images/logo-footer.png<?php } ?>" /></a><p class="about-f"><a href="#">About Us &gt;</a></p></div>
<div class="col-md-12 col-lg-4">
<h2>Quick Links</h2>
<ul class="link-q">
<?php
wp_nav_menu(
	array(
		'container'  => '',
		'items_wrap' => '%3$s',
		'theme_location' => 'QuickLinks',
	)
);
?>
</ul>
</div>
<div class="col-md-12 col-lg-4">
<h2>Get in Touch</h2>
<ul class="Touch">
<li><i class="fa fa-map-marker"></i> <?php echo get_field_value( 'localaddress' ); ?></li>
<li><i class="fa fa-phone"></i> <?php echo get_field_value( 'phonenum' ); ?></li>
<li><i class="fa fa-envelope"></i> <?php echo get_field_value( 'emailaddress' ); ?></li>
</ul>
</div>
</div>
</div>
<div class="copyright">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6"><h3><a href="<?php echo home_url( '/' ); ?>"> Copyright 	&#169; 2021 <?php bloginfo('name'); ?></a></h3></div>
<div class="col-md-12 col-lg-6"><h3><a href="http://moh.a0001.net" target="_blank">by : mohammed nawajha</a></h3></div>
</div>
</div>
</div>
</footer>
<script>
  // Initialize and add the map
  function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.036 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
</script>
<script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 3,
        itemsDesktop : [1199,2],
        itemsDesktopSmall : [2],
        itemsSmall : [1]

      });

    });
</script>
<script>
    $(document).ready(function(){
    $("#icon") .click(function(){
    $("ul").toggleClass("show");
      });
    });
</script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/fastclick.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/scroll.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/fixed-responsive-nav.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.bxslider.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/script.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/waypoints.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/owl.carousel.js"></script>
<?php wp_footer(); ?>

</body>
</html>
