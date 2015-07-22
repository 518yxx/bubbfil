<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Top Widget Template
 *
 *
 * @file           sidebar-top.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-top.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>
<?php
if( !is_active_sidebar( 'top-widget' )
) {
	return;
}
?>
<?php responsive_widgets_before(); // above widgets container hook ?>
	<div id="top-widget" class="top-widget">
		<?php $visitorNum = intval($wpdb->get_var("SELECT value FROM wp_mydata WHERE ID='visitors'"));
		if(isset($visitorNum)){
			if(!isset($_COOKIE["visited"])){
				$visitorNum++;
				$wpdb->update('wp_mydata', array('value' => ''.$visitorNum), array('ID' => 'visitors'));
			}
			$output = '<div class="pv-num">';
			if(qtrans_getLanguage() == 'zh'){
				$output .= '您是我们的第<em>'.$visitorNum.'</em>位访客';
			}else{
				$output .= 'You are our <em>'.$visitorNum.'th</em> Visitor';
			}
			$output .= '</div>';
			echo $output;
		}?>
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if( is_active_sidebar( 'top-widget' ) ) : ?>

			<?php dynamic_sidebar( 'top-widget' ); ?>

		<?php endif; //end of top-widget ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
	</div><!-- end of #top-widget -->
<?php responsive_widgets_after(); // after widgets container hook ?>