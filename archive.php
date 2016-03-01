<?php get_header(); ?>
	<main id="content">

<?php if (have_posts()) : $post = $posts[0]; ?>

	<header class="inform">
	<?php if (is_category()) : ?>
		<h1><?php _e( 'Category', 'basic' ); ?> &laquo;<?php single_cat_title(''); ?>&raquo;</h1>
		<?php if ( get_query_var('paged') == '' ) echo category_description(); ?>
	 	<?php elseif( is_tag() ) : ?> <h1><?php _e( 'Tag', 'basic' ); ?> &laquo;<?php single_tag_title(); ?>&raquo;</h1>
	 	<?php elseif (is_day()) : ?> <h1><?php _e( 'Day archives:', 'basic' ); ?> <?php the_time('F jS, Y'); ?></h1>
	 	<?php elseif (is_month()) : ?> <h1><?php _e( 'Monthly archives:', 'basic' ); ?> <?php the_time('F, Y'); ?></h1>
	 	<?php elseif (is_year()) : ?> <h1><?php _e( 'Year archives:', 'basic' ); ?> <?php the_time('Y'); ?></h1>
		<?php elseif (is_author()) : ?> <h1><?php _e( 'Author archives', 'basic' ); ?></h1>
	 	<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?> <h1 class="arhivetitle"><?php _e( 'Archive', 'basic' ); ?></h1>
 	<?php endif; ?>
	</header>

	<?php while (have_posts()) : the_post(); 

		get_template_part( 'content' ); 

	endwhile; 

	avd_the_pagination(false); 

else: ?>
		
	<div class="post">
		<h1><?php _e( 'Posts not found', 'basic' ); ?></h1>
		<?php get_search_form(); ?>
	 </div>
		
<?php endif; ?>

	</main> <!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>