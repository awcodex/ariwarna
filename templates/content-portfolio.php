<section class="filter-section">
    <div class="clearfix">
        <div class="row">
            <div class="col-sm-12 col-xs-12"> 
                <div class="filter-container isotopeFilters">
					<?php $film_genres = get_terms('jenis'); ?>
                    <ul class="list-inline filter">
						<li class="active">
							<a data-toggle="tab" data-filter="*">All<span>/</span></a>
						</li>
						<?php foreach($film_genres as $film_genre) { ?>
							<li>
								<a data-filter=".<?php echo $film_genre->slug ?>" data-toggle="tab"><?php echo $film_genre->name ?><span>/</span></a>
							</li>
						<?php } ?>
					</ul> 
                </div>
                
            </div>
        </div>
    </div>
</section>

<section class="portfolio-section port-col">
    <div class="clearfix"> 
		<div class="isotopeContainer">
			<?php foreach($film_genres as $film_genre) { ?>
				<div class="tab-pane" id="<?php echo $film_genre->slug ?>">
					<?php 	
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' -1,
						'orderby' => 'RAND',
						'order' => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'jenis',
								'field' => 'slug',
								'terms' => $film_genre->slug
							)
						)
					);
					$films = new WP_Query( $args );		
					?>
			 
					<?php if ( $films->have_posts() ) : ?> 
						<?php while ( $films->have_posts() ) : $films->the_post(); ?>	
						<div class="col-sm-3 isotopeSelector <?php echo $film_genre->slug ?>">
							<article class="">
								<figure>
									 <?php if ( has_post_thumbnail() ) { ?> 
											<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?> 
									 <?php } else {?> 
											<img class="img-responsive" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/user-def.jpg"> 
									<?php } ?>
									<div class="overlay-background">
										<div class="inner"></div>
									</div>
									<div class="overlay">
										<div class="inner-overlay">
											<div class="inner-overlay-content with-icons">
												<a title="<?php the_title();?>" class="fancybox-pop" rel="portfolio-1" href="<?php the_post_thumbnail_url( 'full' ); ?>"><i class="fa fa-search"></i></a>  
												<a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
												<div class="clearfix text-center"><p href="<?php the_permalink();?>"><?php the_title();?></p></div>
											</div>
										</div>
									</div>
								</figure>
							</article>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query() ?> 
					<?php endif; ?>
				</div>
			<?php }  ?>
		</div> 
    </div>
</section>
