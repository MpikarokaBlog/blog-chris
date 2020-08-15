<?php get_header(); 

$args_slider = array(
	'post_type' => 'post',
	'posts_per_page' => 10
);
$query_slider = new WP_Query($args_slider);

$theme_opts = get_option('bc_opts');
?>


<div class="container">

	<div id="fullpage">

		<!-- PARTIE SLIDER -->
		<div class="section">

			<?php if($query_slider -> have_posts()): ?>
				<div class="wrap mt-5" style="overflow: hidden;">		
					<div class="frame d-inline-flex" id="basic">

						<ul class="card-deck">
							<?php while ($query_slider -> have_posts()):

								$query_slider -> the_post(); 

								$thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'front-slider');
								$thumbnail_src = $thumbnail_html[0];

								$alt_val = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt'); 
								?>
								<li class="">	

									<div class="card mx-3">
										<img src="<?= $thumbnail_src; ?>" class="card-img-top" alt="<?= (is_null($alt_val[0]))? the_title() : $alt_val; ?>" />
										<div class="card-body">					
											<p class="card-title text-center text-truncate"><?= the_title(); ?></p>
										</div>
										<div class="card-footer clearfix">
											<a href="<?= the_permalink(); ?>" class="btn btn-sm btn-primary float-right">Read</a>
										</div>
									</div>

								</li>
							<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>

					<div class="scrollbar mt-3">
						<div class="handle" style="transform: translateZ(0px) translateX(147px); width: 184px;">
							<div class="mousearea"></div>
						</div>
					</div>

				</div>
			<?php endif; ?>

		</div>
		<!-- FIN PARTIE SLIDER -->

		<!-- PARTIE FREEBIE -->
		<div class="section">
			<div class="row justify-content-between">
				<div class="col-sm-12 col-md-6 clearfix">
					<h2 class="h4 float-left">Here's something for you!</h2>
					<p class="text-justify text-wrap float-right"><?= $theme_opts['legend_freebie']; ?></p>
				</div>
				<div class="col-sm-12 col-md-6 d-flex flex-column">
					<img src="<?= $theme_opts['image_freebie_url']; ?>" class="img-thumbnail img-fluid align-self-center"/>
					<button class="mt-3 btn btn-primary align-self-center">Get my FreeBie !</button>
				</div>
			</div>

			<hr>
		</div>
		<!-- FIN PARTIE FREEBIE -->	
			
		<!-- PARTIE PODCAST -->
		<div class="section">

			<?php
			$args_podcasts = array(
				'post_type' => 'podcast',
				'posts_per_page' => 1
			);
			$query_podcasts = new WP_Query($args_podcasts); 

			if ($query_podcasts -> have_posts()):
				?>

				<div class="row flex-column">
					<h2 class="h4"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-headphones" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 3a5 5 0 0 0-5 5v4.5H2V8a6 6 0 1 1 12 0v4.5h-1V8a5 5 0 0 0-5-5z"/>
						<path d="M11 10a1 1 0 0 1 1-1h2v4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3zm-6 0a1 1 0 0 0-1-1H2v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3z"/>
					</svg> Most recent podcast</h2>
					<div class="d-inline-flex">
						<?php while ($query_podcasts -> have_posts()):

							$query_podcasts -> the_post(); 

							$thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'front-slider');
							$thumbnail_src = $thumbnail_html[0];

							$alt_val = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt'); 
							?>

							<a href=""><img src="<?= $thumbnail_src; ?>" class="img-fluid img-thumbnail" alt="<?= (is_null($alt_val[0]))? the_title() : $alt_val; ?>" /></a>

							<h3 class="ml-3 align-self-center h5 float-right"><a class="text-decoration-none text-dark" href=""><?= the_title(); ?></a></h3>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<a href="<?= get_permalink( get_page_by_path('podcasts'));?>" class="text-decoration-none align-self-end">See all</a>
				</div>

			<?php endif;?>

			<hr>

		</div>
		<!-- FIN PARTIE PODCAST -->
	</div>	

</div>

<?php wp_footer(); ?>
</body>
</html>