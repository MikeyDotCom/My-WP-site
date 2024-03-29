<?php /**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="smplclssc_main">
 *
 * @subpackage Simple_Classic
 * @since Simple Classic
 */ ?>
<!DOCTYPE html>
<!--[if IE 7]>
	<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if lt IE 9]>
	<html class="ie9" <?php language_attributes(); ?>>
	<script src="http://ie7-js.googlecode.com/svn/trunk/lib/IE9.js"></script>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
 <html <?php language_attributes(); ?> >
 <!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="smplclssc_main-container">
		<div id="smplclssc_header">
			<div id="smplclssc_wrap-head">
				<div id="smplclssc_head">
					<hgroup id="smplclssc_preheader">
						<h1 id="smplclssc_site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 id="smplclssc_site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup><!-- #smplclssc_preheader -->
					<div id="nav">
						<?php wp_nav_menu(
							array( 
								'theme_location'  => 'primary',
								'container'       => '<div>',
								'container_id'    => 'nav',
							) 
						); ?>
					</div><!-- #smplclssc_nav -->
				</div><!-- #smplclssc_head -->
			</div><!-- #smplclssc_wrap-head -->
			<div id="smplclssc_header-image">
				<?php /* Check to see if the header image has been removed */
				$header_image = get_header_image();
				if ( $header_image ) :
					/* We need to figure out what the minimum width should be for our featured image. */
					/* This result would be the suggested width if the theme were to implement flexible widths. */
					$header_image_width = get_theme_support( 'custom-header', 'width' ); ?>
				<div id="smplclssc_wrap-img">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php /* The header image
							   * Check if this is a post or page, if it has a thumbnail, and if it's a big one */
						if ( is_singular() && has_post_thumbnail( $post->ID ) &&
								( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
								$image[1] >= $header_image_width ) :
							/* Houston, we have a new header image! */
							echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
						else :
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height; ?>
						<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
						<?php endif; /* End check for featured image or standard header */ ?>
					</a>
				</div><!-- smplclssc_wrap-img -->
			<?php endif; /* End check for removed header image */ ?>
			</div><!-- #smplclssc_header-image -->
			<div id="smplclssc_quotes-and-tips">
				<?php if( function_exists( 'qtsndtps_get_random_tip_quote' ) ) qtsndtps_get_random_tip_quote(); ?>
			</div><!-- #smplclssc_quotes-and-tips -->
			<div id="smplclssc_wrap-headline-bar">
				<div id="smplclssc_headline-bar">
					<hgroup id="smplclssc_headline-hgroup">
						<!--<h1><?php _e( 'Welcome to our blog!', 'simpleclassic' ); ?></h1>-->
						<?php echo apply_filters( 'simpleclassic_navigation', 'simpleclassic_navigation' );//simpleclassic_navigation(); ?>
					</hgroup>
					<div id="smplclssc_search">
						<?php get_search_form(); ?>
					</div><!-- #smplclssc_search -->
				</div><!-- #smplclssc_headline-bar -->
			</div><!-- #smplclssc_wrap-headline-bar -->
		</div><!-- #smplclssc_header -->
		<div id="smplclssc_main">
