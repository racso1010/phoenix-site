<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer bg-transparent" role="contentinfo">
		<div class="container pt-1 pb-4">
            <div class="site-info text-right small">
				Copyright <?php echo date('Y'); ?><span class="sep"> | </span><?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>                
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>