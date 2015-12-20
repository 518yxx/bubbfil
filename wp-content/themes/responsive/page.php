<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Pages Template
 *
 *
 * @file           page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content">

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-header' ); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail() && get_post_meta(get_the_ID(),'hide-thumbnail',true) != "true") {
					echo '<div class="post-thumbnail">';				
						$thumb_id = get_post_thumbnail_id();
						$thumb_meta = wp_get_attachment_image_src( $thumb_id, 'full' );					
						echo '<div class="post-thumbnail"><img class="preload-me" src="'.$thumb_meta[0].'" width='.$thumb_meta[1].' height='.$thumb_meta[2].'/></div>';
					echo '</div>';
				} ?>

				<div class="page-con <?php if(!has_post_thumbnail() || get_post_meta(get_the_ID(),'hide-thumbnail',true) == "true") echo nothumb;?>">
					<?php responsive_entry_top(); ?>

					<?php /*get_template_part( 'post-meta-page' );*/ ?>

					<div class="post-entry">
						<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .post-entry -->
					<?php get_template_part( 'post-data' ); ?>

					<?php responsive_entry_bottom(); ?>
				</div><!-- end of page-con -->
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>
	<?php if(function_exists('the_views')) { the_views(true, '<div class="post-views">','</div>'); } ?>
	<div class="jiathis_style_24x24">
		<a class="jiathis_button_qzone"></a>
		<a class="jiathis_button_tsina"></a>
		<a class="jiathis_button_tqq"></a>
		<a class="jiathis_button_weixin"></a>
		<a class="jiathis_button_renren"></a>
		<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
		<a class="jiathis_counter_style"></a>
	</div>
</div><!-- end of #content -->
<?php
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/core/css/magnific-popup.css' );
	wp_enqueue_script( 'jiathis', 'http://v3.jiathis.com/code_mini/jia.js?uid=1410231344176213', true );
	wp_enqueue_script( 'popup-scripts',  get_template_directory_uri() . '/core/js/jquery.magnific-popup.min.js', array( 'jquery' ), true );
	wp_enqueue_script( 'user-scripts-popup',  get_template_directory_uri() . '/core/js/single.js', array( 'jquery' ), true );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
