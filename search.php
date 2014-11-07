<?php
/*
 *
 * Search Results
 *
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
			
					<?php if ( have_posts() ) : ?>
			
						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'squid' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
			
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php get_template_part( 'content', 'search' ); ?>
			
						<?php endwhile; ?>
			
						<?php squid_content_nav( 'nav-below' ); ?>
			
					<?php else : ?>
			
						<?php get_template_part( 'no-results', 'search' ); ?>
			
					<?php endif; ?>
			
					</main>
				</section>
			</div>
			
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>