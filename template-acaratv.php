<?php
/*
Template Name: Acara Template
*/
?> 
<h2>Acara Tv</h2>
<?php while (have_posts()) : the_post(); ?>
						<?php

							$grabs =  grab('http://www.dokitv.com/jadwal-rcti');
							$kodeawala = explode('<table id="tabeljadwaltv">',$grabs);
							$tampilkana = explode('</table>',$kodeawala[1]); 
							echo '<div id="awcodex" class="table-responsive"><table class="table table-responsive table-striped">';
							echo $tampilkana[0];
							echo "</table></div>";
						?>
<?php endwhile; ?>
<?php get_template_part('templates/content', 'page'); ?>