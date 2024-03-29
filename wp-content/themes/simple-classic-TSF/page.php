<?php 
/**
 * The template for displaying all pages.
 *
 * @subpackage Simple_Classic
 * @since Simple Classic
 */

get_header(); ?>
	<div id="smplclssc_content">
		<?php if( have_posts() ) :
			while( have_posts() ) : the_post(); ?>
				<h1 class="smplclssc_titleinmain"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p><?php the_content(); ?></p>
				<?php if( has_tag() ) : ?>
					<div class="smplclssc_tags">
						<p><?php the_tags(); ?></p>
					</div>
				<?php endif; ?>
				<div class="smplclssc_post-border">
					<?php wp_link_pages( 
						array( 
							'before' => '<div class="smplclssc_page-links"><span>'.__( 'Pages: ', 'simpleclassic' ).'</span>',
							'after'  => '</div>'
						) 
					); ?>
				</div><!-- .smplclssc_post-border -->
				<?php if ( comments_open( get_the_ID() ) ) :
					comments_template();
				endif;
			endwhile;
		endif; ?>
	</div><!-- #smplclssc_content -->
<?php get_sidebar();
get_footer(); ?>
