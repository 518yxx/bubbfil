<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           archive.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/archive.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-archive">
	<?php if(is_category('2')){ ?>
		<div class="cat-item item-award">
			<a href="http://www.bubbfil.com/?page_id=593">奖项荣誉</a>
		</div>
		<div class="cat-item item-servie">
			<a href="http://www.bubbfil.com/?page_id=87">服务范围</a>
		</div>
		<div class="cat-item item-work">
			<a href="http://www.bubbfil.com/?page_id=334">工作条件</a>
		</div>
	<?php }else{
		$cat = get_query_var('cat');
		if($cat == 5 || get_category($cat)->category_parent == 5){
			dynamic_sidebar('left-sidebar');
		}
		if($cat == 5){ ?>
			<div class="video-box">
				<video width="320" height="240" controls>
				  <source src="/wp-content/uploads/user/bubbfil.jpg" type="video/mp4">
				</video>
			</div>
	<?php }}?>

	<?php if($cat != 5 && $cat != 2 && have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php responsive_entry_before(); ?>

			<?php if($cat == 5 || get_category($cat)->category_parent == 5){
				echo '<div class="post-width-sidebar">';
			}?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php /*responsive_entry_top(); ?>

					<?php get_template_part( 'post-meta' ); ?>

					<div class="post-entry">
						<?php if( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
							</a>
						<?php endif; ?>
						<?php the_excerpt(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .post-entry -->

					<?php get_template_part( 'post-data' ); */?>
				
					<div class="post-entry">
						<?php if( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>" class="thumbnail-container" title="<?php the_title_attribute(); ?>">
								<?php if($cat == 5 || get_category($cat)->category_parent == 5){
									the_post_thumbnail('medium', array( 'class' => 'alignleft' ));
								}else{
									the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); 
								}?>
							</a>
						</div>
						<?php endif; ?>
						<div class="post-excerpt">
							<a href="<?php echo get_permalink(); ?>"><?php the_title( "<h4>", "</h4>" ); ?></a>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<!-- end of .post-entry -->
					<?php responsive_entry_bottom(); ?>
				</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php if($cat == 5 || get_category($cat)->category_parent == 5){
				echo '</div>';
			}?>
			<?php responsive_entry_after(); ?>
		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	endif;
	?>

</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
