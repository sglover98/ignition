<?php
/**
 * The template for displaying all single posts.
 *
 * @package pro
 */

get_header(); ?>
	
	
	<?php if( get_option( 'page_for_posts' ) ) : $cover_page = get_page( get_option( 'page_for_posts' ) ); ?>
		
		<?php if(!get_post_meta($cover_page->ID, 'progression_studios_disable_page_title', true)): ?>
		<div id="page-title-pro" class="page-title-pro-post-page">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php echo get_the_title($cover_page); ?></h1>
					<?php if(get_post_meta($cover_page->ID, 'progression_studios_sub_title', true)): ?><h4 class="progression-sub-title"><?php echo wp_kses( get_post_meta($cover_page->ID, 'progression_studios_sub_title', true) , true); ?></h4><?php endif; ?>
					<?php if(function_exists('bcn_display')) { echo '<ul id="breadcrumbs-progression-studios"><li><a href="'; echo esc_url( home_url( '/' ) ); echo '"><i class="fa fa-home"></i> </a></li>'; bcn_display_list(); echo '</ul>'; }?>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
		<?php endif; ?>
		
	<?php else: ?>
		<div id="page-title-pro" class="page-title-pro-post-page">
			<div class="width-container-pro">
				<div id="progression-studios-page-title-container">
					<h1 class="page-title"><?php esc_html_e( 'Latest News', 'multifondo-progression' ); ?></h1>
				</div><!-- #progression-studios-page-title-container -->
				<div class="clearfix-pro"></div>
			</div><!-- close .width-container-pro -->
		</div><!-- #page-title-pro -->
	<?php endif; ?>
	
	
	
	<div id="content-pro" class="site-content-blog-post <?php if(get_post_meta($post->ID, 'progression_studios_group_552033a9a46bc', true)): ?>disable-sidebar-post-progression<?php endif; ?>">

		<div class="width-container-pro <?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar') == 'left') : ?> left-sidebar-pro<?php endif; ?>">
				
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') == 'left') : ?><div id="main-container-pro"><?php endif; ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
					
					
					<?php get_template_part( 'template-parts/content', 'single' ); ?>
					
					<?php endwhile; // end of the loop. ?>
					
				<?php if ( get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='right' || get_theme_mod( 'progression_studios_blog_post_sidebar', 'right') =='left') : ?></div><!-- close #main-container-pro --><?php get_sidebar(); ?><?php endif; ?>

				
		<div class="clearfix-pro"></div>
		</div><!-- close .width-container-pro -->
		
		
	</div><!-- #content-pro -->
		

<?php get_footer(); ?>