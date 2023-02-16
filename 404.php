<?php get_header(); ?>
<main>
	<section class="page404 section-padding">
		<div class="container" data-aos="fade-up" data-aos-delay="100">
			<div class="row justify-content-center">
				<div class="col-md-10 text-center">
					<div class="section-title-wrapper">
						<h1 class="page404__title">404<br /><?php echo pll__('Page Not Found'); ?></h1>
						<p class="section-title__description"><?php echo pll__('The page you are looking for doesnt exist or has been moved'); ?></p>
					</div>
					<?php
					$pageHomeID = get_field('home_link', 'page_link')->ID;
					$pageHomeLink = get_permalink($pageHomeID);
					?>
					<a href="<?php echo $pageHomeLink; ?>" class="btn btn-primary"><?php echo pll__('Back to homepage'); ?></a>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>