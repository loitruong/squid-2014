<?php
/*
 * Template Name: Page - Normal
 */
get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<?php if(function_exists('squid_breadcrumbs')) squid_breadcrumbs(); ?>
				<header class="entry-header page-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				
				<div class="entry-content">
					<?php the_content(); ?>
					<?php endwhile; // end of the loop. ?>
					<?php
						wp_link_pages(array(
							'before' => '<div class="page-links">'.__('Pages:', 'squid'),
							'after'  => '</div>',
						));
					?>
				</div>
				<?php edit_post_link( __( 'Edit', 'squid' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	
			</div>
		</div>
	</div>
<?php get_footer(); ?>
