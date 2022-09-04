<?php
/**
 * The template for displaying the header
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/animate.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/normalize.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/custom.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/normalize.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/media.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--font-->
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<!--js-->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
      (() => {
        "use strict";
        var e = {
            d: (o, t) => {
              for (var r in t)
                e.o(t, r) &&
                  !e.o(o, r) &&
                  Object.defineProperty(o, r, { enumerable: !0, get: t[r] });
            },
            o: (e, o) => Object.prototype.hasOwnProperty.call(e, o),
            r: (e) => {
              "undefined" != typeof Symbol &&
                Symbol.toStringTag &&
                Object.defineProperty(e, Symbol.toStringTag, {
                  value: "Module",
                }),
                Object.defineProperty(e, "__esModule", { value: !0 });
            },
          },
          o = {};
        function t() {
          const e = { lat: -25.344, lng: 131.036 },
            o = new google.maps.Map(document.getElementById("map"), {
              zoom: 4,
              center: e,
            });
          new google.maps.Marker({ position: e, map: o });
        }
        e.r(o), e.d(o, { initMap: () => t });
        var r = window;
        for (var n in o) r[n] = o[n];
        o.__esModule && Object.defineProperty(r, "__esModule", { value: !0 });
      })();
    </script>
<?php wp_head(); ?>
</head>

<body>
<header id="haeder">
<div class="topbar">
<div class="container">
<div class="row">
<!--Contact-topbar -->
<div class="col-md-12 col-lg-8">
<ul class="Contact-topbar">
<li><i class="fa fa-phone"></i> <?php echo get_field_value( 'phonenum' ); ?></li>
<li><i class="fa fa-envelope"></i> <?php echo get_field_value( 'emailaddress' ); ?></li>
</ul>
</div>
</div></div></div>
<nav>
<div class="container">
<div class="row">
<div class="col-md-2"><label id="icon"><i class="fa fa-bars"></i></label>
<div class="logo"><a href="<?php echo home_url( '/' ); ?>"><img alt="<?php bloginfo('name'); ?>" src="<?php if(get_field_value('logo-upload')){ echo get_field_value('logo-upload');}else{ ?><?php bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" /></a></div> </div>
<div class="col-md-10">
<!--menu-->
<div class="menu">
<ul>
<?php
wp_nav_menu(
	array(
		'container'  => '',
		'items_wrap' => '%3$s',
		'theme_location' => 'primary',
	)
);
?>
</ul>
</div>
</div>
</div></div></nav>
</header><!-- .site-header -->

